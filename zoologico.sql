-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: May 26, 2023 at 07:26 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zoologico`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `InsertarProducto` (IN `nombre` VARCHAR(100), IN `precio` DECIMAL(10,2), IN `stock` INT)   BEGIN
    INSERT INTO productos (nombre, precio, stock)
    VALUES (nombre, precio, stock);
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `agendar_citas`
--

CREATE TABLE `agendar_citas` (
  `id_agendar` int(11) NOT NULL,
  `title` varchar(60) NOT NULL,
  `animal` int(60) NOT NULL,
  `start` date NOT NULL,
  `razon_cita` text NOT NULL,
  `color` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `agendar_citas`
--

INSERT INTO `agendar_citas` (`id_agendar`, `title`, `animal`, `start`, `razon_cita`, `color`) VALUES
(3, 'cita con el leon', 1, '2023-05-24', 'El leon se desmayo mientras comia', '#f16565'),
(5, 'cita con la cebra', 2, '2023-05-09', 'tienen un problema en la cintura', '#f16565'),
(7, 'operacion cebra 2', 1, '2023-05-09', 'esta malo', '#af0d0d'),
(8, 'operacion de pierna al leon', 1, '2023-05-12', 'se desmayo mientras corria', '#871717'),
(9, 'revision leopardo', 1, '2023-05-18', 'El leon se cayo de un arbol ', '#d31d1d'),
(10, 'Revision al leon', 1, '2023-05-26', 'esta malo del estomago', '#000000'),
(11, 'Cebra lengua azul', 2, '2023-05-29', 'la cebra tiene un color azul extraño en la lengua ', '#3b308d'),
(12, 'leon cola ', 1, '2023-05-29', 'La cola del leon tiene falta de pelaje', '#f50a0a'),
(28, 'Control con el leon ', 1, '2023-05-30', 'Revisar el leon con dolor de estomago', '#000000'),
(29, 'Control cebra lengua azul', 1, '2023-05-30', 'Contro de mejoria con la cebra de la lengua azul ', '#9447bd'),
(31, 'Control de la cebra 2 operada', 1, '2023-05-31', 'Revision de mejoria con la cebra 2 ', '#d25151'),
(32, 'Operacion de leon', 1, '2023-06-02', 'Operacion de estomago sacar tumor maligno', '#d34591'),
(33, 'Chequeo cebra', 1, '2023-06-03', 'La cebra tiene un chequeo mensual', '#ba5a88'),
(35, 'Chequeo a leones', 1, '2023-05-27', 'Chequeo mensual a los leones ', '#ba6969'),
(36, 'Bersar a mi amor', 1, '2023-05-25', 'Besarte todo el dia', '#e22828');

-- --------------------------------------------------------

--
-- Table structure for table `alimentos`
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
-- Dumping data for table `alimentos`
--

INSERT INTO `alimentos` (`id_alimento`, `nombre`, `tipo`, `provedor`, `precio`, `existencias`, `fecha_vencimiento`) VALUES
(1, 'dog chow', 'carnes', 'carnitas S.A', '200000', '30', '2023-05-27'),
(2, 'carne de rex', 'carnes', 'carnitas S.A', '230000', '50', '2023-05-22'),
(3, 'Bananas', 'Frutas', 'bananitas S.A', '120000', '60', '2023-05-18'),
(4, 'pollo', 'carnes', 'multipollo', '190000', '78', '2023-05-19');

-- --------------------------------------------------------

--
-- Table structure for table `animal`
--

CREATE TABLE `animal` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `especie` varchar(100) DEFAULT NULL,
  `sexo` varchar(10) DEFAULT NULL,
  `color` varchar(50) DEFAULT NULL,
  `edad` int(11) DEFAULT NULL,
  `estado` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Dumping data for table `animal`
--

INSERT INTO `animal` (`id`, `nombre`, `especie`, `sexo`, `color`, `edad`, `estado`) VALUES
(1, 'Max', 'Leon', 'Macho', 'Negro', 3, 'Sano'),
(2, 'Elena', 'Elefante', 'Hembra', 'Gris', 3, 'Sano'),
(3, 'Diego', 'Panda', 'Macho', 'Blanco y  negro', 6, 'Enfermo'),
(4, 'Sid', 'Jirafa', 'Macho', 'Amarillo con manchas cafes', 8, 'Sano'),
(5, 'Maria', 'Tigre', 'Hembra', 'Naranja', 9, 'Sano'),
(6, 'Irina', 'Cocodrilo', 'Hembra', 'Gris', 9, 'Sano'),
(7, 'Star', 'Tigre', 'Macho', 'Naranja', 3, 'Enfermo'),
(8, 'Luna', 'Jirafa', 'Hembra', 'Naranja', 2, 'Sano'),
(9, 'Rocky', 'Cocodrilo', 'Macho', 'Marrón', 5, 'Sano'),
(10, 'Nala', 'Leon', 'Hembra', 'Naranja', 1, 'Sano'),
(11, 'Diana', 'Cebra', 'Hembra', 'Blanco y negro', 8, 'Enfermo'),
(12, 'Burbuja', 'Serpiente', 'No especif', 'Amarillo', 2, 'Sano'),
(13, 'Luis', 'Gorila', 'Macho', 'Negro', 12, 'Sano'),
(14, 'Gloria', 'Hipopótamo', 'Hembra', 'Gris', 10, 'Enfermo'),
(15, 'Daniel', 'Tigre', 'Macho', 'Naranja y negro', 6, 'Sano');

-- --------------------------------------------------------

--
-- Table structure for table `animales`
--

CREATE TABLE `animales` (
  `id_animales` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `especie` varchar(60) NOT NULL,
  `numero_ejemplares` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `animales`
--

INSERT INTO `animales` (`id_animales`, `nombre`, `especie`, `numero_ejemplares`) VALUES
(1, 'leones', 'felidos', 5),
(2, 'Cebras', 'mamífero', 2);

-- --------------------------------------------------------

--
-- Table structure for table `carrito`
--

CREATE TABLE `carrito` (
  `id` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `empleados`
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
-- Dumping data for table `empleados`
--

INSERT INTO `empleados` (`id_empleado`, `id_tipo_empleado`, `nombre`, `email`, `sexo`, `numero_telefonico`, `edad`, `direccion`, `contraseña`) VALUES
(1, 1, 'administrator', 'administrador12@gmail.com', 'm', '3125477353', 36, 'carrera 24 n 56-23 medellin', '1234'),
(2, 2, 'luis', 'luis12@gmail.com', 'm', '3146599707', 18, 'carrera 50 n 46-13 medellin', 'luis12'),
(3, 1, 'mirabel', 'mirabel012@hotmail.com', 'f', '3120954783', 45, 'carrera 12 n 23-76 medellin', 'mirabel12'),
(5, 3, 'pedro', 'pedro03@gmail.com', 'm', '3290344363', 23, 'carrera 24 n 34-23 medellin', 'pedro03');

-- --------------------------------------------------------

--
-- Table structure for table `medicamentos`
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
-- Dumping data for table `medicamentos`
--

INSERT INTO `medicamentos` (`id_medicamento`, `nombre`, `laboratorio`, `existencias`, `fecha_vencimiento`, `fecha_compra`, `lote`) VALUES
(1, 'acetominofen', 'Laproff S.A', 40, '2023-05-25', '2025-05-14', 12061),
(2, 'ibuprofeno', 'pescaditos S.A.', 46, '2024-06-12', '2023-05-13', 10832),
(3, 'Apronax', 'paletitas S.A', 54, '2025-01-03', '2023-05-11', 33105),
(5, 'aspirina', 'lampin S.A', 38, '2024-06-11', '2023-05-19', 43128);

-- --------------------------------------------------------

--
-- Table structure for table `productos`
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
-- Dumping data for table `productos`
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
-- Table structure for table `productos_ventas`
--

CREATE TABLE `productos_ventas` (
  `id` int(11) NOT NULL,
  `productos` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `productos_vendidos` int(11) NOT NULL,
  `precio_unitario` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `productos_ventas`
--

INSERT INTO `productos_ventas` (`id`, `productos`, `fecha`, `productos_vendidos`, `precio_unitario`, `total`) VALUES
(1, 2, '2023-05-18', 12, 12000, 144000),
(2, 15, '2023-05-19', 9, 8000, 72000);

-- --------------------------------------------------------

--
-- Table structure for table `recintos`
--

CREATE TABLE `recintos` (
  `id_recintos` int(11) NOT NULL,
  `tipo` varchar(60) NOT NULL,
  `n_animales` varchar(60) NOT NULL,
  `estado` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `recintos`
--

INSERT INTO `recintos` (`id_recintos`, `tipo`, `n_animales`, `estado`) VALUES
(1, 'Jaula', '', 'libre'),
(2, 'Veterinaria', '2', 'ocupado'),
(3, 'Cuarto de baño', '0', 'libre'),
(4, 'Farmacia', '0', 'ocupado'),
(5, 'Despensa', '0', 'libre');

-- --------------------------------------------------------

--
-- Table structure for table `reportes_admin`
--

CREATE TABLE `reportes_admin` (
  `id` int(11) NOT NULL,
  `empleado` int(11) NOT NULL,
  `animal` varchar(60) NOT NULL,
  `lugar` varchar(60) NOT NULL,
  `fecha` date NOT NULL,
  `contenido` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reportes_admin`
