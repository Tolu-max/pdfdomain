<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePdfsTable extends Migration
{
    public function up()
    {
        Schema::create('pdfs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->decimal('price', 10, 2); // 10 digits, 2 decimal places (for NGN)
            $table->string('image')->nullable(); // Image file path (if needed)
            $table->text('description')->nullable();
            $table->string('pdf_path'); // PDF file path
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pdfs');
    }
}
;
