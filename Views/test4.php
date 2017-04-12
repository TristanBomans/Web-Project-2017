<?php
$id = "";
$id .= 803408326346060
$fb_avatar = file_get_contents("http://graph.facebook.com/" . $id . "/picture?width=9999");
$save = file_put_contents("../Resources/ProfilePics/fb-" . $id . ".jpg", $fb_avatar);
?>