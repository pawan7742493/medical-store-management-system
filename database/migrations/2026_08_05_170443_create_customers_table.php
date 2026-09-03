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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();

$table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();

$table->enum('customer_type', [
    'medical_store',
    'hospital',
    'clinic'
]);

$table->string('customer_name');

$table->string('shop_name')->nullable();

$table->string('mobile', 15);

$table->string('email')->nullable();

$table->text('address');

$table->string('city');

$table->string('gst_number')->nullable();

$table->string('drug_license_number')->nullable();

$table->enum('status', [
    'pending',
    'active',
    'rejected'
])->default('pending');

$table->timestamps();    

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
