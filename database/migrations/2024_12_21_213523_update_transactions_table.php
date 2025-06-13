<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('transactions', function (Blueprint $table) {
            // Menambahkan kolom customer_id
            $table->unsignedBigInteger('customer_id')->after('product_id');
            $table->decimal('total_bayar', 15, 2)->after('jumlah_beli');

            $table->dropColumn(['nama_pembeli', 'no_pembeli']);
        });

        DB::table('transactions')->whereNull('customer_id')->update(['customer_id' => 1]);
    }

    public function down()
    {
        Schema::table('transactions', function (Blueprint $table) {
            // Rollback perubahan
            $table->dropForeign(['customer_id']);
            $table->dropColumn('customer_id');
            $table->dropColumn('total_bayar');


            $table->string('nama_pembeli')->after('product_id');
            $table->string('no_pembeli')->nullable()->after('nama_pembeli');
        });
    }
};
