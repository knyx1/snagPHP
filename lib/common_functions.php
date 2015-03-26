<?php

function dd($var) {
    echo '<PRE>';
    var_dump($var);
    die();
}

function loadClasses($className) 
{ 
    $root = $_SERVER['DOCUMENT_ROOT'];
    $ds = DIRECTORY_SEPARATOR;

    if( file_exists($root.$ds.'controller/'.$className.'.class.php' ) ){ 
        set_include_path($root.$ds.'controller'.$ds); 
        spl_autoload($className); 
    } 
    elseif( file_exists('model/'.$className.'.class.php' ) ){ 
        set_include_path($root.$ds.'model'.$ds); 
        spl_autoload($className); 
    }elseif( file_exists('view/'.$className.'.class.php' ) ){ 
        set_include_path($root.$ds.'view'.$ds); 
        spl_autoload($className    ); 
    }else 
    { 
        set_include_path($root.$ds.'lib'.$ds); 
        spl_autoload($className); 
    } 
}

function getDatabaseHandler() {
    $dsn = 'mysql:dbname=snags;host=127.0.0.1';
    $user = 'root';
    $password = '';

    try {
        $pdo = new PDO($dsn, $user, $password);
    } catch (PDOException $e) {
        die('Connection failed: ' . $e->getMessage());
    }
    return $pdo;
}