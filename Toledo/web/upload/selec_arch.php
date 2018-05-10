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
$query_listar = "SELECT * FROM categoria ORDER BY unidades ASC";
$listar = mysql_query($query_listar, $Conexx) or die(mysql_error());
$row_listar = mysql_fetch_assoc($listar);
$totalRows_listar = mysql_num_rows($listar);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/font-awesome.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
<title>Subir Archivo</title>
</head>

<body>




    <!-- Fixed navbar -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Subir Archivo</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Subir</a></li>
            <li><a href="#">Mantenimiento</a></li>
            <li><a href="#">Ver</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container theme-showcase" role="main">

      <!-- Main jumbotron for a primary marketing message or call to action -->
      <div class="jumbotron">
        <h1></h1>
        
     
<form id="formulario" name="formulario" method="POST" action="subir_arch_bd.php" enctype="multipart/form-data" class="form-horizontal">
<!--  
<form id="formulario" name="formulario" method="GET" enctype="multipart/form-data" class="form-horizontal">
-->

<form method="get">

  <div class="form-group">
    <label for="arch" class="col-sm-2 control-label">Archivo</label>
    <div class="col-sm-10">
    	<input name="archi" type="file" id="inputArch" placeholder="Archivo" />
    </div>
  </div>
  
  




  <div class="form-group">
  <label for="arch" class="col-sm-2 control-label">Tipos</label>
  <div class="col-sm-10">
  	<select name="tipo" id="tipo">
  	  <option value="">Sel</option>
  	  <?php
do {  
?>
  	  <option value="<?php echo $row_listar['id']?>"><?php echo $row_listar['unidades']?></option>
  	  <?php
} while ($row_listar = mysql_fetch_assoc($listar));
  $rows = mysql_num_rows($listar);
  if($rows > 0) {
      mysql_data_seek($listar, 0);
	  $row_listar = mysql_fetch_assoc($listar);
  }
?>
    </select>
    </div>
  </div>
  
  
  <div class="form-group">
  <label for="arch" class="col-sm-2 control-label">Descripci&oacute;n</label>
  <div class="col-sm-10">
  <textarea name="descrip" ></textarea>
  
  </div>
  </div>






  <p>&nbsp;</p>
  <div class="row">
  <div class="col-md-6 col-md-offset-3">
  	<button type="submit" class="btn btn-success">Enviar <i class="fa fa-check" aria-hidden="true"></i></button>
    <button type="reset" class="btn btn-danger">Limpiar <i class="fa fa-trash-o" aria-hidden="true"></i></button>
  </div>
</div>
</form>
        
        
      </div>

    </div> <!-- /container -->


<p>&nbsp;</p>









<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.js"></script>

</body>
</html>
<?php
mysql_free_result($listar);
?>
