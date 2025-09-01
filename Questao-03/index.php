<?php 
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require_once('src/PHPMailer.php');
    require_once('src/SMTP.php');
    require_once('src/Exception.php');

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];
        $mensagem = $_POST['mensagem'];

        if(empty($nome) || empty($email) || empty($telefone)|| empty($mensagem)){
            die("Todos os campos são obrigatórios");
        }

        $mail = new PHPMailer(true);
        try {
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;
            $mail-> isSMTP();     
            $mail-> Host = 'smtp.gmail.com';
            $mail -> SMTPAuth = true;
            $mail-> Username   = 'seuemail@gmail.com';
            $mail -> Password = 'SUA_SENHA_AQUI';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail -> Port = 587;

            $mail -> setFrom('bruna.lborges.matias@gmail.com');
            $mail -> addAddress($email);

            $mail->isHTML(true);
            $mail->Subject = 'Envio de formulário do teste técnico';

            $mail -> Body = "
                <strong>Nome:</strong> $nome <br>
                <strong>Telefone:</strong> $telefone <br>
                <strong>Email:</strong> $email <br>
                <strong>Mensagem:</strong> <br>$mensagem";

            $mail->AltBody = "Nome: $nome, Telefone: $telefone, Email: $email, Mensagem: $mensagem";

            $mail->Send();
            echo "Email enviado com sucesso!";
        }
        catch(Exception $e){
            echo "Email não enviado. Erro {$mail->ErrorInfo}";
        }
    }
?>