<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Envio Fácil</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


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
        <div class="py-3  text-center">
            <img width="72px" src="email.png" alt="">
            <h2>Envio Facil</h2>
        </div>

        <div class="row justify-content-md-center">
            <div class="col-md-6 ">
                <div class="card-body font-weight-bold">
                    <form action="envio.php" method="post">
                        <div class="form-group mt-3">
                            <label for="para">Para</label>
                            <input type="text" class="form-control" name="para" id="para" placeholder="seunome@dominio.com.br">
                        </div>
                        <div class="form-group mt-3">
                            <label for="assunto">Assunto</label>
                            <input type="text" class="form-control" name="assunto" id="assunto" placeholder="Assunto do e-mail">
                        </div>
                        <div class="form-group mt-3">
                            <label for="mensagem">Mensagem</label>
                            <textarea class="form-control" name="mensagem" id="mensagem"></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary btn-lg mt-3">Enviar Mensagem</button>
                    </form>
                </div>
            </div>
        </div>
</body>

</html>