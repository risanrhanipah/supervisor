<?php
   session_start();
   unset($_SESSION['guru']);
   session_destroy();
   if(!isset($_SESSION['guru'])){
      echo "<script>alert('Telah Logout');document.location.href='../'</script>"; 
   }
?>
