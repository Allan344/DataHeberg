<?php
session_start();
session_destroy();
$scriptTag = '<script type="text/javascript">window.location = "'.$_SERVER['HTTP_REFERER'].'";</script>';
print $scriptTag;
?>