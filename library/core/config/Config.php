<?php

namespace library\core\config;

class Config
{

    /**
     * @var array 获取的配置参数
     */
    private static $config = [];

    /**
     * @var string 设置默认值
     */
    protected static $arrKey = 'default';

    /**
     * @description 获取 配置
     * @author Holyrisk
     * @date 2019/12/18 12:12
     * @param string $fileName 指定的配置文件 | 最外层 必须 是 数组
     * @param string $arrKey 获取配置数组的 key | 二级配置
     * @param string $fileKey 获取配置文件的 key | 一级配置
     * @return array|mixed
     */
    public static function get($fileName = 'database',$arrKey = '',$fileKey = 'default')
    {
        $config = [];
        //获取  配置
        $arr = self::requestData($fileName);
        if (!empty($arr))
        {
            //过滤
            //$checkArr = self::check();
            $checkArr = $arr;
            if (!empty($checkArr))
            {
                if (!empty($fileKey))
                {
                    //获取指定的 key
                    //判断 key 是否 存在
                    if (isset($checkArr[$fileKey]))
                    {
                        $fileArr = $checkArr[$fileKey];
                        if (!empty($arrKey))
                        {
                            if (isset($fileArr[$arrKey]))
                            {
                                $config = $fileArr[$arrKey];
                            }
                        }
                        else
                        {
                            $config = $fileArr;
                        }
                        unset($fileArr);
                    }
                }
                else
                {
                    $config = $checkArr;
                }
            }
            unset($checkArr);
        }
        return $config;
    }

    /**
     * @description 导入配置文件
     * @author Holyrisk
     * @date 2019/12/17 19:40
     * @param string $fileName
     * @return array|mixed
     */
    protected static function requestData($fileName = 'database')
    {
        $pathConfig = ROOT_PATH . DS . 'config' . DS . $fileName.'.php';
        if (isset(self::$config[$fileName]) == false)
        {
            if (is_file($pathConfig))
            {
                $config = require_once $pathConfig;
                if (is_array($config))
                {
                    self::$config[$fileName] = $config;
                }
                unset($config);
            }
        }
        return self::$config[$fileName];
    }

}