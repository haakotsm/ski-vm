<?php
class Person
{
    public $id;
    public $fornavn;
    public $etternavn;
    public $telefon;
    public $adresse;
    public $postnummer;
    public $poststed;

    /**
     * Person constructor.
     * @param $id
     * @param $fornavn
     * @param $etternavn
     * @param $telefon
     * @param $adresse
     * @param $postnummer
     * @param $poststed
     */
    public function __construct($id, $fornavn, $etternavn, $telefon, $adresse, $postnummer, $poststed)
    {
        $this->id = $id;
        $this->fornavn = $fornavn;
        $this->etternavn = $etternavn;
        $this->telefon = $telefon;
        $this->adresse = $adresse;
        $this->postnummer = $postnummer;
        $this->poststed = $poststed;
    }
}

