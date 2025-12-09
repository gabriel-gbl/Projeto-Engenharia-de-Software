<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GlamourTime - Cadastro</title>
    <link rel="stylesheet" href="./views/css/index.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
</head>

<body>

    <main class="container">
        <section class="hero-section"></section>
        <section class="form-section">
            <section class="form-wrapper">

                <header class="logo-container">
                    <img src="./views/image/logo-pink.png" alt="" class="logo">
                </header>

                <h2 class="page-title">CADASTRAR</h2>
                <form action="#" method="POST" style="width: 100%;">

                    <section class="form-group">
                        <label for="email" class="form-label">Email</label>
                        <section class="input-wrapper">
                            <svg class="input-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="2" y="4" width="20" height="16" rx="2"></rect>
                                <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"></path>
                            </svg>
                            <input type="email" id="email" class="form-input" placeholder="Insira seu Email:" required>
                        </section>
                    </section>

                    <section class="form-group">
                        <label for="password" class="form-label">Senha</label>
                        <section class="input-wrapper">
                            <svg class="input-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                                <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                            </svg>
                            <input type="password" id="password" class="form-input" placeholder="Insira sua Senha:" required>
                        </section>
                    </section>

                    <button type="submit" class="btn btn-primary">
                        Register
                    </button>

                    <a href="./views/pages/login.php">
                        <button type="button" class="btn btn-outline">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"></path>
                                <polyline points="10 17 15 12 10 7"></polyline>
                                <line x1="15" y1="12" x2="3" y2="12"></line>
                            </svg>
                            Fazer Login
                        </button>
                    </a>

                </form>
            </section>
        </section>

    </main>

</body>

</html>