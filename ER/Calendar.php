<?php
require_once('Classes/Layout.php');

$content = '';

$Calendar = new Layout('Calendar', $content, 'Calendar', Null, 'Calendar', 'NoMobileTitle', 0,'Calendar');
echo $Calendar->Layout();