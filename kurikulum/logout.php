<?php
   session_start();
   unset($_SESSION['kurikulum']);
   session_destroy();
   echo "<script>alert('Telah Logout');document.location.href='../'</script>";
?>