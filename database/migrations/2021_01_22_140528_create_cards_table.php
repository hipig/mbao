<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cards', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('group_id')->comment('分组ID');
            $table->string('name')->comment('名称');
            $table->string('name_en')->comment('英文名称');
            $table->string('spell_cn')->nullable()->comment('拼音');
            $table->string('spell_en')->nullable()->comment('美式发音');
            $table->string('spell_uk')->nullable()->comment('英式发音');
            $table->string('color')->comment('样式');
            $table->string('cover')->nullable()->comment('封面');
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
        Schema::dropIfExists('cards');
    }
}
