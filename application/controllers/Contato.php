<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set("America/Fortaleza");

    class Contato extends CI_Controller 
    {
        public function index()
        {
            // Carrega os modelos
            $this->load->model('modelo');
            $this->load->model('membros_model');
            // Recupera os membros através do model
            $membros = $this->membros_model->GetAll();
            // Passa os membros para o array que será enviado à Contato
            $dados['membros'] = $membros;

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
            $this->load->model('membros_model');
            $this->load->model('contatos_model');
            $this->load->model('mensagem_model');
            $this->load->model('membro_has_mensagem_model');
            // Recupera os membros através do model
            $membros = $this->membros_model->GetAll();
            // Passa os membros para o array que será enviado à Contato
            $dados['membros'] = $membros;

            // Tratando a tabela Contatos do Banco de Dados
            // Recupera os contatos através do model
            $contatos = $this->contatos_model->GetAll('id');

            // Caso o email não exista no BD, um novo registro é adicionado
            // Caso já exista, o contato é atualizado
            if(!$this->contatos_model->EmailExists($contatos))
            {
                // Novo email, novo contato
                // Recupera os dados do formulário para contato
                $contato = $this->input->post(array('nome', 'email'));
                // Insere os dados no banco recuperando o status da operação
                $status = $this->contatos_model->Inserir($contato);

                // Checa o status da operação, gravando a mensagem na seção
                if(!$status)
                {
                    $this->session->set_flashdata('error', 'Não foi possível inserir o contato.');
                } else
                {
                    $this->session->set_flashdata('success', 'Contato inserido com sucesso!');
                }
            } else
            {
                // Email já existe, atualiza contato
                // Salvando o email do formulário em uma variável
                $email = $this->input->post('email');
                // Recuperando o registro que possui o mesmo email no BD
                $contato = $this->contatos_model->GetByEmail($email);
                // Recupera o nome dado no formulário para atualizar ao email correspondente
                $update = $this->input->post(array('nome','email'));
                // Atualiza os dados no banco recuperando o status da operação
                $status = $this->contatos_model->Atualizar($contato['id'], $update);

                // Checa o status da operação gravando a mensagem na seção
                if(!$status)
                {
                    $this->session->set_flashdata('error', 'Não foi possível atualizar o contato.');
                } else
                {
                    $this->session->set_flashdata('error', 'Contato atualizado com sucesso.');
                }
            }

            // Tratando a tabela Mensagem do Banco de Dados
            // Recupera o ID do remetente da mensagem no Banco de dados através do email do formulário
            // Esse ID é a chave estrangeira da tabela Mensagem
            $email = $this->input->post('email');
            $contato = $this->contatos_model->GetByEmail($email);
            $id = $contato['id'];
            // Recupera o conteúdo da mensagem do formulário
            $mensagem = array(
                'id' => NULL,
                'conteudo' => $this->input->post('conteudo'),
                'data' => time(),
                'fk_idContato' => $id,
            );
            // Insere os dados no banco recuperando o status da operação
            $status = $this->mensagem_model->Inserir($mensagem);

            // Checa o status da operação gravando a mensagem na seção
            if(!$status)
            {
                $this->session->set_flashdata('error', 'Não foi possível inserir a mensagem.');
            } else
            {
                $this->session->set_flashdata('error', 'Mensagem inserida com sucesso.');
            }

            /* Tratando da tabela Membro_has_mensagem do Banco de Dados
            * Essa tabela é o relacionamento entre as tabelas Membros e Mensagem
            * Nela há duas chaves estrangeiras que relaciona as mensagens para seus destinatários
            */
            // Recuperando qual o ID do membro se destina a mensagem
            $destinatario = $this->input->post('destinatario');
            // Salva o id da última inserção (inserção da mensagem) na variável
            $id = $this->db->insert_id();

            // Caso a opção de enviar para todos os destinatário seja escolhida
            // A variável $destinatário terá valor 0 e uma iteração precisará ser feita
            // Caso apenas um membro tenha sido escolhido para a mensagem, a inserção é feita uma única vez
            if ($destinatario == 0)
            {
                foreach ($membros as $membro)
                {
                    $rel = array(
                        'fk_idMembro' => $membro['id'],
                        'fk_idMensagem' => $id,
                    );
                    // Insere os dados no banco recuperando o status da operação
                    $status = $this->membro_has_mensagem_model->Inserir($rel);
                }

            } else 
            {
                $rel = array(
                    'fk_idMembro' => $destinatario,
                    'fk_idMensagem' => $id,
                );
                // Insere os dados no banco recuperando o status da operação
                $status = $this->membro_has_mensagem_model->Inserir($rel);
            }

            // Checa o status da operação gravando a mensagem na seção
            if(!$status)
            {
                $this->session->set_flashdata('error', 'Não foi possível inserir a mensagem.');
            } else
            {
                $this->session->set_flashdata('error', 'Mensagem enviada com sucesso.');
            }
            
            // Redireciona de volta para o formulário de contato
            redirect('/contato');
        }
    }
?>