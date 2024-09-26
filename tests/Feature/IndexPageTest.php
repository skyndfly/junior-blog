<?php

namespace Tests\Feature;

use Tests\TestCase;

class IndexPageTest extends TestCase
{
    public function test_home_page_status(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
