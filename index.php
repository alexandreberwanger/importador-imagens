<html>

<h1>Importador de Imagens</h1>
    <form method="POST" action="processa.php" enctype="multipart/form-data">
            <label>
                admin: ----------------|<input type="text" name="admin"/>
            </label><br><br>
            <label>
                Usuário do Commerce: ----------------|<input type="text" name="usuario"/>
            </label><br><br>
            <label>
                Senha do Commerce: ----------------|<input type="password" name="senha"/>
            </label><br><br>
        <label>Arquivo: </label>
        <input type="file" name="arquivo" id="arquivo"> <br><br>
        <input type="submit" value="Enviar">
    </form>

    <label>Observações<br><br>
            - Inserir somente o nome do admin, exemplo: projetos ou temasbase.<br><br>
            - O Arquivo deve ser em .csv contendo duas colunas, ID do produto e URL da imagem.<br><br>

    </label>
  
  <br>
  
  		TESTE DE LAYER <br>
      <form method="POST" action="">
        <input type="text" name="textoInput" placeholder="Digite o texto">
        <button type="submit">Concatenar e Abrir URL</button>
    </form>
  <?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obter o valor do campo de entrada
    $texto = $_POST['textoInput'];

    // Concatenar com uma string
    $string = $texto . ".layer.core.dcg.com.br" ;

    // Codificar a URL
    $url = urlencode($string);

  	$url = str_replace("importador.x10.mx/", "", $url);


    // Abrir a URL em uma nova guia
    echo "<script>window.open('$url', '_blank');</script>";
}
?>
  
</html>