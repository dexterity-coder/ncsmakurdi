<?php

include 'resize_img_code.php';

//Upload and Crop member images 
function upload_member_passport($path, $ext) {
    $img_url = 'PASSPORT-' . date('mdYHis.') . $ext;
    move_uploaded_file($path, "admin/temp_img/" . $img_url);

    $resizeObj = new resize("admin/temp_img/" . $img_url);
    $resizeObj->resizeImage(120, 130, 'exact');
    $resizeObj->saveImage("admin/media/members/" . $img_url, 100);
    unlink("admin/temp_img/" . $img_url);
    return $img_url;
}

function secure($val) {
    $clean = htmlentities(addslashes($val));
    return $clean;
}

?>