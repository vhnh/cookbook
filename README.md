# vhnh/cookbook
Search for recipes by its ingredients.

```php
Recipe::withIngredients(['butter', 'flour'])
    ->get();
```