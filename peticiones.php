<?php
require_once 'conexion.php';
// create info en db desde form
if (isset($_POST['submit'])){
  $titulo = $_POST['titulo'];
  $fecha = $_POST['fecha'];
  $descripcion = $_POST['descripcion'];
  $escritor = $_POST['escritor'];
    $sql1 = "INSERT INTO noticias (id, titulo, fecha, descripcion, id_escritor) VALUES (NULL, '$titulo', '$fecha', '$descripcion', '$escritor');";
    $contador = $conexion->exec($sql1);
    print($contador." Filas afectadas");
    header("location: ./inicio.php");
}
// select de escritores en tabla
    //$sqlescritor = "SELECT * FROM `noticias` JOIN `escritores` WHERE noticias.id_escritor=escritores.id ORDER BY fecha DESC;";
    $sqlescritor = "SELECT * FROM `escritores`;";
    $resultado = $conexion->query($sqlescritor);
    //$sqlnoti = "SELECT fecha FROM `noticias` JOIN `escritores` on noticias.id_escritor=escritores.id ORDER BY fecha DESC LIMIT 1;";
// selec t escritor en form
$sql = "SELECT * FROM escritores;";
$resultescri = $conexion->query($sql);

?>
