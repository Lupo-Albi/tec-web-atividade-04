<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Equipe extends CI_Controller 
    {
        public function index()
        {
			$this->load->model('modelo');
			$this->load->model('membros_model');
			$membros = $this->membros_model->GetAll('nome');
		
			$dados['membros'] = $this->membros_model->Formatar($membros);
			
			$this->template->set('nav', 'Equipe'); // Definindo o valor da variável nav. Será utilizada para destacar o item na barra de navegação que corresponde a página atual. Esse set deve ser colocado antes do carregamento da view.
			$this->template->set('title', 'Equipe'); // Definindo o valor da variável title. Esse set deve ser colocado antes do carregamento da view.
            $this->template->load('templates/template', 'pages/equipe', $dados); // Carregando a view para um template através da biblioteca Most Simple Template.
        }
    }
?>