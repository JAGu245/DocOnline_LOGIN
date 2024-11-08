<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameNameToPublishDocInFilesTable extends Migration
{
    public function up()
    {
        Schema::table('files', function (Blueprint $table) {
            $table->renameColumn('name', 'PublishDoc');
        });
    }

    public function down()
    {
        Schema::table('files', function (Blueprint $table) {
            $table->renameColumn('PublishDoc', 'name');
        });
    }
}
