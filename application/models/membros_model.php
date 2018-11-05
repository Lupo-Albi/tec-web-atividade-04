<?php 

class Membros_model extends Modelo
{
	function __construct()
	{
		parent::__construct();
		$this->table = 'membros';
	}
	
	/*
	* Formata os contatos para exibição dos dados
	*
	* @param array $membros Lista dos membros a serem formatados
	*
	* @return array
	*/
	function Formatar($membros)
	{
		if($membros)
		{
			for($i = 0; $i < count($membros); $i++)
			{
				$membros[$i]['editar_url'] = base_url('editar')."/".$membros[$i]['idMembro'];
				$membros[$i]['excluir_url'] = base_url('excluir')."/".$membros[$i]['idMembro'];
			}
			return $membros;
		} else
		{
			return false;
		}
	}
}