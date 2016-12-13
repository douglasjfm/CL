<?php
    
	$conn = new mysqli('mysql.hostinger.com.br', 'u682627300_user', '070245', "u682627300_cl")
    	or die("Nao pode se Conectar ao BD");

$f = fopen("a.txt","w");		//só pra fins de depuração escrevo alguns dados em um arquivo local, "a.txt".
fwrite($f,print_r($_FILES,true));
fwrite($f,print_r($_POST,true));
fwrite($f,print_r($_GET,true));
fclose($f);
    
    $fname = $_FILES["file"]["name"];    //o arquivo ($_FILE['file'] é a foto) é enviado via HTTP POST.
    $lat = $_GET['lat'];		// Descobri que dá pra mandar variaveis na URL, como um GET, numa requisição POST!
    $lng = $_GET['lng'];		
    $u = $_GET['user'];// o email do usuario;
    $classe = $_GET['c'];// a classe dos residuos
    $volume = $_GET['v'];// o volume selecionado.
    $end = $_GET['end'];// o volume selecionado.
    $anon = $_GET['anon'];// o volume selecionado.

    if($lat == "") $lat = '-8.01';	//coordenadas fake, usei mto no inicio. agora estao deprecated kkk.
    if($lng == "") $lng = '-34.51';
    if($u == "") $u = 'adm';
    if($fname == "") $fname = 'testimg.png';
    if($end == "") $end = 'teste';

    $sql = "INSERT INTO denuncia (lat, lng, classe, volume, user, end, anon, file) VALUES ('$lat','$lng','$classe','$volume','$u','$end','$anon','$fname')";
    

    arquivo(); //Funcao pra tratar de error de upload, tipo assim, dá mto erro.
	$conn->close();
	
function arquivo(){
	global $conn;
	global $sql;
	move_uploaded_file($_FILES["file"]["tmp_name"], "originais/" . $_FILES["file"]["name"]);
	if ($_FILES["file"]["error"]  !=  UPLOAD_ERR_OK)
	{
		echo "1"; // Envia "1" pro App caso haja erro no upload.
		return;
	}
	$conn->query($sql); //insere a denuncia no  BD.
	$new_id = $conn->insert_id;
	echo "0,$new_id"; //Envia "0" pro App caso tudo esteja OK (o App imprime 'denuncia enviada');
	depositaImg();
}

function depositaImg() {
	$im = @imagecreatefromjpeg('originais/'.$_FILES["file"]["name"]);
	
	list($imw,$imh,$t,$attr) = getimagesize('originais/'.$_FILES["file"]["name"]);
	$w = 512;
	$h = 512 * ($imh/$imw);
	
	$im2 = @imagecreatetruecolor($w, $h);
	imagecopyresampled ($im2, $im ,
				0, 0,
				0, 0,
				$w, $h,
				$imw, $imh);
	imagejpeg($im2, 'deposito/'.$_FILES["file"]["name"],100);
	imagedestroy($im);
	imagedestroy($im2);

        echo "($imw,$imh,$t,$attr)";
}
