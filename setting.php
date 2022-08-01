<?php

!defined('DEBUG') AND exit('Access Denied.');
include_once _include(APP_PATH.'plugin/xn_recaptcha/util/validate.php');

if ($method == 'GET') {
    $config = getConfig();
    include_once _include(APP_PATH.'plugin/xn_recaptcha/setting.htm');
} else {
    $config = json_encode($_POST);
    setting_set('xn_recaptcha', $config);
    echo json_encode(array("code" => 1));
}

