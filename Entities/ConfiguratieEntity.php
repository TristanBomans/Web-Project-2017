<?php

class ConfiguratieEntity
{
    public $id;
    public $naam_ws;
    public $aantal_up;

    function __construct($naam_ws, $aantal_up) {
        $this->id = 1;
        $this->naam_ws = $naam_ws;
        $this->aantal_up = $aantal_up;
    }
}

?>