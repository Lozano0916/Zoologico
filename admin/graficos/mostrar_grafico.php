<?php
	class estadisticas{
		private $conexion;
		function __construct()
		{
			require_once('../../includes/conexion.php');
			$this->conexion = new conexion();
			$this->conexion->conectar();
        }


		function datosEstadisticas(){
			$sql = "ESCRIBIR CONSULTA";	
			$arreglo = array();
			if ($consulta = $this->conexion->conexion->query($sql)) {

				while ($consulta_VU = mysqli_fetch_array($consulta)) {
					$arreglo[] = $consulta_VU;
				}
				return $arreglo;
				$this->conexion->cerrar();	
			}
		}
	}
?>
