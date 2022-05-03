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
        Schema::create('tbl_profile_persons', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('person_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->text('direccion');
            $table->timestamps();

            $table->foreign('person_id')
            ->references('id')
            ->on('tbl_persons')
            ->onDelete('cascade')
            ->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_profile_persons');
    }
};
