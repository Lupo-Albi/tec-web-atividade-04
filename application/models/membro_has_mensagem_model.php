<?php 

class Membro_has_mensagem_model extends Modelo
{
	function __construct()
	{
		parent::__construct();
		$this->table = 'membro_has_mensagem';
    }
}