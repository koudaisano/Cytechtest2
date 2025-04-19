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
        Schema::create('sales', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('product_id') //unsignedBigIntegerにするのはproductsテーブルのidがbigIncrementsのため
            ->nulllable() //商品情報が削除されてNullになっても大丈夫なようにNullを許可
            ->constrained('products', 'id') //productsテーブルのidを参照する
            ->onDelete('set null'); //親レコードが削除されたらnullを設定
            $table->unsignedBigInteger('user_id')
            ->nulllable() //購入者情報が削除されてNullになっても大丈夫なようにNullを許可
            ->constrained('users', 'id') //usersテーブルのidを参照する
            ->onDelete('set null'); //親レコードが削除されたらnullを設定
            $table->string('product_name');
            $table->integer('quantity');
            $table->dateTime('sale_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
