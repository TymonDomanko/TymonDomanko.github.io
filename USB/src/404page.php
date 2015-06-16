<?php
require_once('Classes/Layout.php');

$content = '<h1 style="font-weight: bold; font-size: 1000%">404 Error</h1>
<h3> Whoops you took a wrong turn!</h3>';

$Page404 = new Layout('404 Error', $content, Null, Null, Null,'NoMobileTitle');
echo $Page404->Layout();