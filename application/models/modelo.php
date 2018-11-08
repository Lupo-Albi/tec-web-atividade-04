<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Modelo extends CI_Model 
{
	// Variável que define o nome da tabela
	var $table = "";
	
	/** 
	* Método construtor 
	*/
	function __construct()
	{
		parent::__construct();
	}
	
	/**
	* Insere um registro na tabela
	*
	* @param array $data: Dados a serem inseridos
	*
	* @return boolean
	*/
	function Inserir($data) 
	{
		if(!isset($data))
		{
			return false;
		}
		
		return $this->db->insert($this->table, $data);
	}

	/**
	* Recupera um registro a partir de um Email
	*
	* @param integer $email: E-mail do registro a ser recuperado
	*
	* @return array
	*/
	function GetByEmail($email)
	{
		if(!isset($email))
		{
			return false;
		}

		$this->db->where('email', $email);
		$query = $this->db->get($this->table);
		
		if ($query->num_rows() > 0)
		{
			return 	$query->row_array();
		} else 
		{
			return null;
		}
	}
	
	/**
	* Lista todos os registros da tabela
	* @param string $sort: Campo de parâmetro (se é pelo id ou nome) para ordenação dos registros
	*
	* @param string $order: tipo de ordenação (asc ou desc)
	*
	* @return array
	*/
	function GetAll($sort = 'id', $order = 'asc')
	{
		$this->db->order_by($sort, $order);
		$query = $this->db->get($this->table);
		
		if ($query->num_rows() > 0)
		{
			return $query->result_array();
		} else
		{
			return null;
		}
	}

	/**
	 * Atualiza um registro na tabela
	 * 
	 * @param integer $id ID do registro a ser atualizado
	 * 
	 * @param array $data Dados a serem inseridos
	 * 
	 * @return boolean
	 */
	function Atualizar ($id, $data)
	{
		if(is_null($id) || !isset($data))
		{
			return false;
		}

		$this->db->where('id', $id);
		return $this->db->update($this->table, $data);
	}
}