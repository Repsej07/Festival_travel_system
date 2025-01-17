<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFestivalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('festivals', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('name');
            $table->string('location');
            $table->date('date'); // Festival date
            $table->text('description');
            $table->string('image'); // Image URL or path
            $table->decimal('price', 8, 2); // Price (can be decimal for ticket price)
            $table->integer('tickets'); // Number of available tickets
            $table->enum('status', ['active', 'cancelled', 'completed']); // Festival status
            $table->timestamps(); // Created at, Updated at timestamps
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('festivals');
    }
}
