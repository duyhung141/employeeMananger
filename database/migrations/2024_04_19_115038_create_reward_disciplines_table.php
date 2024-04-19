<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRewardDisciplinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reward_disciplines', function (Blueprint $table) {
            $table->id();
            $table->string('code')->nullable()->comment('Mã khen thưởng/kỷ luật');
            $table->string('reward_discipline_number')->nullable()->comment('Số quyết định khen thưởng/kỷ luật');
            $table->string('type');
            $table->date('effective_date')->comment('Ngày hiệu lực');
            $table->string('reason')->comment('Lý do');
            $table->text('content')->comment('Nội dung');
            $table->double('amount')->default(0)->comment('Số tiền khen thưởng/kỷ luật');
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
        Schema::dropIfExists('reward_disciplines');
    }
}
