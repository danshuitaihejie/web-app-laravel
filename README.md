# web-app-laravel

php版本：php-8.1.3-nts
1. 把 nova 和 spark-stripe 两个项目文件夹放入 src\laravel_modules 中
2. 创建 src\database\database.sqlite 空文件 //为方便开发运行，目前使用的是sqlite数据库，可以在 src/.env 中修改DB_CONNECTION字段进行变换要连接的数据库
3. 执行cmd
````
>cd src  //进入src目录

>composer install

>php artisan migrate //数据迁移生成数据库和种子数据

>cd sequence-viewer && yarn install && yarn build && yarn cp

>Manually update the js/css hash in `resources/views/diagrams/show.blade.php` to be the same as `sequence-viewer/dist/index.html`

>php artisan serve //启动服务
````
4. 项目启动目录为 src\public，支持 Apache 或 Nginx 启动。
5. 主页访问地址为:http://localhost:8000, Nova控制台访问地址为: http://localhost:8000/nova/dashboards/main
