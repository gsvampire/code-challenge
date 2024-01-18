<?php


function getplatFrom()
{
    $agent = new Jenssegers\Agent\Agent();
    $agent->platform();
    var_dump($agent);
    exit;
}

/**
 * 格式化输出
 * @param $data
 * @param int $code
 * @param string $msg
 */
function json($code = 0, $msg = 'sucess', $data = [])
{
    $info = array(
        'code' => $code,
        'msg' => $msg,
        'data' => $data
    );
    echo json_encode($info, JSON_UNESCAPED_UNICODE);
    exit;
}

function httpGet($url)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_TIMEOUT, 20);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    $output = curl_exec($ch);
    curl_close($ch);
    return $output;
}


//curl post请求
function httpPost($url, $param = array(), $type = 'application/json')
{
    $httph = curl_init($url);
    switch ($type) {
        case 'application/json':
            $data = json_encode($param);
            curl_setopt($httph, CURLOPT_HTTPHEADER, array('Content-Type: ' . $type, 'Content-Length: ' . strlen($data)));
            break;
        default:
            $data = http_build_query($param);
    }
    curl_setopt($httph, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($httph, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($httph, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($httph, CURLOPT_POST, 1);
    curl_setopt($httph, CURLOPT_POSTFIELDS, $data);
    curl_setopt($httph, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($httph, CURLOPT_CONNECTTIMEOUT, 10);
    curl_setopt($httph, CURLOPT_TIMEOUT, 10);
    $rst = curl_exec($httph);
    curl_close($httph);
    return $rst;
}


/**
 * @param $arr [要排序的数组]
 * @param $condition [要排序的条件, for  array('id'=>SORT_DESC,'add_time'=>SORT_ASC)]
 * @return bool|mixed
 * 对二维数组多个字段排序
 */
function SortArrByManyField($arr, $condition)
{
    if (empty($condition)) {
        return false;
    }
    $temp = array();
    $i = 0;
    foreach ($condition as $key => $ar) {
        foreach ($arr as $k => $a) {
            $temp[$i][] = $a[$key];
        }
        $i += 2;
        $temp[] = $arr;
    }
    $temp =& $arr;
    call_user_func_array('array_multisort', $temp);
    return array_pop($temp);
}


/**
 * @param $user_mobile
 * @return bool
 * 验证手机号码
 */
function is_mobile($user_mobile)
{
    $chars = "/^((\(\d{2,3}\))|(\d{3}\-))?1(3|4|5|8|9|6|7)\d{9}$/";
    if (preg_match($chars, $user_mobile)) {
        return true;
    } else {
        return false;
    }
}


/**
 * 卡迪尔乘积
 * @param $arr
 * @return array|array[]
 */
function cartesianProduct($arr)
{
    $result = [[]];
    //防止多个数组，需要计算总数组的个数进行计算
    for ($i = 0, $count = count($arr); $i < $count; $i++) {
        $tmp = [];
        foreach ($result as $value) {
            foreach ($arr[$i] as $v) {
                $tmp[] = array_merge($value, [$v]);
            }
        }
        $result = $tmp;
    }
    return $result;
}


/**
 * @param $length
 * @return string
 * 生成兑换码
 */
function createNonceStr($length = 18)
{
    $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $str = '';
    for ($i = 0; $i < $length; $i++) {
        $str .= substr($chars, mt_rand(0, strlen($chars) - 1), 1);
    }
    return $str;
}


/**
 * 获取当前毫秒数
 * @return string
 */
function getMicTime()
{
    list($time, $date) = explode(' ', microtime());
    $mic = $date . ceil($time * 1000);
    return $mic;
}


/**
 * 获取毫秒数
 * @return float
 */
function getMillisecond() {

    $dateTime = new DateTime();
    $millisecondTimestamp = $dateTime->format('Uu');
    return substr($millisecondTimestamp, 0, -3);
}


function getMicTimestampLong()
{
    $str = microtime();
    $time =  substr($str,11,10).substr($str,2,6);
    return $time;
}

/**
 * 字符串替换
 * @param $str
 * @return string|string[]|null
 */
function replaceStr($str)
{
    return preg_replace('/(?:\（)(劵\d*)(?:\）)|(?:\（)(\d+)(?:\）)|(?:\（)(券\d*)(?:\）)/i', '', $str);
}


/**
 * 生成唯一兑换码
 * @param int $length + 3
 * @return string
 */
function createUniqueCode($length = 15)
{
    $str = \Illuminate\Support\Str::random($length);
    $randomString = random_int(100, 999);//防止生成一样的
    $str = $randomString . $str;
    return $str;
}

