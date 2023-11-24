<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RouteTest extends TestCase
{
    public function test_home_page(): void
    {
        $response = $this->get('/');

        $response->assertOK();  // home page present
    }

    public function test_image_page_with_valid_number(): void
    {
        $response = $this->get('/image/1');

        $response->assertOK(); // image page present
    }

    public function test_image_page_with_invalid_number(): void
    {
        $response = $this->get('/image/0');

        $response->assertNotFound();  // invalid image number isn't loaded
        
        $response = $this->get('/image/10000');

        $response->assertNotFound();  // invalid image number isn't loaded

        $response = $this->get('/image/Wrong');

        $response->assertNotFound();  // invalid image number isn't loaded
    }

    public function test_image_page_redirects(): void
    {
        $response = $this->get('/image');

        $response->assertViewIs('home');  // /image loads home page
    }

    public function test_results_page(): void
    {
        $response = $this->get('/results');

        $response->assertOK();  // results page present
    }

    public function test_results_page_SortByName(): void
    {
        $response = $this->get('/results/SortByName');

        $response->assertOK();  // results page sorted by name present
    }

    public function test_results_page_SortByImage(): void
    {
        $response = $this->get('/results/SortByImage');

        $response->assertOK(); // results page sorted by image present
    }
}
