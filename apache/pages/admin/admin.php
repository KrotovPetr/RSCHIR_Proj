<?php
include 'login.php';
include 'constants.php';

$dictionary = $DICTIONARY[$_SESSION['language']];
?>

<html lang="<?php echo $_SESSION['language'] ?>">

<head>
    <title><?php echo $dictionary->ADMIN_PANEL ?></title>
    <link rel="stylesheet" href="../static/styles/admin.css">
    <?php
    if ($_SESSION['theme'] == THEME::$DARK) {
        echo '<link rel="stylesheet" href="../static/styles/dark-theme.css">';
    }
    ?>
</head>

<body>
<h1><?php echo $dictionary->ADMIN_PANEL ?></h1>

<div>
    <?php
    echo $dictionary->HI . " " . ($_SESSION['name'] ?: $dictionary->NAMELESS);
    ?>
</div>

<h2><?php echo $dictionary->SETTING ?></h2>
<form action="setting.php" method="post">
    <div>
        <?php echo $dictionary->THEME ?>: <br>
        <label>
            <input type="radio" name="theme"
                <?php
                if ($_SESSION['theme'] == THEME::$LIGHT) {
                    echo "checked";
                }
                ?>
                   value="light"
            >
            <?php echo $dictionary->LIGHT ?>
        </label>
        <label>
            <input type="radio" name="theme"
                <?php
                if ($_SESSION['theme'] == THEME::$DARK) {
                    echo "checked";
                }
                ?>
                   value="dark"
            >
            <?php echo $dictionary->DARK ?>
        </label>
    </div>

    <div>
        <?php echo $dictionary->LANGUAGE ?>: <br>
        <label>
            <input type="radio" name="language"
                <?php
                if ($_SESSION['language'] == LANGUAGE::$RU) {
                    echo "checked";
                }
                ?>
                   value="ru"
            >
            Русский
        </label>
        <label>
            <input type="radio" name="language"
                <?php
                if ($_SESSION['language'] == LANGUAGE::$EN) {
                    echo "checked";
                }
                ?>
                   value="en"
            >
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
<form enctype="multipart/form-data" action="pdf.php" method="POST">
    <input type="hidden" name="MAX_FILE_SIZE" value="300000" />
    <div>
        <?php echo $dictionary->SEND_THIS_FILE ?>:
        <label for="uploadbtn" class="uploadButton">
            <?php echo $dictionary->UPLOAD_FILE ?>
        </label>
        <div></div>
        <input
            style="opacity: 0; z-index: -1;"
            type="file" name="userfile" id="uploadbtn"
            onchange='document.querySelector(".uploadButton + div").innerHTML = Array.from(this.files).map(f => f.name).join("<br />")'
        />
    </div>
    <input type="submit" value="<?php echo $dictionary->SEND_FILE ?>" />
</form>

<h3><?php echo $dictionary->UPLOADING_FILES ?></h3>

<?php
$files = array_diff(scandir($uploaddir), array('.', '..'));

echo "<ul>";
foreach ($files as $file_name) {
    echo "<li><a href=\"/uploads/{$file_name}\">{$file_name}</a></li>";
}

echo "</ul>";
?>


<h2><?php echo $dictionary->ADMINISTRATORS ?></h2>
<form action="../api/methods/addUserMethod.php" method="post">
    <p><?php echo $dictionary->LOGIN ?>: <input type="text" name="name" /></p>
    <p><?php echo $dictionary->PASSWORD ?>: <input type="password" name="password" /></p>
    <p><button type="submit"><?php echo $dictionary->SEND ?></button></p>
</form>

<?php

$mysqli = new mysqli("db", "user", "password", "appDB");
$result = $mysqli->query("SELECT * FROM users");
echo "<ul>";
foreach ($result as $row) {
    echo "<li>";

    echo "<a href=\"/admin/delete_users.php?ID={$row['ID']}\">";
    echo "X";
    echo "</a>";

    echo "{$row['ID']} {$row['name']}</li>";
}
echo "</ul>";
?>

<h2><?php echo $dictionary->INTERESTING_FACTS ?></h2>
<form action="../api/methods/addToolsItemMethod.php" method="post">
    <p><?php echo $dictionary->TITLE ?>: <input type="text" name="title" /></p>
    <p><?php echo $dictionary->TEXT ?>: <textarea type="text" name="text"></textarea></p>
    <p><?php echo $dictionary->URL_VIDEO ?>: <input type="text" name="url_video" /></p>
    <p><button type="submit"><?php echo $dictionary->SEND ?></button></p>
</form>

<?php
$mysqli = new mysqli("db", "user", "password", "appDB");
$result = $mysqli->query("SELECT * FROM workers");
echo "<ul>";
foreach ($result as $row) {
    echo "<li>";

    echo "<a href=\"../api/methods/deleteUserMethod.php?ID={$row['ID']}\">";
    echo "X";
    echo "</a>";

    echo "{$row['ID']} {$row['title']} {$row['url_video']}<div>{$row['text']}</div></li>";
}
echo "</ul>";
?>

</body>

</html>