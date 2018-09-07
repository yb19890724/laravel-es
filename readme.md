## 前言

  这个小项目主要是为了学习elasticsearch Api，前端非常简单，因为重心不在前端。主要已实现功能为主，代码没有过多的优化。给大家提供了简单的数据，后期不定期维护开发过程中遇到个小插曲。

## 功能
简单搜索，嵌套搜索，定位功能，聚合操作。

## 安装
```php
   composer update 
```
## 执行命令
+ 简单方式
```php
php artisan laraveles
```
+ 按步骤来
```php
php artisan migrate 
php artisan elastic:create-index App\Es\Index\ProductIndexConfigurator 
php artisan elastic:create-index App\Es\Index\CategoryIndexConfigurator
php artisan elastic:create-index App\Es\Index\ShopIndexConfigurator
php artisan migrate
php artisan db:seed
```
+ 安装js扩展
```js
npm install
npm run dev
```

## 修改配置  .env

DB_HOST=
DB_PORT=
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=
SCOUT_DRIVER=elastic                                #scout驱动
SCOUT_ELASTIC_HOST=localhost:9200      #es host

## 界面

访问:yourhost/dashboard

