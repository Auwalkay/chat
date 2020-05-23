<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeekingForsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seeking_fors', function (Blueprint $table) {
            $table->id();
            $table->integer('meet_up_id')->usigned();
            $table->string('relationship');
            $table->string('tribe');
            $table->integer('min_age');
            $table->integer('max_age');
            $table->text('description');
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
        Schema::dropIfExists('seeking_fors');
    }
}
