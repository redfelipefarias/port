<?php

// Seu email para receber as respostas
$email_remetente = "redfelipefarias@hotmail.com";

// Nome do remetente que será exibido no email
$nome_remetente = "Lucas Felipe";

// Assunto do email de resposta
$assunto_resposta = "Resposta do Formulario de Contato";

// Mensagem inicial da resposta
$mensagem_inicial = "Olá, \n\nObrigado por entrar em contato conosco!\n\n";

?>

<?php

// Recebendo os dados do formulário
$nome_usuario = $_POST['nome'];
$email_usuario = $_POST['email'];
$celular_usuario = $_POST['celular'];
$mensagem_usuario = $_POST['mensagem'];

// Validando se todos os campos foram preenchidos
if (empty($nome_usuario) || empty($email_usuario) || empty($celular_usuario) || empty($mensagem_usuario)) {
    echo "Preencha todos os campos do formulário.";
    exit;
}

// Formatando a mensagem do usuário
$mensagem_formatada = $mensagem_inicial . "**Nome:** $nome_usuario\n**Email:** $email_usuario\n**Celular:** $celular_usuario\n**Mensagem:** $mensagem_usuario";

// Função para enviar o email
function enviarEmail($destinatario, $assunto, $mensagem, $headers = null) {
    if (!$headers) {
        $headers = "From: $nome_remetente <$email_remetente>\nReply-To: $email_remetente";
    }
    return mail($destinatario, $assunto, $mensagem, $headers);
}

// Enviando email para o usuário
$enviado = enviarEmail($email_usuario, $assunto_resposta, $mensagem_formatada);

if ($enviado) {
    echo "Email de resposta enviado com sucesso!";
} else {
    echo "Falha no envio do email de resposta.";
}

