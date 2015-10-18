<?php

	/**
	 * Home Controller
	 */

	class HomeController {

		public function index() {
			require ViewTemplate.'header.php';
			require View.'index.php';
			require ViewTemplate.'footer.php';
		}

		public function contacts() {
			require ViewTemplate.'header.php';
			require View.'contacts.php';
			require ViewTemplate.'footer.php';
		}

		public function teachers() {

			$pdo = PDOX::connect();

			if(isset($_POST['submit'])) {

				$wants = [
					['Бългърски език', $_POST['bg']], 
					['Английски език', $_POST['ae']], 
					['Математика', $_POST['math']],
					['Немски език', $_POST['nemski']],
					['Информатика', $_POST['info']],
					['Информационни технологии', $_POST['it']]
				];

				$stm = $pdo->prepare('INSERT INTO `teacher_wants` (`user`, `wants`) VALUES (:user, :wants)');
				$stm -> bindValue(':user', $GLOBALS['user']->getId(), PDO::PARAM_INT);
	            $stm -> bindValue(':wants', json_encode($wants), PDO::PARAM_STR);
	            $stm -> execute();
			}

			require ViewTemplate.'header.php';
			require View.'teachers.php';
			require ViewTemplate.'footer.php';
		}

		public function rate() {

			$pdo = PDOX::connect();

			$stm = $pdo->prepare('SELECT * FROM `teachers`');
	        $stm -> execute();
	        $teachers = $stm -> fetchAll();

	        if(isset($_POST['submit'])) {

	        	$scores = [$_POST['category_1'], $_POST['category_2'], $_POST['category_3']];

	        	$stm = $pdo->prepare('INSERT INTO `teacher_rates` (`teacher`, `scores`) VALUES (:teacher, :scores)');
				$stm -> bindValue(':teacher', $_POST['teacher_id'], PDO::PARAM_INT);
	            $stm -> bindValue(':scores', json_encode($scores), PDO::PARAM_STR);
	            $stm -> execute();

	        }

			require ViewTemplate.'header.php';
			require View.'rate.php';
			require ViewTemplate.'footer.php';
		}

	}

	$HomeController = new HomeController();

?>