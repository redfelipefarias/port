<?php

    $nome = addslashes($_POST['nome']);
    $email = addslashes($_POST['email']);
    $telefone =addslashes($_POST['celular']);
    $texto = $_POST['Sua mensagem:'];

    $para = "redfelipefarias@hotmail.com";
    $assunto = "Coleta de dados";

    $corpo = "Nome: ".$nome."\n"."E-mail: ".$email."\n"."Telefone: ".$telefone;

    $cabeca = "From: redfelipefarias@gmail.com"."\n"."Reply-to: ".$email."\n"."X=Mailer:PHP/".phpversion();

    if(mail($para,$assunto,$corpo,$cabeca)){
        echo("E-mail enviado com sucesso!!");
    }else{
        echo("Houve um erro ao enviar o e-mail!");
    }

?>
