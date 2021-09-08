
# Stockage

Comment je stock des valeurs en programmation avec PHP.


## Impératif

### Valeurs primitives et spéciales

```php
// 10, 10.1, null, "Hello", 'Hello', true, []
$foo = 11;
```

La référence n'est pas concervée.

```php
$foo = 11;
$bar = $foo;
$bar = 22;
echo $foo // 11;
```

> Nous constatons que les tableaux ne sont pas des valeurs qui passent par référence.

@see https://github.com/seeren-training/PHP/wiki/04#-types

### Concerver la référence

```php
$foo = 11;
$bar = &$foo;
$bar = 22;
echo $foo // 22;
```

### Structurer des variables

```php
$productName = "Fiesta";
$productPrice = 10000;
$productBrand = "Ford";
```

Le tableau associatif peut être pratique...

```php
$product = [
    "name" => "Fiesta", 
    "price" => 10000, 
    "brand" => "Ford", 
];
```

L'ajout de valeur peut se faire après la déclararion.

```php
$product["km"] = 200000;
```

___

## Fonctionnel

### Valeurs primitives et spéciales

```php
function getData(): float {
    return 19.6;
}

$tva = getData();
```

Toujours pas de référence, les arguments sont des variables locales à la fonction.

```php
function getData($tva): float {
    $tva = $tva / 2;
    return $tva;
}

$tva = 19.6;
getData($tva)
echo $tva // 19.6
```

### Concerver la référence

```php
function getData(&$tva): float {
    $tva = $tva / 2;
    return $tva;
}

$tva = 20;
$bar = getData($tva)
echo $tva // 10
echo $bar  // 10
```

___

## Orienté Objet

### Les attributs

La donnée est encapsulée par défaut et peut êtrem anipulée depuis l'extérieur si son nivau de visibilité le permet.

```php
class Car {
    public $brand = "For" . "d";
}

$car = new Car();
$car->brand = "Nissan";
$brand = $car->brand;
```

### This

C'est un pointeur relatif qui pointe sur l'instance que je manipule sur le moment. L'objet en cours de manipulation, il peut représenter $car1 ou $car2 etc.

```php
class Car {
    public $brand;

    public function __construct () 
    {
        $this->brand = "For" . "d";
    }
}
$car1 = new Car();
$car1->brand = "Nissan";
$brand = $car1->brand;
$car2 = new Car();
$car2->brand() = "Peugeot";
$brand = $car2->brand;
```
