# 🎓  TP - Symfony

**You will be evaluated on your ability to meet the following 📝 functional goals.**

A provided backlog expose a product to implement. 

We learn about `Installation`, `Routes`, `Controllers`, `Twig`, `Webpack`, `Entities`, `Security`, `Forms`, `Constraints`, `Doctrine`. 

*It's time to target buisness logic with this framework.*

___

## TOC

* [Current tasks](#current-tasks)
* [MTG Cards](#mtg-cards)
* [Active Deck](#active-deck)
* [Be creative](#be-creative)

___

## 👨🏻‍💻 Current tasks

* 📝 I want to create Deck So that I can elaborate strategy
* 📝 I want to retrieve Deck list So that I can have an overview
* 📝 I want to retrieve Deck So that I can have a detail
* 📝 I want to delete Deck So that I can remove strategy

[@see Routes](https://github.com/seeren-training/Symfony/wiki/03#contrainte),
[@see Regex](https://github.com/seeren-training/PHP/wiki/08#-classe-de-caract%C3%A8res),
[@see Path](https://symfony.com/doc/current/reference/twig_reference.html#path),
[@see Filters](https://github.com/seeren-training/Symfony/wiki/04#-filtres).
[@see Webpack](https://github.com/seeren-training/Symfony/wiki/04#-webpack-encore),
[@see Doctrine](https://github.com/seeren-training/Symfony/wiki/07#-insert).

> Do not spent to much time on user interface presentation

___

## 👨🏻‍💻 MTG Cards

* 📝 I want to browse by page the full the MTG card catalog So that I can elaborate Decks
* 📝 I want to browse by card color the full MTG card catalog So that I can elaborate Decks easily
* 📝 As User I want to have speed access to already browsed page So that I can crawl content easily

[@see magicthegathering.io](https://docs.magicthegathering.io/#api_v1cards_list),
[@see HttpClient](https://symfony.com/doc/current/http_client.html#basic-usage),
[@see Cache](https://symfony.com/doc/current/components/cache.html#basic-usage-psr-6),
[@see Request](https://symfony.com/doc/current/components/http_foundation.html#accessing-request-data).

> PHP requesting web service provide a slow page display. After request a web service you must cache data, then on next page display you must use cached data and do not make request again. Remember that your views want to deal with entities.

___

## 👨🏻‍💻 Active Deck

* 📝 I want to select a Deck So that I can active it

[@see Session](https://symfony.com/doc/current/session.html#basic-usage),
[@see Request](https://symfony.com/doc/current/components/http_foundation.html#accessing-request-data).

> You have to find how to retrieve session in your controller action and how to store selected Deck to mark it selected in the Deck list.

___

## 👨🏻‍💻 Be creative

* 📝 As User I want to add Cards to the active Deck So that I can fill a Deck

> How the User will select Cards and put them in the active Deck? Think about a solution, make your decision then search for technical solutions.

___

## 🕕 Manage your time

The idea is not to pass in DONE all TOC items, especially the 'Be creative' one, but this day provide you a day to make some logic while discovering http, cache and session. 
