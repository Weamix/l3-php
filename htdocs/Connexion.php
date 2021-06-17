<?php

class Connexion
{
    // TODO retourner instance de PDO
    // Ca doit etre singleton

    public static function instance()
    {
        $username = 'root';
        $password = 'password';
        $host = 'mysql';
        $dbname = 'eurovent';

        return new PDO('mysql:host='. $host .';dbname='. $dbname .'', $username, $password);
    }

}

