# php-cc

#### 介绍
PHP code check
利用git hook、phplint、phpcs，在code commit的时候对php代码进行语法检测、代码风格检查，如果有问题，不允许提交。


#### 使用
composer require zhenggui/php-cc

安装成功之后执行:   ```./vendor/bin/phpcc```  ,该命令会检查phplint、phpcs的安装情况,并将git原有的pre-commit钩子备份,再将php-cc的pre-commit钩子拷贝至```.git/hooks```中。

这样,在git commit之前,就会执行phplint和phpcs检查待提交的文件,如果不满足要求,则会组织代码提交。

#### 注意事项
1. 建议使用最新版本,最新版本可以在仓库的tags中查看;
2. 包以提交到packagist,但是国内安装比较慢,推荐自建composer的repository来安装。

#### 更新日志
- v1.0:初始版本
- v1.1:修复composer安装bug
- v1.2:设定默认的phpcs standard为psr2

#### todolist
- 识别文件格式,php文件才进行check
- 支持配置phpcs standard
- 支持分别启用/关停 phplint和phpcs
- 支持自定义phplint和phpcs的命令所在目录
