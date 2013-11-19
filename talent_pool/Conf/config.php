<?php
return array(
	//'配置项'=>'配置值'
	'DEFAULT_MODULE' => 'Index',
	'URL_MODE' => 1,			//URL模式：0普通模式 1PATHINFO 2REWRITE 3兼容模式
	'APP_DEBUG'  => true,	    //调试模式开关
	'URL_HTML_SUFFIX' => '.html',  	//URL伪静态后缀设置
	'DEFAULT_CHARSET' => 'utf-8',     // 默认输出编码
	/* 数据库设置 */
	'DB_TYPE'    => 'mysql',	    //使用的数据库类型
    'DB_HOST'    => '127.0.0.1',
    'DB_NAME'    => 'talent_pool',	    //数据库名
    'DB_USER'    => 'root',	    //访问数据库账号
    'DB_PWD'     => '',       //访问数据库密码
    'DB_PORT'    => '3306',
    'DB_PREFIX'  => '',	    //表前缀
	/* 错误设置 */
	'ERROR_MESSAGE'   => '您浏览的页面暂时发生了错误！请稍后再试～',
#	'SHOW_PAGE_TRACE'=>1,    //显示调试信息
	//错误显示信息,非调试模式有效
	'ERROR_PAGE'      => '/404.html',		// 错误定向页面
	/* 令牌设置 */
    'TOKEN_ON'   => true,	    //是否开启令牌验证	    
	'TOKEN_NAME' => '__hash__',    // 令牌验证的表单隐藏字段名称
	'TOKEN_TYPE' => 'md5'  //令牌哈希验证规则 默认为MD5
);
?>
