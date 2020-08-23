<?php


namespace app\spider\model;

use think\Model;

class BookList  extends Model
{

    /**
     * @description 更新 待爬取的小说 章节 状态
     * @author Holyrisk
     * @date 2020/8/23 7:33
     * @param $id
     * @param int $read
     * @return BookList
     */
    public function updateRead($id,$read = 2)
    {
        $arr = [
            'read' => $read,
        ];
        $res = self::update($arr,['id'=> $id]);
        return $res;
    }
    /**
     * @description 获取 待爬取的小说 章节
     * @author Holyrisk
     * @date 2020/8/23 7:07
     * @param int $read
     * @return array
     */
    public function getListRead($read = 1)
    {
        try{
            $res = self::where('read','=',$read)->with('book')->select()->toArray();
        }catch (\Exception $exception)
        {
            $res = [];
        }
        return $res;
    }

    /**
     * @description 判断 此文章章节是否插入过
     * @author Holyrisk
     * @date 2020/8/23 7:01
     * @param $book_id
     * @param $url
     * @return int
     */
    public function isInsertBook($book_id,$url)
    {
        $data = self::where('book_id','=',$book_id)->where('url','=',$url)->count();
        return $data;
    }

    /**
     * @description 统计 小说 有多少章节
     * @author Holyrisk
     * @date 2020/8/23 6:56
     * @param $book_id
     * @return int
     */
    public function countBook($book_id)
    {
        $count = self::where('book_id','=',$book_id)->count();
        return $count;
    }

    public function book()
    {
        return $this->belongsTo(Book::class,'book_id');
    }

}