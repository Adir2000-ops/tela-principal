<?php
spl_autoload_register(function($className) {
    $file = $_SERVER["DOCUMENT_ROOT"].'/tela-principal/libs/' . $className . '.class.php';
    if (file_exists($file)) {
        require_once $file;
    }
});