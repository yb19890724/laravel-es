## 前言

  这个小项目主要是为了学习elasticsearch Api，前端非常简单，因为重心不在前端。主要实现功能为主，代码没有过多的优化。给大家提供了简单的数据，后期不定期维护，开发过程中遇到个小插曲。
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

![1p pto q x9uqr jt o ipu](https://user-images.githubusercontent.com/21005459/45195269-49030b00-b289-11e8-8085-5a89008989f7.png)

![1536286882 1](https://user-images.githubusercontent.com/21005459/45195274-502a1900-b289-11e8-9f0c-3a5759beb0ff.jpg)

![1536286894 1](https://user-images.githubusercontent.com/21005459/45195280-53250980-b289-11e8-998b-97ceb633ad32.jpg)

![1536286916 1](https://user-images.githubusercontent.com/21005459/45195284-57512700-b289-11e8-98da-1cc0c73a7729.jpg)

![1536286933 1](https://user-images.githubusercontent.com/21005459/45195285-591aea80-b289-11e8-99b6-7522ee414d3d.jpg)

