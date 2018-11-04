    <?php
        $servername = 'localhost';
        $username = 'tecuser';
        $password = 'tecweb123';
        $dbname = 'tecweb';

        // Criar conexão
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Checar Conexão
        if ($conn->connect_error)
        {
            die('A conexão falhou: ' . $conn->connect_error);
        }
    ?>

    <main role="main">
	 <br><br><br>
        <?php
            $sql = 'SELECT idMembro, nome, sobrenome FROM Membros';
            $result = $conn->query($sql);

            if($result->num_rows > 0)
            {
                // Saída dos dados de cada linha
                while($row = $result->fetch_assoc())
                {
                    echo 'id: ' . $row['idMembro'] . ' - Nome: ' . $row["nome"] . ' ' . $row['sobrenome'] . '<br>';
                }
            } else
            {
                echo '0 resultados';
            }

            $conn->close();
        ?>
