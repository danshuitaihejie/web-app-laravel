# web-app-laravel

php 版本：php-8.1.3-nts
node 版本：node v16.14.0 lts/gallium

---
## 文档

更多项目概念设定相关文档见：[传送门](https://zenuml.atlassian.net/wiki/spaces/ZEN/pages/1653014543/New+Web+Site)

---
## 本地开发环境配置
1. 把 `nova` 和 `spark-stripe` 两个私有项目文件夹放入 `laravel_modules` 中；
2. 使用命令 `touch database/database.sqlite` 创建 `database/database.sqlite` 空文件，方便本地测试；
3. 复制 `.env.example` 到 `.env` ，
    1. 修改 `DB_CONNECTION` 为 `sqlite`, 注释掉 `DB_DATABASE` 字段，（如果必要`DB_DATABASE`需要设置为`database.sqlite` 的绝对路径，不得设置相对路径）；
    2. 修改 Nova后台 admin 用户邮箱`ADMIN_USER_Email` 和密码`ADMIN_USER_PASSWORD`
4. 安装依赖 `composer install` 以及 `npm install`；
5. 写入数据库和种子数据 `php artisan migrate --seed`；
6. 编译 UML 内核 `npm run build-sequence-core`；
7. 使用 Laravel Mix 编译 css 和 js 资源 `npm run production`；
8. 启动服务 `php artisan serve`。

项目启动后 root 目录为 `src/public`，支持 Apache 或 Nginx 启动。

主页访问地址为: http://localhost:8000

Diagrams home page: http://localhost:8000/diagrams

Nova 控制台访问地址为: http://localhost:8000/nova/dashboards/main


> **注意**：每次修改 resources 目录下模板文件后，都需要使用 Laravel Mix 重新编译资源文件，以确保页面正常显示，或参考下文开启热更新功能。

### Web UI 开发可开启热更新：
在正常启动 PHP 服务后，可执行 `npm run hot` 命令开启热更新。开启后会弹出新的网页，端口默认为 3000，是原本 8000 的反向代理，该代理会自动监控所有 View 的变更并自动刷新页面。

### sequence 脚本 Hash 同步：
在 `utils/sequence-hash-matcher.js` 中，实现了一个自动同步 `sequence-viewer/dist/index.html` 到 `resources/views/diagrams/show.blade.php` 的功能，如果修改了相关格式，记得去改这个脚本。该脚本不需要手动执行，它已经在 `packages.json` 中设置为 `build-sequence-core` 的 post script 了。

### 前台页面权限判断:
权限的定义请参考或更新：[RolesAndPermissionsSeeder.php](https://github.com/ZenUml/web-app-laravel/blob/5652de1e843668edb687f932f75f72981bb019e2/database/seeders/RolesAndPermissionsSeeder.php)
```
@role('editor')
I am a editor!
@else
I am not a editor...
@endrole


@hasrole('editor')
I am a writer!
@else
I am not a editor...
@endhasrole


@can('edit diagram') // 拥有某个权限 可执行操作
//
@endcan
```
---

> ⚠️ **注意**：
>
>1、每次 pull 新的代码后，推荐执行步骤 4-7 以确保动态生成的依赖数据为最新，这些数据不会提交到代码仓库。
>
>2、每次 push 代码前，请运行 `php artisan test`，以确保更新后的代码不会影响到之前已通过测试的功能 。
