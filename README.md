# vhnh/cookbook
Search for recipes by its ingredients.

![tests](https://github.com/vhnh/cookbook/workflows/tests/badge.svg)

### Usage


```php
Recipe::withIngredients(['butter', 'flour'])
    ->get();
```
