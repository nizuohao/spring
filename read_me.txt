这个是数据库的设置
检查一下，以下四处的数据库设置：
①Spring\ThinkPHP\Conf\convention.php;
②Spring\Application\Common\Conf\config.php
③Spring\Application\Admin\Conf\config.php
④Spring\Application\Home\Conf\config.php
/* 数据库设置 */
    'DB_TYPE'               =>  'mysql',     // 数据库类型
    'DB_HOST'               =>  'localhost', // 服务器地址
    'DB_NAME'               =>  '',          // 数据库名
    'DB_USER'               =>  '',      // 用户名
    'DB_PWD'                =>  '',          // 密码
    'DB_PORT'               =>  '3306',        // 端口
    'DB_PREFIX'             =>  'job_',    // 数据库表前缀
    'DB_FIELDTYPE_CHECK'    =>  false,       // 是否进行字段类型检查
    'DB_FIELDS_CACHE'       =>  true,        // 启用字段缓存
'DB_CHARSET'            =>  'utf8',      // 数据库编码默认采用utf8

SQL文件放置在AProduct\Spring\spring.sql语句中没有进行创建数据库操作，可以任意选择数据库名，需要在以上数据库名中填写。