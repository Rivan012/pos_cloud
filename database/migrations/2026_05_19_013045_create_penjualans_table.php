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
        Schema::create('penjualans', function (Blueprint $table) {
             $table->id();
            $table->string('kode_transaksi')->unique();
            $table->foreignId('barang_id')->constrained('barangs')->onDelete('cascade');
            $table->foreignId('kasir_id')->constrained('kasirs')->onDelete('cascade');
            $table->integer('jumlah');
            $table->decimal('subtotal', 12, 2);
            $table->foreignId('diskon_id')->nullable()->constrained('diskons')->nullOnDelete();
            $table->decimal('total', 12, 2);
            $table->timestamp('tanggal')->useCurrent();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penjualans');
    }
};
