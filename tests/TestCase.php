<?php

namespace IhorHnatchuk\Browsershot\Tests;

use Orchestra\Testbench\TestCase as BaseTestCase;
use IhorHnatchuk\Browsershot\BrowsershotServiceProvider;
use Illuminate\Support\Facades\View;
use IhorHnatchuk\Browsershot\Facades\PDF;
use IhorHnatchuk\Browsershot\Facades\Screenshot;

abstract class TestCase extends BaseTestCase
{
    protected function getPackageProviders($app)
    {
        return [BrowsershotServiceProvider::class];
    }

    protected function getPackageAliases($app)
    {
        return [
            'PDF' => PDF::class,
            'Screenshot' => Screenshot::class
        ];
    }

    protected function setUp()
    {
        parent::setUp();

        View::addLocation(__DIR__ . '/views');
    }
}
