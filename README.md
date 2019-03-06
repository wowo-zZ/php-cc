# php-cc

#### 介绍
PHP code check
利用git hook、phplint、phpcs，在code commit的时候对php代码进行语法检测、代码风格检查，如果有问题，不允许提交。


#### 使用
composer require zhenggui/php-cc

安装成功之后执行:``composer exec phpcc install``该命令会检查phplint、phpcs的安装情况，并将git原有的pre-commit钩子备份，再将php-cc的pre-commit钩子拷贝至``.git/hooks``中。

这样，在git commit之前，就会执行phplint和phpcs检查待提交的文件，如果不满足要求，则会组织代码提交。

#### 指令
|指令 (composer exec -v phpcc {指令}|用法|
|----|----|
|install|安装php-cc|
|remove|移除php-cc|
|config|配置|

#### 注意事项
1. 建议使用最新版本，最新版本可以在仓库的tags中查看;
2. 包以提交到packagist，但是国内安装比较慢，推荐自建composer的repository来安装。

#### 更新日志
- v1.0:初始版本
- v1.1:修复composer安装bug
- v1.2:设定默认的phpcs standard为psr2
- v1.3:bugfix(修复命令路径错误的问题)
- v1.4:bugfix(修复phpcs检查失败时返回成功的问题)
- v1.5:bugfix(修复phpcs，忽略warnings)
- v1.6:bugfix(修复exit位置问题)
- v1.7:支持Delete类型文件
- v1.8:支持remove php-cc，并将原有的pre-commit还原

#### todolist
- 支持配置phpcs standard
- 支持检测结果处理时的强制模式(不通过无法提交)/人工选择模式(可以选择是否提交)
- 支持phpcs过滤关键字，为了支持现有项目可能存在某些不便改造的代码风格
- 备份git的钩子时,使用时间,防止覆盖已有的备份
- 支持配置项的查看
- ~~识别文件格式，php文件才进行check~~
- ~~支持分别启用/关停 phplint和phpcs~~
- ~~支持自定义phplint和phpcs的命令所在目录~~
- ~~支持关闭phpcc，并将pre-commit还原~~
- ~~支持phpcc配置~~
- ~~使用项目绝对路径替代相对路径~~
- ~~包依赖中加入phplint和phpcs检查~~
- ~~pre-commit中增加对命令的检查~~

#### 注意事项
phpcc的pre-commit会覆盖原有的pre-commit，但仍然会将它备份为pre-commit.bak。所以之前有在pre-commit中插入操作，请谨慎安装。
