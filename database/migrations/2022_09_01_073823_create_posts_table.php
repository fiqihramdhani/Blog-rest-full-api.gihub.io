<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->foreignId('category_id');
            $table->foreignId('user_id');
            $table->string('Title', 255);
            $table->string('Judul_Posting', 255);
            $table->string('slug', 255)->unique();
            $table->text('excerpt', 255);
            $table->string('img')->nullable();
            $table->text('Body', 1000);
            $table->timestamp('published_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
};
