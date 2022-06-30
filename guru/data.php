<?php
if(isset($_GET['upload'])){
   require "../library/controller.php";
   $tambah = new controller("localhost","root","","supervisor");
   $rand = rand();
   $filename = $_FILES['file']['name'];
   $allow_ekstensi = array('application/pdf','pdf');
   $this_ekstensi = explode('.',$filename);
   $status_ekstensi = strtolower(end($this_ekstensi));
   if(in_array($status_ekstensi,$allow_ekstensi)){
      //Diperbolehakan
   $size= $_FILES['file']['size'];
   if($size < 1528299){
      $upload = $rand."_".$filename;
      move_uploaded_file($_FILES['file']['tmp_name'],'../dokumen/'.$upload);
      $fieldProduct = array("tanggal","mapel","guru","kkm","file");
      $valueProduct = array($_POST['tanggal'],$_POST['mapel'],$_POST['guru'],$_POST['kkm'],$upload);
      $tambah->insert("upload",$fieldProduct,$valueProduct,"index.php","Berhasil","Gagal");
   }else{
      echo $size;
      //echo "<script>alert('File Terlalu Besar');document.location.href='index.php'</script>";
   }
   }else{
      echo "<script>alert('Ekstensi File Dilarang');document.location.href='index.php'</script>";
   }
}
if(isset($_GET['update'])){
   require "../library/controller.php";
   $tambah = new controller("localhost","root","","supervisor");
   $rand = rand();
   if(empty($_FILES['file']['name'])){
      $data = array("mapel"=>$_POST['mapel'],"kkm"=>$_POST['kkm']);
      $asd = $tambah->update("upload",$data,"tanggal",$_POST['tanggal'],"index.php","Berhasil","Gagal");
   }else{
      $filename = $_FILES['file']['name'];
      $upload = $rand."_".$filename;
      $move = move_uploaded_file($_FILES['file']['tmp_name'],'../dokumen/'.$rand.'_'.$filename);
      if(!$move){
         echo "<script>alert('Size File Terlalu Besar');document.location.href='index.php'</script>";
      }else{
         $size= $_FILES['file']['size'];
         if($size < 104407908){
         if(file_exists('../dokumen/'.$_POST['file_hapus'])){
            unlink('../dokumen/'.$_POST['file_hapus']);
            $data = array("mapel"=>$_POST['mapel'],"kkm"=>$_POST['kkm'],"file"=>$upload);
            $asd = $tambah->update("upload",$data,"tanggal",$_POST['tanggal'],"index.php","Berhasil","Gagal");
         }
      }
   }
}
}
if(isset($_GET['delete'])){
   require '../library/controller.php';
   $delete = new controller("localhost","root","","supervisor");
   if(file_exists('../dokumen/'.$_GET['delete'])){
      unlink('../dokumen/'.$_GET['delete']);
      $delete->delete("upload","file",$_GET['delete'],"index.php","Berhasil Dihapus","Gagal");
   }elseif(!file_exists('../dokumen/'.$_GET['delete'])){
      $delete->delete("upload","file",$_GET['delete'],"index.php","Berhasil Dihapus Tetapi File Tidak Ada","Gagal");
   }else{
      echo "<script>alert('Ada Yang Error');document.location.href='index.php'</script>";
   }
}

?>