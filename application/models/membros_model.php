<?php 

class Membros_model extends Modelo
{
	function __construct()
	{
		parent::__construct();
		$this->table = 'membros';
	}

	/**
	 * Retorna o endereço de uma imagem jpg na pasta static/img a partir de um index passado
	 * 
	 * @param mixed $index nome da imagem a ser buscada na pasta
	 * 
	 * @return string
	 */
	function Img ($index)
	{
		return base_url('static/img/' . $index . '.jpg');
	}
}