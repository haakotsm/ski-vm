<?php
class Bruker
{
    public $brukernavn;
    public $passord;

    /**
     * Bruker constructor.
     * @param $brukernavn
     * @param $passord
     */
    public function __construct($brukernavn, $passord)
    {
        $this->brukernavn = $brukernavn;
        $this->passord = $passord;
    }


}