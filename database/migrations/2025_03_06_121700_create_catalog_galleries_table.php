<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Catalog;

class CreateCatalogGalleriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('catalog_galleries', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Catalog::class)->constrained()->cascadeOnDelete();
            $table->string('actual_path')->nullable();
            $table->string('resize_path')->nullable();
            $table->string('type')->default('image');
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
        Schema::dropIfExists('catalog_galleries');
    }
}
