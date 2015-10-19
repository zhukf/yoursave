<?php

/**
 * 界面显示相关内容(数据库相关表中未表示的)
 *
 */
return [
    // 各页面通用部分
    'common'    => [
        'app_name'  => 'Yoursave',
        'labels'    => [
        ],
        'buttons'   => [
            'confirm'   => '确认',
            'cancel'    => '取消',
            'delete'    => '删除',
            'back'      => '返回',
            'download'  => '下载',
            'create'    => '创建',
            'logout'    => '注销',
        ],
    ],


    // 登录页面
    'login' => [
        'title' => '登录',
        'labels' => [
            'index_panel_header'    => '登录信息',
            'u_name_or_mail'    => '用户名/邮箱',
            'password'          => '密码',
        ],
        'buttons' => [
            'login' => '登录',
            'register'  => '注册',
            'remember'  => '记住我',
            'reminder'  => '忘记密码',
            'resend_mail'   => '再次发送认证邮件',
            'reactive'      => '重新激活'
        ]
    ],
    // 用户相关界面显示内容
    'user'  => [
        // 登录界面
        'title' => '个人资料管理',
        'friends_title' => '好友管理',
        ''
    ],
    // 商店
    'myshop'  => [
        'title' => '商店管理',
        'edit_title'    => '商店信息修改',
        'certificate_title' => '商店认证',
        'goods_title'       => '销售商品一览',
        'users_title'       => '职员管理'
    ],
    // 生产厂家
    'mycompany' => [
        'title' => '企业管理',
        'edit_title'    => '企业信息修改',
        'certificate_title' => '企业认证',
        'goods_title'   => '生产商品一览',
        'users_title'   => '职员管理',
        ''
    ],
];