<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppendixesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appendixes', function (Blueprint $table) {
            $table->id();
            $table->string('code')->nullable()->comment('Mã phụ lục');
            $table->bigInteger('employee_id')->comment('ID Nhân viên');
            $table->bigInteger('contract_id')->comment('ID Hợp đồng');
            $table->string('appendix_number')->nullable()->comment('Số phụ lục');
            $table->string('type')->comment('Loại phụ lục');
            $table->date('effective_date')->comment('Ngày bắt đầu');
            $table->date('expired_date')->comment('Ngày kết thúc');
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
        Schema::dropIfExists('appendixes');
    }
}
