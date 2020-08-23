<?php
/**
 * @description 小说名称信息概要 模型
 * @author Holyrisk
 * @date 2020/8/23 9:43
 */

namespace app\spider\model;

use think\Model;

class Book extends Model
{

    //使用模型查询后，想获取不包含对象内容的数组结构的结果
    //protected $resultSetType = 'collection';

    /**
     * @description 获取 小说 列表
     * @author Holyrisk
     * @date 2020/8/23 7:07
     * @param int $status
     * @return array
     */
    public static function getListStatus($status = 0)
    {
        try{
            $res = self::where('status','=',$status)->select()->toArray();
        }catch (\Exception $exception)
        {
            $res = [];
        }
        return $res;
    }


}