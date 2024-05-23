<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            // $table->foreignIdFor(User::class);
            $table->string('image')->nullable();
            $table->string('title');
            $table->string('slug')->nullable();

             $table->timestamp('published_at')->nullable();
            // $table->boolean('featured')->defult(false);
            // $table->softDeletes();
            $table->timestamps();

            $table->unsignedBigInteger('user_id');


            $table->text('description');
            $table->date('date')->nullable();
            $table->string('post_status')->nullable();
            $table->string('usertype')->nullable();
            $table->string('name')->nullable();



            $table->foreign('user_id')->references('id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
