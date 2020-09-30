# Security

*  🔖 **User**
*  🔖 **Login**
*  🔖 **Roles**

Le concept de séurité fait référence au composant de sécurité qui gère les authentification et autorisations des utilisateurs.

___

## 📑 [User](https://symfony.com/doc/current/security.html#a-create-your-user-class)

Pour manipuler un utilisateur qui peut être manipulé par le composant security, il faut le générer avec le maker.

```bash
bin/console make:user
```

Un utilisateur est fait pour être authentifié et Symfony vous permet de générer cette authentification, sa configuration, son controller, sa vue.


___

## 📑 [Login](https://symfony.com/doc/current/security/form_login_setup.html#generating-the-login-form)

Pour générer un login/logout il faut générer une authentification.

```bash
$ bin/console make:auth
```

Comme suggéré par le CLI, il vous faut éditer votre `Authenticator` pour rediriger votre utilisateur sur une route de votre choix après un success d'authentification, en décommentant la redirection dans `onAuthenticationSuccess` et en modifiant le nom de la route en argument.

### 🏷️ **Custom**

Si vous pensiez créez vous mêmes votre login/logout vous n'aurez pas cette opportunité.

> Si vous modifiez le Controller généré pour qu'il respecte votre convention pour le nom des routes vous devrez modifier la constante `LOGIN_ROUTE` de l'`Authenticator`. Empechez un utilisatuer d'accéder à la vue s'il est connecté en décommentant l'instruction en rapport puis personnalisez le template.

### 🏷️ **Signup**

En revanche pour utiliser le login il faut posséder dans la base de données un utilisateur avec un mot de passe hashé avec une implémentation de `UserPasswordEncoderInterface`.

___

## 📑 [Roles](https://symfony.com/doc/current/security.html#a-create-your-user-class)

Il est possible de restraindre l'accès à des actions en fonction du rôle possédé.

### 🏷️ **[@IsGranted](https://symfony.com/doc/current/bundles/SensioFrameworkExtraBundle/annotations/security.html)**
