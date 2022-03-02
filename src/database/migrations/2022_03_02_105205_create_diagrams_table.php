<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiagramsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diagrams', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->string('content');
            $table->string('author_id');
            $table->string('image');
            $table->boolean('public');
            $table->timestamps('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('diagrams');
    }
}
