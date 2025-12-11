<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GlamourTime - Seu Agendamento</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="../css/seuAgendamento.css">
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
        <section class="appointment-panel">
            
            <section class="content-container">
                
                <section class="info-section">
                    <h2 class="section-title">SEU ATENDIMENTO</h2>
                    
                    <section class="date-display">
                        05/10/2025 ÁS 09:00
                    </section>

                    <button class="btn-action btn-reschedule">
                        REMARCAR DATA/HORA
                    </button>
                    
                    <button class="btn-action btn-cancel">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                        DESMARCAR DATA/HORA
                    </button>
                </section>

                <section class="illustration-section">
                    <img src="../image/pessoa-atendimento.png" alt="Ilustração de uma mulher com maquiagem segurando um quadro de informações sobre agendamento." class="illustration-img">
                </section>

            </section>

        </section>

    </main>

</body>
</html>