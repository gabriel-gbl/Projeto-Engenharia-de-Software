<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GlamourTime - Agendar Horário</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/agendarHorario.css">
    <link rel="stylesheet" href="../css/components.css">
</head>
<body>
    <?php
        include "sidebar.php"
    ?>

    <main class="main-content">
        <?php
            include "header.php"
        ?>
        <section class="schedule-panel">
            
            <section class="illustration-area">
                <img src="../image/pessoa-agendar.png" alt="Pessoa Agendando" class="illustration-img">
            </section>

            <section class="form-area">
                <form>
                    
                    <section class="form-group">
                        <label for="servico" class="form-label">AGENDAR:</label>
                        <input type="text" id="servico" class="form-control" placeholder="Ex: Manicure e Pedicure" required>
                    </section>

                    <section class="form-row">
                        <section class="form-col">
                            <section class="form-group">
                                <label for="data" class="form-label">DATA :</label>
                                <input type="date" id="data" class="form-control" value="2025-10-06" required>
                            </section>
                        </section>
                        <section class="form-col">
                            <section class="form-group">
                                <label for="hora" class="form-label">HORA :</label>
                                <input type="time" id="hora" class="form-control" value="12:00" required>
                            </section>
                        </section>
                    </section>

                    <button type="button" class="btn-check-availability">VER DISPONIBILIDADE</button>
                    <button type="submit" class="btn-submit">AGENDAR</button>

                </form>
            </section>

        </section>

    </main>

</body>
</html>