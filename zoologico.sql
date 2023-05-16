-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3307
-- Tiempo de generación: 16-05-2023 a las 23:22:13
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `zoologico`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alimentos`
--

CREATE TABLE `alimentos` (
  `id_alimento` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `tipo` varchar(60) NOT NULL,
  `provedor` varchar(60) NOT NULL,
  `precio` varchar(60) NOT NULL,
  `existencias` varchar(60) NOT NULL,
  `fecha_vencimiento` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `alimentos`
--

INSERT INTO `alimentos` (`id_alimento`, `nombre`, `tipo`, `provedor`, `precio`, `existencias`, `fecha_vencimiento`) VALUES
(1, 'dog chow', 'carnes', 'carnitas S.A', '200000', '30', '2023-05-27'),
(2, 'carne de rex', 'carnes', 'carnitas S.A', '230000', '100', '2023-05-22'),
(3, 'Bananas', 'Frutas', 'bananitas S.A', '120000', '60', '2023-05-18'),
(4, 'pollo', 'carnes', 'multipollo', '190000', '90', '2023-05-19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `animales`
--

CREATE TABLE `animales` (
  `id_animales` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `especie` varchar(60) NOT NULL,
  `numero_ejemplares` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `animales`
--

INSERT INTO `animales` (`id_animales`, `nombre`, `especie`, `numero_ejemplares`) VALUES
(1, 'leones', 'felidos', 5),
(2, 'Cebras', 'mamífero', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `id_empleado` int(11) NOT NULL,
  `id_tipo_empleado` int(11) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `sexo` varchar(1) NOT NULL,
  `numero_telefonico` varchar(10) NOT NULL,
  `edad` int(11) NOT NULL,
  `direccion` varchar(60) NOT NULL,
  `contraseña` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`id_empleado`, `id_tipo_empleado`, `nombre`, `email`, `sexo`, `numero_telefonico`, `edad`, `direccion`, `contraseña`) VALUES
(1, 1, 'administrator', 'administrador12@gmail.com', 'm', '3125477353', 36, 'carrera 24 n 56-23 medellin', '1234'),
(2, 2, 'luis', 'luis12@gmail.com', 'm', '3146599707', 18, 'carrera 50 n 46-13 medellin', 'luis12'),
(3, 1, 'mirabel', 'mirabel012@hotmail.com', 'f', '3120954783', 45, 'carrera 12 n 23-76 medellin', 'mirabel12'),
(5, 3, 'pedro', 'pedro03@gmail.com', 'm', '3290344363', 23, 'carrera 24 n 34-23 medellin', 'pedro03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicamentos`
--

CREATE TABLE `medicamentos` (
  `id_medicamento` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `laboratorio` varchar(60) NOT NULL,
  `existencias` int(11) NOT NULL,
  `fecha_vencimiento` date NOT NULL,
  `fecha_compra` date NOT NULL,
  `lote` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `medicamentos`
--

INSERT INTO `medicamentos` (`id_medicamento`, `nombre`, `laboratorio`, `existencias`, `fecha_vencimiento`, `fecha_compra`, `lote`) VALUES
(1, 'acetominofen', 'Laproff S.A', 30, '2023-05-25', '2025-05-14', 12061),
(2, 'ibuprofeno', 'pescaditos S.A.', 46, '2024-06-12', '2023-05-13', 10832),
(3, 'Apronax', 'paletitas S.A', 54, '2025-01-03', '2023-05-11', 33105);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `descripcion` text NOT NULL,
  `precio` varchar(10) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `imagen`, `nombre`, `descripcion`, `precio`, `cantidad`) VALUES
