<?php 
include_once APP_PATH.'plugin/xn_recaptcha/util/validate.php';
function getRecaptchaScript($moduleName, $script) {
    $config = getConfig();
    if (empty($config['enable'][$moduleName])) return ;
    $config = setting_get('xn_recaptcha');
    $config = $config ? json_decode($config, true) : $config = array(
        "sitekey" => "",
        "secret" => ""
    );
    include_once APP_PATH.'plugin/xn_recaptcha/hook/template.htm';
?>

<script src="https://www.recaptcha.net/recaptcha/api.js" async defer></script>


<?php }?>