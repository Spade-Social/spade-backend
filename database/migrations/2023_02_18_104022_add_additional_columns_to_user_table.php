<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAdditionalColumnsToUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('preferred_ethnicity')->nullable()->after('personality_score');
            $table->string('preferred_religion')->nullable()->after('preferred_ethnicity');
            $table->string('preferred_gender')->nullable()->after('preferred_religion');
            $table->string('most_free')->nullable()->after('preferred_gender');
            $table->string('drink')->nullable()->after('most_free');
            $table->string('smoke')->nullable()->after('drink');
            $table->integer('children')->nullable()->after('smoke');
            $table->string('highest_education')->nullable()->after('children');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('preferred_ethnicity');
            $table->dropColumn('preferred_religion');
            $table->dropColumn('preferred_gender');
            $table->dropColumn('most_free');
            $table->dropColumn('drink');
            $table->dropColumn('smoke');
            $table->dropColumn('children');
            $table->dropColumn('highest_education');
        });
    }
}
