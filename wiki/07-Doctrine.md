# Doctrine

*  🔖 **Insert**
*  🔖 **Update**
*  🔖 **Delete**
*  🔖 **Select**
*  🔖 **QueryBuilder**

___

## 📑 [Insert](https://symfony.com/doc/current/doctrine.html#persisting-objects-to-the-database)

Pour insérer une donnée il faut utiliser l'ORM utilisé par le projet. Par défaut c'est Doctrine qui est utilisé. 

### 🏷️ **Doctrine**

Vous pouvez l'obtenir de plusieurs façon, observons la notation dans le Controller.

```php
$em = $this->getDoctrine()->getManager();
```

### 🏷️ **Persist**

Pour insérer uen entité il faut utiliser la méthode `persist` de l'ORM. La méthode met en fille d'attente de traitement et n'insère pas elle-même.

```php
$em->persist($entity);
```

### 🏷️ **Flush**

La méthode `flush` execute les requêtes en file d'attente et crée des requêtes en cas de modification d’état.

```php
$em->flush($);
```

___

👨🏻‍💻 Manipulation

Insérez vos données lors quand votre formulaire est valide, attention à la gestion d’erreur.

___

## 📑 [Update](https://symfony.com/doc/current/doctrine.html#updating-an-object)

Pour mettre à jour un objet, il suffit d'utiliser `flush` après qu'une entity ayant été recherché dans la base ait été modifié sur un de ses attributs.

```php
$entity->setSomething("New value");
$em->flush($);
```

___

## 📑 [Delete](https://symfony.com/doc/current/doctrine.html#deleting-an-object)

Pour supprimer une entity il suffit d'utiliser la méthode `remove` puis la méthode `flush`.

```php
$em->remove($entity);
$em->flush($);
```

___

## 📑 [Select](https://symfony.com/doc/current/doctrine.html#fetching-objects-from-the-database)

Pour sélectionner une entity il faut utiliser le répertoire de lecture associé.

### 🏷️ **Repository**

Il y a plusieurs façon pour récupérer le répertoire.

#### **ORM**

Il est possible d'utiliser l'ORM pou récupérer le répertoire.

```php
$repo = $this->getDoctrine()->getRepository(Foo::class);
```

#### **Autowire**

Il est possible de déclarer en paramètre de l'action le repository pour utiliser l'injection de dépendance et de traiter le repository comme un service dont l'instance sera partagé par l'ensemble de ceux qui autowire ce service.

```php
public function index(FooRepository $repo)
```

### 🏷️ **[Fetch one](https://www.doctrine-project.org/projects/doctrine-orm/en/latest/reference/working-with-objects.html#querying)**

Pour récupérer une entity il existe différentes méthodes que nous passons en revue.

#### **find**

La méthode `find` attend un identifiant et renvoie une entity ou null.

```php
$entity = $repo->find($id)
```

#### **One by**

La méthode findOneBy attend un critère de recherche.

* Le premier argument est un tableau pour spécifier la correspondance des colonnes attendues et correspond à utiliser l'opérateur AND.

```php
$entity = $repo->findOneBy([
    "id" => 1,
    "name" => "foo"
]);
```

#### **One by attribut**

La méthode `findOneBy` peut avoir son identifiant complété par le nom d'un attribut en utilisation la notation camelCase pour le concaténer et renvoie la même chose que `find`.

```php
$entity = $repo->findOneByEmail($mail)
```

### 🏷️ **[Fetch all](https://www.doctrine-project.org/projects/doctrine-orm/en/latest/reference/working-with-objects.html#by-simple-conditions)**

Pour récupérer une collection d'entity il existe différentes méthodes que nous passons en revue.

#### **By**

En enlevant le One, le valeur de retour sera toujours un tableau.

* Il est possible de spécifier une liste de valeur acceptable pour la correspondance à un attribut ce qui correspond à utiliser l'opérateur IN.

```php
$entites = $repo->findBy([
    "name" => [
        "foo",
        "bar"
    ]
]);
```

* L'ordre de sélection se spécifie en second argument ce qui correspond à utiliser ORDER BY.

```php
$entity = $repo->findBy(
    [
        "name" => [
            "foo",
            "bar"
        ]
    ],
    [
        'id' => 'ASC'
    ]
);
```

* La limite de sélection et le décalage se spécifie en argument trois et quatre et correspondent à LIMIT et OFFSET.

```php
$entity = $repo->findBy(
    [
        "name" => [
            "foo",
            "bar",
        ]
    ],
    [
        'id' => 'DESC'
    ],
    10,
    1
);
```

#### **By attribut**

La sélection de collection par attribut est également accessible en utilisant le nom de l’attribut en complément de nom de la méthode, le premier argument est une string ou un array.

```php
$entity = $repo->findByName(
    [
        "foo",
        "bar"
    ],
    [
        'id' => 'ASC'
    ]
);
```

### 🏷️ **[QueryBuilder](https://www.doctrine-project.org/projects/doctrine-orm/en/current/reference/query-builder.html)**

Pour des requêtes plus personnalisées vous pouvez utiliser le QueryBuilder comme donné en exemple dans le repository.

#### **Methods**

De nombreuses méthode permettent de construire une requête SQL.

```php
$entity = $repo->createQueryBuilder("p")
    ->where("p.name = :name")
    ->orWhere("p.id = :id")
    ->setParameter(":name", "foo")
    ->setParameter(":id", 1)
    ->getQuery()->execute();
```

Il existe de nombreuses méthodes pour aider à construire des expressions SQL.

#### **DQL**

Il est possible de s'exprimer directement en DQL.

```php
$entity = $em
    ->createQuery(
        "SELECT p FROM App\Entity\Product p " 
      . "WHERE p.name = :name OR p.id = :id"
    )
    ->setParameter(":name", "Machin")
    ->setParameter(":id", 1)
    ->getResult();
```


___

👨🏻‍💻 Manipulation

Mettez en place la logique métier en utilisant l'ORM Doctrine.