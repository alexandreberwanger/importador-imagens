<?php

$arquivo = $_FILES['arquivo'];
$admin = filter_input(INPUT_POST, 'admin');
$usuario = filter_input(INPUT_POST, 'usuario');
$senha = filter_input(INPUT_POST, 'senha');
//var_dump($arquivo);

if($arquivo['type'] == "text/csv") {
   $dados_arquivo = fopen($arquivo['tmp_name'], "r");

   while($linha = fgetcsv($dados_arquivo, 1000, ";")){

      // die('dsadsadsadsa');
        foreach ($linha as $produto) {
        $produto = explode(',', $produto);
        echo '<pre>';
        //var_dump($linha);
        print_r($produto);
        echo '</pre>';

        $username = $usuario;
        $password = $senha;
        
        $url = "https://".$admin.".layer.core.dcg.com.br/v1/Catalog/API.svc/web/SaveCatalogMedia";
  

        //die ('TeSTE');
        $curl = curl_init();
        
        curl_setopt_array($curl, array(
          CURLOPT_URL => $url,
          CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json; charset=UTF-8',
            "Authorization: Basic " . base64_encode("$username:$password")
          ),
          CURLOPT_RETURNTRANSFER => 1,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_POST => 1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_SSL_VERIFYPEER => 1,
          CURLOPT_POSTFIELDS => '
          {
            "ProductID": '.$produto[0].',
             "WebImage": {
              "ImageTitle": "rocadeira",
              "ImageUrl": "'.$produto[1].'"
            },
            "KeepOnlyMedia": false,
            "ReplaceExistingMedia": false
           }
          ',
          
        ));
        
        $response = curl_exec($curl);
        $err = curl_error($curl);
        
        curl_close($curl);

        sleep(4);


        }
   }
} else {
    echo "Enviar um arquivo em CSV";
}