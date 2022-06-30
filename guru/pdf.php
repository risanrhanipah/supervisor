<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
</head>
<body>
   <?php
      if(file_exists("../dokumen/".$_GET['pdf'])){
   ?>
      <embed width="100%" height="625" src="../dokumen/<?php echo $_GET['pdf'] ?>" type="application/pdf">
   <?php
      }else{
         echo "<script>alert('File Tidak Ada/Sudah Di Hapus');document.location.href='index.php'</script>";
      }
   ?>
</body>
</html>