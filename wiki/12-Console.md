# Console

*  🔖 **Les commandes**
*  🔖 **Ecriture**
*  🔖 **Arguments**
*  🔖 **Stylisation**


___

## 📑 [Les commandes]((https://symfony.com/doc/current/console.html))

Les commandes sont simplement les isntructions que vous exécutez depuis un terminal

___

## 📑 Ecriture

Le maker nous simplifie la création de commandes.

```bash
bin/console make:command app:foo
```

Pour l'executer il faut passer par la console.

```bash
bin/console app:foo
```

___

## 📑 Arguments

Nous disposons d'une méthode pour ajouter la présence d'un argument et son optionnalité ou non.

```php
$this->addArgument(
    'someArg',
    InputArgument::REQUIRED,
    'Argument description'
);
```

Nous disposons d'une méthode pour ajouter la présence d'une option et la présence de valeur ou non.

```php
$this-->addOption(
    'someOpt',
    null,
    InputOption::VALUE_NONE,
    'Option description'
);
```

Pour l'executer il faut passer par la console.

```bash
bin/console app:foo someArg --someOpt
```

___

## 📑 Stylisation

Vous disposez de nombreuses méthodes pour mettre en forme votre contenu.

```php
$io->section("Some section");
$io->writeln('Section content');
$response = $io->choice('Framework', ['Symfony', 'Laravel']);
$io->writeln($response);
```

Cet outil est utilisé par de nombreuses librairies en php comme composer ou encore doctrine.

___

👨🏻‍💻 Manipulation

Créons une commande pour effectuer des insertions.

___