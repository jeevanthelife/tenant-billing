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
        Schema::create('property_tenants', function (Blueprint $table) {
            $table->uuid()->primary();
            $table->foreignUuid("property_id")->constrained("properties")->onDelete("restrict");
            $table->foreignUuid("tenant_id")->constrained("tenants")->onDelete("restrict");
            $table->string("status");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('property_tenants');
    }
};
