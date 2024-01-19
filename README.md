
code challenge
test
项目启动步骤 

    1  node install 
 
    2  composer install 

    3  新建.env文件 
          设置mysql 信息
          3.1 DB_CONNECTION=mysql DB_HOST=127.0.0.1 DB_PORT=3306 DB_DATABASE=dcat-admin DB_USERNAME=root DB_PASSWORD=

    4  composer require dcat/laravel-admin:"2.*" -vvv 

    5 php artisan admin:publish 

   
    6 php artisan admin:install

    7 生成app_key命令 php artisan key:generate

    8 创建软连接命令 php artisan storage:link
  
    9 修改.env中的APP_URL= 当前域名。for http://guoshuai.xxxx.com


修改.env配置后
   php artisan cache:clear  &&  php artisan config:cache &&  composer dump-autoload

服务器 要给storage/log目前权限，否则写入失败
生成app_key 命令 php artisan key:generate

实现功能 :项目用到了db

1  数据导入(因为有导入了，暂时没有开发新增功能)

2  输出导出

3  列表页面

4  详情页面
