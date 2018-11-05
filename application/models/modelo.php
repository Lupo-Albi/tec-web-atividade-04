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
	* Recupera um registro a partir de um ID
	*
	* @param integer $id: ID do registro a ser recuperado
	*
	* @return array
	*/
	function GetById($id)
	{
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
	* @param string $sort: Campo para ordenação dos registros
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
}