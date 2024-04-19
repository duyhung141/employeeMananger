<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAllowanceSubsidiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('allowance_subsidies', function (Blueprint $table) {
            $table->id();
            $table->string('code')->nullable()->comment('Mã phụ cấp');
            $table->string('type')->comment('Loại phụ cấp/trợ cấp');
            $table->date('effective_date')->comment('Ngày hiệu lực');
            $table->double('amount')->default(0)->comment('Số tiền');
            $table->string('note')->comment('Ghi chú');
            $table->bigInteger('employee_id')->comment('ID Nhân viên');
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
        Schema::dropIfExists('allowance_subsidies');
    }
}
