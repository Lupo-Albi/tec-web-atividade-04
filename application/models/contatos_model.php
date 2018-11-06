<?php

Class Contatos_model extends Modelo
{
    function __construct()
    {
        parent::__construct();
        $this->table = 'contatos';
    }

    	/*
	* Formata os contatos para exibição dos dados
	*
	* @param array $contatos Lista dos contatos a serem formatados
	*
	* @return array
	*/
	function Formatar($contatos)
	{
		if($contatos)
		{
			for($i = 0; $i < count($contatos); $i++)
			{
				$contatos[$i]['editar_url'] = base_url('editar')."/".$contatos[$i]['idContato'];
				$contatos[$i]['excluir_url'] = base_url('excluir')."/".$contatos[$i]['idContato'];
			}
			return $contatos;
		} else
		{
			return false;
		}
	}
}