<?php

/*
2.
    * Creer une class abstraite "Parole" definie comme suit
        * methode direBonjour()
    * creer une class est herite de la class abstraite Parole : "ParoleFrancais"
        * la methode direBonjour affiche bonjour en francais
*/

abstract class Parole
{
    abstract protected function direBonjour();

}