<?php
session_start();

class Usuario {
    public $id;
    public $nome;
    public $email;
    public $senhaHash;
    public $tipo; 
    public $telefone;

    public function __construct($id, $nome, $email, $senha, $tipo = "cliente", $telefone = "") {
        $this->id = $id;
        $this->nome = $nome;
        $this->email = $email;
        $this->senhaHash = password_hash($senha, PASSWORD_DEFAULT);
        $this->tipo = $tipo;
        $this->telefone = $telefone;
    }
}

class Agendamento {
    public $id;
    public $idCliente;
    public $servico;
    public $data;
    public $hora;
    public $status;
    public $confirmado;


    public function __construct($id, $idCliente, $servico, $data, $hora) {
        $this->id = $id;
        $this->idCliente = $idCliente;
        $this->servico = $servico;
        $this->data = $data;
        $this->hora = $hora;
        $this->status = "pendente";
        $this->confirmado = false;
    }
}

class Sistema {

    private static $instancia = null;

    public $usuarios = [];
    public $agendamentos = [];
    public $horariosDisponiveis = [];

    public static function getInstancia() {
        if (self::$instancia == null) {
            self::$instancia = new Sistema();
        }
        return self::$instancia;
    }

    private function __construct() {

        $this->usuarios = $_SESSION["usuarios"] ?? [];
        $this->agendamentos = $_SESSION["agendamentos"] ?? [];
        $this->horariosDisponiveis = $_SESSION["horariosDisponiveis"] ?? [];

        if (count($this->usuarios) == 0) {

            $this->usuarios[] = new Usuario(
                1,
                "Manicure do Sistema",
                "manicure@glamour.com",
                "1234",
                "manicure"
            );

            $this->horariosDisponiveis = [
            ["data" => "2025-10-05", "hora" => "09:00", "ocupado" => false],
            ["data" => "2025-10-05", "hora" => "10:00", "ocupado" => false],
            ["data" => "2025-10-06", "hora" => "14:00", "ocupado" => false],
            ["data" => "2025-10-06", "hora" => "15:30", "ocupado" => false],
            ["data" => "2025-10-07", "hora" => "13:00", "ocupado" => false],
            ["data" => "2025-10-08", "hora" => "09:30", "ocupado" => false],
            ["data" => "2025-10-09", "hora" => "16:00", "ocupado" => false]
            ];


            $this->salvar();
        }
    }


    private function salvar() {
        $_SESSION["usuarios"] = $this->usuarios;
        $_SESSION["agendamentos"] = $this->agendamentos;
        $_SESSION["horariosDisponiveis"] = $this->horariosDisponiveis;
    }

    public function cadastrarUsuario($nome, $email, $senha) {

        foreach ($this->usuarios as $u) {
            if ($u->email === $email) {
                return "E-mail já cadastrado!";
            }
        }

        $id = count($this->usuarios) + 1;

        $novo = new Usuario($id, $nome, $email, $senha, "cliente");

        $this->usuarios[] = $novo;

        $this->salvar();

        return "OK";
    }

    public function fazerLogin($email, $senha) {

        foreach ($this->usuarios as $u) {
            if ($u->email === $email && password_verify($senha, $u->senhaHash)) {
                $_SESSION["usuario_logado"] = $u->id;
                return $u->tipo;
            }
        }

        return false;
    }

    public function obterUsuarioLogado() {

        if (!isset($_SESSION["usuario_logado"])) return null;

        foreach ($this->usuarios as $u) {
            if ($u->id == $_SESSION["usuario_logado"]) {
                return $u;
            }
        }

        return null;
    }

    public function logout() {
        session_destroy();
    }

    public function adicionarHorarioDisponivel($data, $hora) {

        foreach ($this->horariosDisponiveis as $h) {
            if ($h["data"] === $data && $h["hora"] === $hora) {
                return "Horário já cadastrado!";
            }
        }

        $this->horariosDisponiveis[] = [
            "data" => $data,
            "hora" => $hora,
            "ocupado" => false
        ];

        $this->salvar();
        return "OK";
    }

