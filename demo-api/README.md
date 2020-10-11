# Demo API

> This package conclude Symfony initiation and open on making an API.

___

## Installation

Make a project but not full, you do no need tempalte rendering, we will install package needed one by one.

* *Install skeleton*

```bash
symfony new demo-api
```

* *Install maker*

```bash
composer require --dev symfony/maker-bundle
```

* *Install doctrine*

```bash
composer require symfony/orm-pack
```

* *Install annotations*

```bash
composer require doctrine/annotations
```

* *Install form*

```bash
composer require symfony/form
```

* *Install validator*

```bash
composer require symfony/validator
```

* *Install serializer*

```bash
composer require symfony/serializer
```

To make HTTP Request Postman is a great tool to use

* *Install postman*

[@link https://www.postman.com/downloads/](https://www.postman.com/downloads/)

___


## Configuration

* *Check your .env*

```.dotenv
DATABASE_URL=mysql://root@localhost:3306/demo_api?serverVersion=mariadb-10.4.13
```

___


## Database

Manipulation subject is an endpoint for a `Product`.

* *Make entity*

```bash
bin/console make:entity
```

```bash
MariaDB [demo_api]> describe product;
+-------------+--------------+------+-----+---------+----------------+
| Field       | Type         | Null | Key | Default | Extra          |
+-------------+--------------+------+-----+---------+----------------+
| id          | int(11)      | NO   | PRI | NULL    | auto_increment |
| name        | varchar(255) | NO   |     | NULL    |                |
| description | longtext     | NO   |     | NULL    |                |
+-------------+--------------+------+-----+---------+----------------+
```
* *Create the database*

```bash
bin/console doctrine:database:create
```
* *Prepare a migration*

```bash
bin/console make:migration
```

* *Execute migrations*

```bash
bin/console doctrine:migrations:migrate
```

* *Constraints*

Add some constraints to use validation

```php
/**
 * @Assert\NotBlank
 * @ORM\Column(type="string", length=255)
 */
private $name;
```

## Controller

* *Create controller*

```bash
bin/console make:controller Product
```

### Creation

* Route

```php
@Route("/products", name="products", methods={"POST"})
```

* Request

The client makes a request in POST in JSON with explicite content type

*Request method*

```bash
POST
```

*Request header*

```bash
Content-Type: application/json
```

*Request body*

```json
{
    "name": "Product A",
    "description": "Product A Description"
}
```

* Action

We need to handle client JSON and set our request POST parameters to use form validation.
Because `$this->json` used with the `SerializerInterface` do not handle option UNESCAPE_UNICODE for this example we will use `JsonResponse`.

```php
    /**
     * @Route("/products", name="products_new", methods={"POST"})
     *
     * @param Request $request
     * @param SerializerInterface $serializer
     * @return JsonResponse
     */
    public function new(
        Request $request,
        SerializerInterface $serializer
    ): JsonResponse
    {
        $entity = new Product();
        $response = new JsonResponse();
        $request->request->add(['product' => json_decode($request->getContent(), true)]);
        $form = $this->createForm(ProductType::class, $entity)->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
            return $response
                ->setStatusCode(Response::HTTP_CREATED)
                ->setContent($serializer->serialize($entity, "json"));
        }
        return $response
            ->setStatusCode(Response::HTTP_BAD_REQUEST);
    }
```

### Retrieve

* Route

```php
@Route("/products", name="products_index", methods={"GET"})
```

* Action

```php
/**
 * @Route("/products", name="products_index", methods={"GET"})
 *
 * @param SerializerInterface $serializer
 * @param ProductRepository $repository
 * @return JsonResponse
 */
public function index(
    SerializerInterface $serializer,
    ProductRepository $repository
): JsonResponse
{
    return (new JsonResponse())
        ->setStatusCode(200)
        ->setContent($serializer->serialize($repository->findAll(), 'json'));
}
```

## Conclusion

Creating an API suppose you have a solid front-end framework to use it.
 Before that i suggest you to interesse you on the folowwing points on Symfony Framework:

* CRUD
* Groups
* REST HTTP response
* Services usage
* Fixtures
* Authorization
* Events