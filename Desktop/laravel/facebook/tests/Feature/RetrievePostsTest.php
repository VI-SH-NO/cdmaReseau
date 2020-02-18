<?php

namespace Tests\Feature;

use App\Post;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RetrievePostsTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_it_a_user_can_retrieve_posts()
    {

        $this->withoutExceptionHandling();
        $this->actingAs($user = factory(User::class)->create(), 'api');
        $posts = \factory(Post::class, 2)->create();

        $response = $this->get('/api/posts');
        $response->assertStatus(200)->assertJson(
            [
                'data' => [
                    'data' => [
                        'type' => 'posts',
                        'post_id' => $posts->first()->id,
                        'attributes' => [
                            'body' => $posts->first()->body,
                        ]
                    ],
                    'data' => [
                        'type' => 'posts',
                        'post_id' => $posts->last()->id,
                        'attributes' => [
                            'body' => $posts->last()->body,
                        ]
                    ],
                ]
            ]
        );
    }
}
