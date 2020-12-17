<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBelibayarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beli_bayar', function (Blueprint $table) {
            $table->char('beli_bayar_id', 8)->primary();
            $table->double('beli_bayar_nominal',15);
            $table->date('beli_bayar_tgl');
            $table->string('beli_bayar_metode');
            $table->char('beli_id', 8);
            $table->foreign('beli_id')->references('beli_id')->on('beli')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('beli_bayar');
    }
}
