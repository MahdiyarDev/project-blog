<?php
declare(strict_types=1);
require_once __DIR__ . '/vendor/autoload.php';

use Core\App;
use Core\DataBase;
use Core\ErrorHandler;
use Core\View;          
use App\Services\Auth;

set_exception_handler([ErrorHandler::class , 'HandleException']);
set_error_handler([ErrorHandler::class , 'HandleError']);
$config = require_once __DIR__ . '/config.php';

App::bind('config', $config);
App::bind('database', new DataBase($config['database']));

session_start();                           
View::share('user', Auth::user()); 