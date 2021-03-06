<?php
/**
 * 错误消息文件
 *
 * @return array
 */
return [
    // 平常错误
    'common'    => [
        'unauthorized'  => '非常抱歉，您没有权限。'
    ],

    // 受邀账户邀请
    'accounts'  => [
        'account_need_accept'   => '账户需要接受邀请',
        'account_not_ivalid'    => '无效账户',
    ],

    // 个人消费记录
    'consumes'  => [
        'good_id_error' => '您输入的商品信息有误。',
        'shop_id_error' => '您输入的商店信息有误。'
    ],

    // 商品分类
    'good_kinds'    => [
        'whether_has_parent'    => '必须选择是否拥有父类',
        'need_parent_id'        => '请选择父类',
        'whether_has_childrent' => '必须选择是否拥有子类。',
        'need_name'             => '请输入商品分类名称'
    ],

    // 商品
    'goods' => [
        'no_good_kind'      => '商品分类不存在',
        'good_kind_error'   => '商品分类出错。',
        'create_type_error' => '创建身份出错'
    ],

    // 商店管理
    'myshop'    => [
        'users' => [
            'only_one_admin'    => '商店用户中至少需要一个管理员，请添加其他管理员后修改该账户类型。',
            'shop_response_user'    => '该账户为商店负责人账户，只能为管理员类型。',
            'shop_response_user_effective'  => '商店代表账户必须有效。',
            'need_one_effective_admin'  => '至少需要一个有效的管理员账户。'
        ]
    ],
    // 登录界面错误
    'login' => [
        'no_account'    => '该账户不存在，请检查用户名或者邮箱地址。',
        'password_error'    => '用户密码错误，请再次输入。',
        'account_requesting_error'  => '账户未激活，请到邮箱查看激活邮件，并激活。',
        'account_invalid_error'     => '该账户处于关闭状态，如需重新使用，请再次激活。'
    ],
    // 用户注册页面
    'register'  => [
        'mail_sent_fail'    => '注册邮件发送失败，请检查注册邮箱，再次注册。',
        'token_error'       => '无效url，请输入正确url，若尚未注册，请先注册账户，然后进行激活',
        'over_token_active_time'    => '该url以及超过有效时间，请重新发送验证url'
    ],



];