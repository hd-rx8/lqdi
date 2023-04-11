<?php
    require 'vendor/autoload.php';
    
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    
    // Criando instância
    $mail = new PHPMailer(true);

    // Configurações do servidor de email
    try {
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $mail->isSMTP();
        $mail->Host       = 'sandbox.smtp.mailtrap.io';
        $mail->SMTPAuth   = true;
        $mail->Username   = '3fbbe717424248';
        $mail->Password   = '096b22da0feaa5';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 2525;

        // Consulta SQL
        $id = 2;

        $conexao = new PDO('mysql:host=localhost:3306;dbname=teste-lqdi', 'root', '');
        $stmt = $conexao->prepare("SELECT nome FROM inscricoes WHERE id = :id");
        $stmt->bindParam(':id', $id); 
        $stmt->execute();
        $resultado = $stmt->fetch();
        $nome = $resultado['nome']; 

        // Informações do email
        $mail->setFrom('hendrixgarcia.dev@gmail.com', 'Hendrix Garcia');
        $mail->addAddress('teste@gmail.com', 'Teste');
        $mail->isHTML(true);
        $mail->Subject = 'Email via Mailtrap';
        $mail->Body    = "Hello, $nome!";

        // Envia o email
        $mail->send();
        echo 'Email enviado com sucesso!';

    } catch (Exception $e) {
        echo "Erro ao enviar email: {$mail->ErrorInfo}";
    }
?>