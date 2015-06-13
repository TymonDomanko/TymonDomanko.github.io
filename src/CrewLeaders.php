<?php
require_once('Classes/Layout.php');

function CL(){
    require_once('Classes/parsedown.php');
    $path = 'ResourcesFolder/Misc/CrewLeaders.txt';
    $OpenValue = fopen($path, 'r');
    $ParseDown = new Parsedown();
    $ParseDown->setBreaksEnabled(true);
    $ReturnString = $ParseDown->text(fread($OpenValue, filesize($path)));
    fclose($OpenValue);
    return $ReturnString;
}

$content = '<p>This is the position most critical to the Crew\'s success, as this person provides the
general direction, motivation and co-ordination of Crew activities. They are expected to
chair meetings, represent the Crew at Group or Area/Regional Councils, oversee
recruitment strategies and Squire training, as well as ensuring that Crew activities run
successfully.</p><p>The previous/current Crew Leaders are:</p>' . CL();

$CrewLeaders = new Layout('Crew Leaders', $content, 'AboutUs');
echo $CrewLeaders->Layout();