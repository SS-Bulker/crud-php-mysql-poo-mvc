<?php

class Connection{
    public static function connect(){
        $link = new PDO("mysql:host=localhost;dbname=crud_php_mysql_poo_mvc","root","");
        return $link;
    }
}


?>