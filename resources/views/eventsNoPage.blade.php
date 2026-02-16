<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evento: {{ $event->name }}</title>
    <link rel="stylesheet" href="{{ asset('css/eventNoPage.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/fontawesome-free-6.5.2-web/css/all.min.css') }}">
    <link rel="icon" type="image/png" href="{{ asset('img/favicon-96x96.png') }}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- IMPORTANT: DO NOT REMOVE THIS SCRIPT TAG OR THIS VERY COMMENT! -->
    <script src="https://cdn.gpteng.co/gptengineer.js" type="module"></script>
</head>
<body>
    <main>
        <div class="container">
            <div class="text-info">
                <h1>Página em Desenvolvimento...</h1>
                <p>Logo logo teremos mais informaçõe sobre o evento.</p>
            </div>
        
            <div class="img-page">
                <img src="{{ asset('img/ava/todos-juntos.png') }}" alt="">
    
                <a href="{{ route('web.index') }}" class="btn-blue">
                    <i class="fa-solid fa-rotate-left"></i>
                    Voltar
                </a>
            </div>
        </div>
    </main>
</body>
</html>