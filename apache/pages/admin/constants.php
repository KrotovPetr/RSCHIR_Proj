<?php


class LANGUAGE {
    public static $RU = "ru";
    public static $EN = "en";
}

class THEME {
    public static $LIGHT = "light";
    public static $DARK = "dark";
}

abstract class ABS_DICTIONARY {
    public $ADMIN_PANEL;

    public $HI;

    public $SETTING;
    public $THEME;
    public $LIGHT;
    public $DARK;
    public $LANGUAGE;
    public $NAME;
    public $UPDATE;

    public $ADMINISTRATORS;
    public $LOGIN;
    public $PASSWORD;

    public $SEND;

    public $INTERESTING_FACTS;
    public $TITLE;
    public $TEXT;
    public $URL_VIDEO;

    public $NAMELESS;

    public $SEND_THIS_FILE;
    public $UPLOAD_FILE;
    public $SEND_FILE;
    public $UPLOADING_FILES;
}

class RUS_DICTIONARY extends ABS_DICTIONARY {
    public $ADMIN_PANEL = "Административная панель";

    public $HI = "Привет";

    public $SETTING = "Настройки";
    public $THEME = "Тема";
    public $LIGHT = "Светлая";
    public $DARK = "Тёмная";
    public $LANGUAGE = "Язык";
    public $NAME = "Имя";
    public $UPDATE = "Изменить";

    public $ADMINISTRATORS = "Администраторы";
    public $LOGIN = "Логин";
    public $PASSWORD = "Пароль";

    public $SEND = "Отправить";

    public $INTERESTING_FACTS = "Интересные факты";
    public $TITLE = "Название";
    public $TEXT = "Текст";
    public $URL_VIDEO = "url видео";

    public $NAMELESS = "Безымянный";

    public $SEND_THIS_FILE = "Отправить этот файл";
    public $UPLOAD_FILE = "Загрузить файл";
    public $SEND_FILE = "Отправить файл";
    public $UPLOADING_FILES = "Загруженные файлы";
}

class ENG_DICTIONARY extends ABS_DICTIONARY {
    public $ADMIN_PANEL = "ADMIN PANEL";

    public $HI = "Hi";

    public $SETTING = "Setting";
    public $THEME = "Theme";
    public $LIGHT = "Light";
    public $DARK = "Dark";
    public $LANGUAGE = "Language";
    public $NAME = "Name";
    public $UPDATE = "Update";

    public $ADMINISTRATORS = "Administrators";
    public $LOGIN = "Login";
    public $PASSWORD = "Password";

    public $SEND = "Send";

    public $INTERESTING_FACTS = "Interesting facts";
    public $TITLE = "Title";
    public $TEXT = "Text";
    public $URL_VIDEO = "url video";

    public $NAMELESS = "Nameless";
    public $SEND_THIS_FILE = "Send this file";
    public $UPLOAD_FILE = "Upload file";
    public $SEND_FILE = "Send file";
    public $UPLOADING_FILES = "Uploading files";
}

$DICTIONARY = [
    "ru" => new RUS_DICTIONARY,
    "en" => new ENG_DICTIONARY,
];


$uploaddir = '/var/www/uploads/';
$uploadfile = $uploaddir.basename($_FILES['userfile']['name']);
?>