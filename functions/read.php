<?php
include('../includes/header.php');

$_SESSION['result'] = '';
if (isset($_POST['check_out'])) {
    $email = prepare_data($_POST['email'], $link);
    $id = prepare_data($_POST['id'], $link);
    $result = mysqli_query($link, "SELECT * FROM users WHERE id=$id AND email='$email';");
}
if (!$result) {
    die('<br>Consulta no valida: ' . $link->error);
} else {
    $_SESSION['result'] = $result->fetch_array(MYSQLI_NUM);
    if (!$_SESSION['result']) {
	$_SESSION['prop']='alert alert-danger';
	$_SESSION['message'] = 'No puedes acceder, digita bien los datos o registrate';
	header('Location: ../index.php');
    }
    if ($_SESSION['result'][0] == $id && $_SESSION['result'][5] == $email) header('Location: ../to_buy.php');
}
?>
