<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DeleteUnusedColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('jobs', function (Blueprint $table) {
            $table->dropColumn('job_description');
        });

        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('email');
            $table->dropColumn('remember_token');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('jobs', function (Blueprint $table) {
            $table->longText('job_description')->nullable();
        });

        Schema::table('users', function (Blueprint $table) {
            $table->string('email');
            $table->rememberToken()->nullable();
        });
    }
}
