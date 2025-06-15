<?php
// Teste SMTP para KingHost

// Configurações
$servidor_smtp = "smtp.kinghost.net"; // Substituir pelo seu domínio na KingHost
$porta = 587; // Ou 465 se usar SSL
$usuario = "alisson@alquitech.com.br"; // Seu e-mail completo
$senha = "23@28@90.Mosquitao"; // Senha do e-mail

$remetente = "alissonvinicius00@gmail.com";
$destinatario = "destinatario@dominio.com"; // Para testar

$assunto = "Teste de envio SMTP KingHost";
$mensagem = "Olá, este é um teste de envio de e-mail via SMTP usando KingHost.\nSe você recebeu, está funcionando corretamente.";

// -------- Código ---------
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require __DIR__ . '/PHPMailer/PHPMailer.php';
require __DIR__ . '/PHPMailer/SMTP.php';
require __DIR__ . '/PHPMailer/Exception.php';

$mail = new PHPMailer(true);

try {
    // Configurações do servidor SMTP
    $mail->isSMTP();
    $mail->Host       = $servidor_smtp;
    $mail->SMTPAuth   = true;
    $mail->Username   = $usuario;
    $mail->Password   = $senha;
    $mail->SMTPSecure = 'tls'; // 'tls' para porta 587 ou 'ssl' para 465
    $mail->Port       = $porta;

    // Remetente e destinatário
    $mail->setFrom($remetente, 'Teste SMTP KingHost');
    $mail->addAddress($destinatario, 'Destinatario');

    // Conteúdo do e-mail
    $mail->isHTML(false);
    $mail->Subject = $assunto;
    $mail->Body    = $mensagem;

    $mail->send();
    echo "✅ E-mail enviado com sucesso!";
} catch (Exception $e) {
    echo "❌ Erro ao enviar e-mail: {$mail->ErrorInfo}";
}
?>