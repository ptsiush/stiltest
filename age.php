<?php

require_once 'connect.php';
require 'class.php';

$id = $_GET['id'];
if(isset($_GET['id']))
{
   People::Date($connect, $_GET['id']);
}
header('location: /');
?>