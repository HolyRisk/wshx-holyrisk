<?php
/**
 * @description 路由解析
 * @author Holyrisk
 * @date 2020/7/3 5:33
 */

namespace library\core;


class Route
{
    /**
     * Route constructor.
     */
    public function __construct()
    {

    }

    /**
     * @description websocket 格式
     * @author Holyrisk
     * @date 2020/7/3 5:35
     */
    public function websocket()
    {

    }

    /**
     * @description API
     * @author Holyrisk
     * @date 2020/7/3 5:35
     */
    public function api()
    {
        $uri= $_SERVER["REQUEST_URI"];
        $info = parse_url($uri);
        if (isset($info['path']))
        {
            $path = $info['path'];
            var_dump($path);
        }
    }

    /**
     * @description 解析
     * @author Holyrisk
     * @date 2020/7/3 5:35
     */
    public function run()
    {

    }

}