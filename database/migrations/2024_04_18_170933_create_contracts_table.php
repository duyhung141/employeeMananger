<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contracts', function (Blueprint $table) {
            $table->id();
            $table->string('code')->nullable()->comment('Mã hợp đồng');
            $table->string('contract_number')->nullable()->comment('Số hợp đồng');
            $table->bigInteger('employee_id')->comment('ID nhân viên');
            $table->bigInteger('salary_id')->comment('ID hồ sơ lương');
            $table->string('type')->comment('Loại hợp đồng');
            $table->date('effective_date')->comment('Ngày bắt đầu');
            $table->date('expired_date')->comment('Ngày kết thúc');
            $table->string('status')->default('NOT_APPLY')->comment('Trạng thái');
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
        Schema::dropIfExists('contracts');
    }
}
