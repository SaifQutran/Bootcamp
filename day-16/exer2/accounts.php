<?php $accounts =
    [
        '12412' => array('name'=>'Ahmed','balance'=> 2400),
        '13412' => array('name'=>'Ali','balance'=> 6300),
        '15412' => array('name'=>'Salem','balance'=> 329900),
        '16412' => array('name'=>'Salma','balance'=> 23150),
        '17412' => array('name'=>'Rashed','balance'=> 21400),
        '18412' => array('name'=>'Rasha','balance'=> 34100),
        '12912' => array('name'=>'Zina','balance'=> 29000)
    ];
if (key_exists($_GET['bankid'], $accounts)) {
    echo json_encode(array('bankid' =>$_GET['bankid'],'accountDetails' => $accounts[$_GET['bankid']]));
} else {
    echo json_encode(array("There is no account with this account id"));
}
