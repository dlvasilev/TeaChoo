<?php
	
	if(isset($_SESSION['user_id'])) {
		$user = new UserModel((int)$_SESSION['user_id']);
	}

?>