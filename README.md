# web-app-laravel

php 版本：php-8.1.3-nts
> 实际项目目录在 src 目录下，注意相关命令的执行路径
---
0. 切换工作目录到 `src` 目录 `cd scr`
1. 把 `nova` 和 `spark-stripe` 两个私有项目文件夹放入 `laravel_modules` 中
2. 使用命令 `touch database/database.sqlite` 创建 `database/database.sqlite` 空文件，方便本地测试 
3. 复制 `.env.example` 到 `.env` ，并修改 `DB_CONNECTION` 为 `sqlite`, 注释掉 `DB_DATABASE` 字段，如果必要`DB_DATABASE`需要设置为`database.sqlite` 的绝对路径，不得设置相对路径。
4. 安装依赖 `composer install`
5. 写入数据库和种子数据 `php artisan migrate`
6. 启动服务 `php artisan serve`

项目启动后 root 目录为 `src/public`，支持 Apache 或 Nginx 启动。

主页访问地址为:http://localhost:8000

Nova 控制台访问地址为: http://localhost:8000/nova/dashboards/main

要测试网站后台功能，可通过注册页面注册任意用户，然后登录后台管理页面。
