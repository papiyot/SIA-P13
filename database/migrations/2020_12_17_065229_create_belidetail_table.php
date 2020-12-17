<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBelidetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beli_detail', function (Blueprint $table) {
            $table->char('beli_detail_id', 8)->primary();
            $table->double('beli_detail_harga',15);
            $table->decimal('beli_detail_jml',15,2);
            $table->char('beli_id', 8);
            $table->foreign('beli_id')->references('beli_id')->on('beli')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('beli_detail');
    }
}
