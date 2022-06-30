<?php
class controller{
   protected $con;
   public function __construct($localhost,$username,$password,$database)
   {
      $this->con = mysqli_connect($localhost,$username,$password,$database);
   }
   public function login($table,array $auth)
   {

         $query = ("SELECT * FROM $table WHERE");
         $string = "";
         foreach($auth as $result => $key){
            $string .= " $result='$key' Logic";
         }
         $string = str_replace("Logic","AND",$string);
         $string = rtrim($string,'AND');
         $query .= $string;
         $sql = mysqli_query($this->con,$query);
         $num = mysqli_num_rows($sql);
         return $num;
      }
   public function select($table)
   {
      $sql = "SELECT * FROM $table";
      $query = mysqli_query($this->con,$sql);
      return $query;
   }
   public function where($table,$field,$data)
   {
      $sql = mysqli_query($this->con,"SELECT * FROM $table WHERE $field='$data'");
      return $sql;
   }
   public function whereLogic($table,$field1,$data1,$logic,$field2,$data2)
   {
      $sql = mysqli_query($this->con,"SELECT * FROM $table WHERE $field1 = '$data1' $logic $field2 = '$data2'");
      return $sql;
   }
   public function cari($table,$where,$like)
   {
      $query = mysqli_query($this->con,"SELECT * FROM $table  WHERE $where LIKE '%".$like."%'");
      if($query){
         return $query;
      }else{
         echo mysqli_error($this->con);
      }
   }
   public function insert($table,array $field,array $value,$redirect,$alertSuccess,$alertFaile)
   {
      foreach($field as $key){
         @$field .= "$key,";
      }
      $field = rtrim($field,',');
      $field = ltrim($field,'Array');
      $sql = "INSERT INTO $table ($field) VALUES(";
      foreach($value as $key => $value){
         $sql .= "'$value',";//mengabungkan
      }
      $sql = rtrim($sql,',');//menghapus pada bagian paling kanan yaitu ,
      $sql .= ")";
      $result = mysqli_query($this->con,$sql);
      if (empty($alertSuccess or $alertFaile)) {

      }else{
         if($result){
            echo "<script>alert('$alertSuccess');document.location.href='$redirect'</script>";
         }else{
            echo "<script>alert('$alertFaile');document.location.href='$redirect'</script>";
         }
      }
   }
   public function edit($table,$field,$where)
   {
      $sql = "SELECT * FROM $table WHERE $field='$where'";
      $query = mysqli_query($this->con,$sql);
      $result  = mysqli_fetch_array($query);
      return $result;
   }
   public function update($table,array $data,$field,$where,$redirect,$alertSuccess,$alertFaile)
   {
      $sql = "UPDATE $table SET";
      foreach ($data as $key => $value) {
         $sql .= " $key = '$value',";
      }
      $sql = rtrim($sql,",");
      $sql .= " WHERE $field = '$where'";
      $result = mysqli_query($this->con,$sql);
      if ($result) {
         if (empty($redirect)) {

         }else{
            echo "<script>alert('$alertSuccess');document.location.href='$redirect'</script>";
         }
      }else{
         die(mysqli_error($this->con));
         echo "<script>alert('$alertFaile');document.location.href='$redirect'</script>";
      }
   }
   public function delete($table,$field,$id,$redirect,$alertSuccess,$alertFaile)
   {
      $sql = "DELETE FROM $table WHERE $field='$id' ";
      $query = mysqli_query($this->con,$sql);
      if($query){
         echo "<script>alert('$alertSuccess');document.location.href='$redirect'</script>";
      }else{
         echo "<script>alert('$alertFaile');document.location.href='$redirect'</script>";
      }
   }
   public function deleteAll($table,$redirect,$alertSuccess,$alertFaile)
   {
      $sql = "DELETE FROM $table";
      $query = mysqli_query($this->con,$sql);
      if ($query) {
         echo "<script>alert('$alertSuccess');document.location.href='$redirect'</script>";
      }else{
         echo "<script>alert('$alertFaile');document.location.href='$redirect'</script>";
      }
   } function time_ago($timestamp){
      $time_ago = strtotime($timestamp);
      $current_time = time();
      $time_diffrence = $current_time - $time_ago;
      $seconds = $time_diffrence;
      $minutes = round($seconds / 60);
      $hours = round($seconds / 3600);
      $days = round($seconds / 86400);
      $weeks = round($seconds / 604800);
      $months = round($seconds / 2629440);
      $years = round($seconds / 31553280);
      if($seconds <= 60) {  
        return "Just Now";  
     } else if($minutes <=60) {  
        if($minutes==1){  
         return "one minute ago";  
      }else {  
         return "$minutes minutes ago";  
      }  
   } else if($hours <=24) {
     if($hours==1) {  
      return "an hour ago";
   } else {
      return "$hours hrs ago";  
   }
}else if($days <= 7) {  
  if($days==1) {  
   return "yesterday";  
}else {  
   return "$days Days ago";  
}  
}else if($weeks <= 4.3) {
  if($weeks==1){  
   return "a week ago";  
}else {  
   return "$weeks weeks ago";  
}  
} else if($months <=12){  
  if($months==1){  
   return "a month ago";  
}else{  
   return "$months months ago";  
}  
}else {  
  if($years == 1){  
   return "one year ago";  
}else {  
   return "$years years ago";  
}  
}  
}
}
// $array = array('semangka','rambutan','apel');

// foreach($array as $key => $value)
// {
//    @$data .=  "'$value',";
// }
// echo rtrim($data,',');
?>