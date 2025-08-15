<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        // Set default locale to Indonesian for tests
        $this->app->setLocale('id');
        config(['app.locale' => 'id']);
    }
}
