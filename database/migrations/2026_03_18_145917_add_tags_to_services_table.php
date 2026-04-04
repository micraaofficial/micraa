<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTagsToServicesTable extends Migration
{
    public function up()
    {
        if (!Schema::hasColumn('services', 'tags')) {
            Schema::table('services', function (Blueprint $table) {
                $table->text('tags')->nullable();
            });
        }
    }

    public function down()
    {
        // keep safe (no drop to avoid data loss)
    }
}
