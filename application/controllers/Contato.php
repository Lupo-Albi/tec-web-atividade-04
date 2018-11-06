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
            // Recupera os contatos através do model
            $contatos = $this->contatos_model->GetAll('nome');
            // Passa os contatos para o array que será enviado à Contato
            $dados['contatos'] = $this->contatos_model->Formatar($contatos);

			$this->template->set('nav', 'Contato'); // Definindo o valor da variável nav. Será utilizada para destacar o item na barra de navegação que corresponde a página atual. Esse set deve ser colocado antes do carregamento da view.
			$this->template->set('title', 'Contato'); // Definindo o valor da variável title. Esse set deve ser colocado antes do carregamento da view.
            $this->template->load('templates/template', 'pages/contato', $dados); // Carregando a view para um template através da biblioteca Most Simple Template.
        }

        /**
         * Processa o formulário para salvar os dados
         */
        public function Salvar()
        {
             // Carrega os modelos
             $this->load->model('modelo');
             $this->load->model('contatos_model');
             $this->load->model('mensagem_model');
            // Recupera os contatos através do model
            $contatos = $this->contatos_model->GetAll('nome');
            // Executa o processo de validação do formulário
            $validacao = self::Validar();

            // Verifica o status da validação do formulário
            // Se não houverem erros, então insere no banco e informa ao usuário
            // Caso contrário informa ao usuário os erros de validação
            if($validacao)
            {
                // Checa se o email do formulário não está no Banco de dados para adicioná-lo
                if(!(in_array($this->input->post('email'), $contatos)))
                {
                    // Recupera os dados do formulário para o contato
                    $contato = $this->input->post(array('nome', 'email'));
                    // Insere os dados no banco recuperando o status dessa operação
                    $status = $this->contatos_model->Inserir($contato);
                    // Checa o status da operação gravando a mensagem na seção
                    if(!$status)
                    {
                        $this->session->set_flashdata('error', 'Não foi possível inserir o contato.');
                    } else
                    {
                        $this->session->set_flashdata('success', 'Contato inserido com sucesso.');
                    }
                }
                 // Atualiza os contatos através do model
                $contatos = $this->contatos_model->GetAll('nome');
                // Recupera os dados do formulário para a mensagem
                $mensagem = array(
                    'conteudo' => $this->input->post('conteudo'),
                    // pesquisa o id do contato que corresponde ao email do formulário
                    'fk_idContato' => $contatos[array_search($this->input->post('email'), $contatos)]['idContato'],
                );
                // Insere os dados no banco recuperando os status dessa operação
                $status = $this->mensagem_model->Inserir($mensagem);
                // Checa o status da operação gravando a mensagem na seção
                if(!$status)
                {
                    $this->session->set_flashdata('error', 'Não foi possível inserir a mensagem.');
                } else
                {
                    $this->session->set_flashdata('success', 'Mensagem inserida com sucesso.');
                }                

            } else
            {
                $this->session->set_flashdata('error', validation_errors('<p>','</p>'));
            }

            // Passa os contatos para o array que será enviado à Contato
            $dados['contatos'] = $this->contatos_model->Formatar($contatos);
            // Carrega a view Contato
            $this->template->set('nav', 'Contato'); 
			$this->template->set('title', 'Contato');
            $this->template->load('templates/template', 'pages/contato', $dados);

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