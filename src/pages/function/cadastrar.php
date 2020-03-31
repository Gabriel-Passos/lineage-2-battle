<?php
	include "conexao.php";
	include 'anti_inject_text.php';

   @$xlogin = anti_inject_text($_POST['login']);
   @$xfixo = $_POST['fixo'];
   @$xsenha = anti_inject_senha($_POST['senha']);
   @$xconfirmarsenha = anti_inject_senha($_POST['confirmarsenha']);

   //Tira os espaçoes em branco
   $xlogin = trim($xlogin);
   $xlogin = str_replace(" ","",$xlogin);
   $xsenha = trim($xsenha);
   $xconfirmarsenha = trim($xconfirmarsenha);

	function encriptaSenha($xsenha) {
		return base64_encode(pack("H*", sha1(utf8_encode($xsenha))));
	}

	
	   //Verifica se as variaveis estão vazias
	   if(empty($xlogin) || empty($xsenha))
	   {
	   		echo json_encode('Campos em brancos');
		}
			else{
				if($xsenha == $xconfirmarsenha){
					$xlogin = $xlogin.$xfixo;
					$xsenha = encriptaSenha($xsenha);
					$sql = "SELECT login FROM accounts WHERE login = '$xlogin'";
			   		$rs = mysqli_query($link, $sql);

			   		if(mysqli_num_rows($rs) < 1){
			   			$sql = "INSERT INTO accounts (login, password, lastactive, access_level, lastIP, lastServer) 
			   				VALUES ('$xlogin', '$xsenha', '0', '0', '0', '1')";

			   			$status = mysqli_query($link, $sql);
			   			
			   			if($status){
			   				
			   				 echo json_encode(array('result' => true, 'msg' => 'Cadastrado com sucesso :D'));
			   			}

			   				else{
			   					
			   					
			   					 echo json_encode('Error');
			   				}
		   			
		   			}
		   			else{
		   				echo json_encode('Login ja existe');
		   			}  	
				}
				else{
					echo json_encode("Senhas nao conferem");
				}
	   		}

?>