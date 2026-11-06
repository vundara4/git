<?php

namespace Tests\Feature;

use Tests\TestCase;

class RentalPlatformTest extends TestCase
{
    public function test_rental_dashboard_is_accessible(): void
    {
        $response = $this->get('/rental');

        $response->assertStatus(200);
        $response->assertSee('Rental');
        $response->assertSee('Asset Booking Platform');
    }

    public function test_assets_page_is_accessible(): void
    {
        $response = $this->get('/rental/assets');

        $response->assertStatus(200);
        $response->assertSee('Asset Catalog');
    }
}
