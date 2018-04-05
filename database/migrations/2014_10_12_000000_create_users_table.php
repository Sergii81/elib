<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('login')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->string('fio')->nulllable();
            $table->integer('phone')->nulllable();
            $table->integer('uniq_num')->nulllable()->unique();
            $table->integer('role_id')->nulllable()
                    ->unsigned()
                    ->default(2);
            
        });
        
        Schema::table('users', function (Blueprint $table) {
        $table->foreign('role_id')->references('id')->on('roles');
        });
    }
    
    
    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
