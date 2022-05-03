<?php

require_once 'connect.php';

class People
{
    static $connect;
    static $id;
    public $name;
    public $surname;
    public $dateofbirth;
    public $gender;
    public $cityofbirth; 

    public function __construct($connect, $name, $surname, $dateofbirth, $gender, $cityofbirth)
    {
        $this -> connect = $connect;
        $this -> name = $name;
        $this -> surname = $surname;
        $this -> dateofbirth = $dateofbirth;
        $this -> gender = $gender;
        $this -> cityofbirth = $cityofbirth;
        $this -> dbConnect();  
    }
    function dbConnect()
    {
        mysqli_query($this -> connect, "INSERT INTO `people` (`id`, `name`, `surname`, `date of birth`, `gender`, `city of birth`) VALUES (NULL, '{$this -> name}', '{$this -> surname}', '{$this -> dateofbirth}', '{$this -> gender}', '{$this -> cityofbirth}')");
        header('location: /');
    }
    static function dbDelete($connect, $idDel)
    {
        mysqli_query($connect, "DELETE FROM `people` WHERE `people`.`id` = {$idDel}");
        header('location: /');
    }
    static function Date($connect, $id)
    {
        $date = mysqli_query($connect, "SELECT `id` = {$id}, `date of birth`, (YEAR(CURRENT_DATE) - YEAR(`date of birth`))-(RIGHT(CURRENT_DATE, 5)<RIGHT(`date of birth`, 5)) AS `age` FROM `people` ORDER BY `id`");
        $date = mysqli_fetch_all($date);
        return $date;
    }
    static function Gender($connect, $id, $gender)
    {
        $gen = mysqli_query($connect, "SELECT `gender`= {$gender} FROM `people` WHERE `people`.`id` = {$id}");
        $gen = mysqli_fetch_all($gen);
        if ($gen == 1)
        {
            $gender = "Male";
        } elseif ($gen == 0) {
            $gender = "Female";
        } else {
            echo "Gender not selected";
        }
        return $gender;
        header('location: /');
    }   
}
$connect;
?>