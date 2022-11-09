<?php 
    include './login.php';
    include './constants.php';

    $uploadfile = $uploaddir . basename($_FILES['userfile']['name']);
    if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
        header('Location: ./admin.php');
    } else {
        echo '<pre>';
        echo "Возможная атака с помощью файловой загрузки!\n";
    }
    
    echo 'Некоторая отладочная информация:';
    print_r($_FILES);
    
    print "</pre>";
?>