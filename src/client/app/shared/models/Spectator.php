<?php

/**
 * Created by PhpStorm.
 * User: Duy
 * Date: 12/05/2017
 * Time: 16:30
 */
class Spectator
{
    public $id;
    public $fornavn;
    public $etternavn;
    public $telefon;
    public $adresse;
    public $postnummer;
    public $poststed;
    public $event;

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
    public function __construct($id, $fornavn, $etternavn, $telefon, $adresse, $postnummer, $poststed, $event)
    {
        $this->id = $id;
        $this->fornavn = $fornavn;
        $this->etternavn = $etternavn;
        $this->telefon = $telefon;
        $this->adresse = $adresse;
        $this->postnummer = $postnummer;
        $this->poststed = $poststed;
        $this->event = $event;
    }
}