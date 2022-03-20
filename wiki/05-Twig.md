# Twig

*  🔖 **Render**
*  🔖 **Variables**
*  🔖 **Itération**
*  🔖 **Condition**
*  🔖 **Include**
*  🔖 **Extends**
*  🔖 **Block**
*  🔖 **Filtres**
*  🔖 **Functions**

___

## 📑 Render

Pour afficher une valeur dans un template il faut utiliser la méthode `render` et passer un tableau associatif. Les index du tableau correspondent aux variables disponibles dans le template.

```php
return $this->render('foo/index.html.twig', [
    'title' => "Hello World",
]);
```

___

## 📑 [Variables](https://twig.symfony.com/doc/3.x/templates.html#variables)

Pour afficher une variable il faut l’interpoler .

### 🏷️ **Afficher**

```twig
{{ title }}
```

Pour accéder aux attributs et méthodes il faut utiliser le point.

```twig
{{ foo.bar }}
```

### 🏷️ **Créer**

Il est possible de créer une variable.

```twig
{% set foo = 'foo' %}
```

### 🏷️ **Globale**

Pour accéder facilement à l'utilisateur, la session, la requête et l'environnement une variable globale est présente: app.

```twig
{{ dump(app) }}
```


___

## 📑 [Itération](https://twig.symfony.com/doc/2.x/tags/for.html)

Le bloc `for ` permet d'itérer.

```twig
{% for user in users %}
    {{ user.username }}
{% endfor %}
```

### 🏷️ **[Condition](https://twig.symfony.com/doc/2.x/tags/for.html#adding-a-condition)**

Il est possible d'itérer et d'ajouter une condition pour chaque itération.

```twig
{% for user in users if user.active %}
    {{ user.username }}
{% endfor %}
```

___

👨🏻‍💻 Manipulation

Créez une page qui affiche une liste.

___

## 📑 [Condition](https://twig.symfony.com/doc/3.x/tags/if.html)

Le bloc `if` permet d'afficher sous condition.

```twig
{% if title == 'Hello' %}
    <h1>{{ title }}</h1>
{% endif %}
```

Pour la `taille des tableaux`, ils faut utiliser le filtre `length`.

```twig
{% if products  %}
    <h1>{{ products|length }}</h1>
{% endif %}
```

Pour l'`existence d'une variable` il faut utiliser `is defined `

```twig
{% if title is defined %}
    <h1>{{ title }}</h1>
{% endif %}
```

___

👨🏻‍💻 Manipulation

Créez une condition au cas ou une collection ne possède pas de résultat

___

## 📑 [Include](https://twig.symfony.com/doc/3.x/tags/include.html)

```twig
{% include 'header.html.twig' %}
```

L'instruction include comprend un template et renvoie le contenu rendu de ce fichier.

> La convention de nommage pour les éléments inclus correspond à les préfixer par un `_`.

___

## 📑 [Extends](https://twig.symfony.com/doc/3.x/tags/extends.html)

Définissons un template de base, base.html, qui définit un simple document squelette:

```twig
{% extends 'base.html.twig' %}
```

Pour inclure du contenu dans le squelette il faut utiliser la notion de bloc.

> La convention de nommage pour les éléments hérités correspond à les nommer `layout.html.twig`.

___

## 📑 [Block](https://twig.symfony.com/doc/2.x/tags/block.html)

Les blocs sont utilisés pour l'héritage et agissent comme des espaces réservés et des remplacements en même temps.

Une fois que l'on hérite du template, il n'est pas possible de déclarer du contenu en dehors des blocs déclarés mais il est possible de créer de nouveaux blocs en dehors de blocs déclarés.

* Parent

```twig
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>{% block title %}Welcome!{% endblock %}</title>
        {% block stylesheets %}{% endblock %}
    </head>
    <body>
        {% block body %}{% endblock %}
        {% block javascripts %}{% endblock %}
    </body>
</html>
```

* Enfant

```twig
<!DOCTYPE html>
{% extends 'base.html.twig' %}

{% block body %}
    Contenu du block body
{% endblock %}
```

La fonction parent() récupère le contenu du bloc parent, utile pour surcharger une navigation ou un titre.

```twig
{% block title %}{{ parent() }}Foo{% endblock %}
```

___

👨🏻‍💻 Manipulation

Proposez une organisation des templates, les fichiers inclus et réutilisables, la déclaration des blocs, l'héritage et appliquez la.

___

## 📑 [Filtres](https://twig.symfony.com/doc/3.x/filters/index.html)

Les variables peuvent être modifiées par des filtres. Les filtres sont séparés de la variable par un symbole de tuyau (|). Plusieurs filtres peuvent être chaînés. La sortie d'un filtre est appliquée au suivant.

```twig
{{ title|upper }}
```

> Symfony ajoute des filtres à Twig.

[Twig Filters](https://symfony.com/doc/current/reference/twig_reference.html#filters)

___

## 📑 [Functions](https://twig.symfony.com/doc/2.x/functions/index.html)

```twig
{{ path('foo_index')}}
```

Les fonctions permettent d'obtenir une valeur de retour affichée dans le template.

> Symfony ajoute des fonctions à Twig.

[Twig Functions](https://symfony.com/doc/current/reference/twig_reference.html#functions)

___

👨🏻‍💻 Manipulation

Créer des liens pour naviguer sur le projet.

___