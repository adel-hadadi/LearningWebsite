<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('image');
            $table->text('description');
            $table->text('summary');
            $table->decimal('price', 20,2);
            $table->text('video');
            $table->bigInteger('cource_code')->unique();
            $table->tinyInteger('cource_size');
            $table->foreignId('cource_type_id')->constrained('course_types')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('teacher_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('category_id')->constrained('categories')->onUpdate('cascade')->onDelete('cascade');
            $table->tinyInteger('status')->default(0);
            $table->string('slug')->unique()->nullable();
            $table->string('tags');
            $table->timestamp('published_at');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
    }
}
