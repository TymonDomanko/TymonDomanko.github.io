<?php
require_once('Classes/Layout.php');

function history (){
    // Directory to sort
    $dir = 'ResourcesFolder/History';
    // Creates an array  of file names
    $ReturnString = Null;
    $FileNames = scandir($dir);
    // Removes the dots
    unset ($FileNames[1]);
    unset ($FileNames[0]);
    // Sorts the most recent history file first
    rsort($FileNames);
    $i = 0;
    // Puts the file names in an array with the modification times as there key
    foreach ($FileNames as $File) {
        require_once('Classes/parsedown.php');
        $i = $i + 1;
        if ($i == 1){$x = ' in';} else{$x = '';}
        // Converts File Name To a string
        // Removes the file extension
        $FileName = explode('.', $File);
        $FileName = $FileName[0];
        // Adds some spaces
        $FileName = str_replace('-', ' - ', $FileName);

        $path = 'ResourcesFolder/History/' . $File;
        $OpenValue = fopen($path, 'r');
        $ParseDown = new Parsedown();
        $ParseDown->setBreaksEnabled(true);
        $ReturnString .=
            '<div class="panel panel-default">
                <div class="panel-heading collapsed" role="tab" id="heading' . $i . '" data-toggle="collapse" data-parent="#accordion" href="#collapse' . $i . '" aria-expanded="true" aria-controls="collapse' . $i . '">
                    <h4 class="panel-title">
                        ' . $FileName . '
                    </h4>
                </div>
                <div id="collapse' . $i . '" class="panel-collapse collapse ' . $x . '" role="tabpanel" aria-labelledby="heading' . $i . '">
                    <div class="panel-body">
                        ' . $ParseDown->text(fread($OpenValue, filesize($path))) . '
                    </div>
                </div>
            </div>';
        fclose($OpenValue);
    }
    return $ReturnString;
}


$content = '<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">' . history() . '</div>';

$CrewHistory = new Layout('Crew History', $content, 'AboutUs', 'History', 'index');
echo $CrewHistory->Layout();