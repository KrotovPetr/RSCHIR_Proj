<?php
include './login.php';
include './Constants/constants.php';

$dictionary = $DICTIONARY[$_SESSION['language']];
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <style>
        span {
            margin: 10px;
        }
        <?php
        if ($_SESSION['theme'] == THEME::$DARK) {
            echo '* {
                color: rgb(233, 233, 233);
                background-color: rgb(47, 45, 45);
            }';
        }
        ?>
    </style>


</head>

<body>
<div style="display: flex; flex-flow: column nowrap; justify-content: center; align-items: center; border: 2px solid black">
<h1 style="display: flex; flex-flow: column nowrap; justify-content: center; align-items: center;">
    <?php echo $dictionary->ADMIN_PANEL?>
</h1>

<p style="font-size: 18px; font-weight: bold;">
    <?php
    echo $dictionary->HI . " " . ($_SESSION['name'] ?: $dictionary->NAMELESS) .", ". $dictionary->DESCR;
    ?>
</p>

<h2><?php echo $dictionary->SETTING ?></h2>

<form action="./setting.php" method="post"  style=" display: flex; flex-flow: column nowrap; justify-content: center;">
    <div>
        <?php echo $dictionary->THEME ?>: <br>
        <label>
            <input type="radio" name="theme" <?php
            if ($_SESSION['theme'] == THEME::$LIGHT) {
                echo "checked";
            }
            ?> value="light">
            <?php echo $dictionary->LIGHT ?>
        </label>
        <label>
            <input type="radio" name="theme" <?php
            if ($_SESSION['theme'] == THEME::$DARK) {
                echo "checked";
            }
            ?> value="dark">
            <?php echo $dictionary->DARK ?>
        </label>
    </div>

    <div>
        <?php echo $dictionary->LANGUAGE ?>: <br>
        <label>
            <input type="radio" name="language" <?php
            if ($_SESSION['language'] == LANGUAGE::$RU) {
                echo "checked";
            }
            ?> value="ru">
            Русский
        </label>
        <label>
            <input type="radio" name="language" <?php
            if ($_SESSION['language'] == LANGUAGE::$EN) {
                echo "checked";
            }
            ?> value="en">
            English
        </label>
    </div>

    <div>
        <label>
            <?php echo $dictionary->NAME ?>:
            <input type="text" name="name" value="<?php echo $_SESSION['name'] ?>">
        </label>
    </div>

    <button type="submit"><?php echo $dictionary->UPDATE ?></button>
</form>

<h2>PDF</h2>
<form enctype="multipart/form-data" action="./pdf.php" method="POST">
    <input type="hidden" name="MAX_FILE_SIZE" value="300000" />
    <div>
        <?php echo $dictionary->SEND_THIS_FILE ?>:
        <label for="uploadbtn" class="uploadButton">
            <?php echo $dictionary->UPLOAD_FILE ?>
        </label>
        <div></div>
        <input style="opacity: 0; z-index: -1;" type="file" name="userfile" id="uploadbtn" onchange='document.querySelector(".uploadButton + div").innerHTML = Array.from(this.files).map(f => f.name).join("<br />")' />
    </div>
    <input type="submit" value="<?php echo $dictionary->SEND_FILE ?>" />
</form>


<h3><?php echo $dictionary->UPLOADING_FILES ?></h3>

<?php
$files = array_diff(scandir($uploaddir), array('.', '..'));

echo "<ul>";
foreach ($files as $file_name) {
    echo "<li><a href=\"./download.php?file={$file_name}\">{$file_name}</a></li>";
}

echo "</ul>";
?>

<h1>List of users</h1>
<?php
$mysqli = new mysqli("db", "admin", "admin", "appDB");
$result = $mysqli->query("SELECT * FROM users");
while ($row = mysqli_fetch_assoc($result)) {
    $users[] = $row;
}
?>
<div style="
            display: flex;
            flex-direction: column;
        ">

    <?php foreach ($users as $user) : ?>
        <?php echo implode(" | ", $user) ?>
    <?php endforeach; ?>

</div>
<?php $mysqli->close(); ?>
</div>
</body>

</html>