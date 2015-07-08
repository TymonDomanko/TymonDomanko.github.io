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
    $i = 0;
    foreach ($FileNamesWithEditTimes as $key => $value) {
        $i = $i + 1;
        if ($i > 3) {$x = ' hideable hidden';} else {$x = '';}
        require_once('Classes/parsedown.php');
        $path = 'ResourcesFolder/BlogEntries/' . $value;
        $date = date('l, F j, Y',$key);
        $OpenValue = fopen($path, 'r');
        $ParseDown = new Parsedown();
        $ParseDown->setBreaksEnabled(true);
        $ReturnString .= '<div class="post-out ' . $i . $x . '"><div class="post">' . '<h5>' . $date . '</h5><div class="content">' .
            $ParseDown->text(fread($OpenValue, filesize($path))) . "</div></div></div>";
        fclose($OpenValue);
    }

    return $ReturnString;
}


$content = '<div id="flickr_badge_wrapper" class="hidden-xs hidden-sm"><script type="text/javascript" src="http://www.flickr.com/badge_code.gne?count=14&display=random&size=thumb&nsid=131599674@N08&raw=1"></script></div>'
    . blog() . '<div class="c-button"> Show more </div><script>
$(".c-button").click(function(){
    $(".hideable").toggleClass("hidden");
    var $text = $(".c-button").text();
    if ($text == " Show more "){$(".c-button").text(" Show less ")} else {$(".c-button").text(" Show more ")}
});
</script>';

$index = new Layout(Null, $content, 'Home', Null, 'index');
echo $index->Layout();