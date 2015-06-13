<?php
require_once('Classes/Layout.php');

function blog(){
    // Directory to sort
    $dir = 'ResourcesFolder/BlogEntries';
    // Creates an array  of file names
    $ReturnString = Null;
    $FileNames = scandir($dir);
    $FileNamesWithEditTimes = array();
    // Removes the dots
    unset ($FileNames[1]);
    unset ($FileNames[0]);

    // Puts the file names in an array with the modification times as there key
    foreach ($FileNames as $File) {
        $ModificationTime = filectime('ResourcesFolder/BlogEntries/' . $File);
        if ($ModificationTime > filemtime('ResourcesFolder/BlogEntries/' . $File)) {
            $ModificationTime = filemtime('ResourcesFolder/BlogEntries/' . $File);
        }
        $FileNamesWithEditTimes[$ModificationTime] = $File;
    }
    // Sorts the file names by there modification date using the key from newest to oldest
    krsort($FileNamesWithEditTimes);

    // displays final order
    foreach ($FileNamesWithEditTimes as $key => $value) {
        require_once('Classes/parsedown.php');
        $path = 'ResourcesFolder/BlogEntries/' . $value;
        $date = date('l, F j, Y',$key);
        $OpenValue = fopen($path, 'r');
        $ParseDown = new Parsedown();
        $ParseDown->setBreaksEnabled(true);
        $ReturnString = $ReturnString . '<div class="post-out"><div class="post">' . '<h5>' . $date . '</h5><div class="content">' .
            $ParseDown->text(fread($OpenValue, filesize($path))) . "</div></div></div>";
        fclose($OpenValue);
    }
    return $ReturnString;
}


$content = '' . blog() . '';

$index = new Layout(Null, $content, 'Home', Null, 'index');
echo $index->Layout();
