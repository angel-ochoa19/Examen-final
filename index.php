<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Examen Final</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <?php
    //abre la conexion a la base de datos
        $pdo_option[PDO::ATTR_ERRMODE]=PDO::ERRMODE_EXCEPTION;
        $conexion = new PDO("mysql:host=localhost;dbname=final_0907-23-10378", "root", "", $pdo_option);

        if (isset($_POST["accion"])) {
            //echo "Quieres " . $_POST["accion"];
        
            if ($_POST["accion"] == "Crear") {
                $insert = $conexion->prepare("INSERT INTO producto (codigo, nombre, precio, existencia) VALUES (:codigo, :nombre, :precio, :existencia)");
                $insert->bindValue('codigo', $_POST['codigo']);
                $insert->bindValue('nombre', $_POST['nombre']);
                $insert->bindValue('precio', $_POST['precio']);
                $insert->bindValue('existencia', $_POST['existencia']);
                $insert->execute(); // Ejecutar la consulta insert
            }
        }
        


    //Ejecuramos la consulta
        $select = $conexion->query("SELECT codigo, nombre, precio, existencia FROM producto");

  ?>
  <br>
  <form method="POST">
          <input type="text" name="codigo" placeholder="Ingrese el codigo"/>
          <br>
          <input type="text" name="nombre" placeholder="Ingrese el nombre"/>
          <br>
          <input type="text" name="precio" placeholder="Ingrese precio"/>
          <br>
          <input type="text" name="existencia" placeholder="Ingrese la existencia"/>
          <br>
          <input type="hidden" name="accion" value="Crear"/>
          <button type="submit">Crear </button>
     

<table border='1'> 
<thead>
        <tr>
            <th>CODIGO</th>
            <th>NOMBRE</th>
            <th>PRECIO</th>
            <th>EXISTENCIA</th>
            <td>ACCIONES</td>


</tr>
    </thead>
    <tbody>
    
        <?php foreach($select->fetchAll() as $producto) { ?>
            <tr>
                <td> <?php echo $producto["codigo"] ?> </td>
                <td> <?php echo $producto["nombre"] ?> </td>
                <td> <?php echo $producto["precio"] ?> </td>
                <td> <?php echo $producto["existencia"] ?> </td>
               
                  

        </tr>

        <?php } ?>
        
</html>


