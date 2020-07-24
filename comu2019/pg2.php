<?
// page2.php

session_start();

echo 'Bem vindo a pagina #2<br />';

echo $_SESSION['favcolor']."<br />"; // green
echo $_SESSION['senha']."<br />";   // cat
echo date('Y m d H:i:s', $_SESSION['time']);

// Você pode querer usar o SID aqui, como fissemos em page1.php
echo '<br /><a href="page1.php">page 1</a>';
?>