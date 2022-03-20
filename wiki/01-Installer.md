# Installer

*  🔖 **Le Framework**
*  🔖 **Installation**
*  🔖 **Compléments**
*  🔖 **Nommage**
*  🔖 **CLI**

___

## 📑 [Le Framework](https://symfony.com/)

Symfony est un ensemble de composants PHP ainsi qu'un framework MVC libre écrit en PHP. Il fournit des fonctionnalités modulables et adaptables qui permettent de faciliter et d’accélérer le développement d'un site web.

### 🏷️ **[License](https://github.com/symfony/symfony)**

Sous license MIT, Plus de 2000 contributeurs font avancer le projet.

![image](https://raw.githubusercontent.com/seeren-training/Symfony/master/wiki/resources/contributeurs.png)

Le fondateur du Framework et co-fondateur de Sensio, `Fabien Potencier` est un contributeur important.

![image](https://raw.githubusercontent.com/seeren-training/Symfony/master/wiki/resources/contributeurs-detail.png)

L'agence web française `SensioLabs` est à l'origine du framework Sensio Framework2. À force de toujours recréer les mêmes fonctionnalités de gestion d'utilisateurs, gestion ORM, etc., elle a développé ce framework pour ses propres besoins. Comme ces problématiques étaient souvent les mêmes pour d'autres développeurs, le code a été par la suite partagé avec la communauté des développeurs PHP.

> Le 5 septembre 2017, Symfony passe la barre du milliard de téléchargements.5

### 🏷️ **[Versions](https://symfony.com/releases)**

Le framework en est à la version 6 et la LTS est la version 5.4.6

![image](https://raw.githubusercontent.com/seeren-training/Symfony/master/wiki/resources/roadmap.png)

Observons le planning des prochaines conférences Symfony.

[Planning conférence](https://live.symfony.com/2022-paris/schedule#session-627)

Les thèmes les plus  récurents sont:

* [DDD](https://fr.wikipedia.org/wiki/Conception_pilot%C3%A9e_par_le_domaine)
* [Api Platform](https://api-platform.com/)

### 🏷️ **[Composants](https://symfony.com/components)**

Les composants Symfony sont des bibliothèques découplées pour les applications PHP. Testé au combat dans des centaines de milliers de projets et téléchargé des milliards de fois.

Observons concretement quelques composants.

#### [VarDumper](https://symfony.com/doc/current/components/var_dumper.html#the-dump-function)

Fournit des mécanismes pour parcourir n'importe quelle variable PHP arbitraire.

```php
dump($someVar);
```

#### [Translation](https://symfony.com/doc/current/translation.html)

Fournit des outils pour internationaliser votre application.

```php
echo $translator->trans('Hello World');
```

#### [HttpClient](https://symfony.com/doc/current/http_client.html)

Un client HTTP de bas niveau prenant en charge les wrappers de flux PHP et cURL. Il fournit également des utilitaires pour consommer des API.

```php
$json = HttpClient::create()
    ->request(
        'GET',
        'https://api.github.com/repos/symfony/symfony-docs'
    )->getContent();
```

___

## 📑 Environnement

### 🏷️ **Prerequis**

La dernière version de Symfony possède comme prérequis la présence de php 8.0.2 présent dans la variable d'environnement PATH.

```bash
php -v
```

Le package manager du langage est également un prérequis.

```bash
composer -v
```

Un outil utilisé de façon optionelle est Git.

```bash
git --version
```

___

👨🏻‍💻 Manipulation

Vérifiez vos prérequis et ajustez si necessaire.

___

Nous allons installer la dernière version bien que n'étant pas la `LTS`, il y a peu de changements entre la LTS et la `latest`. Il est possible d'installer Symfony avec Composer ou avec le binary Symfony.

### 🏷️ **[Symfony](https://symfony.com/download)**

Tous les packages peuvent s'installer avec le package manager. Cependant le framework propose un binary pour ce faire.

___

👨🏻‍💻 Manipulation

Installer Symfony CLI.

___

![image](https://raw.githubusercontent.com/seeren-training/Symfony/master/wiki/resources/symfony-cli.png)

* *Créer un projet*

```bash
symfony new my_project_name --webapp
```

* *Créer un projet pour une version*

```bash
symfony new my_project_name --webapp --version=4.4
```

Vous remarquez que le CLI n'est qu'un shortcut vers l'installation avec composer.

* *Démarrer le serveur*

```bash
symfony server:start
```

* *Arreter le serveur*

```bash
symfony server:stop
```

___

👨🏻‍💻 Manipulation

Initialisez un projet et démarrez le server.

___

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

___

## 📑 Compléments

Observons quelques points qui garantissent une bonne execution de notre programme et une bonne pratique syntaxique.

### 🏷️ **Checker**

Symfony attend de l'environnement d'avoir un cache php, une version des caractères à jour et une configuration du php.ini qui alloue des tailles d'exécution minimales.

```bash
symfony check:req
```

___

👨🏻‍💻 Manipulation

Reglons les points critiques s'il y en a.

___

### 🏷️ **Nommage**

Pour nous référer à des conventions et un coding style, je vous invite à observer le PSR-1 et les ressources Symfony.

[PSR-1](https://www.php-fig.org/psr/psr-1/)

[Coding Standards](https://symfony.com/doc/current/contributing/code/standards.html#structure)

[Convention](https://symfony.com/doc/current/contributing/code/conventions.html)

___

👨🏻‍💻 Manipulation

Observez le CS et la convention de nommage, posez des questions en rapport

___

### 🏷️ **Console**

Avec ce Framework nous disposons d'un utilitaire pour automatiser des taches et nous offrir des fonctionnalité: la console.

```bash
bin/console
```

Nous observons majoritairement des commandes concernant:
* Le cache
* Le debug
* L'accès aux données
* La création
* ...

___

👨🏻‍💻 Manipulation

Observez les commandes, posez des questions en rapport.