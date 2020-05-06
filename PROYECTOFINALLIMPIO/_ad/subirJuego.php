<?php
?>
<!DOCTYPE html>
<html lang="en">
<body>
<form action="upload.php" method="post" enctype="multipart/form-data">
    Select image to upload:
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
    <input type="file" id="filepicker" name="link" webkitdirectory multiple />
    <ul id="listing"></ul>
    <input type="text" class="" name="nombre" placeholder="nombre" required/>
    <input type="text" class="" name="Nombrecarpeta" placeholder="Nombre carpeta" required/>
    <input type="text" class="" name="descripcion" placeholder="descripcion" required/>
    <input type="submit" name="submit" value="UPLOAD"/>
</form>
</body>
</html>