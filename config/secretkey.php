<?php
/**
 * secretkey.php
 * 2023/6/1 14:03
 * guoshuai
 */

/**
 * 配置所有第三方请求来源
 *
 * name_source 的值为数组的key;for: name_source=yizhifu_source
 * yizhifu_source 对应的密码为 value
 * jtckey2023
 */
$prod = env('APP_ENV');
if ($prod == 'prod') {
    return [
        'yizhifu_source' => '4c3495ca232ecb4fd2cab8d149bdf3e8',
        'fulu_source' => '4597edd06242257475693809c1bc4077',
        'jtc_source' => '2f9966841d8607ad97130081ce2e986a',
        'czdj' => 'XQF32CVJdk23424234sfha',
    ];
} else {
    return [
        'yizhifu_source' => '2638bbc3b5f0d8bccee523c2b9848b8a',
        'fulu_source' => '4e8be88e6533705ef2a5cb7d502c4bd7',
        'jtc_source' => '2f9966841d8607ad97130081ce2e986a',
        'czdj' => 'XQF32CVJdk23424234sfha',
    ];
}

