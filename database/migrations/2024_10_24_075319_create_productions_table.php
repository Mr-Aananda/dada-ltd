<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('productions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->nullable()
                ->comment('Creator')
                ->constrained('users')
                ->cascadeOnUpdate()
                ->nullOnDelete();
            $table->string('image')->nullable()->comment('Path to the production image');
            $table->string('ps')->nullable();
            $table->date('ps_date')->nullable();
            $table->string('sst10')->nullable();
            $table->string('style')->nullable();
            $table->string('bayer_po')->nullable();
            $table->string('bayer')->nullable();
            $table->date('sd_date')->nullable();
            $table->string('qty')->nullable();
            $table->string('cap_item')->nullable();
            $table->string('ship_via')->nullable();
            $table->string('dest')->nullable();
            $table->string('final_dest')->nullable();
            $table->string('embo')->nullable();
            $table->string('washing')->nullable();
            $table->string('c_pattern')->nullable();
            $table->string('v_pattern')->nullable();
            $table->string('c_cutter')->nullable();
            $table->string('v_cutter')->nullable();
            $table->string('eyelet_number')->nullable();
            $table->string('eyelet_color')->nullable();
            $table->string('eyelet_position')->nullable();
            $table->string('visor_6')->nullable();
            $table->string('visor_1/5')->nullable();
            $table->string('visor_0/5')->nullable();
            $table->string('f_mold')->nullable();
            $table->string('b_mold')->nullable();
            $table->string('extra_stitch')->nullable();
            $table->string('packing')->nullable();
            $table->string('row')->nullable();
            $table->string('cm_from_front_end')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productions');
    }
};
