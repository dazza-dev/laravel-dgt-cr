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
        Schema::create('dgt_documents', function (Blueprint $table) {
            $table->id();
            $table->string('document_type');
            $table->string('document_key');
            $table->boolean('success')->default(false);
            $table->string('status');
            $table->json('messages')->nullable();
            $table->longText('xml_base64');
            $table->nullableMorphs('documentable');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dgt_documents');
    }
};
