<?php
require_once('Classes/Layout.php');

function CA(){
    require_once('Classes/parsedown.php');
    $path = 'ResourcesFolder/Misc/CrewAchievements.txt';
    $OpenValue = fopen($path, 'r');
    $ParseDown = new Parsedown();
    $ParseDown->setBreaksEnabled(true);
    $ReturnString = $ParseDown->text(fread($OpenValue, filesize($path)));
    fclose($OpenValue);
    return $ReturnString;
}

$content = '<p>The crew has achieved many thing over the years:</p>' . CA();

$index = new Layout('Crew Achievements', $content, 'AboutUs', 'Achievements');
echo $index->Layout();
