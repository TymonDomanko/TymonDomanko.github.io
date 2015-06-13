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
            $ExpandedName = $ExpandedName . " " . $NamePiece;
        }
        $ReturnString = $ReturnString . '<li><a href="' . $Dir . '/' . $File . '" >' . $ExpandedName . '</a></li>';
    };

     if ($ReturnString === Null){
         $ReturnString = '<li> For Future use </li>';
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
        <ul>
            <li><a href="http://www.nsw.scouts.com.au/leaders/scouts-nsw-forms" target="_blank">Scouts NSW Forms</a> </li>
            <li><a href="https://www.thescoutsshop.com.au/" target="_blank">The Scout Shop</a> </li>
            <li><a href="http://www.sydneynorthscouts.com/publications/rover_uniform.pdf" target="_blank">Badge Layout</a> </li>
        </ul>
    </div>';

$Resources = new Layout('Resources', $content, 'Resources');
echo $Resources->Layout();