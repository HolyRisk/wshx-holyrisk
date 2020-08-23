<?php
/**
 * @description 笔趣阁 小说 爬取  https://www.236n.cn/
 * @author Holyrisk
 * @date 2020/8/23 9:47
 */

namespace app\spider\biquge;

use app\spider\model\BookContent;
use app\spider\model\BookList;
use phpspider\core\phpspider;
use phpspider\core\requests;
use phpspider\core\selector;
use think\facade\Db;

class GetSpider
{

    /**
     * @description 小说章节目录列表 入库
     * @author Holyrisk
     * @date 2020/8/23 9:48
     * @param $book
     * @return array|string
     */
    public function run($book)
    {
        $model = new BookList();

        $res = $this->getDataList($book['url']);
        $count = $model->countBook($book['id']);

        //标题 list_a
        $list_a = $res['list_a'];
        //链接 list_href
        $list_href = $res['list_href'];
        if ($count == 0)
        {
            if (count($list_a) > 9)
            {
                $i = 0;
                foreach ($list_a as $key => $value)
                {
                    if ($key<9)
                    {
                        continue;
                    }
                    else
                    {
                        $i ++;
                        $insertArr = [
                            'book_id' => $book['id'],
                            'name' => $value,
                            'url' => $list_href[$key],
                            'sort' => $i,
                        ];
                        $model->insert($insertArr);
                        unset($insertArr);
                    }
                }
                return "爬取成功";
            }
            //没有爬取过
            return "未更新到 9章 章节，不支持爬取";
        }
        else
        {
            $k_c = count($list_a)-9;
            if ( $k_c > $count)
            {
                $i = 0;
                $k = 0;
                foreach ($list_a as $key => $value)
                {
                    if ($key<9)
                    {
                        continue;
                    }
                    else
                    {
                        $i ++;
                        //判断是否插入过
                        $isData = $model->isInsertBook($book['id'],$list_href[$key]);
                        if ($isData == 0)
                        {
                            continue;
                        }
                        else
                        {
                            $k++;
                            $insertArr = [
                                'book_id' => $book['id'],
                                'name' => $value,
                                'url' => $list_href[$key],
                                'sort' => $i,
                            ];
                            Db::name('book_list')->insert($insertArr);
                            unset($insertArr);
                        }
                    }
                }
                return "更新了 $k 章  章节";
            }
            else
            {
                return "没有数据更新";
            }
        }
        return $res;

    }

    /**
     * @description 小说文章内容详情 入库
     * @author Holyrisk
     * @date 2020/8/23 9:48
     * @param $book
     * @return int|string
     */
    public function runData($book)
    {
        $url = $book['book']['domain'].$book['url'];
        $res = $this->getData($url);
        $insertArr = [
            'book_list_id' => $book['id'],
            'name' => $res['title'],
            'data' => $res['data'],
            'url' => $url,
        ];

        $model = new BookContent();
        $isInsert = $model->insert($insertArr);
        return $isInsert;
    }

    /**
     * @description 获取小说 章节列表目录
     * @author Holyrisk
     * @date 2020/8/23 5:34
     * @param $url 要采集的小说 章节列表页面
     * @return array
     */
    public function getDataList($url)
    {
        //$url= 'https://www.236n.cn/3_3385/';
        //获取目标 网页
        $html = requests::get($url);
        //获取 标题
        //$title = selector::select($html, '@<title>(.*?)</title>@', "regex");
        $title = selector::select($html, '//title');
        $str = '无弹窗_笔趣阁';
        $title = str_replace($str,'',$title);
        //
        //var_dump($title);
        //$data = selector::select($html, "#list >dl", "css");
        // 获取id为demo的div内容
        //$data = selector::select($html, "//div[contains(@id,'list')]");
        $hrefA = selector::select($html, '//div[@id="list"]/dl/dd/a');
        $href = selector::select($html, '//div[@id="list"]/dl/dd/a/@href');
        return ['title' => $title,'list_a' => $hrefA,'list_href' => $href];
    }

    /**
     * @description 获取小说 文章内容详情
     * @author Holyrisk
     * @date 2020/8/23 5:52
     * @param $url
     * @return array
     */
    public function getData($url)
    {
        $html = requests::get($url);
        $title = selector::select($html, '//title');
        $str = '_笔趣阁';
        $title = str_replace($str,'',$title);
        $data = selector::select($html, '//div[@id="content"]');
        return ['title' => $title,'data' => $data];
    }

}