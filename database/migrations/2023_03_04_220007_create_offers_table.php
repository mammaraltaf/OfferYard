<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->foreignId('category_id')->nullable()->constrained('categories')->onDelete('cascade');
            $table->foreignId('brand_id')->nullable()->constrained('brands')->onDelete('cascade');
            $table->foreignId('model_id')->nullable()->constrained('models')->onDelete('cascade');
            $table->foreignId('purchase_year_id')->nullable()->constrained('purchase_years')->onDelete('cascade');
            $table->string('description')->nullable();
            $table->string('price')->nullable();
            $table->tinyInteger('auction_end_number_of_days')->nullable();
            $table->boolean('is_price_fixed')->default(false);
            $table->boolean('is_activate_comment_section')->default(false);
            $table->boolean('is_show_location_product')->default(false);
            $table->boolean('is_hand_to_hand')->default(false);
            $table->boolean('is_shipping_to_buyer')->default(false);
            $table->double('latitude')->nullable();
            $table->double('longitude')->nullable();
            $table->string('address')->nullable();
            $table->string('offer_item')->nullable()->comment('PRICE, AUCTION, FREE');
            $table->string('status')->nullable();
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('cascade');
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
        Schema::dropIfExists('offers');
    }
}
