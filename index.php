<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Zoological Gardens</title> 
    <link rel="shortcut icon" href = "img/icon.jpg" type= "image/x-icon">
    <link rel = "stylesheet" href = "CSS/estilos.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
    <link rel="icon" href="img/frailecillo.png" type=" image/x-icon">
</head>
<body>
    <header>
        <nav>
            <a href = "index.html"> Inicio </a>
            <a href = "#animales"> Animales </a>
            <a href = "#horarios"> Horario y Precios </a>
            <a href = "#ubicacion"> Ubicacion </a>
            <a href = "tienda.php"> Tienda </a>
        </nav>
        <section class = "textos-header">
            <h1> BIENVENIDOS A ZOOLOGICAL GARDENS </h1>
        </section>
        <div class = "wave" style="height: 150px; overflow: hidden;" ><svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%;"><path d="M0.00,49.99 C150.00,150.00 349.20,-49.99 500.00,49.99 L500.00,150.00 L0.00,150.00 Z" style="stroke: none; fill: #fff;"></path></svg></div>
    </header>

    <main>
        <section class = "textos-header">
            <h2>Bienvenidos a Zoological Gardens</h2>
            <p>El zoológico es un lugar donde podrás observar diferentes especies de animales en su hábitat natural.</p>
            <p>Visítanos y descubre más sobre la fauna mundial.</p>
        </section>
        <section class = "about-services">
            <div class = "contenedor"> 
                <h2 class = "titulo"> Nuestros servicios </h2>
                <div class = "servicio-cont">
                    <div class = "servicio-ind">
                        <img src="img/img1.jpg" alt="">
                        <h3> Name </h3>
                        <p> Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sunt sit repellat magni praesentium maiores natus, perspiciatis ea voluptatum similique eaque sint ratione minima deserunt itaque! Aspernatur atque quasi ducimus molestiae?</p>
                    </div>
                    <div class = "servicio-ind">
                        <img src="img/img2.jpg" alt="">
                        <h3> Name </h3>
                        <p> Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sunt sit repellat magni praesentium maiores natus, perspiciatis ea voluptatum similique eaque sint ratione minima deserunt itaque! Aspernatur atque quasi ducimus molestiae?</p>
                    </div>
                    <div class = "servicio-ind">
                        <img src="img/img3.jpg" alt="">
                        <h3> Name </h3>
                        <p> Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sunt sit repellat magni praesentium maiores natus, perspiciatis ea voluptatum similique eaque sint ratione minima deserunt itaque! Aspernatur atque quasi ducimus molestiae?</p>
                    </div>
                </div>
            </div>
        </section>
        

        <section id="animales">
            <h2>Nuestros animales</h2>
            <ul>
                <li><a href="#">Leones</a></li>
                <li><a href="#">Elefantes</a></li>
                <li><a href="#">Pandas</a></li>
                <li><a href="#">Jirafas</a></li>
                <li><a href="#">Tigres</a></li>
                <li><a href="#">Cocodrilos</a></li>
            </ul>
        </section>
        <section id="horarios">
            <h2>Horarios y precios</h2>
            <p>Horario de atención: De lunes a domingo de 9:00am a 5:00pm</p>
            <p>Precio de entrada: $10.00 adultos, $5.00 niños</p>
        </section>
        <section id="ubicacion">
            <h2>Ubicación</h2>
            <p>Estamos ubicados en la siguiente dirección:</p>
            <address>
                Calle 10 # 20-30, Barrio San José
                Ciudad, País
            </address>
        </section>
    </main>
    <button id="btn-subir"><i class="fa-solid fa-angle-up" style="color: #ffffff;"></i></button>
    <script>
        document.getElementById("btn-subir").addEventListener("click", function () {
            window.scrollTo({
                top: 0,
                behavior: "smooth"
            });
        });
        window.addEventListener("scroll", function () {
                // Código para verificar la posición del usuario
            });
        window.addEventListener("scroll", function () {
                if (document.documentElement.scrollTop > 0) {
                    // Mostrar el botón
                    document.getElementById("btn-subir").style.display = "block";
                } else {
                    // Ocultar el botón
                    document.getElementById("btn-subir").style.display = "none";
                }
            });
            
    </script>
    <script src="https://kit.fontawesome.com/6e6a67c425.js" crossorigin="anonymous"></script>
    <footer>
        <p>Zoológico © 2023 Todos los derechos reservados</p>
        <a href="Iniciosesion.html"><button class="btn-data"><i class="fa-solid fa-database tamanio" style="color: #ffffff;"></i></button></a>
    </footer>
</body>

</html>

</body>

</html>