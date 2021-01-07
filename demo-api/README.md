# Demo API

> This package conclude Symfony initiation and open on making an API.

___

## Installation

Make a project but not full, you do no need template rendering, we will install package needed one by one.

* *Install skeleton*

```bash
symfony new demo-api
```

* *Install maker*

```bash
composer require --dev symfony/maker-bundle
```

* *Install security*

```bash
composer require security
```

* *Install orm*

```bash
composer require orm
```

* *Install form*

```bash
composer require form
```

* *Install validator*

```bash
composer require validator
```

* *Install annotations*

```bash
composer require doctrine/annotations
```

* *Install serializer*

```bash
composer require symfony/serializer
```

* *Framework extra bundle*

```bash
composer require sensio/framework-extra-bundle

```

___

## Configuration

* *Check your .env*

```.dotenv
DATABASE_URL=mysql://root@localhost:3306/demo_api?serverVersion=mariadb-10.4.13
```

* *Create the database*

```bash
bin/console d:d:c
```

### Security

* *Create the user*

```bash
bin/console make:user
```

* *Add a token*

```text
/**
 * @ORM\Column(type="string", unique=true, nullable=true)
 */
private $token;
```

* *Create the form and edit*

```bash
bin/console make:form
```

* *Add validation constraints*

```text
/**
 * @Assert\NotBlank
 * @Assert\Email
 * @ORM\Column(type="string", length=180, unique=true)
 */
private $email;
```

* *Add serialization groups*

```text
/**
 * @Assert\NotBlank
 * @Assert\Email
 * @ORM\Column(type="string", length=180, unique=true)
 * @Groups({"public"})
 */
private $email;
```

* *Create the Authenticator*

```bash
bin/console make:auth
```

* *Edit security.html*

```yaml
providers:
  # used to reload user from session & other features (e.g. switch_user)
  app_user_provider:
    entity:
      class: App\Entity\User
      property: token
firewalls:
  dev:
    pattern: ^/(_(profiler|wdt)|css|images|js)/
    security: false
  main:
    anonymous: true
    lazy: true
    provider: app_user_provider
    logout: ~
    guard:
      authenticators:
        - App\Security\UserAuthenticator
```

* *Generate Migration*

```bash
bin/console make:migration
```

* *Execute Migrations*

```bash
bin/console d:m:m
```

* *Disable CSRF in framework.yml*

```yml
csrf_protection: false
```

* *Clear the cache*

```yml
symfony cache:clear
```
___

## Usage

### SecurityController

#### register

Simple user registration with a Basic token using form validation

```php
public function register(
    Request $request,
    UserPasswordEncoderInterface $encoder,
    UserRepository $repository): Response
{
    $user = new User();
    $request->request->add(['user' => json_decode($request->getContent(), true)]);
    try {
        $form = $this->createForm(UserType::class, $user)->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $basicToken = base64_encode($user->getUsername() . ':' . $user->getPassword());
            $user->setToken($basicToken);
            $repository->upgradePassword($user, $encoder->encodePassword($user, $user->getPassword()));
            return $this->json($user, Response::HTTP_CREATED, [], ['groups' => ['public', 'private']]);
        }
        throw new InvalidArgumentException();
    } catch (UniqueConstraintViolationException $e) {
        return $this->json(['error' => 'Conflict'], Response::HTTP_CONFLICT);
    } catch (NotNullConstraintViolationException | InvalidArgumentException $e) {
        return $this->json(['error' => 'Bad Request'], Response::HTTP_BAD_REQUEST);
    }
}
```

#### login

Simple user login using form validation

```php
public function login(
    Request $request,
    UserPasswordEncoderInterface $encoder,
    UserRepository $repository): Response
{
    $user = new User();
    $request->request->add(['user' => json_decode($request->getContent(), true)]);
    try {
        $form = $this->createForm(UserType::class, $user)->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $rawPassword = $user->getPassword();
            $user = $repository->findOneBy(["email" => $user->getEmail()]);
            if (!$user || !$encoder->isPasswordValid($user, $rawPassword)) {
                throw new RuntimeException();
            }
            return $this->json($user, Response::HTTP_OK, [], ['groups' => ['public', 'private']]);
        }
        throw new InvalidArgumentException();
    } catch (RuntimeException $e) {
        return $this->json(['error' => 'Not Found'], Response::HTTP_NOT_FOUND);
    } catch (InvalidArgumentException $e) {
        return $this->json(['error' => 'Bad Request'], Response::HTTP_BAD_REQUEST);
    }
}
```

### GrantedController

Users can be authenticated using roles

```php
/**
 * @IsGranted("ROLE_USER")
 * @Route("/users", methods={"GET"})
 *
 * @param UserRepository $repository
 * @return Response
 */
public function index(UserRepository $repository): Response
{
    return $this->json($repository->findAll(), Response::HTTP_OK, [], ['groups' => 'public']);
}
```

___

## CORS

From a different host you won't be able to request your api.
We need to allow origin, headers and methods at least and on each request


* *Create subscriber* for kernel response

```php
bin/console make:subscriber
```

Add Cors origin, headers and methods

```php
public function onKernelResponse(ResponseEvent $event)
{
    $event->getResponse()->headers->add([
        "Access-Control-Allow-Origin" => "*",
        "Access-Control-Allow-Headers" => "Content-Type, X-AUTH-TOKEN",
        "Access-Control-Allow-Methods" => "GET,POST,PUT,DELETE",
    ]);
}
```

___

## Conclusion

Build your api and consum it!