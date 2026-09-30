<?php

namespace Tests\Feature;

use Tests\TestCase;

class HomepageTest extends TestCase
{
    public function test_homepage_can_be_displayed(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('Evolusi Perangkat Lunak');
        $response->assertSee('24/541372/SV/24899');
    }
}