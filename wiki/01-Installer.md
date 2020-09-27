# Installer

*  🔖 **Le Framework**
*  🔖 **Installation**
*  🔖 **Compléments**
*  🔖 **Nommage**
*  🔖 **CLI**

___

## 📑 [Le Framework](https://symfony.com/)

Symfony est un ensemble de composants PHP ainsi qu'un framework MVC libre écrit en PHP. Il fournit des fonctionnalités modulables et adaptables qui permettent de faciliter et d’accélérer le développement d'un site web.

### 🏷️ **[Projet](https://github.com/symfony/symfony)**

Plus de 2000 contributeurs font avancer le projet.

![image](https://raw.githubusercontent.com/seeren-training/Symfony/master/wiki/resources/contributeurs.png)

Le fondateur du Framework et co-fondateur de Sensio, `Fabien Potencier` est un contributeur important.

![image](https://raw.githubusercontent.com/seeren-training/Symfony/master/wiki/resources/contributeurs-detail.png)

L'agence web française `SensioLabs` est à l'origine du framework Sensio Framework2. À force de toujours recréer les mêmes fonctionnalités de gestion d'utilisateurs, gestion ORM, etc., elle a développé ce framework pour ses propres besoins3. Comme ces problématiques étaient souvent les mêmes pour d'autres développeurs, le code a été par la suite partagé avec la communauté des développeurs PHP.

> Le 5 septembre 2017, Symfony passe la barre du milliard de téléchargements.5


### 🏷️ **[Versions](https://symfony.com/releases)**

Le framework en est à la version 5 mais la LTS est la version 4.4.

![image](https://raw.githubusercontent.com/seeren-training/Symfony/master/wiki/resources/roadmap.png)

___

## 📑 [Installation](https://www.php.net/manual/fr/language.oop5.visibility.php)

Nous allons installer la dernière version bien que n'étant pas la `LTS`, il y a peu de changements entre la LTS et la `latest`. Il est possible d'installer Symfony avec Composer ou avec le birary Symfony.

### 🏷️ **[CLI](https://symfony.com/download)**

Tous les packages peuvent s'installer avec le package manager. Cependant le framework propose un binary pour ce faire.

![image](https://raw.githubusercontent.com/seeren-training/Symfony/master/wiki/resources/symfony-cli.png)

* *Créer un projet*

```bash
symfony new my_project_name --full
```

* *Créer un projet pour une version*

```bash
symfony new my_project_name --full --version=4.4
```

Vous remarquez que le CLI n'est qu'un shortcut vers l'installation avec composer.

* *Démarrer le serveur*

```bash
symfony server:start
```

* *Vérifier les pré-requis*

```bash
symfony server check:requirements
```

### 🏷️ **[Composer](https://getcomposer.org/)**

Composer est la package manager des packages PHP, il est un pré-requis de l’utilisation de Symfony.

* *Créer un projet*

```bash
composer create-project symfony/website-skeleton my_project_name
```

* *Créer un projet pour une version*

```bash
composer create-project symfony/website-skeleton:"^4.4" my_project_name
```

* *Démarrer le serveur*

```bash
php -S localhost:8000 -t public
```

* *Vérifier les pré-requis*

Pour vérifier les pré-requis nous allons apprendre à installer des packages complémentaire et prendre l'habitude de nous référer à la documentation.

___

👨🏻‍💻 Manipulation

Installer un projet avec Symfony CLI ou Composer.

___

## 📑 Compléments

Il est possible d'avoir besoin de package complémentaire et nous prendrons le prétexte des pré-requis pour apprendre à le faire.

Pour installer un package il faut utiliser composer. Depuis la version 4, Symfony Flex donne des alias aux packages à installer et exécute des recettes avant/après son installation pour pré marcher son utilisation.

### 🏷️ **Installation**

Pour installer un package qui vérifie nos pre requis nous pouvons utiliser cette commande que nous trouvons sur la [documentation](https://symfony.com/doc/4.2/reference/requirements.html).

```bash
composer require symfony/requirements-checker
```

Et le server Flex propose les alias suivants:
`req-check`, `req-checker`, `req-checks`, `requirement-check`, `requirement-checker`, `requirements-checker`.

### 🏷️ **Recette**

Suite à son installation nous sommes informé d'action supplémentaires.

![image](https://raw.githubusercontent.com/seeren-training/Symfony/master/wiki/resources/receipt.png)

Pour exécuter ce package qui donne des informations supplémentaires, vous pouvez exécuter son CLI.

```bash
vendor/symfony/requirements-checker/bin/requirements-checker
```

___

👨🏻‍💻 Manipulation

Réglez les recommandations optionnelles concernant le PHP accelerator, les tailles du cache et les extensions en modifiant votre php.ini et en regardant les extensions et leur activation.

___

## 📑 Nommage

Pour vous référer à des conventions et un coding style, je vous invite à observer le PSR-1 et les ressources Symfony.

* PSR-1: https://www.php-fig.org/psr/psr-1/

* Coding Standards: https://symfony.com/doc/current/contributing/code/standards.html#structure

* Convention: https://symfony.com/doc/current/contributing/code/conventions.html

___

👨🏻‍💻 Manipulation

Observez le CS et la convention de nommage, posez des questions en rapport

___

## 📑 CLI

Avec ce Framework nous disposons d'un utilitaire pour automatiser des taches et nous offrir des fonctionnalité: la console.

```bash
bin/console
```

Nous observons majoritairement des commandes concernant:
* Le cache
* Le debug
* L'accès aux données
* La création

___

👨🏻‍💻 Manipulation

Observez les commandes, posez des questions en rapport

___