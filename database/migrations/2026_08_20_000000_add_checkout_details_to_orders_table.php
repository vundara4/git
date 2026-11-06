<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->string('customer_name')->after('user_id');
            $table->string('customer_phone', 50)->after('customer_name');
            $table->string('address_line')->after('customer_phone');
            $table->string('city')->nullable()->after('address_line');
            $table->string('note')->nullable()->after('city');
            $table->string('payment_method')->after('note');
            $table->string('payment_ref')->nullable()->after('payment_method');
            $table->string('receipt_image')->nullable()->after('payment_ref');
            $table->decimal('subtotal', 10, 2)->after('receipt_image');
            $table->decimal('shipping', 10, 2)->default(0)->after('subtotal');
        });
    }

    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn([
                'customer_name',
                'customer_phone',
                'address_line',
                'city',
                'note',
                'payment_method',
                'payment_ref',
                'receipt_image',
                'subtotal',
                'shipping',
            ]);
        });
    }
};
