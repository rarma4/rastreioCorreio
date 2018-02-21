<?php
$from = "atendimento@casalsign.com.br";
$parametros = trim(strip_tags(strtoupper($_POST['rastrear'])));
$email = trim(strip_tags(strtolower($_POST['email'])));
$url = "https://cnweb4.websiteseguro.com/logocn-integrada/correios.php?obj=$parametros";
$url2 = "window.history.back(-1);";

	if($parametros == ""){
		echo "<script> alert('Por favor, digite seu numero de rastreio corretamente!'); window.location.href='http://www.casalsign.com.br'; </script>";
	}else{
		if ($email == ""){
				header ("location: $url");
		}else{
			if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
				echo "<script> alert('Por favor, digite seu e-mail corretamente!'); window.location.href='http://www.casalsign.com.br'; </script>";
			}else{
				
				$to = $email;
				$subject = "Rastreio do Pedido - CasalSign - $parametros";
				$message = "Ola, <br><br>
				Segue numero do rastreio do seu pedido.<br><br>
				Rastreio: <a href='$url' target='_blank'>$parametros</a><br><br>
				Obrigado!!!<br><br>
				Casal Sign - Fone: 11 3951.1123 - Fone: 11 3951.1191<br>
				www.casalsign.com.br<br><br><br><br>
				Designed by www.rafart.com.br
				";
				$header = "MINE-Version: 1.0\n";
				$header .= "Content-type: text/html; charset=iso-8859-1\n";
				$header .= "From: $from\n";
				mail($to, $subject, $message, $header, "-r".$from);
					if(mail){
						echo "<script>alert('Enviado com Sucesso!'); window.open('$url', '_blank'); window.history.back(-1);</script>";
						//echo "<script> window.open('$url', '_blank'); window.setTimeout("location.href='/http://www.casalsign.com.br'",2000); alert('Enviado com Sucesso!'); </script>";
						
					}else{
						echo "<script> alert('Erro no envio!'); window.location.href='http://www.casalsign.com.br'; </script>"; 
						header ("location: $url");
						}
				
				}
			}
		}
?>