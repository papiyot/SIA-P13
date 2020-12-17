<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdukdetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produk_detail', function (Blueprint $table) {
            $table->char('produk_detail_id', 8)->primary();
            $table->date('produk_detail_tgl_bhn');
            $table->decimal('produk_detail_jml_bhn',15,2);
            $table->char('produk_id', 8);
            $table->foreign('produk_id')->references('produk_id')->on('produk')->onUpdate('cascade')->onDelete('cascade');
            $table->char('bahanbaku_id', 8);
            $table->foreign('bahanbaku_id')->references('bahanbaku_id')->on('bahanbaku')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'))->nullable();
            $table->softDeletes('deleted_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produkdetail');
    }
}
