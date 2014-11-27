#!/bin/bash

#A symbolic link was created in order to develop into the "Code/MyWebSite" directory instead of the origin spot wich is /opt/lamp/htdocs/MyWebSite/.
#Then, the root directory of the website is : /MyWebSite/.

if [ $0 = "start" ]
then
	#The followong command launches the web server :        
	#/opt/lampp/lampp start
	echo $0
elif [ $0 = "stop" ]
then
        #The followong command stops the web server :
	/opt/lampp/lampp stop
else
        echo "Enter \"start\" to launch Apache server or \"stop\" to stop it"
fi




#To test the website, go to : http://localhost/file.php


