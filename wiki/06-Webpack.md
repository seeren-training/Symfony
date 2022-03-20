# Webpack

*  🔖 **Webpack**
*  🔖 **Webpack Encore**

___

## 📑 Webpack

Webpack est le module bundler le plus utilisé dans l'écosystème JavaScript.

Analysons son utilité: [Webpack](https://github.com/seeren-training/JavaScript-ECMA/wiki/05#%EF%B8%8F-webpack)

___

## 📑 [Webpack Encore](https://symfony.com/doc/current/frontend.html)

Avoir un système de template c'est bien, mais comment intégrer vos assets. Symfony propose une solution simplifiée pour l'utilisation de webpack.

* Installer Webpack Encore

```bash
composer require symfony/webpack-encore-bundle
```

* Télécharger les pakages front-end

```bash
npm install
```

* Configurer

Si vous souhaitez modifier les points d'entré, utiliser un pré-processor ou autre pre-built setting, rendez vous sur le fichier webpack.config.js et sur sa documentation.

* Utiliser

Pour utiliser Webpack, des scripts sont présents dans le package.json.

```bash
npm run watch
```

* Intégrer

Pour intégrer les fichiers qui sont générés dans "public/build", des extensions twig pour webpack-encore sont prévues afin de créer automatiquement les liens.

* Les balise link

```twig
{{ encore_entry_link_tags('app') }}
```

* Les balise script

```twig
{{ encore_entry_script_tags('app') }}
```
___

👨🏻‍💻 Manipulation

Utiliser webpack-encore et compléter vos templates pour utiliser un framework CSS.