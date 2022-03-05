# web-app-laravel

php 版本：php-8.1.3-nts
> 实际项目目录在 src 目录下，注意相关命令的执行路径
---

1. 把 nova 和 spark-stripe 两个私有项目文件夹放入 `src/laravel_modules` 中
2. 使用命令 `touch src/database/database.sqlite` 创建 src/database/database.sqlite 空文件 
    > 为方便开发运行，目前使用的是 sqlite 数据库，可以在 `src/.env` 中修改`DB_CONNECTION` 字段进行变换要连接的数据库
3. 执行如下命令启动服务
````
cd src  #进入src目录

composer install

php artisan migrate #数据迁移生成数据库和种子数据

php artisan serve #启动服务
````
4. 项目启动目录为 `src/public`，支持 Apache 或 Nginx 启动。

主页访问地址为:http://localhost:8000,  
Nova 控制台访问地址为: http://localhost:8000/nova/dashboards/main

要测试网站后台功能，可通过注册页面注册任意用户，然后登录后台管理页面。
