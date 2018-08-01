<?php


namespace Tests\Unit;


use App\Post;
use Tests\TestCase;

class PostTest extends TestCase
{
    public function testPost()
    {
        $ts = time();
        $testCase = ['title' => 'title'. $ts, 'content' => 'content' . $ts, 'slug' => 'slug' . $ts];

        $postModel = new Post($testCase);
        $this->assertTrue($postModel->save(), 'Post has saved correctly');
        $this->assertDatabaseHas($postModel->getTable(), ['slug' => $testCase['slug']], $postModel->getConnectionName());

        $postModelBySlug = Post::getBySlug($testCase['slug']);
        $this->assertNotNull($postModelBySlug, 'Post model has found');

        foreach ($testCase as $field => $value)
        {
            $this->assertEquals($value, $postModelBySlug->$field, "Attribute {$field} has stored correctly");
        }

        $this->assertTrue($postModelBySlug->delete(), 'Model delete() returns true');
        $this->assertDatabaseHas($postModelBySlug->getTable(), ['slug' => $testCase['slug']], $postModelBySlug->getConnectionName());


        $this->assertEmpty(Post::getBySlug($testCase['slug']), 'Post has removed correctly');

    }

}