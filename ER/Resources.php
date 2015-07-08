<?php
require_once('Classes/Layout.php');

function DirectoryScanner($Dir){
    $ReturnString = Null;
    $FileNames = scandir($Dir);
    unset ($FileNames[1]);
    unset ($FileNames[0]);

    foreach ($FileNames as $File){
        $Name = explode('.',$File);
        $NamePieces = preg_split('/(?=[A-Z])/', $Name[0]);
        $ExpandedName = Null;
        foreach ($NamePieces as $NamePiece){
            $ExpandedName .= " " . $NamePiece;
        }
        $ReturnString .= '<li><a href="' . $Dir . '/' . $File . '" >' . $ExpandedName . '</a></li>';
    };

     if ($ReturnString === Null){
         $ReturnString = '<li> For Future use </li>';
     }
    return $ReturnString;
}

function ExternalLinks(){

    $ReturnString = '<ul>';
    $ExternalLinks = fopen('ResourcesFolder/Misc/ExternalLinks.txt', 'r');
    if ($ExternalLinks) {
        while (($Line = fgets($ExternalLinks)) !== false){
            $Text = explode('[', $Line);
            $Text = explode(']', $Text[1]);
            $Text = $Text[0];

            $Link = explode('(', $Line);
            $Link = explode(')', $Link[1]);
            $Link = $Link[0];
            $ReturnString .= '<li><a href="' . $Link . '" target="_blank">' . $Text . '</a></li>';
        }
        fclose($ExternalLinks);
    } else {
        $ReturnString = 'There was an error opening the file.';
    }
    return $ReturnString;
}


$content = '    <h3>Downloads</h3>
    <div class="download-links" id="download-links">
        <ul>
            ' . DirectoryScanner('ResourcesFolder/Downloads') . '
        </ul>
    </div>

    <h3>Apps</h3>
    <div class="app-link" id="app-links">
    <ul>
        ' . DirectoryScanner('ResourcesFolder/Apps') . '
    </ul>
    </div>
    <h3>Guides</h3>
    <div>
        <ul>
            ' . DirectoryScanner('ResourcesFolder/Guides') . '
        </ul>
    </div>
    <h3>External Links</h3>
    <div class="links" id="links">
        ' . ExternalLinks() . '
    </div>';

$Resources = new Layout('Resources', $content, 'Resources');
echo $Resources->Layout();