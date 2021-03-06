<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('chart_account_id')->unsigned()->nullable();
            $table->foreign('chart_account_id')->references('id')
                ->on('chart_accounts');
            $table->integer('tax_type_id')->unsigned()->nullable();
            $table->foreign('tax_type_id')->references('id')
                ->on('tax_types');
            $table->integer("productable_id");
            $table->string("productable_type");
            $table->string('sku');
            $table->bigInteger('barcode');
            $table->string('name');
            $table->longText('desc');
            $table->decimal('price', 12, 2);
            $table->integer('qty');
            $table->integer('discount')->default(0);
            $table->integer('package_id')->unsigned()->nullable();
            $table->foreign('package_id')->references('id')
                ->on('packages');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
