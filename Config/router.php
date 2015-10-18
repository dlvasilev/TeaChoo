<?php

	/**
	 * App Router
	 */

	if(isset($_GET['page'])) {
		if($_GET['page'] == 'signin') {
			$UserController->signIn();
		} else if($_GET['page'] == 'signup') {
			$UserController->signUp();
		} else if($_GET['page'] == 'signout') {
			$UserController->signOut();
		} else if($_GET['page'] == 'profile') {
			$UserController->profile();
		} else if($_GET['page'] == 'teachers') {
			$HomeController->teachers();
		} else if($_GET['page'] == 'rate') {
			$HomeController->rate();
		} else if($_GET['page'] == 'contacts') {
			$HomeController->contacts();
		}
	} else {
		$HomeController->index();
	}

?>