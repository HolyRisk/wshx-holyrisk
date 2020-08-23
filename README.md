# wshx-holyrisk
Holyrisk create project,Avoid developing used code multiple times！



一些开发、学习过程中写的类库、存档，避免浪费时间重复造轮子。

网站地址：

[云天阁](https://wangshengxian.com/)



| 路径    | 执行命令           | 功能                                                | 备注                                  |
| ------- | ------------------ | --------------------------------------------------- | ------------------------------------- |
| /public | php biqugeList.php | 读取  book 表，爬取小说章节目录列表入库             | 计划任务模式运行 如定时 1分钟运行一次 |
| /public | php biqugeData.php | 读取  book_list 表，爬取对应小说的章节详情内容 入库 | 计划任务模式运行 如定时 1分钟运行一次 |

注意：

此功能为小说采集、包含三张表

1.  book 小说信息概要
2. book_list 小说章节目录列表
3. book_content 小说章节内容详情

数据库文件 已经导出 /data/sql/aaa.sql