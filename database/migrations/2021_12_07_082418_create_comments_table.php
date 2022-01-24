<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('authorable_id');
            $table->string('authorable_type');
            $table->foreignId('course_id')->constrained('courses')->onUpdate('cascade')->onDelete('cascade');
            $table->text('body');
            $table->foreignId('parent_id')->nullable()->constrained('comments')->onUpdate('cascade')->onDelete('cascade');
            $table->tinyInteger('approved')->default(0)->comment('0 => unapproved 1=> approved');
            $table->tinyInteger('seen')->default(0)->comment('0 => unseen 1=> seen');
            $table->tinyInteger('status')->default(0);
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
        Schema::dropIfExists('comments');
    }
}
