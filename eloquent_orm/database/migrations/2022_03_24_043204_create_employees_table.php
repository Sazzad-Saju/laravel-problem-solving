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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password')->default('$2a$12$OUc5JPbm0MOZAc2rbvUp1OFE7eCTettZogidRcjYDCy4o.aqtOQra');
            // $table->integer('department_id');
            $table->foreignId('department_id')->constrained('departments')->onDelete('cascade');
            $table->foreignId('blood_group_id')->constrained('blood_groups')->onDelete('cascade'); //new
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
        Schema::dropIfExists('employees');
    }
};
