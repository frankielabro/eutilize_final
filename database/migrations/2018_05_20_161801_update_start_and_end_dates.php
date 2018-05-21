<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateStartAndEndDates extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('semesters', function (Blueprint $table) {
            if (Schema::hasColumn('semesters', 'start_date')) {
                $table->dropColumn('start_date');
            } else {
                $table->date('start_date')->nullable();   
            }

            if (Schema::hasColumn('semesters', 'end_date')) {
                $table->dropColumn('end_date');
            } else {
                $table->date('end_date')->nullable();
            }
            
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('semesters', function (Blueprint $table) {
            if (Schema::hasColumn('semesters', 'start_date')) {
                $table->dropColumn('start_date');
            }

            if (Schema::hasColumn('semesters', 'end_date')) {
                $table->dropColumn('end_date');
            }

            $table->string('start_date');
            $table->string('end_date');
        });
    }
}
