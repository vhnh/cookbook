<?php

namespace Vhnh\Cookbook\Tests;

use Vhnh\Cookbook\Recipe;
use Illuminate\Support\Str;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RecipeTest extends TestCase
{
    use RefreshDatabase;

    public static function create($attributes = [])
    {
        return Recipe::forceCreate(array_merge([
            'name' => Str::random(12),
            'ingredients' => ['apple', 'cinnemon', 'butter'],
            'body' => 'Baked Apple. Lorem ipsum dolor, sit amet consectetur adipisicing elit.'
        ], $attributes));
    }

    /** @test */
    public function it_presists_an_instance()
    {
        $model = static::create();

        $this->assertEquals(
            $model->fresh(),
            Recipe::find($model->id)
        );
    }

    /** @test */
    public function it_can_be_scoped_by_its_ingredients()
    {
        static::create(['ingredients' => ['apple', 'kiwi']]);
        static::create(['ingredients' => ['banana', 'apple']]);
        static::create(['ingredients' => ['kiwi', 'banana']]);

        $this->assertCount(2, Recipe::withIngredients('apple')->get());
        $this->assertCount(1, Recipe::withIngredients(['kiwi', 'apple'])->get());
    }
}
