<?php 
require 'app/functions.php';
require 'app/dab.php';

$bg = array('bg-01', 'bg-02', 'bg-03', 'bg-04', 'bg-05', 'bg-06', 'bg-07', 'bg-08' ); // array of filenames

  $i = rand(0, count($bg)-1); // generate random number size of the array
  $selectedBg = "$bg[$i]"; // set variable equal to which random filename was chosen
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>NameTag</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width = device-width, initial-scale = 1">
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">

</head>
<body>
<div class="everything parallax <?php echo $selectedBg; ?>">
<div class="container">
	<div class="page-header"><h1>NameTag</h1></div>
	<div class="jumbotron" id="showcase">
	<p id="message">Get yourself a Nigerian Name! Let NameTag make you Nigerian in a fun way. <br><br>Simply enter your name and gender below.</p>
	<button id="another_one" class="btn btn-default" style="display:none;"><span class="glyphicon glyphicon-chevron-left"></span>Another one</button>
	</div>
	<div class="row">
		<div class="col-sm-3"></div>
		<div class="col-sm-6">
		<form method="POST" action="app/app.php">
			<div class="input-group input-group-lg">
				<input type="text" class="form-control" name="name" placeholder="Name" required>
				<select class="form-control" name="gender" placeholder="gender" required>
					<option value="male">Male</option>
					<option value="female">Female</option>
				</select>
				<input type="hidden" name="token" value="<?php echo $_SESSION['token']; ?>">
				<button id="submit_button" type="submit" class="btn btn-success form-control" role="button">Go!</button>
			</div><br>
		</form>
		</div>
		<div class="col-sm-3"></div>
	</div>


</div>


</div>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/app.js"></script>
</body>
</html>