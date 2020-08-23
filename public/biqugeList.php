<?php
/**
 * @description 爬取笔趣阁 小说  入口 [章节列表]
 * @author Holyrisk
 * @date 2020/6/30 12:22
 */

/**
 * 定义入口
 */
require dirname(__DIR__).'/library/core/start.php';
require VENDOR_PATH.'autoload.php';

use library\core\config\Config;
use think\facade\Db;
$config = new Config();

$configDb = $config::get('database',null,'default');
Db::setConfig($configDb);

\app\spider\command\Run::biqugeList();