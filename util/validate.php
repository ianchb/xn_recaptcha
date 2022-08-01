
<?php

function getConfig() {
    $config = setting_get('xn_recaptcha');
    $config = $config ? json_decode($config, true) : $config = array(
        "sitekey" => "",
        "secret" => "",
        "enable" => array(
            "user_login" => 'on', 
            "user_create" => 'on', 
            "email_code" => 'on', 
            "quick_reply" => 'on', 
            "thread_create" => 'on',
        )
    );
    return $config;
}

function validate($mode) {
    $config = getConfig();
    if (empty($config['enable'][$mode])) return ;
    $secret = $config['secret'];
    if (!isset($_POST['recaptcha']) || empty($_POST['recaptcha']))
    {
        message('recaptcha-box', '请完成人机验证');
    }
    else
    {
        $verifyResponse = file_get_contents('https://www.recaptcha.net/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['recaptcha']);
        $result = json_decode($verifyResponse);
        if(!$result->success){
            message('recaptcha-box', '人机验证无效，请重新验证');
        }
    }
}