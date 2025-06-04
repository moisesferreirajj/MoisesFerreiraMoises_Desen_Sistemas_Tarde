<?php
// logout.php
require_once 'config.php';

//Destrói a sessão
session_destroy();
header('Location: login.php');
exit;

?>