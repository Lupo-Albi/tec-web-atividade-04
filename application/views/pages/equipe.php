<div class="container marketing">
    <br><br><br>
    <!-- 3 colunas com imagens e texto -->
    <div class="row">
    <!--
        Criando uma iteração em php para exibir as informações dos membros a partir do banco de dados
        A função Img criada em membros_model é usada nessa iteração para buscar as strings que correspondem as imagens de cada membro na pasta static/img
        Os nomes das imagens foram nomeados de acordo com o ID de cada membro na sua respectiva tabela do banco de dados
        e.g.: se um membro tem seu id = 0 no banco, o nome da sua imagem correspondente terá o nome 0.jpg
    -->
    <?php foreach ($membros as $membro => $value) { ?>
        <div class="col-lg-4">
            <?php $index = $value['id']; ?>
            <img class="rounded-circle" src="<?=$this->membros_model->Img($index)?>" alt="" width="140" height="140">
            <h2><?php echo $value['nome']; ?></h2>
            <p><?php echo $value['bio']; ?></p>
            <strong>Nome Completo:</strong> <?php echo $value['nome'] . ' ' . $value['sobrenome']; ?><br>
            <strong>E-mail: </strong><?php echo $value['email']; ?><br>
            <strong>Telefone: </strong><?php echo $value['telefone']; ?><br>
        </div>
    <?php } ?>
    </div>
</div>