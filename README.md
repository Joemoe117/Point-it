Point-it
========

#Description générale
Point-!t est un site permettant de facilement trainer dans la boue, ou au contraire souligner les exploits de vos amis.


#Structure du projet
/application : c'est ici qu'on intervient, et seulement dans les dossiers controllers, models et views 

/system : fichiers du framework : ne pas modifier 

/assets : contient tous les fichiers de ressources utiles au projet ( css, images, javascript ) 

/bdd : contient le modele et la base de données 


##Framework PHP
Point-!t utilise le framework Codeigniter pour gérer toute la partie PHP. il ne faut modifier que les fichiers non créée par le framework
Pour les graphistes/design, la seule chose que vous devez toucher c'est le dossier views

##CSS
Point-!t utilise Bootstrap. Si tu sais pas ce que c'est, check ça sur Google. Ca nous permet d'avoir une interface potable et en plus d'etre responsive design.

##Javascript
On utilise Jquery, parce que fuck off le javascript

#Comment installer le projet
Si tu es développeur, tu es un grand garçon, sinon voici en gros les étapes sur Windows
1. Il faut tout d'abord installer le logiciel [Wamp](http://sourceforge.net/projects/wampserver/files/WampServer%202/Wampserver%202.5/wampserver2.5-Apache-2.4.9-Mysql-5.6.17-php5.5.12-32b.exe/download)WAMP pour permettre à votre ordinateur d'avoir un serveur local de test.
2. tu télécharges [GitHub for Windows](https://windows.github.com/). Et j'écrirai la suite plus tard =)
3. Il faut ensuite déposer l'intégralité du dossier dans le dossier C:/wamp/www/Point-it/
4. Il faut ensuite lancer phpMyAdmin et charger le fichier de base de données BDD.sql
5. Se rendre à l'adresse "http://localhost/Point-it/index.php/login" (en fonction de comment vous avez nommé vos fichiers)


