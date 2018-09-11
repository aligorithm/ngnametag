<?php 
function purify($input){
	$input = htmlspecialchars($input, ENT_QUOTES, 'UTF-8');
	return $input;
}

function random_token($length){
	$token = bin2hex(openssl_random_pseudo_bytes($length));
	return $token;
}

function get_products(){
		global $dab;
		$show = $dab->prepare("SELECT * FROM products WHERE status = 'live' ORDER BY id DESC");
		$show->execute();
		if ($show) {
			return $show->fetch();
		} else{
			return 0;
		}
}

?>