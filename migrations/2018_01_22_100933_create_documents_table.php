<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentsTable extends Migration
{
    // TODO: make table configurable
    const TABLE = 'documents';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // TODO: add different document types
        // TODO: add versioning
        Schema::create(self::TABLE, function (Blueprint $table) {
            $table->increments('id');
            $table->text('content');
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
        Schema::dropIfExists(self::TABLE);
    }
}
