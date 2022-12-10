<?php 
    include 'login.php';
    include './Constants/constants.php';

    $uploadfile = $uploaddir . basename($_FILES['userfile']['name']);
    if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
        header('Location: admin.php');
    } else {
        echo '<pre>';
        echo "Ошибка!\n";
    }
    
    print_r($_FILES);
    
    print "</pre>";
?>