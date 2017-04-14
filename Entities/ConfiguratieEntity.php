<?php

class ConfiguratieEntity
{
    public $id;
    public $naam_ws;

    function __construct($naam_ws) {
        $this->id = 1;
        $this->naam_ws = $naam_ws;
    }
}

?>