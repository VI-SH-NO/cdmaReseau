<?php

namespace Tests\Feature;

use App\Post;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostToTimeLineTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_a_user_can_post_text()
    {
        $this->withoutExceptionHandling();
        $this->actingAs($user = \factory(User::class)->create(), 'api');

        $reponse = $this->post('/api/posts', [
            'data' => [
                'type' => 'posts',
                'attributes' => [
                    'body' => 'post body',
                ],
            ],
        ]);
        $post = Post::first();
        $this->assertEquals($user->id, $post->user->id);
        $this->assertCount(1, Post::all());
        $reponse->assertStatus(201)->assertJson([
            'data' => [
                'type' => 'posts',
                'post_id' => $post->id,
                'attributes' => [
                    'body' => $post->body
                ],
            ],
            'links' => [
                'self' => url('/posts/' . $post->id),
            ]
        ]);
    }
}
