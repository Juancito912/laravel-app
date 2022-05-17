<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuenta_corriente', function (Blueprint $table) {
            $table->engine="InnoDB";

            $table->string('poseedor');
            $table->bigInteger('banco_id')->unsigned();
            $table->bigInteger('proveedor_id')->unsigned();
            $table->id();

            $table->timestamps();
            
            $table->foreign('proveedor_id')->references('id')->on('proveedores')->onDelete('cascade');
            $table->foreign('banco_id')->references('id')->on('bancos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cuenta_corriente');
    }
};
