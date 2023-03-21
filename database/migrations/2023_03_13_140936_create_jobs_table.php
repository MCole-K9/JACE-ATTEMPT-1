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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description');
            $table->string('requirements');
            $table->float('salary');
            $table->boolean('is_visible');
            $table->date('open_date');
            $table->date('close_date');
            $table->string('type');
            $table->foreignId('org_rep_id')->constrained('org_reps');
            $table->foreignId('organization_id')->nullable()->constrained('organizations');
            //$table->foreignId('job_category_id')->constrained('job_categories');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::dropIfExists('jobs');
    }
};
