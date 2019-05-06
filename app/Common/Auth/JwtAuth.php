<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/4/30
 * Time: 15:11
 */

namespace App\Common\Auth;

use Lcobucci\JWT\Builder;
use Lcobucci\JWT\Signer\Hmac\Sha256;
use Lcobucci\JWT\Parser;
use Lcobucci\JWT\ValidationData;
use App\Exceptions\ApiException;
use App\Common\Err\ApiErrDesc;
/**
 * 单例 一次请求中所有出现使用jwt的地方都是一个用户
 * Class JwtAuth
 * @package App\Common\Auth
 */
class JwtAuth
{
    private static $instance;

    /**
     * jwt token
     * @var
     */
    private $token;
    /**
     * claim iss
     * @var string
     */
    private $iss = 'lhh.study.com';
    /**
     * claim  aud
     * @var string
     */
    private $aud = 'app';
    /**
     * claim  secret
     * @var string
     */
    private $secret = '123456789';
    /**
     * claim   uid
     * @var string
     */
    private $uid;

    private $decodeToken;

    public static function getInstance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    private function __construct()
    {

    }

    private function __clone()
    {

    }

    public function encode()
    {
        $time = time();

        $this->token = (new Builder())->setHeader('alg', 'HS256')
            ->setIssuer($this->iss)
            ->setAudience($this->aud)
            ->setIssuedAt($time)
            ->setExpiration($time + 60)
            ->set('uid', $this->uid)
            ->sign(new Sha256(), $this->secret)
            ->getToken();
        //TODO 存储token 和有效期
        return $this;
    }

    /**
     * 获取token
     * @return string
     */
    public function getToken()
    {
        return (string)$this->token;
    }

    /**
     *
     * @param $uid
     */
    public function setUid($uid)
    {
        $this->uid = $uid;
        return $this;
    }

    /**
     * 设置token
     * @param $token
     * @return $this
     */
    public function setToken($token)
    {
        $this->token = $token;
        return $this;
    }

    public function decode()
    {
        if (!$this->decodeToken) {
            try {
                $this->decodeToken = (new Parser())->parse((string)$this->token);
                $this->uid         = $this->decodeToken->getClaim('uid');
            }catch(\RuntimeException $e)
            {
                throw new ApiException(ApiErrDesc::ERR_TOKEN_VALUE);
            }
        }
        return $this->decodeToken;
    }

    /**
     * 验证前两部分
     * @return bool
     */
    public function validate()
    {
        $data = new ValidationData();
        $data->setIssuer($this->iss);
        $data->setAudience($this->aud);
        return $this->decode()->validate($data);
    }

    public function getUid()
    {
        return $this->uid;
    }

    /**
     * 验证secret
     * @return bool
     */
    public function verify()
    {
        $result = $this->decode()->verify(new Sha256(), $this->secret);
        return $result;
    }
}