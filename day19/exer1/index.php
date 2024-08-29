<?php 
interface IvoiceButtons{
    function volumeUp();
    function volumeDown();
    function mute();
}
class mobile implements IvoiceButtons{
    function volumeUp(){}
    function volumeDown(){}
    function mute(){}
}
}
class PC implements IvoiceButtons{
    function volumeUp(){}
    function volumeDown(){}
    function mute(){}
}
class NintendoSwitch implements IvoiceButtons{
    function volumeUp(){}
    function volumeDown(){}
    function mute(){}
}
?>  