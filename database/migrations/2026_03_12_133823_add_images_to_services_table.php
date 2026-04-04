<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddImagesToServicesTable extends Migration
{
    public function up()
    {
        Schema::table('services', function (Blueprint $table) {

            $table->string('image1')->nullable();
            $table->string('image2')->nullable();
            $table->string('image3')->nullable();

        });
    }

    public function down()
    {
        Schema::table('services', function (Blueprint $table) {

            $table->dropColumn('image1');
            $table->dropColumn('image2');
            $table->dropColumn('image3');

        });
    }
}
