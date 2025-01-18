<?php

namespace Tests;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use RefreshDatabase;

    // This is to seed the database before running each test.
    protected $seed = true;
    // Necessary to avoid the error in tests that use the console.
    public $mockConsoleOutput = false;

    public function setUp(): void
    {
        parent::setUp();
        
        // Create the Passport clients
        $this->artisan('passport:client --personal --no-interaction');
    }
}
