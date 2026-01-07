<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('requests_history', function (Blueprint $table) {
            $table->id();

            $table->string('endpoint')->index();
            $table->string('method', 10)->index();
            $table->string('ip_address', 45)->nullable()->index();
            $table->text('user_agent')->nullable();
            $table->text('request_headers')->nullable();
            $table->text('request_body')->nullable();
            $table->integer('response_status')->nullable()->index();
            $table->text('response_body')->nullable();
            $table->unsignedBigInteger('user_id')->nullable()->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requests_history');
    }
};
