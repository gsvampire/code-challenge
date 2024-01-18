<?php

namespace App\Support;


class Sign
{

    /**
     * 签名生成
     * @param $params
     * @param $appSecret
     * @return string
     */
    public static function getSign($params, $appSecret)
    {
        //去除sign参数
        $params = self::paramFilter($params);
        //json序列化
        $json = json_encode($params, 320);
        //转化为数组
        $jsonArr = self::mbStrSplit($json);
        //排序
        sort($jsonArr);
        //转化为字符串
        $string = implode('', $jsonArr);
        //在string后加入secret
        $string = $string . $appSecret;
        //MD5加密
        $result = strtolower(md5($string));
        return $result;
    }

    /**
     * 可将字符串中中文拆分成字符数组
     * @param $str
     * @return array|false|string[]
     */
    private static function mbStrSplit($str)
    {
        return preg_split('/(?<!^)(?!$)/u', $str);
    }


    /**
     * 去除sign参数
     * @param $params
     * @return array
     */
    private static function paramFilter($params)
    {
        $paramFilter = [];
        foreach ($params as $key => $val) {
            if ($key == 'sign') {
                continue;
            }
            $paramFilter[$key] = $val;
        }
        return $paramFilter;
    }

    /**
     * 升序排列
     * @param $param
     * @return mixed
     */
    private static function paramSort($param)
    {
        ksort($param);
        reset($param);
        return $param;
    }


    /**
     * 检查sign
     * @param $sign
     * @param $params
     * @param $appSecret
     * @return bool
     */
    public static function checkSign($sign, $params, $appSecret)
    {
        return $sign == self::getSign($params, $appSecret);
    }


    /**
     * 彦浩签名
     * @param $params
     * @param $appSecret
     * @return string
     */
    public static function getYanSign($params, $appSecret)
    {
        $sign = $params['UserId'] . $params['Count'] . $params['NotifyUrl'] . $params['Account'] . $params['ClientIP']
            . $params['UserOrderId'] . $params['ProductNumber'] . $params['TimesTamp'] . $appSecret;

        return strtoupper(md5($sign));
    }


    /**
     * 获取加密字符串
     * @param $params
     * @param $appKey
     * @return false|string
     */
    public static function getJTCSigns($params, $appKey)
    {
        //去除数组中的空值和签名参数(sign/sign_type)
        $param = self::paramFilter($params);
        //按键名升序排列数组
        $param = self::paramSort($param);

        array_walk($param, function (&$val, $key) {
            $val = $key . '=' . (is_array($val) ? json_encode($val) : $val);
        });
        $param_str = implode('&', $param);
        //把拼接后的字符串再与安全校验码直接连接起来
        $param_str = $param_str . '&key=' . $appKey;
        //创建签名字符串
        return openssl_digest($param_str, 'sm3');
    }


    /**
     * 畅由签名
     * @param $params
     * @param $secret
     * @param bool $double
     * @return string
     */
    public static function getCYSign($params, $secret, $double = true)
    {
        $paramFilter = [];
        foreach ($params as $key => $val) {
            if ($key == 'hmac') {
                continue;
            }
            if ($key == 'callbackUrl' && $double) {
                $val = urlencode($val);
            }
            $paramFilter[$key] = $val;
        }
        $paramStr = implode('', $paramFilter);
        $paramStr = $paramStr . $secret;
        return md5($paramStr);
    }


    /**
     * 签名
     * @param $params
     * @param $appKey
     * @param $extends
     * @return string
     */
    public static function getJTCSIGN($params, $appKey, $extends)
    {
        //去除数组中的空值和签名参数(sign/sign_type)
        $param = self::paramFilter($params);
        //按键名升序排列数组
        $param = self::paramSort($param);

        array_walk($param, function (&$val, $key) {
            $val = $key . '=' . (is_array($val) ? json_encode($val) : $val);
        });
        $param_str = implode('&', $param);
        foreach ($extends as $v) {
            $param_str = $param_str . $v;
        }
        //创建签名字符串
        return hash_hmac('sha256', base64_encode($param_str), $appKey);
    }


    /**
     * 团油签名
     * @param $params
     * @param $secret
     * @return string
     */
    public static function getTuanyouSign($params, $secret)
    {
        //去除数组中的空值和签名参数(sign/sign_type)
        $param = self::paramFilter($params);
        //按键名升序排列数组
        $param = self::paramSort($param);
        //组合加密串
        array_walk($param, function (&$val, $key) {
            $val = $key . $val;
        });
        $paramStr = implode('', $param);
        $paramStr = $secret . $paramStr . $secret;
        //创建签名字符串
        return md5($paramStr);
    }


}
