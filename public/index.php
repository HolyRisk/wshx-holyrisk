<?php
/**
 * @description 执行入口
 * @author Holyrisk
 * @date 2020/6/30 12:22
 */

//定义 项目根目录
define('DS', DIRECTORY_SEPARATOR);
defined('APP_PATH') or define('APP_PATH', dirname($_SERVER['SCRIPT_FILENAME']) . DS);
defined('ROOT_PATH') or define('ROOT_PATH', dirname(realpath(APP_PATH)) . DS);
defined('VENDOR_PATH') or define('VENDOR_PATH', ROOT_PATH . 'vendor' . DS);
//执行 毫秒值 可 通过时间差 减去此值 获取执行时间差额
define('START_TIME', microtime(true));
define('START_MEM', memory_get_usage());

require VENDOR_PATH.'autoload.php';

use app\Test;

$obj = new Test();
$obj->aa();
