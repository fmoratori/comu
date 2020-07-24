<?php
// page1.php

session_start();

echo 'Bem vindo a pagina #1';

$_SESSION['favcolor'] = 'green';
$_SESSION['senha']   = 'cat';
$_SESSION['time']     = time();

// Funciona se o cookie de seção foi aceito
echo '<br /><a href="pg2.php">page 2</a>';

// Ou talves passando o ID da seção se necessário
echo '<br /><a href="pg2.php?' . SID . '">page 2</a>';
?>