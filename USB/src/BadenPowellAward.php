<?php
require_once('Classes/Layout.php');

function BP(){
    require_once('Classes/parsedown.php');
    $path = 'ResourcesFolder/Misc/BPAwardees.txt';
    $OpenValue = fopen($path, 'r');
    $ParseDown = new Parsedown();
    $ParseDown->setBreaksEnabled(true);
    $ReturnString = $ParseDown->text(fread($OpenValue, filesize($path)));
    fclose($OpenValue);
    return $ReturnString;
}

$content = '    <p>The <a href="FAQ.php#BP">Baden-Powell Award</a> is the the highest award in Rovering.</p>
    <p>These are Epping’s awardees:</p>' . BP();

$BadenPowellAward = new Layout('Baden-Powell Award', $content, 'AboutUs');
echo $BadenPowellAward->Layout();