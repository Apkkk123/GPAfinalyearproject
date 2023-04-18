<html>
   <head>
      <title>Excel Sheet Upload</title>
   </head>
   <body>
      <form enctype="multipart/form-data" action="upload.php" method="POST">
         <input type="file" name="excel_file" />
         <input type="submit" name="submit" value="Upload" />
      </form>
   </body>
</html>
<?php
   if(isset($_POST['submit'])){
      $file_name = $_FILES['excel_file']['name'];
      $file_size = $_FILES['excel_file']['size'];
      $file_tmp = $_FILES['excel_file']['tmp_name'];
      $file_type = $_FILES['excel_file']['type'];
      $file_ext = strtolower(end(explode('.',$_FILES['excel_file']['name'])));
      
      $extensions = array("xls","xlsx");
      
      if(in_array($file_ext,$extensions)=== false){
         echo "Extension not allowed, please choose a valid Excel file.";
         exit();
      }
      
      if($file_size > 2097152){
         echo 'File size must be less than 2 MB';
         exit();
      }
      
      move_uploaded_file($file_tmp,"uploads/".$file_name);
      echo "Success! File uploaded to: uploads/".$file_name;
   }
?>
