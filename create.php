<?php

require_once 'connect.php';
require 'class.php';

$people = new People($connect, $_POST['name'], $_POST['surname'], $_POST['dateofbirth'], $_POST['gender'], $_POST['cityofbirth']);
header('location: /');
?>