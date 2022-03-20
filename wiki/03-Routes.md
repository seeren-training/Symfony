# HTTP

*  🔖 **HTTP**
*  🔖 **Route**

___

## 📑 [HTTP](https://symfony.com/doc/current/introduction/http_fundamentals.html)

La notion de route doit être acquise. Une route décrit la requête HTTP. Le Kernel du Framework va opérer le `matching` pour voir si la requête correspond à une route, puis le `dispatching` pour créer l'instance du `Controller` et des instances en dépendances pour finalement invoquer l'`action` du Controller, qui est la méthode ayant la responsabilité de fournir une `réponse`.

![image](https://raw.githubusercontent.com/seeren-training/Symfony/master/wiki/resources/http.png)

### 🏷️ **[Controller](https://symfony.com/doc/current/controller.html)**

L'utilitaire Maker est disponible pour créer un controller et ses actions.

* Créer un controller

```bash
bin/console make:controller
```

```bash
bin/console make:controller Foo
```

La création d'un dossier dépend de votre environnement.

* Unix

```bash
bin/console make:controller Foo\\Bar
```

* Window

```bash
bin/console make:controller Foo\Bar
```

Vous constatez qu'un controller a été créé et que dans templates, un dossier correspondant à ses vues à été généré. Au dessus du controller vous constatez une annotation particulière.

### 🏷️ **[Response](https://symfony.com/doc/current/components/http_foundation.html#response)**

Toutes les actions d'un controller renvoient une response.

#### **Markup**

Par défaut la méthode render attend le nom d'un template et un tableau de données pour fournir au body d'une response le template dynamisé.

```php
return $this->render('foo/index.html.twig', [
    'controller_name' => 'FooController',
]);
```

#### **Json**

Vous disposez d'une méthode pour le format `json`.

```php
return $this->json([
    'controller_name' => 'ResponseController',
]);
```

#### **Custom**

Il est possible de personnaliser complétement la réponse en la créant sois même et en l'enrichissant programmatiquement.

```php
$response = new Response();
$response->headers->set('Content-Type', 'text/plain');
return $response
    ->setContent('Created')
    ->setStatusCode(Response::HTTP_CREATED);
```

#### **Reditection**

Il est possible de rediriger vers une route nommée.

```php
return $this->redirectToRoute('bar');
```

Les url arbitraires peuvent également être redirigées.

```php
return $this->redirect('https://www.google.com');
```


### 🏷️ **[Request](https://symfony.com/doc/current/components/http_foundation.html#overriding-the-request)**

La requette en cours de l'utilisateur est partagée par l'ensemble des acteurs du programme et pour l'obtenir nous devons utiliser le concept d'injection de dépendance.

```php
public function index(Request $request): Response
{
    return $this->render('http/request/index.html.twig', [
        'controller_name' => 'RequestController',
    ]);
}
```

#### **URL**

La partie subjective d'url est semblable à SERVER['PATH_INFO'] obtenue par le built in server.

```php
$request->getPathInfo();
```

#### **Méthode**
La méthode est comparable à SERVER['REQUEST_METHOD'].

```php
$request->getMethod();
```

#### **GET**

L'ensemble de $_GET se trouve sur la propriété query

```php
$request->query->get('foo');
```

#### **POST**

L'ensemble de $_POST se trouve sur la propriété request

```php
$request->request->get('foo');
```

#### **SERVER**
L'ensemble de $_SERVER se trouve sur la propriété server

```php
$request->server->get('SCRIPT_FILENAME');
```

___

👨🏻‍💻 Manipulation

Créez quelques controllers!

___

## 📑 [Routes](https://symfony.com/doc/current/routing.html)

Une route est constitué d'au moins une propriété qui correspond au path info. 

### 🏷️ **Les formats**

Il existe plusieurs formats disponibles pour noter les routes.

#### **Annotation**

Pour les versions de php inférieure à la 8, le format des annotation était utilisé.

```php
/**
 * @Route("/http/route/annotation")
 */
```

#### **Attribut**

Depuis php 8, le format attribut a remplacé le format annotation.

```php
#[Route('/http/route/attribut')]
```

#### **Yaml**

Il est également possible de centraliser les déclarations de routes dans des fichiers de configuration.

```yaml
routeYml:
    controller: App\Controller\Http\RouteController::index
    path: route/yaml
```

Il est également possible d'importer des fichiers pour éclater les routes sur plusieurs fichiers.

```yaml
controllersYaml:
    resource: routes/controllers.yaml
```

___

👨🏻‍💻 Manipulation

Quel est le format le plus pratique?

___

### 🏷️ **Les propriétés**

Une route peut avoir un chemin dynamique ou être contraintes.

#### **[Paramètre](https://symfony.com/doc/current/routing.html#route-parameters)**

Un chemin peut avoir des paramètres. Cette notation dans la déclaration de la route pour le paramètre d'url s'appel un `slug`.

```php
#[Route('/product/{id}')]
```

Pour le chemin `/product/7` l'action sera bien invoquée. L'identifiant du paramètre respecte les conventions de nommage des variables. Il est possible de déclarer plusieurs paramètres.

Il est possible de récupérer la variable en la déclarant.

```php
#[Route('/product/{id}')]
public function index(int $id): Response
```

Il est possible de déclarer un [paramètre optionnel](https://symfony.com/doc/current/routing.html#optional-parameters), s'il est présent dans l'url ou non l'action sera invoquée.

```php
#[Route('/product/{id}')]
public function index(int $id = null): Response
```

[Validation](https://symfony.com/doc/current/routing.html#parameters-validation)

Il est possible de contraindre un paramètre en utilisant les expression régulières.

```php
 #[Route('/product/{id<[0-9]{1,3}>}')]
```

#### **Name**

Bien qu'optionnel, il est important de déclarer une valeur à l'attribut name de la route avec comme convention de nommage, le namespace et celui de l'action en snake_case. Ce nom sera utiliser pour créer des liens par exemple.

```php
 #[Route('/product', name: 'app_product')]
```

#### **Méthods**

Il est possible de contraindre une ou plusieursméthode HTTP sur une action.

```php
#[Route('/product', methods: ['POST'])]
```

### 🏷️ **Bonne pratique**

Le nommage suivant est conseillé.

#### **Annotation class**

Dans un controller vous risquez d'avoir plus d'une action. Si toutes ces actions ont une base de chemin d'url commune, il est possible de spécifier cette base sur la classe et de compléter le chemin sur l'action. 

```php
#[Route('/product')]
class ProductController extends AbstractController
```

#### **Annotation action**

Par défaut l'action du controller est identifié par "index", la convention ne parle pas du nommage des actions, admettez les actions suivantes pour du CRUD.

* Récupérer tous les items

```php
#[Route('/', name: 'app_product_index', methods: ['GET'])]
```

* Créer un item

```php
#[Route('/new', name: 'app_product_new', methods: ['GET', 'POST'])]
```

* Récupérer un item

```php
#[Route('/{id}', name: 'app_product_show', methods: ['GET'])]
```

* Modifier un item

```php
#[Route('/{id}/edit', name: 'app_product_edit', methods: ['GET', 'POST'])]
```

* Supprimer un item

```php
#[Route('/{id}', name: 'app_product_delete', methods: ['POST'])]
```

___

## 📑 Debug

La bonne pratique correspond à créer des routes en annotations. Pour lister les routes il y a un utilitaire de debug.

```bash
bin/console debug:route
```

___

👨🏻‍💻 Manipulation

Créer des controllers en utilisant le nommage observé.




