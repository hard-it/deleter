<?
$deldir = array("upload" , "local", "bitrix", "include", "new", "personal", ".git", "vendor");
foreach($deldir as $del_add){
    rmdirr($del_add);
}

function rmdirr($dirname)
{
    if (!file_exists($dirname)) {
        return false;
    }
    if (is_file($dirname)) {
        return unlink($dirname);
    }
    $dir = dir($dirname);
    while (false !== $entry = $dir->read()) {
        if ($entry == '.' || $entry == '..') {
            continue;
        }
        rmdirr("$dirname/$entry");
    }
    $dir->close();
    return rmdir($dirname);
}
