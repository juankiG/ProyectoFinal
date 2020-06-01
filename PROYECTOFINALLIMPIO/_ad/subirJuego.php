<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
    <style>
        html{
            width: 100%;
            height: 100%;
        }
        body{
            width: 100%;
            height: 100%;
            display: flex;
            background-image: url("../user/IMG/image.jpg");
            background-size: cover;
            margin: 0;
            justify-content: center;
            align-items: center;
        }
        form{
            display: flex;
            flex-wrap: wrap;
            width: 30%;
            height: 70%;
            background-color: rgba(36, 40, 59, 1);
            justify-content: center;
            padding:15px;
            border-radius: 7px;
        }
        form p{
            display: flex;
            justify-content: center;
            width: 100%;
            align-items: center;
            color: white;
            font-family: 'Jost', sans-serif;
            text-transform: uppercase;

        }
        form input{
            display: flex;
            width: 100%;
            justify-content: center;
            align-items: center;
            border-radius: 5px;
            margin: 5px;
            border: 2px solid darkorange;
            padding: 5px;
            background-color: white;
            font-family: 'Jost', sans-serif;
        }
        button{
            margin: 5px;
            width: 50%;
            display: flex;
            border-radius: 5px;
            justify-content: center;
            padding: 0;
            border:0;

        }
        button a{
            border-radius: 5px;
            text-decoration: none;
            color: white;
            font-family: 'Jost', sans-serif;
            background-color: darkorange;
            width: 100%;
            margin: 0;
            padding: 2px;
        }
    </style>
</head>
<body>
<form action="upload.php" method="post" enctype="multipart/form-data">
    <p>Elige una imagen de perfil de juego:</p>
    <input type="file" class="contact_input" name="imagen" required />
  <script>
      document.getElementById("filepicker").addEventListener("change", function(event) {
          let output = document.getElementById("listing");
          let files = event.target.files;

          for (let i=0; i<files.length; i++) {
              let item = document.createElement("li");
              item.innerHTML = files[i].webkitRelativePath;
              output.appendChild(item);
          };
      }, false);
  </script>
    <p>Elige la carpeta del juego:</p>
    <input type="file" id="filepicker" name="link" webkitdirectory multiple />
    <ul id="listing"></ul>
    <input type="text" class="" name="nombre" placeholder="nombre del juego" required/>
    <input type="text" class="" name="Nombrecarpeta" placeholder="Nombre carpeta" required/>
    <input type="text" class="" name="descripcion" placeholder="descripcion" required/>
    <button><a href="../user/usuarioPantallaPrincipal.php">Cancelar</a></button>
    <input  style="width: 50%" type="submit" name="submit" value="Subir"/>

</form>

</body>
</html>