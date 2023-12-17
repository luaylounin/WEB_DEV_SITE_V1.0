<?php

require_once 'C:/Users/luayl/vendor/autoload.php';

$loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/../twig');
$twig = new \Twig\Environment($loader);

echo $twig->render('sign-in.html.twig', [
    
]);
