<div class="container marketing">
    <br><br><br>
    <!-- 3 colunas com imagens e texto -->
    <div class="row">
        <div class="col-lg-4"> <!-- index: 0 nome: Amanda -->
            <img class="rounded-circle" src="<?=base_url('static/img/amanda.jpg')?>" alt="" width="140" height="140">
            <h2><?php echo $membros[0]['nome'] ?></h2>
            <p>Bio</p>
			<strong>Nome Completo:</strong> <?php echo $membros[0]['nome'] . ' ' . $membros[0]['sobrenome'] ?><br>
			<strong>E-mail: </strong><?php echo $membros[0]['email'] ?><br>
			<strong>Telefone: </strong><?php echo $membros[0]['telefone'] ?><br>
        </div><!-- /.col-lg-4 -->

        <div class="col-lg-4"> <!-- index: 1 nome: Igor -->
            <img class="rounded-circle" src="<?=base_url('static/img/igor.jpg')?>" alt="" width="140" height="140">
            <h2><?php echo $membros[1]['nome'] ?></h2>
            <p>Bio</p>
			<strong>Nome Completo:</strong> <?php echo $membros[1]['nome'] . ' ' . $membros[1]['sobrenome'] ?><br>
			<strong>E-mail: </strong><?php echo $membros[1]['email'] ?><br>
			<strong>Telefone: </strong><?php echo $membros[1]['telefone'] ?><br>
        </div><!-- /.col-lg-4 -->

        <div class="col-lg-4"> <!-- index: 2 nome: Júlio -->
            <img class="rounded-circle" src="<?=base_url('static/img/julio.jpg')?>" alt="" width="140" height="140">
            <h2><?php echo $membros[2]['nome'] ?></h2>
            <p>Bio</p>
			<strong>Nome Completo:</strong> <?php echo $membros[2]['nome'] . ' ' . $membros[2]['sobrenome'] ?><br>
			<strong>E-mail: </strong><?php echo $membros[2]['email'] ?><br>
			<strong>Telefone: </strong><?php echo $membros[2]['telefone'] ?><br>
        </div><!-- /.col-lg-4 -->
    </div>

    <!-- 3 colunas com imagens e texto -->
    <div class="row">
        <div class="col-lg-4"> <!-- index: 3 nome: Luanderson -->
            <img class="rounded-circle" src="<?=base_url('static/img/luanderson.jpg')?>" alt="" width="140" height="140">
            <h2><?php echo $membros[3]['nome'] ?></h2>
            <p><?php echo $membros[3]['bio'] ?></p>
			<strong>Nome Completo:</strong> <?php echo $membros[3]['nome'] . ' ' . $membros[3]['sobrenome'] ?><br>
			<strong>E-mail: </strong><?php echo $membros[3]['email'] ?><br>
			<strong>Telefone: </strong><?php echo $membros[3]['telefone'] ?><br>
        </div><!-- /.col-lg-4 -->

        <div class="col-lg-4"> <!-- index: 4 nome: Ricardo -->
            <img class="rounded-circle" src="<?=base_url('static/img/ricardo.jpg')?>" alt="" width="140" height="140">
            <h2><?php echo $membros[4]['nome'] ?></h2> 
            <p><?php echo $membros[4]['bio'] ?></p>
			<strong>Nome Completo:</strong> <?php echo $membros[4]['nome'] . ' ' . $membros[4]['sobrenome'] ?><br>
			<strong>E-mail: </strong><?php echo $membros[4]['email'] ?><br>
			<strong>Telefone: </strong><?php echo $membros[4]['telefone'] ?><br>
        </div><!-- /.col-lg-4 -->

        <div class="col-lg-4"> <!-- index: 5 nome: Rayon -->
            <img class="rounded-circle" src="<?=base_url('static/img/rayon.jpg')?>" alt="" width="140" height="140">
            <h2>Heading</h2>
            <p>Parágrafo</p>
        </div><!-- /.col-lg-4 -->
    </div>
</div>

<div>
<br><br><br>	
	<table>
		<caption>Contatos</caption>
		<thead>
			<tr>
				<th>Nome</th>
				<th>Sobrenome</th>
				<th>Email</th>
			</tr>
		</thead>
		
		<tbody>
			<?php if($membros == FALSE): ?>
				<tr><td colspan="2">Nenhum membro encontrado</td></tr>
			<?php else: ?>
				<?php foreach ($membros as $row): ?>
					<tr>
						<td><?= $row['nome'] ?></td>
						<td><?= $row['sobrenome'] ?></td>
						<td><?=  $row['email'] ?></td>
					</tr>
				<?php endforeach; ?>
			<?php endif; ?>
		</tbody>
	</table>
</div>