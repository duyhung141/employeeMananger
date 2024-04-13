<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salaries', function (Blueprint $table) {
            $table->id();
            $table->string('code')->nullable()->comment('Mã hồ sơ lương');
            $table->string('decision_code')->nullable()->comment('Số quyết định');
            $table->integer('employee_id')->comment('ID nhân viên');
            $table->integer('department_id')->nullable()->comment('ID phòng ban');
            $table->date('effective_date')->comment('Ngày có hiệu lực');
            $table->date('expired_date')->comment('Ngày hết hiệu lực');
            $table->string('tax_schedule')->nullable()->comment('Biểu thuế');
            $table->double('basic_salary')->comment('Lương cơ bản');
            $table->double('negotiable_salary')->comment('Lương thỏa thuận');
            $table->double('coefficient_salary')->comment('Tỷ lệ hưởng lương');
            $table->string('status')->default('NOT_APPLY')->comment('Trạng thái');
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
        Schema::dropIfExists('salaries');
    }
}
