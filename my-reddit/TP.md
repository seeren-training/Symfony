# 🎓  TP - Symfony

**You will be evaluated on your ability to meet the following 📝 functional goals.**

We decide wireframes then conceptualize and generate associated `Controllers`, `Templates` and  `Entities`.

## 🐣 Previously

You're working on implementing your Entity Relation Diagram.

## 🐥 Now

You're gonna close the *Entity* generation then create `login`/`signup`, forms to `fetch`/`persist` *User* and `use` his roles. 

___

## 👨🏻‍💻 Entities

> 🛑 Close entity generation

___

📝 The following `Entity Relation Diagram` must be generated using the Symfony console

___

📝 The pseudo must be unique

___

![img](https://raw.githubusercontent.com/seeren-training/Symfony/master/my-reddit/uml/ERD.jpg)

*Remember*

```bash
$ bin/console make:entity
$ bin/console make:migration
$ bin/console doctrine:migrations:migrate
```

___

## 👨🏻‍💻 Login

> 🛑 Use the Security feature

Now you have a model layout, you can target features. At first you want User to `signup`/`login`/`logout`. Using the `Security` package you can generate `login`/`logout` for a `UserInterface` implementation.

*Generate authentication*

```bash
$ bin/console make:auth
```

[@see https://symfony.com/doc/current/security/form_login_setup.html#generating-the-login-form](https://symfony.com/doc/current/security/form_login_setup.html)

___

📝 Customize the generated login form as the example below
___

📝 Block navigator validation with `novalidate` attribut on `form` tag

___

📝 Modify the `config/packages/security.yml` for activate remember me feature

___

📝 Modify the `Authenticator` for redirect on success

___

![img](https://raw.githubusercontent.com/seeren-training/Symfony/master/my-reddit/assets/img/screen/login.png)

___

## 👨🏻‍💻 Signin

> 🛑 Create account

To create an account you have to create a form. `Form` can be generated with the `Maker`.

*Generate form*

```bash
$ bin/console make:form
```

[@see https://symfony.com/doc/current/forms.html](https://symfony.com/doc/current/forms.html)

___

### **Display**

You have to use your form with **PHP** and with **Twig**, the process is the folowing.

* With **PHP** you have to:
   * Create an `instance` of your entity
   * Create your form with the `form class name` and the `entity`
   * Passing the `Symfony\Component\HttpFoundation\Request` to the form
   * Passing the `form view` to the `template`.

*Example*

```php
public function new(Request $request)
{
   $entity = new Foo();
   $form = $this->createForm(FooType::class, $entity);
   $form->handleRequest($request);
   return $this->render('foo/new.html.twig', [
      'form' => $form->createView(),
   ]);
}
```

* With **Twig** you have to:
   * Display the form using functions:
      * `form_start` open the form
      * `form_end` close the form
      * `form_errors` display errors
      * `form_label` display a label
      * `form_widget` display the input

___

📝 Customize the generated signup form as the example below

___

📝 Remove 'roles' field in your `Custom Type` generated, we do not want that in the form!

___

📝 Block navigator validation with `novalidate` attribut on `form` tag, we want to validate on back-end!

___

📝 Fix type error '`Expected argument of type "string", "null" given`' using types in the entity.

___

📝 Add classes on `label` and `widget` for style using functions `optionnal arguments`

___

![img](https://raw.githubusercontent.com/seeren-training/Symfony/master/my-reddit/assets/img/screen/signup.png)

___

### **Validate**

You have to `verify` that the email is really an email and that the password is confirmed. You also have to provide an `input type` corresponding to your field. To specify the `field type` of your form you have to edit your **Custom Type** then to specify the `validation rule` of your field you have to modify your **Entity**.

[@see https://symfony.com/doc/current/reference/forms/types.html](https://symfony.com/doc/current/reference/forms/types.html)

* In your **Custom Type** you have to:
   * Specify desiderated type
   * Chek for options on the doc

*Example*

```php
public function buildForm(FormBuilderInterface $builder, array $options)
{
   $builder->add('content', TextareaType::class);
}
```

> 🙈 Find the right types for the pseudo, email and password. For the password you want a confirmation that **repeat** the password value.

___

📝 Apply right `types on your fields` as below

___

![img](https://raw.githubusercontent.com/seeren-training/Symfony/master/my-reddit/assets/img/screen/signup-type.png)

[@see https://symfony.com/doc/current/validation.html#constraints](https://symfony.com/doc/current/validation.html#constraints)

* In your **Entity** you have to:
   * Use constraint to trigger errors

*Example*

```php
use Symfony\Component\Validator\Constraints as Assert;

class Post
{
   /**
   * @Assert\NotBlank
   */
   private $content;
}
```

___

📝 Fields must not be blank and email must be valid

___


📝 Display errors when fields vars are not valid as below

___

![img](https://raw.githubusercontent.com/seeren-training/Symfony/master/my-reddit/assets/img/screen/signup-errors.png)

___

## 🦆 Next

> 🛑 Log your user

Okay we speak yesterday that week look like to finish on wednesday but if you here and that you past previous task then you learn a lot today and cleverly.

___

📝 Read `WIKI Form` Section to `remember`

[@see https://github.com/seeren-training/Symfony/wiki/06](https://github.com/seeren-training/Symfony/wiki/06)

___

📝 `Insert` your user in the database with `hashed password`

[@see https://github.com/seeren-training/Symfony/wiki/07](https://github.com/seeren-training/Symfony/wiki/07)

[@see https://symfony.com/doc/4.0/security/password_encoding.html](https://symfony.com/doc/4.0/security/password_encoding.html)

___

📝 Use your login form

___

## 🕕 Manage your time

There is some documentation and deduction to target your functional goal!
