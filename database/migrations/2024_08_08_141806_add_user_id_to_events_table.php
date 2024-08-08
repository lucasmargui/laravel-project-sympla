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
        Schema::table('events', function (Blueprint $table) {
            // Adiciona a coluna user_id como uma chave estrangeira
            $table->unsignedBigInteger('user_id');

            // Define a chave estrangeira e a relação com a tabela users
            $table->foreign('user_id')
                  ->references('id')->on('users')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('events', function (Blueprint $table) {
            // Remove a chave estrangeira
            $table->dropForeign(['user_id']);

            // Remove a coluna user_id
            $table->dropColumn('user_id');
        });
    }
};
