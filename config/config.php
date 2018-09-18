<?php
define('SITE_ROOT', __DIR__ . "/../");
define('LIB_DIR', SITE_ROOT . 'engine/');

//подгружаем логику галереи
require_once(LIB_DIR . 'gallery.php');
require_once(LIB_DIR . 'funcImgResize.php');
