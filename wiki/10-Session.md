# Session

*  🔖 **Obtenir**
*  🔖 **Manipuler**
*  🔖 **Flash bag**

______

## 📑 [Obtenir](https://symfony.com/doc/current/session.html)

La session se configure dans `config/packages/framework.yaml`.

Pour obtenir la session de puis un controller elle est disponible sur Request.

```php
$request->getSession()
```

Il est possible de la déclarer avec l'autowiring.

```php
public function new(SessionInterface $session)
```

La session se démarre automatiquement.

______

## 📑 [Manipuler](https://symfony.com/doc/current/session.html#basic-usage)

Les méthodes set et get et remove permettent simplement de manipuler la session.

*Set*

```php
$this->session->set('my-key', 'my-value');
```

*Get*

```php
$value = $this->session->get('my-key');
```

*Remove*

```php
$this->session->remove('my-key');
```

___

## 📑 [Flash bag](https://symfony.com/doc/current/components/http_foundation/sessions.html#flash-messages)

Le flash bag est un sac de valeur qui utilisent la session et qui ne sont disponible qu'a la prochaine Request. L'idée est de pouvoir proposer un message lors d'une redirection.

Il est possible d’enregistrer une ou plusieurs valeurs pour un index.

```php
$session->getFlashBag()->add('error', 'Failed to update name');
$session->getFlashBag()->add('error', 'Another error');
```

Pour récupérer les messages il est conseillé d'utiliser la paramètre optionnel pour la valeur par défaut.

```php
foreach ($session->getFlashBag()->get('error', []) as $message) {
}
```

Dans twig il est possible d'accéder aux messages.

```php
{% for message in app.flashes('error') %}
    <div class="alert alert-{{ label }}">
        {{ message }}
    </div>
{% endfor %}
```
___

👨🏻‍💻 Manipulation

Utiliser le Flash Bag pour afficher des messages de succès ou d'erreurs lors de redirections.

___
