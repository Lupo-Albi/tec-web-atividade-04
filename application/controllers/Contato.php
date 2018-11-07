<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Contato extends CI_Controller 
    {
        public function index()
        {
            // Carrega os modelos
            $this->load->model('modelo');
            $this->load->model('contatos_model');
            $this->load->model('mensagem_model');
            $this->load->model('membros_model');
            // Recupera os contatos através do model
            $contatos = $this->contatos_model->GetAll('nome');
            // Passa os contatos para o array que será enviado à Contato
            $dados['contatos'] = $this->contatos_model->Formatar($contatos);
            // Recupera os membros através do model
            $membros = $this->membros_model->GetAll('nome');
            // Passa os membros para o array que será enviado à Contato
            $dados['membros'] = $this->membros_model->Formatar($membros);

            // Recupera os membros através do model
            $membros = $this->membros_model->GetAll('nome');
            // Passa os membros para o array que será enviado à Contato
            $dados['membros'] = $this->membros_model->Formatar($membros);

			$this->template->set('nav', 'Contato'); // Definindo o valor da variável nav. Será utilizada para destacar o item na barra de navegação que corresponde a página atual. Esse set deve ser colocado antes do carregamento da view.
			$this->template->set('title', 'Contato'); // Definindo o valor da variável title. Esse set deve ser colocado antes do carregamento da view.
            $this->template->load('templates/template', 'pages/contato', $dados); // Carregando a view para um template através da biblioteca Most Simple Template.
        }

        /**
         * Processa o formulário para salvar os dados
         */
        public function Salvar()
        {

        }

        /**
         * Valida os dados do formulário
         * 
         * @param string $operacao Operação realizada no formulário, nesse caso, acontece apenas o insert
         * 
         * @return boolean
         */
        private function Validar ($operacao = 'insert')
        {
            $rules['nome'] = array('trim', 'required', 'min_length[3]');
            $rules['email'] = array('trim', 'required', 'valid_email');

            $this->form_validation->set_rules('nome', 'Nome', $rules['nome']);
            $this->form_validation->set_rules('email', 'Email', $rules['email']);
        }
    }
?>