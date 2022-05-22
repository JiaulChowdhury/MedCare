<?php

//action.php
include('config.php');
//include('database_connection.php');

if($_POST['action'] == 'edit')
{
 $data = array(
  ':fullName'  => $_POST['fullName'],
  ':email'  => $_POST['email'],
  ':users'   => $_POST['users'],
  ':id'    => $_POST['id']
 );

 $query = "
 UPDATE account 
 SET fullName = :fullName, 
 email = :email, 
 users = :users 
 WHERE id = :id
 ";
 $statement = $connect->prepare($query);
 $statement->execute($data);
 echo json_encode($_POST);
}

if($_POST['action'] == 'delete')
{
 $query = "
 DELETE FROM account 
 WHERE id = '".$_POST["id"]."'
 ";
 $statement = $connect->prepare($query);
 $statement->execute();
 echo json_encode($_POST);
}


?>