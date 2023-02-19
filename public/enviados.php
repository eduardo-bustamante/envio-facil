<?php

//emails
$emails = array();

//abrir o arquivo.hd
$arquivo = fopen('../arquivo.hd', 'r');

//enquanto houver registros (linhas) a serem recuperados
while (!feof($arquivo)) { //testa pelo fim de um arquivo
    //linhas  
    $registro = fgets($arquivo);
    $emails[] = $registro;
}

//fechar o arquivo aberto
fclose($arquivo);

?>

<html>

<head>
    <meta charset="utf-8" />
    <title>Enviados</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <style>
        .card-consultar-email {
            padding: 30px 0 0 0;
            width: 50%;
            margin: 0 auto;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <img src="email.png" width="40" height="40" class="d-inline-block align-top" alt="">
        <a class="navbar-brand ms-3" href="#">Envio Fácil</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item ">
                    <a class="nav-link" href="index.php">Inicio</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="enviar.php">Enviar</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="enviados.php">Enviados</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <div class="row justify-content-md-center">

            <div class="card-consultar-email col-md-6">
                <div class="card">
                    <div class="card-header">
                        Emails Enviados
                    </div>

                    <div class="card-body">

                        <?php foreach ($emails as $email) { ?>

                            <?php

                            $email_dados = explode('#', $email);

                            //

                            if (count($email_dados) < 3) {
                                continue;
                            }

                            ?>
                            <div class="card mb-3 bg-light">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $email_dados[0] ?></h5>
                                    <h6 class="card-subtitle mb-2 text-muted"><?= $email_dados[1] ?></h6>
                                    <p class="card-text"><?= $email_dados[2] ?></p>
                                    <p class="card-text"><?= $email_dados[3] ?></p>

                                </div>
                            </div>

                        <?php } ?>

                        <div class="row mt-5">
                            <div class="col-6">
                                <a class="btn btn-lg btn-warning btn-block" href="home.php">Voltar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>