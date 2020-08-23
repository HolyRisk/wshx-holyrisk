<?php
/**
 * @description 执行处理
 * @author Holyrisk
 * @date 2020/7/3 5:25
 */

namespace library\core;

use app\spider\GetSpider;
use app\spider\model\BookContent;
use app\spider\model\BookList;
use app\spider\model\Book;

class App
{

    public static function run()
    {
        echo  "执行";
    }

    /**
     * @description 爬取 列表
     * @author Holyrisk
     * @date 2020/7/3 5:28
     */
    public static function runList()
    {
        $list = Book::getListStatus();
        if (empty($list))
        {
            echo date("Y-m-d H:i:s",time()).' 没有需要处理的数据'.PHP_EOL;
            sleep(5);
            self::runList();
        }
        else
        {
            foreach ($list as $key => $value)
            {
                switch ($value['type'])
                {
                    case 0:
                        $obj = new  GetSpider();
                        $res = $obj->run($value);
                        print_r($res);
                        break;
                    default:
                        break;
                }
                sleep(1);
            }

            sleep(60);
        }
    }

    /**
     * @description 爬取详情
     * @author Holyrisk
     * @date 2020/8/23 7:19
     */
    public static function runData()
    {
        $model = new BookList();
        $list = $model->getListRead();
        if (empty($list))
        {
            echo date("Y-m-d H:i:s",time()).' 没有需要处理的数据'.PHP_EOL;
            sleep(10);
            self::runData();
        }
        else
        {
            $contentModel = new BookContent();
            foreach ($list as $key => $value)
            {
                $isData = $contentModel->isInsert($value['id']);
                if (empty($isData))
                {
                    $obj = new  GetSpider();
                    $res = $obj->runData($value);
                }
                else
                {
                    $isData = $model->updateRead($value['id']);
                }
                sleep(1);
            }

            sleep(60);
        }
    }

}