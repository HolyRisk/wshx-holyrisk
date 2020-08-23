<?php

return [
    /**
     * DB数据库服务器集群
     */
        //服务标记
        'default' => array(
            // 默认数据连接标识
            'default'     => 'mysql',
            // 数据库连接信息
            'connections' => [
                'mysql' => [
                    // 数据库类型
                    'type'     => 'mysql',
                    // 主机地址
                    'hostname' => 'localhost',
                    // 用户名
                    'username' => 'root',
                    // 数据库密码
                    'password'    => 'root',
                    // 数据库连接端口
                    'hostport'    => '',
                    // 数据库名
                    'database' => 'aaa',
                    // 数据库编码默认采用utf8
                    'charset'  => 'utf8mb4',
                    // 数据库表前缀
                    'prefix'   => '',
                    // 数据库调试模式
                    'debug'    => true,
                    //是否开启断线重连
                    'break_reconnect' => true,
                ],
            ],
        )
];