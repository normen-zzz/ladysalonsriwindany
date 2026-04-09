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
        Schema::create('home_contents', function (Blueprint $table) {
            $table->id();
            $table->string('name')->default('Homepage');

            $table->string('hero_title_id')->nullable();
            $table->string('hero_title_en')->nullable();
            $table->string('hero_title2_id')->nullable();
            $table->string('hero_title2_en')->nullable();
            $table->text('hero_subtitle_id')->nullable();
            $table->text('hero_subtitle_en')->nullable();
            $table->string('hero_image')->nullable();
            $table->string('hero_badge_title_id')->nullable();
            $table->string('hero_badge_title_en')->nullable();
            $table->string('hero_badge_subtitle_id')->nullable();
            $table->string('hero_badge_subtitle_en')->nullable();

            $table->string('stat1_value')->nullable();
            $table->string('stat1_label_id')->nullable();
            $table->string('stat1_label_en')->nullable();
            $table->string('stat2_value')->nullable();
            $table->string('stat2_label_id')->nullable();
            $table->string('stat2_label_en')->nullable();
            $table->string('stat3_value')->nullable();
            $table->string('stat3_label_id')->nullable();
            $table->string('stat3_label_en')->nullable();

            $table->string('services_title_id')->nullable();
            $table->string('services_title_en')->nullable();
            $table->string('services_subtitle_id')->nullable();
            $table->string('services_subtitle_en')->nullable();
            $table->text('services_description_id')->nullable();
            $table->text('services_description_en')->nullable();
            $table->text('services_empty_message_id')->nullable();
            $table->text('services_empty_message_en')->nullable();

            $table->string('testimonials_title_id')->nullable();
            $table->string('testimonials_title_en')->nullable();
            $table->string('testimonials_subtitle_id')->nullable();
            $table->string('testimonials_subtitle_en')->nullable();
            $table->text('testimonials_empty_message_id')->nullable();
            $table->text('testimonials_empty_message_en')->nullable();

            $table->string('cta_badge_id')->nullable();
            $table->string('cta_badge_en')->nullable();
            $table->string('cta_title_id')->nullable();
            $table->string('cta_title_en')->nullable();
            $table->string('cta_highlight_id')->nullable();
            $table->string('cta_highlight_en')->nullable();
            $table->text('cta_subtitle_id')->nullable();
            $table->text('cta_subtitle_en')->nullable();
            $table->string('cta_button_text_id')->nullable();
            $table->string('cta_button_text_en')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_contents');
    }
};
