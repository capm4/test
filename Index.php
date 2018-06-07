<?php




session_start();
define('APP_MODE', 'DEBUG');
define('SITE_ROOT', realpath(dirname(__FILE__)));
define('PATHROOT', __DIR__);
require PATHROOT . '/vendor/autoload.php';

use App\Framework\App;

$start = new App();
$start->run();

