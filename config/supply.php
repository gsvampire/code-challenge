<?php
return [
    'JTC' => [
        'user_id' => env('JTC_USER_ID', '1000000042'),
        'app_secret' => env('JTC_APP_SECRET', '517d1bf61a044b16'),
        'jtc_host_uri' => env('JTC_HOST_URI', 'https://open.jslife.com.cn'),
        'sign_key' => env('JTC_SIGN_KEY', 'JkcDGquMXAhUuszO'),
    ],
    'XinHao' => [
        'user_id' => env('XH_USER_ID', '200014'),
        'app_secret' => env('XH_APP_SECRET', 'ba1eb4da5b0a4305aff1041c5aef508d'),
        'host_uri' => env('XH_HOST_URI', 'http://121.43.149.51:10186/plat/api'),
    ],
    'WanDa' => [
        'user_id' => env('WANDA_CLIENT', 'KCKJ'),
        'app_secret' => env('WANDA_APP_SECRET', '2B245C99836B3E7C302DA8A5242B49A4F2E99E2271A930D3EBB08A87725A0850'),
        'host_uri' => env('WANDA_HOST_URI', 'http://coupon-prd-tc.wandafilm.com'),
    ],
    'TY' => [//团油
        'user_id' => env('TUANYOU_CLIENT', 'appm_h5100005383'),
        'app_secret' => env('TUANYOU_APP_SECRET', '00dc51bec4a2bde21465b91986759f96'),
        'host_uri' => env('TUANYOU_HOST_URI', 'https://mcs.czb365.com'),
    ],
];
