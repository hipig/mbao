<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCardGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('card_groups', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('名称');
            $table->string('name_en')->comment('英文名称');
            $table->string('color')->comment('样式');
            $table->string('cover')->nullable()->comment('封面');
            $table->boolean('is_pro')->default(false)->comment('是否付费');
            $table->boolean('status')->default(true)->comment('状态');
            $table->unsignedInteger('index')->default(0)->comment('排序');
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
        Schema::dropIfExists('card_groups');
    }
}
