# Move idm downloaded files to the desktop after renaming it to the original name of the file

This script will help you to rename (to its original name) and move the videos (and other valid extensions you pass as an argument) downloaded by IDM (Internet Download Manager) from IDM folder in your `%AppData%` folder to your desktop by running it from the cmd using this command
``` bash
php move.php [extension]
```
 
**NOTICE:** This code is supposed to work correctly with video files and it was tested on a video playlist downloaded from youtube, Howerver you can still use it for other extensions by passing the extension as an argument to the program run command
 
 
## WHY AND WHEN CAN YOU USE THIS CODE?
 You can use this code if you have a problem with a downloaded playlist using IDM (Internet Download Manager) cause of the file naming is incorrect (i.e. if the name has unexpected character like < > : | ? * / \) in this case this script is able to edit the names of the list of the files and move it to your desktop
 
 
## HOW TO USE THIS SCRIPT?
You can use this script from cmd by changing the active directory to the path which have this file using this command
``` bash
cd $pathname
```
then use this command to run this program
```bash
php move.php [extension]
```
while "[extension]" is the expected extension to the files being moved
 
## WHY DID I WRITE THIS CODE?
After downloading a playlist from youtube I had a problem with it because the names of videos were not convenient for windows as it doesn't follow windows file naming conventions by having characters like the pipe `|` so the names have been considered as incorrect and the video files haven't been moved to the correct folder after finishing the download, but the files was still saved in the `%AppData%` folder, so I tried to solve the problem manually by finding the directory where the idm saves the downloaded files and figured out that it creates a new folder foreach download under this path `C:\Users\USERNAME\AppData\Roaming\IDM\DwnlData\USERNAME\`

Inside each folder from these you'll find two files if the download has been completed successfully:
- The first file called log+\[number].log >> it has the logs for the download and errors if there were any
- The second file will have a name like `AG3C_xAwRQIgP5c3Cc6QGDx` >> this is the downloaded file

So I started to edit the names of the downloaded files and move it to the path where I'll save it.
I found that this will be boring to do it manually for the whole list of videos, Then I started to write this script to save it for later use if I ever met the same problem again.
