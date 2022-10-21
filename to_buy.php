<?php
include('./includes/header.php');
foreach( $_SESSION['result'] as $wea ){
    echo $wea.'<br>';
}
echo 'Bienvenido, '.$_SESSION['result'][1];
?>
<?php
include('./includes/footer.php');
?>
