<?php

/*1. Créer une class pour representer une voiture

    * elle possede plusieurs propriétés : couleur , puissance, vitesse.
    * ne pas oublié les getter/setter
    * avec les methodes : accelerer et ralentir
    * creer une constante pour le nombre de roue ( 4 )


2.
    * Creer une class abstraite "Parole" definie comme suit
        * methode direBonjour()
    * creer une class est herite de la class abstraite Parole : "ParoleFrancais"
        * la methode direBonjour affiche bonjour en francais
*/

class Voiture
{
    private $couleur;
    private $puissance,
    private $vitesse;
    const NB_ROUES =  4;

    public function accelerer() {
        $this->setVitesse($this->getVitesse()+1);
    }

    public function ralentir() {
        $this->setVitesse($this->getVitesse() - 1);
    }

    /**
     * @return mixed
     */
    public function getCouleur()
    {
        return $this->couleur;
    }

    /**
     * @param mixed $couleur
     */
    public function setCouleur($couleur)
    {
        $this->couleur = $couleur;
    }

    /**
     * @return mixed
     */
    public function getPuissance()
    {
        return $this->puissance;
    }

    /**
     * @param mixed $puissance
     */
    public function setPuissance($puissance)
    {
        $this->puissance = $puissance;
    }

    /**
     * @return mixed
     */
    public function getVitesse()
    {
        return $this->vitesse;
    }

    /**
     * @param mixed $vitesse
     */
    public function setVitesse($vitesse)
    {
        $this->vitesse = $vitesse;
    }

}