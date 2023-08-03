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
        Schema::create('it_documents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('it_crew_id')->constrained('it_crews')->cascadeOnDelete();
            $table->string('code');
            $table->string('name');
            $table->integer('document_number');
            $table->date('date_issued');
            $table->date('date_expiry');
            $table->string('remarks');
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
        Schema::dropIfExists('it_documents');
    }
};
