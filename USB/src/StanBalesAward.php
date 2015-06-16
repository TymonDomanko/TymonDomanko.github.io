<?php
require_once('Classes/Layout.php');

function SB(){
    require_once('Classes/parsedown.php');
    $path = 'ResourcesFolder/Misc/SBAwardees.txt';
    $OpenValue = fopen($path, 'r');
    $ParseDown = new Parsedown();
    $ParseDown->setBreaksEnabled(true);
    $ReturnString = $ParseDown->text(fread($OpenValue, filesize($path)));
    fclose($OpenValue);
    return $ReturnString;
}

$content = '<p>The Stan Bales Rover Service Award is an award that may be made by the Rover Section to recognise a person who
        has given exceptional service to the Rover Section.</p>
    <p>Members or Ex-members of Epping who have received the award include:</p>' . SB();

$StanBalesAward = new Layout('Stan Bales Award', $content, 'AboutUs');
echo $StanBalesAward->Layout();