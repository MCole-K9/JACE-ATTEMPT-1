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
        Schema::create('org_roles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::table('org_reps', function (Blueprint $table) {
            $table->foreignId('org_role_id')->nullable()->constrained();
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('org_reps', function (Blueprint $table) {
            $table->dropForeign(['org_role_id']);
            $table->dropColumn('org_role_id');
        });

        Schema::dropIfExists('org_roles');
    }
};
