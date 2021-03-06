# php-cc

#### 介绍
PHP code check
利用git hook、phplint、phpcs，在code commit的时候对php代码进行语法检测、代码风格检查，如果有问题，不允许提交。
目前仅支持Linux类系统上运行。

#### 安装&使用
composer require wowo-zZ/php-cc

安装成功之后执行:``./vendor/bin/phpcc install``该命令会检查phplint、phpcs的安装情况，并将git原有的pre-commit钩子备份，再将php-cc的pre-commit钩子拷贝至``.git/hooks``中。

这样，在git commit之前，就会执行phplint和phpcs检查待提交的文件，如果不满足要求，则会阻止代码提交。

#### 指令
|指令 (./vendor/bin/phpcc {指令}|用法|
|----|----|
|env|查看当前运行环境|
|install|安装php-cc|
|remove|移除php-cc|
|config|配置|

config指令参数
|参数|缩写|用法|
|----|----|----|
|--set|-s|设置配置变量的值|非必须，不传入的话默认是获取配置变量的值|
|--feild|-f|操作的字段的key|
|--value|-a|待设置的值|

#### 注意事项
1. 建议使用最新版本，最新版本可以在仓库的tags中查看;
2. 包已提交到packagist，但是国内安装比较慢，推荐翻墙安装。

#### 更新日志
- 1.0: 使用Symfony后重新发布

#### todolist
- 支持检测结果处理时的强制模式(不通过无法提交)/人工选择模式(可以选择是否提交)
- 支持phpcs过滤关键字，为了支持现有项目可能存在某些不便改造的代码风格
- 支持合并pre-commit中的已有操作
- 支持设定language：en & zh-cn
- 支持windows

#### 注意事项
phpcc的pre-commit会覆盖原有的pre-commit，但仍然会将它备份为pre-commit.bak.{timestamp}。所以之前有在pre-commit中插入操作，请谨慎安装。
