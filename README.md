Change Files Extensions [OPEN HERE](https://github.com/Mustafa-Kamel/Useful-Scripts/tree/master/Change%20Files%20Extension)
=====================
This script allows you to change the extensions of multiple files (e.g. any type of files: images, videos, text etc.) having the same extension to another extension at once by executing a simple command.

> You should use either the php script or python script both of them do the same thing, so select what fits you most


How it works?
------------
The script will change the extension of all the files at the same directory with it that have the extension you specify first to the the second extension you specify, just by running a command like `php change_files_extension.php m4v mp4`, you should just place it in the same directory with them then run the command and it will do all the job.


Requirements
------------
> You should have at least one the following requirements installed
* php ^5.4
* Python ^3.0

Usage
-----
At first you should place all the files you wanna change their extension to at the **same directory** then choose one of the scripts `php` or `python` and move it to the same directory with them.
***I took in consideration that you have one of these programming languages installed on your machine, so if you don't have any of them go first install one, then go on with the corresponding script.***

Assuming you have one of `php` or `python` installed, choose the script that fits you and move it to the files directory then run the corresponding command in cmd or terminal and pass the source extension and the target extension as arguments to it respectively.

1. PHP Command
`php change_files_extension.php [source_extension] [target_extension]`

2. Python Command
`py change_files_extension.py [source_extension] [target_extension]`


Examples
________
1. `php change_files_extension.php txt php` 
> While 'txt' is the source extension and 'php' is the target extension

2. `py change_files_extension.py png jpg`
> While 'png' is the source extension and 'jpg' is the target extension