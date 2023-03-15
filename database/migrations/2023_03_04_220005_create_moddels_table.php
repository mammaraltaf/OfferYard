<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Classes\Enums\StatusEnum;
class CreateModdelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('moddels', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('image')->nullable();
            $table->foreignId('category_id')->nullable()->constrained('categories')->onDelete('cascade');
            $table->foreignId('brand_id')->nullable()->constrained('brands')->onDelete('cascade');
            $table->string('status')->default(StatusEnum::Active);
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
        Schema::dropIfExists('moddels');
    }
}
