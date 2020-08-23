<?php
/**
 * @description 命令行启动脚本 入库
 * @author Holyrisk
 * @date 2020/8/23 9:50
 */

namespace app\spider\command;

use app\spider\model\Book;
use app\spider\model\BookContent;
use app\spider\model\BookList;

class Run
{

    /**
     * @description 笔趣阁 章节列表
     * @author Holyrisk
     * @date 2020/8/23 9:51
     */
    public static function biqugeList()
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
     * @description 笔趣阁 章节详情
     * @author Holyrisk
     * @date 2020/8/23 9:52
     */
    public static function biqugeData()
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