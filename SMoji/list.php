<?php
require 'smoji.php';
// Directory to scan
$directory = 'assets';

// File type to exclude
$fileType = '.png';

// Open the directory
$dir = opendir($directory);

// Array to store file names
$fileNames = array();

// Read directory contents
while ($file = readdir($dir)) {
    // Exclude current and parent directory entries
    if ($file != "." && $file != "..") {
        // Get the file extension
        $fileExtension = pathinfo($file, PATHINFO_EXTENSION);

        // Check if file type matches the excluded file type
        if ($fileExtension != $fileType) {
            // Remove the file extension from the file name
            $fileNameWithoutExtension = pathinfo($file, PATHINFO_FILENAME);

            // Add the file name without extension to the array
            $fileNames[] = $fileNameWithoutExtension;
        }
    }
}

// Close the directory
closedir($dir);

// Generate the string with "<br>" tags using a foreach loop
$fileNamesString = '';
foreach ($fileNames as $fileName) {
    $fileNamesString .= emoji( $fileName . ':' . $fileName . ':',20) ."<br>";
}

// Print the list of file names without the extension as a string
echo $fileNamesString;

echo emoji_ps(':smile:',20,'100%');
?>
