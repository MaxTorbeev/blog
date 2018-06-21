<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreatePostTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function guest_may_not_created_post()
    {
        $this->withExceptionHandling();
        
        $this->get('/admin/posts/create')->assertRedirect('/login');
        $this->post('/admin/posts')->assertRedirect('/login');
    }
}
