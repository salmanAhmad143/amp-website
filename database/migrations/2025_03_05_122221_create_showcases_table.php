<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use App\Models\CatalogGallery;
use App\Models\Catalog;

class CreateShowcasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('showcases', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Catalog::class)->constrained()->cascadeOnDelete();
            $table->string('phone', 20)->nullable();
            $table->dateTime('expiration_date')->nullable();
            $table->foreignIdFor(CatalogGallery::class)->constrained()->cascadeOnDelete();
            $table->unsignedInteger('position')->index('position')->default(0);
            $table->boolean('status')->default(0);
            $table->timestamps();
        });

        // Set initial positions
        DB::statement('SET @pos := 0');
        DB::statement('UPDATE showcases SET position = (@pos := @pos + 1) ORDER BY created_at ASC');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('showcases');
    }
}
