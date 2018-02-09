<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLawyersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(config('legal.lawyers_table'), function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('firstname')->notNull();
            $table->string('surname')->notNull();
            $table->string('email')->unique();
            $table->string('password');
            $table->boolean('force_reset_password')->default(true);
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
        Schema::dropIfExists(config('legal.lawyers_table'));
    }
}
