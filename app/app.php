<?php 
header('Content-Type: application/json');
require 'functions.php';
require 'dab.php';


if (isset($_POST['token']) && $_POST['token'] == $_SESSION['token']) {
	$name = purify($_POST['name']);
	$gender = purify($_POST['gender']);
	$time = date("h:i:sa, d-m-Y");
//choose any at random
		$query = $dab->prepare("SELECT * FROM first_names WHERE gender = ?  ORDER BY rand() LIMIT 1");
		$query->execute([$gender]);
		$first_name = $query->fetch();

//last name that matches the same tribe with first name
	$query = $dab->prepare("SELECT * FROM last_names WHERE tribe_id = ? ORDER BY rand() LIMIT 1");
	$query->execute([$first_name['tribe_id']]);
	$last_name = $query->fetch();

//get salutation from matching tribe
	$salutation_query = $dab->prepare("SELECT * FROM tribes WHERE id = ?");
	$salutation_query->execute([$first_name['tribe_id'] ]);
	$tribe = $salutation_query->fetch();

	$log_table_row = "
	      		<tr>
        			<td>{$name}</td>
        			<td>{$gender}</td>
        			<td>{$first_name['name']}</td>
        			<td>{$last_name['name']}</td>
        			<td>{$tribe['name']}</td>
        			<td>{$time}</td>
      			</tr>";
    file_put_contents("../owner/table.php",$log_table_row,FILE_APPEND)

 ?>
{
	"first_name" : "<?php echo $first_name['name']; ?>",
	"last_name" : "<?php echo $last_name['name']; ?>",
	"tribe" : "<?php echo $tribe['name']; ?>",
	"salutation" : "<?php echo $tribe['salutation']; ?>",
	"status" : 1,
	"input" : "<?php echo $name; ?>"
}
<?php }else{ ?>
{
"status" : 0
}
<?php } 
?>
