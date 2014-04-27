Point-it
========

Le renouveau du Pointbook

#Structure du projet
/application : c'est ici qu'on intervient, et seulement dans les dossiers controllers, models et views \n
/system : fichiers du frameword : ne pas modifier \n
/assets : contient tous les fichiers de ressources utiles au projet ( css, images, javascript ) \n
/bdd : contient le modele et la base de données \n

##Framework PHP
Point-!t utilise le framework Codeigniter pour gérer toute la partie PHP. il ne faut modifier que les fichiers non créée par le framework
Les trois grandes parties du projet sont à développer se trouve dans le dossier application

###Model
Gère la persistance en enregistrant les données dans une base de données. Ici on utilises MySQL ainsi que l'Active Record offert par le framework

###View
Gère tout ce qui est affichage. Pour le design, c'est par la !

###Controller
Gère l'interaction avec la base de données ainsi que les actions de l'utilisateur. 

##CSS
Bootstrap gère la partie CSS. 
Un style perso de CSS est utiulisé en plus pour personnaliser davantage le site

##Javascript
Jquery, parce que le javascript c'est de la merde ♥

#Comment installer le projet
Il faut tout d'abord installer WAMP pour permettre à votre ordinateur d'avoir un serveur local de test
Il faut ensuite déposer l'intégralité du dossier dans le dossier C:/wamp/ww
Il faut ensuite lancer phpMyAdmin et charger le fichier de base de données
Se rendre à l'adresse "http://localhost/Point-it/index.php/login" (en fonction de comment vous avez nommé vos fichiers)


