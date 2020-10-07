# 🎓  TP - Symfony 2

**You will be evaluated on your ability to meet the following 📝 functional goals.**

We decide wireframes then conceptualize and generate associated `Controllers`, `Templates` and  `Entities`. You know syntaxe for `CustomType`, `Constraints`, `Form rendering`, `Security`, `CSRF`, `Service`, `EntityManager`, `Repository` and `Translation` usage.

___

## **Some Words**

Be strong on your skill, know what you are able to to and enforce that. I had the entention for this TP to create task for Vote that use on JavaScript to trigger your controller. But with reflexion this i a bad idea, it'll be a bad JavaScript practice with a good practice PHP Framework and will weak your skill ability. Be strong on your skills and after you will learn a FrontEnd Framework, it will be time to make an app and an api with good practice. Sorry that i do not introduce client/server relation in this study case but be patient and read the `Next` section.

___

## 🐥 Previously

You're working on implementing `Vote` feature.

___

## 🦆 Now

You're gonna:
* Translate the app
* Discover flashes
* Close the Vote feature
* Start the Comment feature.

___

## 👨🏻‍💻 Translation

> 🛑 Translate your app!

___

📝 The forms `/login`, `/user/new`, `/post/new` must be translated, labels, errors and custom errors.

> 🙈 Remember that you have to define translation keys for domains: 

[@see https://symfony.com/doc/current/translation.html#using-real-or-keyword-messages](https://symfony.com/doc/current/translation.html#using-real-or-keyword-messages)

___

📝 Every `buttons` must be translated.

> 🙈 Discover that you must use trans filter, check for arguments details to choose your domain: 

[@see https://symfony.com/doc/current/translation/templates.html#using-twig-filters](https://symfony.com/doc/current/translation/templates.html#using-twig-filters)

___

## 👨🏻‍💻 Flashes

> 🛑 Use flahes to notify creation success on an other page

The flash bag is a bag of value that uses the session and that is only available on the next Request.

```php
$session->getFlashBag()->add('success', 'Account created');
```

After a redirect the success message will be available on the display.

```html
{% for message in app.flashes('success') %}
    <div class="alert alert-success">
        {{ message }}
    </div>
{% endfor %}
```

> 🙈 Without arguments flashes retrieve messages for all levels 

[@see https://symfony.com/doc/current/components/http_foundation/sessions.html#flash-messages](https://symfony.com/doc/current/components/http_foundation/sessions.html#flash-messages)

___

📝 Create flash success `after account creation` success

___

📝 Create flash success` after post creation` success

___

📝 Think `reusability` to display flashes cleverly

___

![img](https://raw.githubusercontent.com/seeren-training/Symfony/master/my-reddit/assets/img/screen/signup-flash.png)

___

## 👨🏻‍💻 Vote

> 🛑 Close the Vote feature

This is a logic sand box and we know what we have to do. Remember about diagrams about.

![img](https://raw.githubusercontent.com/seeren-training/Symfony/master/my-reddit/assets/img/diagrams/activity-vote-up.png)

___

📝 Allow logged user to vote `up`, `down`, and `cancel` a vote

___

📝 `Use service to refactor` your code, take care about naming

___

📝 After redirection, try to display a precise place in the page: the voted post on the post list.

> 🙈 The latest task touch language limit, you have to make an url with a `fragment` (/myurl#`product-4`) to make reference to an element identifier by the fragment value (id="`product-4`")

___

## 👨🏻‍💻 Comment

> 🛑 Add a comment to a post

> Level and comment feature are perfect example that show language limit, it seriously need a front-end framework to perform on user experience. Lets us make the job and master Framework logic.

An logged user can comment a post, so there is a form with a textarea at the bottom of the post content and a submit button.

![img](https://raw.githubusercontent.com/seeren-training/Symfony/master/my-reddit/assets/img/wireframes/post-wireframe.PNG)

Create an entry in the database is something that you know how to do, but think one minute:

* Will you create and display Comment form in the PostController with the show method?
* What is the use of the CommentController?

> ⚡ I propose you to encapsulate controller to trigger this functionnal goal. This is a hot feature that make you enter in an advanced area take care. It's a real next on the framework and your ability to master this architecture.

PostController can embeed CommentController to do not be responsible to manage Comments! You will have 3 problemes at least.

### **Embeed controller**

A controller can embed and render controller using twig.

```twig
<div id="sidebar">
    {{ render(controller(
        'App\\Controller\\ArticleController::recentArticles',
        { 'max': 3 }
    )) }}
</div>
```

[@see https://symfony.com/doc/4.1/templating/embedding_controllers.html](https://symfony.com/doc/4.1/templating/embedding_controllers.html)

### **Pass Request and others**

Invoquing manually controller action, you do not have autowiring, you have to pass at least Request for example. In twig you can have access to some important variables. It'll be useful to do not pass Request to render it is already there.

```twig
{{ dump(app.request) }}
```

[@see https://symfony.com/doc/4.0/templating/app_variable.html](https://symfony.com/doc/4.0/templating/app_variable.html)

### **Redirect after success**

On Comment creation success you want to perform a redirection. But in this case it's not allowed, try it. You are not allowed to perform a redirection and have to find an other syntaxical solution to perform the redirection. Two options, change the action of the form or perform a redirection with JavaScript.

[@see https://stackoverflow.com/questions/49176025/symfony-redirect-after-submit-in-twig-render-method#answer-49176465](https://stackoverflow.com/questions/49176025/symfony-redirect-after-submit-in-twig-render-method#answer-49176465)

[@see https://stackoverflow.com/questions/26042633/symfony-2-302-http-status-and-exception#answer-26043566](https://stackoverflow.com/questions/26042633/symfony-2-302-http-status-and-exception#answer-26043566)

___

📝 Allow logged user to Comment a Post

___

📝 Show all Comment for a Post

___

## 🦆 Next

> 🛑 Choose your way

___

You thing that Symfony is a tool that you can use to perform feature but you need it more?

📝 Continue this project by resolving problems one by one, your next formation modules there is no code, profite of that.

___

You thing you have enough on Symfony with this essentials and want a front end framework to learn client/server relation?

📝 Do the Angular Framework getting started tutorial until you pass it.

[@see https://angular.io/tutorial](https://angular.io/tutorial)

___

My advice is that you have to progress on programming with Symfony or others. Making an API with Symfony is easier that making an APP, fundamentals on security, entities and validation is enought, front-end have to make the job now.

___

## 🕕 Manage your time

There comment moment can stop your day, rush on it. If you do not finish this study case there it's normal, be relax