(2, '../tienda/img/2190_0.png', 'llavero plata', 'mono marron ', '10000', 100),
(4, 'https://m.media-amazon.com/images/I/71XRxhEZ3XL._AC_UL400_.jpg', 'peluche', 'leon rojo', '35000', 150),
(5, 'https://www.bazzarbog.com/8843-home_default/camiseta-negra-cuello-en-v-para-mujer-a-base-de-canamo.jpg', 'camiseta', 'camiseta negra de leon', '45000', 0),
(6, 'https://colormake.com/wp-content/uploads/2014/08/gorra-trucker-blanca-negra-139-600x800-600x600.jpg', 'gorra', 'gorra de loro', '28000', 0),
(15, 'https://www.kiwistore.co/7769-large_default/cuaderno-auxiliar-de-enfermeria-azul.jpg', 'cuaderno', 'cuaderno 100 hojas de leon ', '10000', 0),
(16, 'https://ae01.alicdn.com/kf/HTB1mKfSNxYaK1RjSZFnq6y80pXaj/Bol-grafos-de-Gel-de-bamb-con-dibujo-de-mono-bol-grafos-de-0-5mm-de.jpg', 'lapicero', 'lapicero de mono', '8000', 0),
(17, 'https://image.made-in-china.com/155f0j00dRWUKNHJSzqy/New-Design-3D-Lovely-Animal-Baby-Cotton-Socks.jpg', 'Calcetas', 'Calcetas de vaca', '25000', 0),
(18, 'https://http2.mlstatic.com/D_NQ_NP_891450-MCO26091990388_092017-O.jpg', 'Termo', 'Termo de elefante', '50000', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recintos`
--

CREATE TABLE `recintos` (
  `id_recintos` int(11) NOT NULL,
  `tipo` varchar(60) NOT NULL,
  `n_animales` varchar(60) NOT NULL,
  `estado` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `recintos`
--

INSERT INTO `recintos` (`id_recintos`, `tipo`, `n_animales`, `estado`) VALUES
(1, 'Jaula', 'leon', 'ocupado'),
(2, 'Veterinaria', '0', 'libre'),
(3, 'Cuarto de baño', '0', 'libre'),
(4, 'Farmacia', '0', 'ocupado'),
(5, 'Despensa', '0', 'libre');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_empleado`
--

CREATE TABLE `tipo_empleado` (
  `id` int(11) NOT NULL,
  `tipo_empleado` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipo_empleado`
--

INSERT INTO `tipo_empleado` (`id`, `tipo_empleado`) VALUES
(1, 'Administrador'),
(2, 'Medico'),
(3, 'Cuidador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_recinto`
--

CREATE TABLE `tipo_recinto` (
  `id_recinto` int(11) NOT NULL,
  `tipo_recinto` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipo_recinto`
--

INSERT INTO `tipo_recinto` (`id_recinto`, `tipo_recinto`) VALUES
(1, 'jaula'),
(2, 'veterinaria'),
(3, 'cuarto de baño'),
(4, 'farmacia'),
(5, 'despensa');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alimentos`
--
ALTER TABLE `alimentos`
  ADD PRIMARY KEY (`id_alimento`);

--
-- Indices de la tabla `animales`
--
ALTER TABLE `animales`
  ADD PRIMARY KEY (`id_animales`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id_empleado`),
  ADD KEY `empleado` (`id_tipo_empleado`);

--
-- Indices de la tabla `medicamentos`
--
ALTER TABLE `medicamentos`
  ADD PRIMARY KEY (`id_medicamento`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`);

--
-- Indices de la tabla `recintos`
--
ALTER TABLE `recintos`
  ADD PRIMARY KEY (`id_recintos`),
  ADD KEY `recintos` (`tipo`);

--
-- Indices de la tabla `tipo_empleado`
--
ALTER TABLE `tipo_empleado`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_recinto`
--
ALTER TABLE `tipo_recinto`
  ADD PRIMARY KEY (`id_recinto`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alimentos`
--
ALTER TABLE `alimentos`
  MODIFY `id_alimento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `animales`
--
ALTER TABLE `animales`
  MODIFY `id_animales` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id_empleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `medicamentos`
--
ALTER TABLE `medicamentos`
  MODIFY `id_medicamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `recintos`
--
ALTER TABLE `recintos`
  MODIFY `id_recintos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tipo_empleado`
--
ALTER TABLE `tipo_empleado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tipo_recinto`
--
ALTER TABLE `tipo_recinto`
  MODIFY `id_recinto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD CONSTRAINT `empleado` FOREIGN KEY (`id_tipo_empleado`) REFERENCES `tipo_empleado` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
