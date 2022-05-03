<?php
require_once 'connect.php';
require 'class.php';

$idDel = $_GET['id'];

if(isset($_GET['id']))
{
    People::dbDelete($connect, $_GET['id']);
}
header('location: /');
?>