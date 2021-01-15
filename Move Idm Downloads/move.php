<?php

/**
 * @author Mustafa K. Waly	Fri, Dec 18, 2020
 * @github https://github.com/Mustafa-Kamel/
 *
 *
 * This script will help you to rename (to its original name) and move the videos (and other extensions i.e. review the extension variable) downloaded by
 * IDM (Internet Download Manager) from IDM folder in your %AppData% folder to your desktop folder by running it from the cmd using this command
 * "php move.php [extension]"
 *
 *
 * NOTICE: This code is supposed to work correctly with video files and it was tested on a video playlist downloaded from youtube, Howerver you can still use it for other extensions by passing the extension as an argument to the program run command
 *
 *
 * WHY AND WHEN CAN YOU USE THIS CODE?
 * ===================================
 * You can use this code if you have a problem with a downloaded playlist using IDM (Internet Download Manager) cause of the file naming is incorrect (i.e. if the name has unexpected character like < > : | ? * / \)
 * in this case this script is able to edit the names of the list of the files and move it to your desktop
 *
 *
 * HOW TO USE THIS SCRIPT?
 * =======================
 * You can use this script from cmd by changing the active directory to the path which have this file using this command (cd $pathname)
 * then use this command to run this program (php move.php [extension])
 * while "[extension]" is the expected extension to the files being moved
 *
 * WHY DID I WRITE THIS CODE?
 * ==========================
 * After downloading a playlist from youtube I had a problem with it because the names of videos were not convenient for windows as it doesn't follow
 * windows file naming conventions by having characters like the pipe "|" so the names have been considered as incorrect and the video files haven't been
 * moved to the correct folder after finishing the download, but the files was still saved in the %AppData% folder, so I tried to solve the problem manually
 * by finding the directory where the idm saves the downloaded files and figured out that it creates a new folder foreach download under this path
 * C:\Users\USERNAME\AppData\Roaming\IDM\DwnlData\USERNAME\
 * inside each folder from these you'll find two files if the download has been completed successfully:
 * the first file called log[number].log >> it has the logs for the download and errors if there were any
 * the second file will have a name like AG3C_xAwRQIgP5c3Cc6QGDx >> this is the downloaded file
 * so I started to edit the names of the downloaded files and move it to the path where I'll save it
 * I found that this will be boring to do it manually for the whole list of videos
 * Then I started to write this script to save it for later use if I ever met the same problem again
 *
 */

if ($argc < 2) {
    die('Missing parameters: you should enter the files extension!');
}

$start_time = microtime(true);
$ext = strtolower($argv[1]);

$extensions = array('ai', 'aif', 'aifc', 'aiff', 'asc', 'atom', 'atom', 'au', 'avi', 'bcpio', 'bin', 'bmp', 'cdf', 'cgm', 'class', 'cpio', 'cpt', 'csh', 'css', 'csv', 'dcr', 'dir', 'djv', 'djvu', 'dll', 'dmg', 'dms', 'doc', 'dtd', 'dvi', 'dxr', 'eps', 'etx', 'exe', 'ez', 'gif', 'gram', 'grxml', 'gtar', 'hdf', 'hqx', 'htm', 'html', 'ice', 'ico', 'ics', 'ief', 'ifb', 'iges', 'igs', 'jpe', 'jpeg', 'jpg', 'js', 'json', 'kar', 'latex', 'lha', 'lzh', 'm3u', 'man', 'mathml', 'me', 'mesh', 'mid', 'midi', 'mif', 'mov', 'movie', 'mp2', 'mp3', 'mp4', 'm4v', 'mpe', 'mpeg', 'mpg', 'mpga', 'ms', 'msh', 'mxu', 'nc', 'oda', 'ogg', 'pbm', 'pdb', 'pdf', 'pgm', 'pgn', 'png', 'pnm', 'ppm', 'ppt', 'ps', 'qt', 'ra', 'ram', 'ras', 'rdf', 'rgb', 'rm', 'roff', 'rss', 'rtf', 'rtx', 'sgm', 'sgml', 'sh', 'shar', 'silo', 'sit', 'skd', 'skm', 'skp', 'skt', 'smi', 'smil', 'snd', 'so', 'spl', 'src', 'sv4cpio', 'sv4crc', 'svg', 'svgz', 'swf', 't', 'tar', 'tcl', 'tex', 'texi', 'texinfo', 'tif', 'tiff', 'tr', 'tsv', 'txt', 'ustar', 'vcd', 'vrml', 'vxml', 'wav', 'wbmp', 'wbxml', 'wml', 'wmlc', 'wmls', 'wmlsc', 'wrl', 'xbm', 'xht', 'xhtml', 'xls', 'xml', 'xpm', 'xsl', 'xslt', 'xul', 'xwd', 'xyz', 'zip');

if (!in_array($ext, $extensions)) {
    die('Unknow extension ' . $arg1);
}

$ext = '.' . $ext;

// LOOP OVER ALL THE DOWNLOAD DIRECTORIES IN [\AppData\Roaming\IDM\DwnlData\USERNAME]
foreach (glob("$_SERVER[USERPROFILE]\AppData\Roaming\IDM\DwnlData\\$_SERVER[USERNAME]\*", GLOB_ONLYDIR) as $dir) {
    // GET THE CONTENTS OF THE LOG FILE OF THE CURRENT DOWNLOAD
	if(! is_array(glob("$dir/*.log")) || ! isset(glob("$dir/*.log")[0]) || ! file_exists(glob("$dir/*.log")[0])) {
		echo 'Error: log file is not found!';
		continue;
	}
	$logfile = glob("$dir/*.log")[0];
    $file = file_get_contents($logfile);
	$start = strpos($file, 'filename="') + strlen('filename="');
	$length = strpos($file, $ext . '"') - strpos($file, 'filename="') - strlen('filename="') + strlen($ext);
	$oldfilename = substr($file, $start, $length);

    // GET THE FILENAME OF THE DOWNLOADED FILE FROM THE LOG FILE AND REPLACE THE UNEXPECTED CHARACTERS BY SPACES ' ' TO AVOID THE PROBLEM WITH NAMING THE FILE
    $filename = preg_replace('/[<>:|?*\\/\\\]/', ' ', $oldfilename);

    // LOOP OVER ALL THE FILES IN EACH DOWNLOAD DIRECTORY AND FIND ONLY FILES WITHOUT THE '.log' EXTENSION 
    foreach (glob("$dir/*") as $file) {
        // IF THE FILE DOESN'T HAVE THE '.log' EXTENSION THEN RENAME IT TO THE ACTUAL FILENAME IN THE '.log' FILE THEN MOVE IT TO DESKTOP
        if (!strpos($file, '.log')) {
            // RENAME THE FILE TO THE ACTUAL FILENAME IN THE '.log' FILE
            rename($file, $dir . '/' . $filename);
            // COPY THE FILE IN THE DOWNLOAD DIRECTORY TO THE DESKTOP
            if (copy("$dir/$filename", $_SERVER['USERPROFILE'] . "\Desktop\\$filename")) {
                // IF THE FILE HAS BEEN COPIED SUCCESSFULLY TO THE DESKTOP THEN REMOVE IT
                unlink("$dir/$filename");
			}
        }
    }
}

echo 'Time: ' . (microtime(true) - $start_time) . ' seconds';
