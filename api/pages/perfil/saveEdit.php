<?php 
  ini_set('display_errors', 1);
  error_reporting(E_ALL);

  session_start();
  include_once('../../service/config.php');

  if(!validaLogin())
  {
    header('Location: ../login');
    return;
  }

  if($_SERVER['REQUEST_METHOD'] == "POST") {

    $id = intval($_POST['id']);
    $nome = $_POST['nameuser'];
    $about = $_POST['about'];
    $image = $_POST['image'];

    $imageName = $_FILES["image"]["name"];
    $imageSize = $_FILES["image"]["size"];
    $tmpName = $_FILES["image"]["tmp_name"];

    $validImageExtension = ['jpg', 'jpeg', 'png'];
    $imageExtension = explode('.', $imageName);
    $imageExtension = strtolower(end($imageExtension));
    if (!in_array($imageExtension, $validImageExtension)) {
      echo
        "
          <script>
            alert('Invalid Image Extension');
            document.location.href = 'index.php';
          </script>
        ";
    }
    else if ($imageSize > 1200000){
      echo
        "
          <script>
            alert('Image Size Is Too Large');
            document.location.href = 'index.php';
          </script>
        ";
    }
    else {
      $newImageName = $nome . " - " . date("Y.m.d") . " - " . date("h.i.sa"); 
      $newImageName .= '.' . $imageExtension;
      $query = "UPDATE user SET image = '$newImageName' WHERE id = $id";
      mysqli_query($conexao, $query);
      move_uploaded_file($tmpName, 'imgs/' . $newImageName);
      echo
        "
          <script>
            document.location.href = 'index.php';
          </script>
        ";
      }
        
      if (!empty($nome) && !empty($about)) {
        $sqlInsert = "UPDATE user SET nome_user = ?, About = ?, WHERE id=?";
        $stmt = $conexao->prepare($sqlInsert);
        $stmt->bind_param("ssi", $nome, $about, $id);
        $stmt->execute();
        header('Location: ../home');    
      } 
      else {
        echo "<h2>Campo vazio. Volte a página anterior e recarregue</h2>";
      }
        
  } else {
      echo "Método não permitido!";
  }
    

?>