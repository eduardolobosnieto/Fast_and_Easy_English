<?php require_once('Connections/Conexx.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

mysql_select_db($database_Conexx, $Conexx);
$query_elim = "SELECT * FROM orden_dia ORDER BY numero_od ASC, orden_dia.tipo ASC";
$elim = mysql_query($query_elim, $Conexx) or die(mysql_error());
$row_elim = mysql_fetch_assoc($elim);
$totalRows_elim = mysql_num_rows($elim);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="css/bootstrap.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
<title>Orden del D&iacute;a</title>
</head>

<body>
<table width="200" border="1">
  <tr>
    <td>Nro</td>
    <td>O D</td>
    <td>Tipo</td>
    <td>Fecha</td>
    <td>Accion</td>
  </tr>
  
  <?php 
  $nro = 1;
  do { ?>
    <tr>
      <td><?php echo $nro; $nro++?></td>
      <td><?php echo $row_elim['numero_od']; ?></td>
      <td><?php echo $row_elim['tipo']; ?></td>
      <td><?php echo $row_elim['fecha_dd']; ?> / <?php echo $row_elim['fecha_mm']; ?> / <?php echo $row_elim['fecha_aa']; ?></td>
      <td><a href="docOD/<?php echo $row_elim['arch']; ?>" target="_blank">Ver</a> - <a href="modif.php?id_m=<?php echo $row_elim['id']; ?>">Modificar</a> - <a href="elim.php?ide=<?php echo $row_elim['id']; ?>">Eliminar</a></td>
    </tr>
    <?php } while ($row_elim = mysql_fetch_assoc($elim)); ?>
</table>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.js"></script>

</body>
</html>
<?php
mysql_free_result($elim);
?>
