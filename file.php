<?php

    if(isset($_POST["submit"])){
        $file_name = $_FILES["file"]["name"];
        $permitted_extensions = ["png", "jpg", "jpeg", "gif"];
        if(!empty($file_name) && $permitted_extensions){
            $file_generated = time(). '-'. $file_name;
            $file_extension = explode('.', $file_name);
            $file_extension = strtolower(end($file_extension));
            $file_tmp_name = $_FILES["file"]["tmp_name"];
            $destination_path = "uploads/$file_generated";
            $file_size = $_FILES["file"]["size"];
            if(in_array($file_extension, $permitted_extensions)){
                if($file_size <= 1000000000){
                    move_uploaded_file($file_tmp_name, $destination_path);
                    echo $scs_msg = '<p style=color:green"> File uploaded successfully </p>';
                }else{
                    $err_msg = '<p style=color:red"> File size is too large, please try again </p>';
                }
            }
        }else{  
            $err_msg = '<p style=color:red"> No file selected, please try again </p>';
        }
    }
?> 


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        <form action ="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post" enctype="multipart/form-data" >
            Choose your image to upload    
            <br>
            <input type="file" name="file" id="file">
            <br>
            <input type="submit" value="submit" name="submit">
        </form>
</body>
</html>