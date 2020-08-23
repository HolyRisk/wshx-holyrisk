<?php
/**
 * @description 框架 执行定义
 * @author Holyrisk
 * @date 2020/7/3 5:09
 */

//定义 项目根目录
define('DS', DIRECTORY_SEPARATOR);
define('APP_PATH', dirname($_SERVER['SCRIPT_FILENAME']) . DS);
define('ROOT_PATH', dirname(realpath(APP_PATH)) . DS);
define('VENDOR_PATH', ROOT_PATH . 'vendor' . DS);

//执行 毫秒值 可 通过时间差 减去此值 获取执行时间差额
define('START_TIME', microtime(true));
define('START_MEM', memory_get_usage());
ini_set('date.timezone', 'Asia/Shanghai'); // 'Asia/Shanghai' 为上海时区