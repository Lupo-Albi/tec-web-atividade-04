<?php

Class Contatos_model extends Modelo
{
    function __construct()
    {
        parent::__construct();
        $this->table = 'contatos';
    }

	/**
	 * Checa se o email do formulário já está no Banco de Dados 
	 * 
	 * @param array $contatos lista dos contatos na tabela do BD para serem checados
	 * 
     * @param string $email email a ser procurado nos contatos
     * 
	 * @return boolean
	 */
	function EmailExists($contatos, $email)
	{
		foreach($contatos as $contato => $data)
        {
            if(in_array($email, $data))
            {
                $exists = TRUE;
                break;
            } else 
            {
                $exists = FALSE;
            }
		}
		
		return $exists;
	}
}