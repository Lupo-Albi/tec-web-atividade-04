<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Equipe extends CI_Controller 
    {
        public function index()
        {
			$this->template->set('nav', 'Equipe'); // Definindo o valor da variável nav. Será utilizada para destacar o item na barra de navegação que corresponde a página atual. Esse set deve ser colocado antes do carregamento da view.
			$this->template->set('title', 'Equipe'); // Definindo o valor da variável title. Esse set deve ser colocado antes do carregamento da view.
            $this->template->load('templates/template', 'pages/equipe'); // Carregando a view para um template através da biblioteca Most Simple Template.
        }
    }
?>