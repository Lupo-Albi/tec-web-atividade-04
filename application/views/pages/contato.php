<main role="main">
    <br><br><br>
    <div class="container">
        <div class="row">
            <div class="col-sm-2">
                <!-- Coluna 1 de 3 -->
            </div>

            <div class="col-sm-8">
                <h4 class="text-center">Entre em contato com a gente!</h4><br>
                <form method="POST" name="mensagem" action="">
                    <div class="form-group row col-sm">
                        <label for="nome" class="col-sm-2 col-form-label">Nome</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="Escreva seu nome">
                        </div>
                    </div>

                    <div class="form-group row col-sm">
                        <label for="email" class="col-sm-2 col-form-label">E-mail</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" aria-describedby="emailHelp" placeholder="Escreva seu e-mail">
                            <small id="emailHelp" class="form-text text-muted">Nós nunca iremos compartilhar seu e-mail com ninguém.</small>
                        </div>
                    </div>

                    <div class="form-group row col-sm">
                        <label for="inputMembro" class="col-sm-2 col-form-label">Destinatário</label>
                        <div class="col-sm-5">
                            <select class="form-control">
                                <option selected>Escolha para quem enviar...</option>
                                <option>Todos os membros</option>
                                <option>Amanda</option>
                                <option>Igor</option>
                                <option>Júlio</option>
                                <option>Luanderson</option>
                                <option>Ricardo</option>
                                <option>Rayon</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row col-sm">
                        <label for="conteudo" class="col-sm-2 col-form-label">Mensagem de Texto</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" rows="3" placeholder="Escreva sua mensagem..."></textarea>
                        </div>
                    </div>
                    <div class="col-sm">
                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </div>
                </form>
            </div>

            <div class="col-sm-2">
                <!-- Coluna 3 de 3 -->
            </div>
        </div>

    </div>
</main>