<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Skate Shop</title>
    <style>
        body { margin: 0; font-family: Arial, sans-serif; background: #f1f1f1; color: #111; }
        nav { display: flex; justify-content: space-between; align-items: center; padding: 16px 24px; background: #111; }
        nav a { color: white; text-decoration: none; margin-left: 16px; }
        .logo { color: white; font-size: 24px; font-weight: bold; margin-left: 0; }
        .logo span { color: white; }

        /* Carrusel: las fotos están una encima de otra y solo se ve la que tiene la clase "activa" */
        .carrusel { position: relative; max-width: 1000px; height: 420px; margin: 32px auto 0; overflow: hidden; border-radius: 12px; background: #222; }
        .slide { position: absolute; inset: 0; width: 100%; height: 100%; object-fit: cover; opacity: 0; transition: opacity 0.8s; }
        .slide.activa { opacity: 1; }
        .flecha { position: absolute; top: 50%; transform: translateY(-50%); border: none; background: rgba(0, 0, 0, 0.5); color: white; font-size: 28px; width: 44px; height: 44px; border-radius: 50%; cursor: pointer; }
        .izquierda { left: 12px; }
        .derecha { right: 12px; }

        main { text-align: center; padding: 32px 16px 64px; }
        h1 { font-size: 40px; margin: 0 0 8px; }
        .boton { display: inline-block; margin-top: 16px; padding: 12px 24px; background: #ffd400; color: #111; font-weight: bold; text-decoration: none; border-radius: 8px; }
    </style>
</head>
<body>
    <nav>
        <a href="/" class="logo">Skate<span>Shop</span></a>
        <div>
            @auth
                <a href="{{ route('productos.index') }}">Productos</a>
                <a href="{{ route('pedidos.index') }}">{{ auth()->user()->esAdmin() ? 'Pedidos' : 'Mis pedidos' }}</a>
            @else
                <a href="{{ route('login') }}">Iniciar sesión</a>
                <a href="{{ route('register') }}">Registrarse</a>
            @endauth
        </div>
    </nav>

    <div class="carrusel">
        <img src="{{ asset('img/carrusel1.jpg') }}" alt="Nuestra tienda" class="slide activa">
        <img src="{{ asset('img/carrusel2.jpg') }}" alt="Tablas y trucks" class="slide">
        <img src="{{ asset('img/carrusel3.jpg') }}" alt="Ropa Primitive" class="slide">
        <button class="flecha izquierda" onclick="mover(-1)">&#8249;</button>
        <button class="flecha derecha" onclick="mover(1)">&#8250;</button>
    </div>

    <main>
        <h1>Bienvenido a Skate Shop</h1>
        <p>Tablas, trucks, bearings, ruedas y ropa para rodar todos los días.</p>
        <a href="{{ route('productos.index') }}" class="boton">Ver productos</a>
    </main>

    <script>
        let actual = 0;
        const slides = document.querySelectorAll('.slide');

        // Quita "activa" a la foto actual y se la pone a la siguiente (o a la anterior)
        function mover(paso) {
            slides[actual].classList.remove('activa');
            actual = (actual + paso + slides.length) % slides.length;
            slides[actual].classList.add('activa');
        }

        // Cambia de foto sola cada 4 segundos
        setInterval(function () { mover(1); }, 4000);
    </script>
</body>
</html>

