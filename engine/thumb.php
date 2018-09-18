<?
/* ВАЖНО */
/* Вначале необходимо создать директорию для хранения миниатюр */

/* Параметры */
// Каталог для хранения миниатюр
$path_thumbs = 'gallery_img/small/';
// Минимальный размер миниатюры (ширина)
$size_min = 1;
// Размер миниатюры по умолчанию (ширина)
$size_def = 40;
// Максимальный размер миниатюры (ширина)
$size_max = 1600;
// Время актуальности кэша миниатюры 
$cache_lifetime = 84000 * 30; 
// Значение id по умолчанию
$id_def = 0;

// Проверяем наличие параметра с полным путем к картинке
if ( isset($_GET['gallery_img/big/']) )
	$f = (string) $_GET['gallery_img/big/'];
// Если параметра нет, то выходим
else
	exit;

// Получаем информацию о пути
$path_parts = pathinfo($f);

// Получаем родительский каталог,
// где хранится картинка
$path_images = $path_parts['dirname'];
// Получаем полное название картинки
$f = $path_parts['basename'];
// Разбираем название файла
$image_filename = basename($f,'.'.$path_parts['extension']);
$image_extension = $path_parts['extension'];

// Проверяем, что название картинки состоит из символов, тире и цифр
// Вы можете удалить эту проверку, 
// например, в случае если вы используете кириллицу
if ( !preg_match('/^([a-zA-Z0-9-_\.]{1,100})$/', $f) ) exit;

// Получаем ширину файла
if ( isset($_GET['100']) )
	$s = (int) $_GET['100'];
else 
	$s = $size_def;
// Проверяем ограничение минимального размера миниатюры
if ( $s < $size_min ) 
	$s = $size_min;
// Проверяем ограничение максимального размера миниатюры
if ( $s > $size_max ) 
	$s = $size_max;

// Используем id статьи как унификатор
if ( isset($_GET['id']) ) 
	$id = (int) $_GET['id'];
else 
	$id = $id_def;
// Идентификатор не может быть отрицательным
if ($id < 0) 
	$id = $id_def;

// Проверка наличия встроенной функции для получения типа
if ( !function_exists('mime_content_type') ) {
	function mime_content_type($f) {
		$extension = pathinfo($f, PATHINFO_EXTENSION);
		$extension = strtolower($extension);
		switch ( $extension ) {
			case 'jpg':
			case 'jpeg': return 'image/jpeg'; break;
			case 'png':
			case 'gif': return 'image/'. $extension; break;
		}
	}
}

// Формируем физический путь к миниатюре
$file_thumb = $_SERVER['DOCUMENT_ROOT'] . '/' . $path_thumbs . $image_filename .'-thumb-' . $id . '-' . $s .'.'. $image_extension;

// Если файл с миниатюрой существует
if ( file_exists($file_thumb) ) {
	$cache_modified = time() - @filemtime($file_thumb);
	// Если время кэширования картинки не истекло,
	// то возвращаем картинку
	if ( $cache_modified < $cache_lifetime ) {
		// Время последнего изменения
		header('Last-Modified: '. gmdate('D, d M Y H:i:s', filemtime($file_thumb)) .' GMT', true, 200);
		// Длина
		header('Content-Length: '. filesize($file_thumb));
		// Тип
		header('Content-Type: '. mime_content_type($file_thumb));
		// Кэщирование
		header("Cache-Control: public");
		header("Expires: " . date("r", @filemtime($file_thumb) + $cache_lifetime));
		echo file_get_contents($file_thumb);
		exit;
	}
}

// Формируем физический путь к картинке
$file_image = $_SERVER['DOCUMENT_ROOT'] . '/' . $path_images .'/'. $f;

// Если картинка существует,
// то создаем миниатюру
if ( file_exists($file_image) ) {
	// Получаем размеры и тип файла
	$is = getimagesize($file_image);
	// Если файл не является изображением,
	// то ничего не возвращаем
	if ( $is === false ) 
		exit;

	// В соответствии с типом получаем картинку
	switch ( $is[2] ) {
		case 1: 
			$image = imagecreatefromgif($file_image); 
			break;
		case 2: 
			$image = imagecreatefromjpeg($file_image); 
			break;
		case 3: 
			$image = imagecreatefrompng($file_image); 
			break;
		default: 
			exit; 
			break;
	}

	// Считаем коэффициент для изменения размера высоты
	$coefficient = $s / $is[0] ;

	// Если ширина картинки больше требуемой
	if ( $is[0] > $s ) {
		$th_width = $s;
		$th_height = floor($is[1] * $coefficient); 
		$thumb = imagecreatetruecolor($th_width, $th_height);
		imagecopyresampled($thumb, $image, 0, 0, 0, 0, $th_width, $th_height, $is[0], $is[1]);
	} 
	// Иначе отдаем картинку "как есть"
	// Примечание: Увеличение картинки в большинстве случаев сделает ее некрасивой.
	// Поэтому лучше заменить слишком мелкую картинку и затем заменить ее большой.
	// Например, из картинки 16х16 врядли получится нормальная картинка 200х200
	else {
		$thumb = $image;
	}

	// Сохраняем файл, в соответствии с типом
	switch ( $is[2] ) {
		case 1: 
			imagegif($thumb, $file_thumb); 
			break;
		case 2: 
			imagejpeg($thumb, $file_thumb); 
			break;
		case 3: 
			imagepng($thumb, $file_thumb); 
			break;
		default: 
			exit; 
			break;
	}

	file_get_contents($file_thumb);
    $images = array_splice(scandir(IMG_SMALL),2);
}