    public function listarHorariosDisponiveis() {
        return array_filter($this->horariosDisponiveis, fn($h) => $h["ocupado"] === false);
    }

    public function ocuparHorario($data, $hora) {

        foreach ($this->horariosDisponiveis as &$h) {
            if ($h["data"] === $data && $h["hora"] === $hora) {
                $h["ocupado"] = true;
                $this->salvar();
                return;
            }
        }
    }

    public function liberarHorario($data, $hora) {

        foreach ($this->horariosDisponiveis as &$h) {
            if ($h["data"] === $data && $h["hora"] === $hora) {
                $h["ocupado"] = false;
                $this->salvar();
                return;
            }
        }
    }


    public function agendar($idCliente, $servico, $data, $hora) {

        if (!$this->horarioExiste($data, $hora)) {
            return "Este horário não está disponível!";
        }

        if (!$this->horarioLivre($data, $hora)) {
            return "Horário já ocupado!";
        }

        $id = count($this->agendamentos) + 1;

        $novo = new Agendamento($id, $idCliente, $servico, $data, $hora);
        $this->agendamentos[] = $novo;

        $this->ocuparHorario($data, $hora);
        $this->salvar();

        return "OK";
    }

    private function horarioExiste($data, $hora) {
        foreach ($this->horariosDisponiveis as $h) {
            if ($h["data"] === $data && $h["hora"] === $hora) {
                return true;
            }
        }
        return false;
    }

    private function horarioLivre($data, $hora) {
        foreach ($this->horariosDisponiveis as $h) {
            if ($h["data"] === $data && $h["hora"] === $hora && !$h["ocupado"]) {
                return true;
            }
        }
        return false;
    }

    public function cancelarAgendamento($idAgendamento) {
        foreach ($this->agendamentos as $a) {
            if ($a->id == $idAgendamento) {
                $a->status = "cancelado";

                $this->liberarHorario($a->data, $a->hora);

                $this->salvar();
                return "OK";
            }
        }
    }

    public function remarcarAgendamento($idAgendamento, $novaData, $novaHora) {

        if (!$this->horarioExiste($novaData, $novaHora)) {
            return "Este horário não está cadastrado!";
        }

        if (!$this->horarioLivre($novaData, $novaHora)) {
            return "Horário indisponível!";
        }

        foreach ($this->agendamentos as $a) {

            if ($a->id == $idAgendamento) {

                $this->liberarHorario($a->data, $a->hora);

                $a->data = $novaData;
                $a->hora = $novaHora;

                $this->ocuparHorario($novaData, $novaHora);

                $this->salvar();
                return "OK";
            }
        }
    }


    public function listarAgendamentosCliente($idCliente) {
        return array_filter($this->agendamentos, fn($a) => $a->idCliente == $idCliente);
    }

    public function listarAgendamentosManicure() {
        return $this->agendamentos;
    }

    public function excluirUsuario($idUsuario) {

        foreach ($this->agendamentos as $i => $a) {
            if ($a->idCliente == $idUsuario) {
                unset($this->agendamentos[$i]);
            }
        }

        foreach ($this->usuarios as $i => $u) {
            if ($u->id == $idUsuario) {
                unset($this->usuarios[$i]);
                break;
            }
        }

        unset($_SESSION["usuario_logado"]);

        $this->salvar();
        return "OK";
    }

    public function confirmarAgendamento($id) {
        foreach ($this->agendamentos as $a) {
            if ($a->id == $id) {
                $a->confirmado = true;
                $this->salvar();
                return "OK";
            }
        }
        return "Agendamento não encontrado.";
    }

    public function rejeitarAgendamento($id) {
        foreach ($this->agendamentos as $a) {
            if ($a->id == $id) {
                $a->status = "cancelado";
                $this->liberarHorario($a->data, $a->hora);
                $this->salvar();
                return "OK";
            }
        }
        return "Agendamento não encontrado.";
    }

}
?>
