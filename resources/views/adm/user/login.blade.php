<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tela de Login</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link rel="icon" type="image/png" href="{{ asset('img/favicon-96x96.png') }}">

    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link rel="stylesheet" href="{{ asset('css/notification.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/fontawesome-free-6.5.2-web/css/all.min.css') }}">
</head>

<body>    
    <main >
        <div class="card" aria-label="Login card">
            <div class="panel">
                <section class="left">
                    <div class="brand">
                        <div class="logo">
                            <img src="{{ asset('img/logo_e_preciso_saber.png') }}" alt="Logo É Preciso Saber">
                        </div>
                    </div>
    
                    <div class="left-body">
                        <div class="title">
                            <h1>Acesse a sua Conta.</h1>
                            <div class="pretitle">ENTRAR AGORA</div>
                        </div>
        
                        <form id="loginForm" action="{{ route('user.login') }}" method="POST">
        
                            <label class="field" aria-label="E-mail">
                                <i class="icon fa-solid fa-envelope"></i>
                                <input type="email" name="email" placeholder="email@exemplo.com.br" required>
                            </label>
        
                            <label class="field" aria-label="Senha" style="padding-right:58px">
                                <i class="icon fa-solid fa-key"></i>
                                <input id="pwd" name="password" type="password" placeholder="••••••••" required>
        
                                <button type="button" class="suffix-btn" aria-label="Mostrar senha" id="togglePwd">
                                    <i class="fa-solid fa-eye"></i>
                                </button>
                            </label>
        
                            <div class="actions">
                                @csrf
                                <button class="btn btn-blue" type="submit">Entrar</button>
                            </div>
                        </form>
                    </div>
    
                </section>
    
                <aside class="right" aria-hidden="true"></aside>
            </div>
        </div>
    </main>

    @if(session('notification'))
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                let messages = @json(session('notification'));
                messages.forEach(msg => {
                    showNotification(msg.type, "Sistema", msg.text, msg.duration);
                });
            });
        </script>
    @endif

    <script src="{{ asset('js/notification.js') }}"></script>

    <script>
        // Mostrar/ocultar senha
        const togglePassword = document.getElementById('togglePwd');
        const passwordInput = document.getElementById('pwd');

        togglePassword.addEventListener("click", () => {
            const type = passwordInput.getAttribute("type") === "password" ? "text" : "password";
            passwordInput.setAttribute("type", type);

            // Alterna ícone
            togglePassword.innerHTML =
                type === "password"
                    ? '<i class="fa-solid fa-eye"></i>'
                    : '<i class="fa-solid fa-eye-slash"></i>';
        });
    </script>
</body>

</html>