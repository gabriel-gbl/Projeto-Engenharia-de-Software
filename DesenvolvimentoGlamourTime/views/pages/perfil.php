<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GlamourTime - Perfil do Usuário</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="../css/perfil.css">
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
        <section class="profile-container">
            
            <section class="avatar-section">
                <img src="../image/perfil.png" alt="Avatar 3D do Usuário" class="avatar-img">
                
                <button class="edit-btn" aria-label="Editar Foto de Perfil" title="Editar Foto">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
                    </svg>
                </button>
            </section>

            <section class="profile-card">
                <form>
                    <section class="form-group">
                        <label for="nome" class="form-label">NOME:</label>
                        <input type="text" id="nome" class="form-input" value="Maria Eduarda" placeholder="Ex: Maria Eduarda">
                    </section>

                    <section class="form-group">
                        <label for="email" class="form-label">E-MAIL:</label>
                        <input type="email" id="email" class="form-input" value="maria.eduarda@email.com" placeholder="Ex: maria@gmail.com">
                    </section>

                    <section class="form-group">
                        <label for="telefone" class="form-label">TELEFONE</label>
                        <input type="tel" id="telefone" class="form-input" value="11 99999-9999" placeholder="Ex: 11 999999999">
                    </section>
                    
                    <button type="submit" class="btn-action btn-save">SALVAR ALTERAÇÕES</button>

                </form>
            </section>

        </section>

    </main>

</body>
</html>