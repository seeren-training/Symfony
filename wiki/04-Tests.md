# Tests

*  🔖 **Introduction**
*  🔖 **PHPUnit**
*  🔖 **Redaction**
*  🔖 **Provider**

___

## 📑 Introduction

les tests fonctionnels assurent que les différents modules ou composants implémentent correctement les exigences client. Ces tests peuvent être de type valide, invalide, inopportuns, etc.

Les tests fonctionnels n'impliquent pas que vous testez une fonction (méthode) de votre module ou classe. Les tests fonctionnels testent une tranche de fonctionnalité de l'ensemble du système.

___

## 📑 [PHPUnit](https://phpunit.de/)

PHPUnit est un framework de test orienté programmeur pour PHP.

### 🏷️ **Installation**

Sur Symfony PHPUnit est déjà installé et configuré.

### 🏷️ **Execution**

Il est possible de lancer l'ensemble des tests de plusieurs façon. Le framework a proposé de rassembler les cli dans le dossier bin.

```bash
bin/ phpunit
```

A l'installation par défaut phpunit se trouve dans le dossier bin de vendor.

```bash
vendor/bin/phpunit
```

En exécutant la commande, l'ensemble des tests présents dans le dossier test sont exécutés.

___

## 📑 [Rédaction](https://symfony.com/doc/current/testing.html)

La structure du dossier test doit correspondre à celle du dossier src.

En testant les controllers nous testons le résultat d'une requette http. De ce fait entre chaque test il faut reboot le noyau de symfony pour qu'il n'y ait pas de rapport entre un test et un autre.

Pour tester le résultas pour un client dans un webbrowser nous avons les `WebTestCase` qui correspond à nos besoins.

Pour créer un test nous avons la commande suivante.

```bash
bin/console make:test
```

```php
class FooControllerTest extends WebTestCase { }
```
___

👨🏻‍💻 Manipulation

Créez un test pour un controller

___

Pour chaque action du controller vous pouvez procéder à différente assertions.

### 🏷️ **Status Code**

Il est possible de vérifier le code de retour précis d'une action.

```php
$this->assertResponseStatusCodeSame(200);
```

### 🏷️ **Headers**

Les entêtes peuvent être comparées.

```php
$this->assertResponseHeaderSame(
    'Content-Type', 
    'text/html; charset=UTF-8'
);
```

### 🏷️ **Body**

Il est également possible de vérifier le contenu des noeuds du document.

```php
$this->assertSelectorTextContains(
    'h1',
    'Hello RouteController!'
);
```

## 📑 [Provider](https://phpunit.de/manual/3.7/en/writing-tests-for-phpunit.html)

Vous souhaitez effectuer le même test de façon répétée et sans qu'un test puisse impacter le suivant et donc éviter de faire une boucle: les dataProviders sont là.

L'idée est de fournir à un tests de la données et d'exécuter ce test autant de fois qu'il y a de la donnée.

```php
private function actionProvider() : array 
{
    return [
        [
            'GET',
            '/product'
        ],
        [
            'GET',
            '/product/new'
        ],
    ];
}
```

Le fournisseur peut être utiliser par un cas de test.

```php
/**
 * @dataProvider actionProvider
 */
public function testSomething(
    string $method,
    string $path,
): void
{
    //...
}
```

___

👨🏻‍💻 Manipulation

Tester l'ensemble des actions d'un controller avec les dataProviders.

___