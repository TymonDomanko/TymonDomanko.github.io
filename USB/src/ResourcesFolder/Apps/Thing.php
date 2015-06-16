<?php
require_once('Classes/Layout.php');

$content = '<iframe width="420" height="315" src="https://www.youtube.com/embed/J9FImc2LOr8?autoplay=1&loop=1" frameborder="0" allowfullscreen></iframe>';

$AboutUs = new Layout(Null, $content, Null, Null, Null, Null, 2);
echo $AboutUs->Layout();