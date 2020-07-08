<?php

namespace Vhnh\Cookbook\Tests;

abstract class TestCase extends \Orchestra\Testbench\TestCase
{
    protected function getPackageProviders($app)
    {
        return ['Vhnh\Cookbook\ServiceProvider'];
    }
}
