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
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('company_id') //unsignedBigIntegerにするのはcompaniesテーブルのidがbigIncrementsのため
            ->nulllable() //会社情報が削除されてNullになっても大丈夫なようにNullを許可
            ->constrained('companies', 'id') //copaniesテーブルのidを参照する
            ->onDelete('set null'); //親レコードが削除されたらnullを設定
            $table->string('product_name');
            $table->integer('price');
            $table->integer('stock');
            $table->string('comment')->nullable();
            $table->string('img_path')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
