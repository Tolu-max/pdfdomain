<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pdf;

class PdfSeeder extends Seeder
{
    public function run()
    {
        Pdf::create([
            'name' => 'Lamlad Maths',
            'price' => 726.00,
            'image' => 'path/to/sample.pdf',
            'description' => 'Description for Sample PDF 1',
            'pdf_path' => 'pdfs/sample.pdf', // Relative path to the PDF
        ]);

        Pdf::create([
            'name' => 'Sample PDF 2',
            'price' => 750.00,
            'image' => 'path/to/another.pdf',
            'description' => 'Description for Sample PDF 2',
            'pdf_path' => 'pdfs/another.pdf', // Relative path to the PDF
        ]);

        // Add more seed data as needed
    }
}

