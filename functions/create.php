<?php
include('../includes/header.php');
if(isset($_POST['insert_info'])){
    if(
        empty($_POST['level_num']) ||
        empty($_POST['level_let']) ||
        empty($_POST['id']) ||
        empty($_POST['name']) ||
        empty($_POST['surname']) ||
        empty($_POST['phone_num']) ||
        empty($_POST['email'])
    ){
        $_SESSION['dis_err']='Inserta todos los campos';
        header('Location: ../register.php');
    }
    else{
        echo 'yija';
    }
}
?>