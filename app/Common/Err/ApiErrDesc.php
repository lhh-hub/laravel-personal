<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/4/30
 * Time: 16:54
 */

namespace App\Common\Err;


class ApiErrDesc
{
    /* error info const array*/

    /**
     * API 通用错误码
     * error_code <1000
     */
    const SUCCESS = [0, 'Success'];
    const UNKONWN_ERR = [1, '未知的错误'];
    const ERR_URL = [2, '访问的接口不存在'];
    const ERR_PARAMS = [100, '参数错误'];

    /**
     * error_code 1001-1100 用户登录相关的错误码
     */
    const ERR_PASSWORD = [1001,'密码错误'];
    const ERR_TOKEN = [1002,'登录过期'];
    const ERR_USER_NOT_EXIST = [1003,'用户不存在'];
    const ERR_TOKEN_VALUE = [1004,'无效的token'];


}