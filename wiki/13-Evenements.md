# Evenements

*  🔖 **Introduction**
*  🔖 **Listners et Subscribers**

___

## 📑 [Introduction](https://symfony.com/doc/current/event_dispatcher.html)

Vous pouvez réagir au différents évènements interns du framework, son cycle de vie ainsi qu'à des moments précis de l'exécution de votre programme.

La liste des évènements est la suivante.


* kernel.request
* kernel.controller
* kernel.controller_arguments
* kernel.view
* kernel.response
* kernel.finish_request
* kernel.terminate
* kernel.exception

[Reference](https://symfony.com/doc/current/reference/events.html)

___

## 📑 Listeners et Subscribers

Vous pouvez ajouter un écouteur pour un évènement qui aura besoin d'être qualifié dans service.yaml pour être pris en compte ou alors ajouter à la pile des écouteurs le votre en souscrivant pour être notifié.

### 🏷️ **Subscribers**

La façon la plus simple de réagir à un évènement. Symfony vous facilite les choses avec le maker.

```bash
bin/console make:subscriber 
```

___

👨🏻‍💻 Manipulation

Mettons en place un subscriber

___

### 🏷️ **Listeners**

Il est possible d'ajouter un écouteur à un handler de façon plus déclarative.

```php
class SomeResponseListener
{
    public function onKernelResponse(ResponseEvent $event)
    {
        //...
    }
}
```

Pour qu'il soit prise en compte nosu devons l'enregistrer dans les services.

```yaml
App\EventListener\CORSResponseListener:
    tags:
        - { name: kernel.event_listener, event: kernel.response }
```

___

👨🏻‍💻 Manipulation

Mettons en place un listener

___