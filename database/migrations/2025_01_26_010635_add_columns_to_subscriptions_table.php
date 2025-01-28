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
        Schema::table('subscriptions', function (Blueprint $table) {
            $table->string('billing_cycle')->nullable();
            $table->decimal('total_amount', 10, 2)->default(0.00);
            $table->boolean('fullWill')->nullable();
            $table->boolean('poa')->nullable();
            $table->boolean('executor')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('subscriptions', function (Blueprint $table) {
            $table->dropColumn(['billing_cycle', 'total_amount','fullWill','poa','executor']);
        });
    }
};
