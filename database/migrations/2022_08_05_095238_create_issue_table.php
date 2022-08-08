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
        Schema::create('issue', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("description-report")->nullable(true);
            $table->unsignedBigInteger("categoryId");
            $table->foreign("categoryId")->references("id")->on("category");
            $table->string("lng");
            $table->string("lat");
            $table->string("image")->nullable("true");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('issue');
    }
};
