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
        Schema::create('files', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('personal_info_id');
            $table->foreign('personal_info_id')
                ->references('id')
                ->on('personal_infos')
                ->onDelete('cascade');

            $table->string('cv');
            $table->string('certificates');
            $table->string('others');
            $table->string('description');
            $table->enum('terms',['Accept','Not Accept']);
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
        Schema::dropIfExists('files');
    }
};
