<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Test</title>
</head>
<body>
  <div class="card p-4 col-md-5 mx-auto">
  <div class="card-body bg-dark text-white">
    <?php
      require_once 'conexion.php';
      require_once 'peticiones.php';
    ?>
<h2>Listado de escritores</h2>

<table border="4" class="text-white">
        <thead>
            <tr>
                <th>ID</th>
                <th>nombre</th>
                <th>Edad</th>
                <th>Ultima Publicaion</th>
                <th>Cantidad Noticias</th>
            </tr>
        </thead>
        <tbody>
                            <tr>
                              <?php foreach ( $resultado as $rows){?>
                                <td><?=$rows['id']?></td>
                                <td><?=$rows['nombre']?></td>
                                <td><?=$rows['edad']?></td>
                                <?php
                                  $test = $rows['id'];
                                  $sqlcount = "SELECT COUNT(*) FROM `noticias` WHERE id_escritor = '".$test."';";
                                  $resultcount = $conexion->query($sqlcount);

                                  $sqlnoti ="SELECT fecha FROM `noticias` WHERE id_escritor = '".$test."' ORDER BY fecha DESC LIMIT 1;";
                                  $resultnoti = $conexion->query($sqlnoti);
                                ?>

                                <td>
                                  <?php while($f = $resultnoti->fetch(PDO::FETCH_ASSOC) ){?>
                                  <?php  echo $f['fecha']." "; ?>
                                  <?php  } ?>
                                </td>
                                <td>
                                  <?php while($f = $resultcount->fetch(PDO::FETCH_ASSOC) ){?>
                                  <?php  echo $f['COUNT(*)']." "; ?>
                                  <?php  } ?>
                                </td>
                            </tr>
                        <?php } ?>
                </tbody>
        </table>

<h2>Agregar noticias</h2>
        <div class="container">
        			<form action="peticiones.php" method="POST">
                <div>
        				<label>Titulo</label>
        				<input type="text" name="titulo" placeholder="Ingrese titulo" required>
              </div>
              <div>
        				<label>Fecha</label>
        				<input type="date" name="fecha" required>
              </div>
              <div>
        				<label>Descripcion</label></br>
        				<textarea name="descripcion" placeholder="Ingrese una descripcion breve" required></textarea>
              </div>
              <div>
              <label>Seleccione su escritor</label></br>
                <select name="escritor">
                  <?php foreach ($resultescri as $escritor) { ?>
                    <option value="<?= $escritor['id']; ?>">
                      <?= $escritor['nombre']; ?>
                    </option>
                  <?php  } ?>
                </select>
              </div>
              </br>

        				<input class=" btn btn-success" type="submit" value="Enviar" name="submit">
              </form>
        </div>
</div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
