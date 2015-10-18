<?php

	/**
	 * User Controller
	 */

	class UserController {

		private $pdo;

		function __construct() {
        	$this->pdo = PDOX::connect();
        }

		public function signIn() {

			if(isset($_POST['email'], $_POST['password'])) {
				$errors = [];

				$stm = $this->pdo->prepare('SELECT * FROM `users` WHERE `email`=? LIMIT 1');
				$stm -> bindValue(1, $_POST['email'], PDO::PARAM_STR);
				$stm -> execute();

				if($stm->rowCount() === 0) {
				 	array_push($errors, "Невалиден емайл или парола!");
				} else {

					$data = $stm->fetch();

					if(sha1($_POST['password']) !== $data['password']) {
						array_push($errors, "Невалиден емайл или парола!");
					} else {
						$_SESSION['user_id'] = $data['id'];
						header('Location: '.app_url);
					}
				}

			}

			require ViewTemplate.'header.php';
			require View.'User/signin.php';
			require ViewTemplate.'footer.php';

		}

		public function signUp() {

			if(isset($_POST['name'], $_POST['email'], $_POST['password'], $_POST['password_again'])) {
				$errors = [];

				if($_POST['name'] === '') array_push($errors, "Невалидно име!");
				if($_POST['email'] === '' || !preg_match('|^[a-zA-Z\.\-\_0-9]+@[a-zA-Z0-9]+\.[a-zA-Z]+$|is', $_POST['email'])) array_push($errors, "Невалиден емайл!");
				if($_POST['password'] !== $_POST['password_again']) array_push($errors, "Паролите не събпадат!");

				$stm = $this->pdo->prepare('SELECT * FROM `users` WHERE `email`=? LIMIT 1');
				$stm -> bindValue(1, $_POST['email'], PDO::PARAM_STR);
				$stm -> execute();

				if($stm->rowCount() > 0) {
				 	array_push($errors, "Съществува потребител с този емайл!");
				}

				if(count($errors) === 0) {
					$this->pdo->beginTransaction();
					$stm = $this->pdo->prepare('INSERT INTO `users` (`name`, `email`, `password`) VALUES (:name, :email, :password)');
		            $stm -> bindValue(':name', $_POST['name'], PDO::PARAM_STR);
		            $stm -> bindValue(':email', $_POST['email'], PDO::PARAM_STR);
		            $stm -> bindValue(':password', sha1($_POST['password']), PDO::PARAM_STR);
		            $stm -> execute();
		            $user_id = $this->pdo->lastInsertId();
		            $this->pdo->commit();

		            $_SESSION['user_id'] = $user_id;

		            header("Location: ".app_url);
				}
				

			}

			require ViewTemplate.'header.php';
			require View.'User/signup.php';
			require ViewTemplate.'footer.php';
		}

		public function signOut() {
			session_unset('user_id');
			header('Location: '.app_url);
		}

		public function profile() {


			if(isset($_POST['email'], $_POST['years'], $_POST['class'])) {
				$updateArr = [];
				$updateArr['email'] = $_POST['email'];
				$updateArr['years'] = $_POST['years'];
				$updateArr['class'] = $_POST['class'];

				$GLOBALS['user']->setValues($updateArr);

				header("Location: ".app_url.'profile');
			}

			$stm =$this->pdo->prepare('SELECT * FROM `teacher_wants` WHERE `user` = ? ORDER BY `id` DESC LIMIT 1');
	        $stm -> bindValue(1, $GLOBALS['user']->getId(), PDO::PARAM_INT);
	        $stm -> execute();

	        if($stm->rowCount() > 0) {
	        	$data = $stm->fetch();
	        	$teacher_wants = $data['wants'];
	        }

			require ViewTemplate.'header.php';
			require View.'User/profile.php';
			require ViewTemplate.'footer.php';
		}

	}

	$UserController = new UserController();

?>