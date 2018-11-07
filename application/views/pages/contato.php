<main role="main">
    <br><br><br>
    <div class="container">
        <div class="row">
            <div class="col-sm-2">
                <!-- Coluna 1 de 3 -->
            </div>

            <div class="col-sm-8">
                <h4 class="text-center">Entre em contato com a gente!</h4><br>

                <!--
                -- Formulário de Contato 
                -->
                <form method="POST" action="<?=base_url('contato/salvar')?>" name="mensagem" action="">
                    <!-- 
                    -- Aréa para informar o nome do remetente da mensagem no Formulário 
                    -->
                    <div class="form-group row col-sm">
                        <label for="name" class="col-sm-2 col-form-label">Nome</label>
                        <div class="col-sm-10">
                            <input type="text" name="nome" class="form-control" placeholder="Escreva seu nome" value="<?=set_value('nome')?>" required>
                        </div>
                    </div>
                    <!--
                    -- Área para informar o e-mail do remetente da mensagem no Formulário
                    -->
                    <div class="form-group row col-sm">
                        <label for="email" class="col-sm-2 col-form-label">E-mail</label>
                        <div class="col-sm-10">
                            <input type="email" name="email" class="form-control" aria-describedby="emailHelp" placeholder="Escreva seu e-mail" required>
                            <small id="emailHelp" class="form-text text-muted">Nós nunca iremos compartilhar seu e-mail com ninguém.</small>
                        </div>
                    </div>
                    <!--
                    -- Select para escolher pra qual membro da equipe enviar a mensagem
                    -->
                    <div class="form-group row col-sm">
                        <label for="destinatario" class="col-sm-2 col-form-label">Destinatário</label>
                        <div class="col-sm-5">
                            <select class="form-control" name="destinatario" id="destinatario" required>
                                <option value="-2" selected>Escolha para quem enviar...</option>
                                <option value="-1">Todos os membros</option>
                                <!-- Itera uma lista de opções no select pelos dados passados pelo banco de dados -->
                                <?php for ($i = 0; $i < count($membros); $i++){ ?>
                                <?php }?>
                            </select>
                        </div>
                    </div>
                    <!--
                    -- Textarea para escrever a mensagem
                    -->
                    <div class="form-group row col-sm">
                        <label for="conteudo" class="col-sm-2 col-form-label">Mensagem de Texto</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="conteudo" rows="3" placeholder="Escreva sua mensagem..." required></textarea>
                            <small class="form-text text-muted float-right">Todos os campos são obrigatórios.</small>
                        </div>
                    </div>
                    <!--
                    -- Botão de submit
                    -->
                    <div class="col-sm">
                        <button type="submit" value="Salvar" class="btn btn-primary">Enviar</button>
                    </div>
                </form> <!-- /Formulário de Contato -->
            </div>

            <div class="col-sm-2">
                <!-- Coluna 3 de 3 -->
            </div>
        </div>

    </div>
</main>