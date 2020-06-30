# composer使用说明

composer 有两种方式启用本镜像服务

- **系统全局配置：** 即将配置信息添加到 Composer 的全局配置文件 `config.json` 中。见方法一
- **单个项目配置：** 将配置信息添加到某个项目的 `composer.json` 文件中。见 方法二

### **方法一：** 修改 composer 的全局配置文件**（推荐方式）**

打开命令行窗口（windows用户）或控制台（Linux、Mac 用户）并执行如下命令：

```
composer config -g repo.packagist composer https://packagist.phpcomposer.com
```

### **方法二：** 修改当前项目的 `composer.json` 配置文件：

打开命令行窗口（windows用户）或控制台（Linux、Mac 用户），进入你的项目的根目录（也就是 `composer.json` 文件所在目录），执行如下命令：

```
composer config repo.packagist composer https://packagist.phpcomposer.com
```



上述命令将会在当前项目中的 `composer.json` 文件的末尾自动添加镜像的配置信息（你也可以自己手工添加）：

```
"repositories": {
    "packagist": {
        "type": "composer",
        "url": "https://packagist.phpcomposer.com"
    }
}
```

OK，一切搞定！试一下 `composer install` 来体验飞一般的速度吧！ 、



来自 Packagist 镜像使用方法

<https://pkg.phpcomposer.com/>