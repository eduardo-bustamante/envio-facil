<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../bibliotecas/PHPMailer/Exception.php';
require '../bibliotecas/PHPMailer/PHPMailer.php';
require '../bibliotecas/PHPMailer/SMTP.php';

// receber os dados do formulario

$enviarPara = $_POST['para'];
$enviarAssunto = $_POST['assunto'];
$enviarMensagem = $_POST['mensagem'];
$data= date("d/m/Y");

// Classe

class Mensagem
{
    private $para = null;
    private $assunto = null;
    private $mensagem = null;
    public $status = array('codigo_status' => null, 'descricao_status' => '');

    public function __get($atributo)
    {
        return $this->$atributo;
    }

    public function __set($atributo, $valor)
    {
        $this->$atributo = $valor;
    }

    public function validarMensagem()
    {
        if (empty($this->para) || empty($this->assunto) || empty($this->mensagem)) {
            return false;
        }
        return true;
    }
}

$mensagem = new Mensagem();
$mensagem->__set('para', $enviarPara);
$mensagem->__set('assunto', $enviarAssunto);
$mensagem->__set('mensagem', $enviarMensagem);



$mail = new PHPMailer(true);

try {
    //Server settings
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.office365.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'colque seu email aqui';                     //SMTP username
    $mail->Password   = 'coloque sua senha';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('parmalat100@live.com', 'Remetente');
    $mail->addAddress($mensagem->__get('para'));     //Add a recipient
    // $mail->addAddress('eng.silva89@gmail.com');               //Name is optional
    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $mensagem->__get('assunto');
    $mail->Body    = $mensagem->__get('mensagem');
    $mail->AltBody = 'É necessário um cliente que suporte essa mensagem';

    $mail->send();
    $mensagem->status['codigo_status'] = 1;
    $mensagem->status['descricao_status'] = 'E-mail enviado com sucesso';

    $email = str_replace('#', '-', $mensagem->__get('para'));
	$assunto = str_replace('#', '-', $mensagem->__get('assunto'));
	$corpo = str_replace('#', '-',$mensagem->__get('mensagem'));

	//implode('#', $_POST);

	$texto =  $email . '#' . $assunto . '#' . $corpo .'#'.$data. PHP_EOL;


	//abrindo o arquivo
	$arquivo = fopen('../arquivo.hd', 'a');
	//escrevendo o texto
	fwrite($arquivo, $texto);
	//fechando o arquivo
	fclose($arquivo);



} catch (Exception $e) {
    $mensagem->status['codigo_status'] = 2;
    $mensagem->status['descricao_status'] = 'Não foi possivel enviar este e-mail! Por favor tente novamente mais tarde. Detalhes do erro: ' . $mail->ErrorInfo;
}