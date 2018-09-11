<?php 
require '../app/functions.php';
require '../app/dab.php';
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>NameTag Logs</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width = device-width, initial-scale = 1">
	<link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
</head>
<body>

<div class="container">
	<div class="page-header"><h1>NameTag Logs</h1>
	<a href="../"><span class="glyphicon glyphicon-chevron-left"></span> Home</a>
	</div>

	<div class="table-responsive">
		<table class="table table-hover">
    		<thead>
    		 <tr>
    		    <th>Input Name</th>
    		    <th>Gender</th>
   			    <th>First Name</th>
   			    <th>Last Name</th>
   			    <th>Tribe</th>
   			    <th>Time</th>
      		</tr>
    		</thead>
    		<tbody>
<?php include './table.php'; ?>
    		</tbody>
  		</table>
	</div>
</div>
<span class='name-text'></span>
<script type="text/javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
<script type="text/javascript" src="../js/app.js"></script>
</body>
</html>