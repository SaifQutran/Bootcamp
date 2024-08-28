<?php function sizeWithUnit(int $size)
{
    if ($size > 1024 ** 3)
        return round($size / (1024 ** 3), 2) . " GB";
    else if ($size > 1024 ** 2)
        return round($size / (1024 ** 2), 2) . " MB";
    else if ($size > 1024)
        return round($size / 1024, 2) . " KB";
    else
        return $size . " Byte";
}
function determineEx(string $filename)
{
    $arr = explode('.', $filename);
    global $exetentionsIcons;
    $extention = $arr[count($arr) - 1];
    if (key_exists($extention, $exetentionsIcons))
        return $exetentionsIcons[$extention];
    else
        return "fa fa-file dull";
}
function cutEx(string $dir)
{
    $arr = explode('.', $dir);
    return $arr[0];
}
