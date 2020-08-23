<?php


namespace app\spider\model;

use think\Model;

class BookContent  extends Model
{

    /**
     * @description 判断此文章 有没有 爬取过
     * @author Holyrisk
     * @date 2020/8/23 7:27
     * @param $book_list_id
     * @return int
     */
    public function isInsert($book_list_id)
    {
        $data = self::where('book_list_id','=',$book_list_id)->count();
        return $data;
    }

}