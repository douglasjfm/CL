<?php
    
    $precisao = 0.01; //Experimental. Pode mudar!

    $conn = new mysqli('mysql.hostinger.com.br', 'u682627300_user', '070245', "u682627300_cl");
    if ($conn->connect_error) {
         die("Connection failed: " . $conn->connect_error);
    } 
    
    $lat = $_GET["lat"]; //Recebe a latitude o usuario, no aplicativo.
    $lng = $_GET["lng"]; // a longitude 
    if ($lat == "") {
		$lat = $_POST["lat"]; //Recebe a latitude o usuario, no aplicativo.
		$lng = $_POST["lng"]; // a longitude
	}
    
    $sql = "SELECT * FROM `denuncia`"; // tipo assim, seleciona logo tudo! A unica coisa que decorei de sql foi SELECT!
    
    
    
    $den = $conn->query($sql); 		/*   Realiza o consula $sql no BD apontado por $conn. o resultado (as filas),
    					*    ficam no objeto $den(uncias). Aqui viram todas as filas.
					*/
    $res = array();
    $j = 0;
    while($j < $den->num_rows)		// pega as filas e as armazena no array $res
    {
        $row = $den->fetch_assoc();
        $res[$j] = $row;
        $j++;
        //echo print_r($row,true) . "";
    }
    
    $ret = "";
    
    for($j=0; $j < count($res); $j++){	// concatena todas as latitudes e longitudes em $ret como string.
        $ret .= $res[$j]["lat"]."#"
		.$res[$j]["lng"]."#"
		.$res[$j]["id"]."#"
		.$res[$j]["file"]."#"
		.$res[$j]["end"]."#"
		.$res[$j]["classe"]."#"
		.$res[$j]["volume"].";";
    }

    echo "$j;".print_r($ret,true); // a string com a forma lat1,lng1,lat2,lng2,lat3,lng3... eh retornada.
				  // Sim! não está ainda aplicando o criterio $precisao...
    $conn->close();

?>
