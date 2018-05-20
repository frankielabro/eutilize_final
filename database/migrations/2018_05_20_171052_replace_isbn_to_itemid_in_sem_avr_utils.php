<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ReplaceIsbnToItemidInSemAvrUtils extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('semester_avr_utils', function (Blueprint $table) {
            if (Schema::hasColumn('semester_avr_utils', 'b_isbn')) {
                $table->dropColumn('b_isbn');
            }

            if (!Schema::hasColumn('semester_avr_utils', 'b_itemid')) {
                $table->integer('b_itemid')->unsigned()->references('b_itemid')->on('books');;
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
        Schema::table('semester_avr_utils', function (Blueprint $table) {
            if (Schema::hasColumn('semester_avr_utils', 'b_itemid')) {
                $table->dropColumn('b_itemid');
                $table->dropForeign(['semester_id']);
            }

            if (!Schema::hasColumn('semester_avr_utils', 'b_isbn')) {
                $table->integer('b_isbn');
            }
        });
    }
}
