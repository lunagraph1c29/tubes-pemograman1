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
    Schema::create('materis', function (Blueprint $table) {
    $table->id();              // buat id (primary key)
    $table->string('judul');   // buatjudul materi
    $table->string('kategori');// buat kategori materi
    $table->text('deskripsi')->nullable(); // boleh kosong
    $table->enum('status', ['belum','berjalan','selesai']);
    $table->timestamps();      // created_at & updated_at
});


}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materis');
    }
};