--

INSERT INTO `reportes_admin` (`id`, `empleado`, `animal`, `lugar`, `fecha`, `contenido`) VALUES
(3, 5, '1', '1', '2023-05-19', 'El leon daño uno de los accesorio del escenario');

-- --------------------------------------------------------

--
-- Table structure for table `reportes_medico`
--

CREATE TABLE `reportes_medico` (
  `id` int(11) NOT NULL,
  `empleado` int(11) NOT NULL,
  `animal` varchar(60) NOT NULL,
  `lugar` varchar(60) NOT NULL,
  `fecha` date NOT NULL,
  `contenido` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reportes_medico`
--

INSERT INTO `reportes_medico` (`id`, `empleado`, `animal`, `lugar`, `fecha`, `contenido`) VALUES
(3, 5, '2', '', '2023-05-19', 'la cebra tiene un raspon en la parte derecha del lomo');

-- --------------------------------------------------------

--
-- Table structure for table `tipo_empleado`
--

CREATE TABLE `tipo_empleado` (
  `id` int(11) NOT NULL,
  `tipo_empleado` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tipo_empleado`
--

INSERT INTO `tipo_empleado` (`id`, `tipo_empleado`) VALUES
(1, 'Administrador'),
(2, 'Medico'),
(3, 'Cuidador');

-- --------------------------------------------------------

--
-- Table structure for table `tipo_recinto`
--

CREATE TABLE `tipo_recinto` (
  `id_recinto` int(11) NOT NULL,
  `tipo_recinto` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tipo_recinto`
--

INSERT INTO `tipo_recinto` (`id_recinto`, `tipo_recinto`) VALUES
(1, 'jaula'),
(2, 'veterinaria'),
(3, 'cuarto de baño'),
(4, 'farmacia'),
(5, 'despensa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agendar_citas`
--
ALTER TABLE `agendar_citas`
  ADD PRIMARY KEY (`id_agendar`),
  ADD KEY `animal_agenda` (`animal`);

--
-- Indexes for table `alimentos`
--
ALTER TABLE `alimentos`
  ADD PRIMARY KEY (`id_alimento`);

--
-- Indexes for table `animal`
--
ALTER TABLE `animal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `animales`
--
ALTER TABLE `animales`
  ADD PRIMARY KEY (`id_animales`);

--
-- Indexes for table `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id_empleado`),
  ADD KEY `empleado` (`id_tipo_empleado`);

--
-- Indexes for table `medicamentos`
--
ALTER TABLE `medicamentos`
  ADD PRIMARY KEY (`id_medicamento`);

--
-- Indexes for table `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`);

--
-- Indexes for table `productos_ventas`
--
ALTER TABLE `productos_ventas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `producto_venta` (`productos`);

--
-- Indexes for table `recintos`
--
ALTER TABLE `recintos`
  ADD PRIMARY KEY (`id_recintos`),
  ADD KEY `recintos` (`tipo`);

--
-- Indexes for table `reportes_admin`
--
ALTER TABLE `reportes_admin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reporte` (`empleado`);

--
-- Indexes for table `reportes_medico`
--
ALTER TABLE `reportes_medico`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reporte` (`empleado`);

--
-- Indexes for table `tipo_empleado`
--
ALTER TABLE `tipo_empleado`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tipo_recinto`
--
ALTER TABLE `tipo_recinto`
  ADD PRIMARY KEY (`id_recinto`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agendar_citas`
--
ALTER TABLE `agendar_citas`
  MODIFY `id_agendar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `alimentos`
--
ALTER TABLE `alimentos`
  MODIFY `id_alimento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `animal`
--
ALTER TABLE `animal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `animales`
--
ALTER TABLE `animales`
  MODIFY `id_animales` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `carrito`
--
ALTER TABLE `carrito`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id_empleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `medicamentos`
--
ALTER TABLE `medicamentos`
  MODIFY `id_medicamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `productos_ventas`
--
ALTER TABLE `productos_ventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `recintos`
--
ALTER TABLE `recintos`
  MODIFY `id_recintos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `reportes_admin`
--
ALTER TABLE `reportes_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `reportes_medico`
--
ALTER TABLE `reportes_medico`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tipo_empleado`
--
ALTER TABLE `tipo_empleado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tipo_recinto`
--
ALTER TABLE `tipo_recinto`
  MODIFY `id_recinto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `agendar_citas`
--
ALTER TABLE `agendar_citas`
  ADD CONSTRAINT `animal_agenda` FOREIGN KEY (`animal`) REFERENCES `animales` (`id_animales`);

--
-- Constraints for table `empleados`
--
ALTER TABLE `empleados`
  ADD CONSTRAINT `empleado` FOREIGN KEY (`id_tipo_empleado`) REFERENCES `tipo_empleado` (`id`);

--
-- Constraints for table `productos_ventas`
--
ALTER TABLE `productos_ventas`
  ADD CONSTRAINT `producto_venta` FOREIGN KEY (`productos`) REFERENCES `productos` (`id_producto`);

--
-- Constraints for table `reportes_admin`
--
ALTER TABLE `reportes_admin`
  ADD CONSTRAINT `reporte` FOREIGN KEY (`empleado`) REFERENCES `empleados` (`id_empleado`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
