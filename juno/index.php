<?php
//==============================================================================
// Mobile 모바일 설정
// 쿠키에 저장된 값이 모바일이라면 브라우저 상관없이 모바일로 실행
// 그렇지 않다면 브라우저의 HTTP_USER_AGENT 에 따라 모바일 결정
//------------------------------------------------------------------------------
define('MOBILE_AGENT',   'phone|samsung|lgtel|mobile|[^A]skt|nokia|blackberry|android|sony');

if ($_REQUEST['device']=='pc')
   $is_mobile = false;
else if ($_REQUEST['device']=='mobile')
   $is_mobile = true;
else if (isset($_SESSION['ss_is_mobile']))
   $is_mobile = $_SESSION['ss_is_mobile'];
else if (preg_match('/'.MOBILE_AGENT.'/i', $_SERVER['HTTP_USER_AGENT']))
   $is_mobile = true;

$_SESSION['ss_is_mobile'] = $is_mobile;
define('IS_MOBILE', $is_mobile);



//Check Mobile
$mAgent = array("iPhone","iPod","Android","Blackberry",
    "Opera Mini", "Windows ce", "Nokia", "sony" );
$chkMobile = false;
for($i=0; $i<sizeof($mAgent); $i++){
    if(stripos( $_SERVER['HTTP_USER_AGENT'], $mAgent[$i] )){
        $chkMobile = true;
        break;
    }
}

if($chkMobile || $_REQUEST['device']=='mobile') {
    include_once "theme/mobile/index2.php";//모바일일 경우
} else {
    include_once "theme/pc/index_skin.php";//PC일 경우
}
?>