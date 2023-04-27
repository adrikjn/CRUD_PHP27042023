<?php

//* lancement de la session
session_start();


//* initialisation et affectation de l'objet PDO
$pdo = new PDO('mysql:host=localhost;dbname=crud_php',
                'root',
                '',
                array(
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
                    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'

                )
);
//* constante qui définit la racine du projet
define('BASE', '/CRUD_PHP27042023/');

//*fonction de debug
function debug($var)
{
    echo '<pre>';
        var_dump($var);
    echo '</pre>';
}