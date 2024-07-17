<?php

use App\Models\loaiTin;
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
        Schema::create('tins', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(loaiTin::class)->constrained();
            $table->string('tieuDe');
            $table->string('anh');
            $table->text('noiDung');
            $table->unsignedBigInteger('luotXem')->default(0);
            $table->date('ngayDang');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tins');
    }
};
