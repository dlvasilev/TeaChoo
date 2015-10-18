<?php
class UserModel {

	private $id;
	private $email;
	private $name;
	private $years;
	private $class;

	function __construct($value) {
    	$pdo = PDOX::connect();

    	$stm = $pdo -> prepare('SELECT * FROM `users` WHERE `id` = ? ');
        $stm -> bindValue(1, (int)$value, PDO::PARAM_INT);
        $stm -> execute();

        if($stm->rowCount() !== 0) {
        	$data = $stm -> fetch();
        }

        if($data && is_array($data)) {
        	$this->id = $data['id'];
        	$this->email = $data['email'];
        	$this->name = $data['name'];
        	$this->years = $data['years'];
        	$this->class = $data['class'];
        }
    }

    private function setValue($column, $value) {
        $pdo = PDOX::connect();

    	$stm = $pdo -> prepare('UPDATE `users` SET `'.$column.'` = :value WHERE `id` = :id LIMIT 1');
        $stm -> bindValue(':value', $value, (is_int($value)) ? PDO::PARAM_INT : PDO::PARAM_STR);
        $stm -> bindValue(':id', $this->id, PDO::PARAM_INT);
        $stm -> execute();
    }

    public function setValues($values) {
        $pdo = PDOX::connect();

    	$queryStr = 'UPDATE `users` SET ';
        $i = 0;
    	foreach($values as $colName => $colValue) {
    		$queryStr .= '`'.$colName.'`= :'.$colName;
            ($i == count($values) - 1) ? $queryStr .= ' ' : $queryStr .= ', ';
            $i++;
    	}
    	$queryStr .= 'WHERE `id`=:id LIMIT 1';

        echo $queryStr;

    	$stm = $pdo -> prepare($queryStr);
        foreach($values as $colName => $colValue) {
        	$stm -> bindValue(':'.$colName, $colValue, (is_int($colValue)) ? PDO::PARAM_INT : PDO::PARAM_STR);
    	}
        $stm -> bindValue(':id', $this->id, PDO::PARAM_INT);
        $stm -> execute();
    }

    public function getId() {
    	return $this->id;
    }

    public function getName() {
	    return htmlspecialchars($this->name);
	}

	public function getEmail() {
	    return htmlspecialchars($this->email);
	}

	public function setEmail($email) {
	    $this->setValue('email', $email);
	}

	public function getYears() {
	    return htmlspecialchars($this->years);
	}

	public function setYears($years) {
		$this->setValue('years', $years);
	}

	public function getClass() {
	    return htmlspecialchars($this->class);
	}

	public function setClass($class) {
		$this->setValue('class', $class);
	}

}
?>