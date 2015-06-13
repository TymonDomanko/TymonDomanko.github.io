<?php
// Copies all of a folders content
function RecursiveCopy($Source,$Destination) {
    // Opens Directory to be copied
    $dir = opendir($Source);
    // Creates Destination folder if it doesn't exist
    if (file_exists($Destination) == False) {mkdir($Destination);}
    while(false !== ( $file = readdir($dir)) ) {
        // Skips the return dots
        if (( $file != '.' ) && ( $file != '..' )) {
            // Copies folders inside folder
            if ( is_dir($Source . '/' . $file) ) {
                RecursiveCopy($Source . '/' . $file,$Destination . '/' . $file);
            }
            else {
                // Copies Files to respective folder
                copy($Source . '/' . $file,$Destination . '/' . $file);
            }
        }
    }
    // Closes Directory that was copied
    closedir($dir);
}

// Deletes all of a folders contents and the folder (VERY DANGEROUS)
function RecursiveDelete($dir) {
    $files = array_diff(scandir($dir), array('.','..'));
    foreach ($files as $file) {
        (is_dir("$dir/$file")) ? RecursiveDelete("$dir/$file") : unlink("$dir/$file");
    }
    return rmdir($dir);
}

// Creates a zipped copy of a file/folder
function Zipper($Source, $Destination){
    $Destination = $Destination . '.zip';
    // Get real path for our folder
    $rootPath = realpath($Source);
    // Initialize archive object
    $zip = new ZipArchive();
    $zip->open($Destination, ZipArchive::CREATE | ZipArchive::OVERWRITE);

    // Create recursive directory iterator
    $files = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator($rootPath),
        RecursiveIteratorIterator::LEAVES_ONLY
    );

    foreach ($files as $name => $file)
    {
        // Skip directories (they would be added automatically)
        if (!$file->isDir())
        {
            // Get real and relative path for current file
            $filePath = $file->getRealPath();
            $relativePath = substr($filePath, strlen($rootPath) + 1);

            // Add current file to archive
            $zip->addFile($filePath, $relativePath);
        }
    }
    // Zip archive will be created only after closing object
    $zip->close();
}

Zipper('../', 'ResourcesFolder/Downloads/WebsiteGenerator');
// Creates temp out folder for output to be copied to zip
mkdir('out');
echo 'Made Out
';
// Copies Resources to output folder
RecursiveCopy('ResourcesFolder','out/ResourcesFolder');

// Gets all file/Folder names in Directory
$FileNames = scandir('../src');
// Removes the Dots
unset ($FileNames[1]);
unset ($FileNames[0]);

foreach ($FileNames as $File) {
    // Removes the file suffix's
    $File = explode('.', $File);
    $File = $File[0];
    // Prevents certain files from being converted.
    if (($File == 'HTMLConverter') || ($File == 'Config') || ($File == 'ResourcesFolder') || ($File == 'out') || ($File == 'Classes')) {} else {
        ob_start();
        include_once($File . '.php');
        $HTML = ob_get_contents();
        $HTML = str_replace('.php', '.html', $HTML);
        file_put_contents('out/' . $File . '.html', $HTML);
        ob_end_clean();
    }
}

Zipper('out','../website');
echo 'Zipped
';
RecursiveDelete('out');
unlink('ResourcesFolder/Downloads/WebsiteGenerator.zip');
echo 'Deleted';