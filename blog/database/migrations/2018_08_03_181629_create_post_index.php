<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostIndex extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mongodb')->table('posts', function (Blueprint $collection) {
            $collection->index(
                [
                    "title" => "text",
                    "content" => "text",
                ],
                'post_full_text',
                null
            );

            $collection->index(
                [
                    "slug" => 1,
                ],
                'post_slug',
                null
            );
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('mongodb')->table('posts', function (Blueprint $collection) {
            $collection->dropIndex(['post_full_text']);
            $collection->dropIndex(['post_slug']);
        });
    }
}
