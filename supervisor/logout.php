<?php
   session_start();
   unset($_SESSION['super']);
   session_destroy();
   if(!isset($_SESSION['super'])){
      echo "<script>alert('Telah Logout');document.location.href='../'</script>"; 
   }
?>
