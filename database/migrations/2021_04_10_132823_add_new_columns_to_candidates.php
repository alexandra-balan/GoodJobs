<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNewColumnsToCandidates extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('candidates', function (Blueprint $table) {
            $table->string('education')->nullable();
            $table->string('city')->nullable();
            $table->string('email')->nullable();
            $table->String('phone_number')->nullable();
            $table->string('last_job')->nullable();
            $table->string('spoken_languages')->nullable();


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('candidates', function (Blueprint $table) {
            $table->dropColumn([
                'education',
                'city',
                'email',
                'phone_number',
                'last_job',
                'spoken_languages'
            ]);
        });
    }
}
