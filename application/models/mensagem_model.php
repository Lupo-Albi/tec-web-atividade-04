<?php

Class Mensagem_model extends Modelo
{
    function __construct()
    {
        parent::__construct();
        $this->table = 'mensagem';
    }
}