<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Files Admin</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  </head>
  </head>
  <body>
    <div class="container">
      <form action="includes/uploadFile.inc.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
          <label for="inputCedula">Cedula</label>
          <input type="number" name="cedula" class="form-control" placeholder="Enter Cedula">
        </div>
        <div class="form-group">
          <label for="inputCedula">File</label>
          <input type="file" name="arch" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
      <?php
      crear_imagen();
      echo "<img src='imagen.png'".">";

      function crear_imagen() {
        $im = imagecreate(rand(100, 300), rand(100, 300)) or die("Cannot Initialize new GD image stream");
        imagecolorallocate($im, rand (0,255), rand (0,255), rand (0,255));
        $r1 = imagecolorallocate($im, rand (0,255), rand (0,255), rand (0,255));
        $r2 = imagecolorallocate($im, rand (0,255), rand (0,255), rand (0,255));
        imagerectangle($im, rand(5, 10), rand(3, 10), rand(100, 200), 50, $r1);
        imagefilledrectangle($im, 5, 100, 195, 140, $r2);

        imagepng($im, "imagen.png");
        imagedestroy($im);
      }
      ?>
    </div>
  </body>
</html>
