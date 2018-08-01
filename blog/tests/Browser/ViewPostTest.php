<?php

namespace Tests\Browser;

use App\Post;
use Tests\Browser\Pages\MainPage;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ViewPostTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        $posts = Post::all();


        $this->browse(function (Browser $browser) use ($posts) {
            foreach ($posts as $post) {
                $browser->visit(new MainPage())
                    ->assertSeeLink($post->title)
                    ->clickLink($post->title)->screenshot('post')
                    ->assertUrlIs(route('post-view', ['slug' => $post->slug]))
                    ->assertSeeIn('@post-title', $post->title)
                    ->assertTitleContains($post->title);
            }

        });


    }
}