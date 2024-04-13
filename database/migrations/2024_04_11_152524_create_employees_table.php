<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('code')->nullable()->comment('Mã NV');
            $table->string('name')->comment('Tên NV');
            $table->string('department')->comment('Phòng ban');
            $table->string('position')->comment('Chức vụ');
            $table->string('type')->comment('Loại nhân viên');
            $table->string('gender')->comment('Giới tính');
            $table->date('birthday')->comment('Ngày sinh');
            $table->string('address')->comment('Địa chỉ');
            $table->string('nationality')->comment('Quốc tịch');
            $table->string('identity_card')->comment('CMND');
            $table->string('phone')->comment('Số điện thoại');
            $table->string('email')->comment('Email');
            $table->string('tax_code')->nullable()->comment('Mã số thuế');
            $table->softDeletes();
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
        Schema::dropIfExists('employees');
    }
}
