# Découvrir

*  🔖 **Projet**
*  🔖 **Profiler**
*  🔖 **Logs**

___

## 📑 Projet

Il est possible que la structure du projet généré soit clair. Nous allons en discuter mais l'objectif de cette formation est de les maîtriser en les pratiquant.

___

👨🏻‍💻 Manipulation

Observons les dossiers crées à l'installation du projet et discutons en.

___

## 📑 [Profiler](https://symfony.com/doc/current/profiler.html)

Le profiler se composer d'une barre de debug ouvrant le Web Profiler.

### 🏷️ **Debug Tool Bar**

Se trouvant en bas de la fenêtre cette barre donnes un récapitulatif de la requête. 

![image](https://raw.githubusercontent.com/seeren-training/Symfony/master/wiki/resources/debugtoolbar.png)

> Attention elle n'est visible quand quand le document est complet et bien formé. Dans le cas ou un controller ne forme pas un document HTML elle ne sera pas visible.

En cliquant sur une information elle ouvre le Web Profiler.

### 🏷️ **Web Profiler**

Il contient des informations exhaustive sur la requête par section.

![image](https://raw.githubusercontent.com/seeren-training/Symfony/master/wiki/resources/webprofiler.png)

Vous trouvez des informations sur la requête, la validation des formulaires, la traduction, les exceptions, les logs, l'accès aux données, la sécurité, le système de templates et toute fonctionnalité que la requête a pu activer.

___

## 📑 [Logs](https://symfony.com/doc/current/logging.html)

Chaque erreur est logée dans un fichier.

Par défaut le log se fait en mode développement et production, mais en production seul les error, critical, alert et emergency seront logés...

Il est possible de spécifier différents fichiers de log par channel (doctrine, event, security, request).

[Channels](https://symfony.com/doc/current/logging/channels_handlers.html)
