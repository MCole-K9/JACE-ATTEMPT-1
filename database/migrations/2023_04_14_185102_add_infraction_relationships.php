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
        Schema::table('infractions', function (Blueprint $table){
            if (!Schema::hasColumns('infractions', ['issuer_id', 'receiver_id'])){
                $table->unsignedBigInteger('issuer_id');
                $table->unsignedBigInteger('receiver_id');
            }

            $table->foreign('issuer_id')->references('id')->on('users')->cascadeOnDelete();
            $table->foreign('receiver_id')->references('id')->on('users')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('infractions', function (Blueprint $table) {
            $table->dropConstrainedForeignId('issuer_id');
            $table->dropConstrainedForeignId('receiver_id');
        });
    }
};
