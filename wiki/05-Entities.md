# Entities

*  🔖 **Database**
*  🔖 **Make**
*  🔖 **Migration**
*  🔖 **Relation**

Les entities correspondent à la couche modèle de votre application.

___

## 📑 [Database](https://symfony.com/doc/current/doctrine.html#configuring-the-database)

Vos information de base de données doivent être spécifiés dans le fichier `.env`.

```env
DATABASE_URL=mysql://root@127.0.0.1:3306/foo_db?serverVersion=mariadb-10.4.13
```

Une fois ces information spécifiés vous pouvez créer votre base avec la commande suivante.

```bash
bin/console doctrine:database:create
```

N'hésitez pas à rattacher votre IDE à votre database.

___

👨🏻‍💻 Manipulation

Créez votre base de données.

___

## 📑 [Make](https://symfony.com/doc/current/doctrine.html#creating-an-entity-class)

Un utilitaire nous propose de créer des entities.

```bash
bin/console:make:entity
```

L'utilitaire demande un nom d'entité puis propose de créer ses attributs. Une entité deviendra une table. Chaque entité possède un `id` qui est géré par l'ORM doctrine et qui ne doit pas être spécifié.

L'utilitaire ne propose pas de rajouter la contrainte unique.

> Il est possible de générer les entities à partir d'une base de données: https://symfony.com/doc/current/doctrine/reverse_engineering.html

### 🏷️ **Unique**

Pour ajouter la contrainte sur une colonne il faut la préciser dans l'annotation en rapport.

```php
/**
 * @ORM\Column(type="string", length=255, unique=true)
 */
```

Pour ajouter une contrainte sur plusieurs colonnes il faut le spécifier sur l'annotation de la table.

CF: https://www.doctrine-project.org/projects/doctrine-orm/en/2.7/reference/annotations-reference.html#annref_uniqueconstraint

```php
/**
 * @ORM\Entity
 * @ORM\Table(name="foo",uniqueConstraints={@ORM\UniqueConstraint(name="name_email_u", columns={"name", "email"})})
 */
```

___

## 📑 [Migration](https://symfony.com/doc/current/doctrine.html#migrations-creating-the-database-tables-schema)

Nous pouvons à partir de vos entities créer les tables. C'est une manipulation en deux étapes.

*Créer le schéma de migration*

```bash
bin/console make:migration
```

*Exécuter la migration*

```bash
bin/console doctrine:migrations:migrate
```

Quand vous modifiez une entity, il faut refaire la migration. Cependant doctrine possède un outil pour forcer la mise à jour des tables en cas de conflit de migration

*Update des tables sans migration*

```bash
 bin/console doctrine:schema:update --force --dump-sql
```

___

## 📑 [Relations](https://symfony.com/doc/current/doctrine/associations.html)

Une entité peut être en relation avec d'autres par les relations OneToOne, OneToMany et ManyToMany.

Au moment de choisir le type de la colonne, il est possible de demander `?` pour avoir un tutoriel sur les relations et nous propose de réfléchir pour proposer une de ces 3 relations.

___

👨🏻‍💻 Manipulation

Utilisez un diagramme d'entité pour penser vos tables et identifiants et validons les.
Utilisez le maker et doctrine pour créer vos tables à partir de vos entities.

___
