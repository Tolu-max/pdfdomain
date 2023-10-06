<?php
namespace Database\Seeders;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            [
                'name' => 'Lamlad Maths',
                'price' => 726.00,
                'image' => 'path/to/sample.pdf',
                'description' => 'Description for Sample PDF 1',
                'pdf_path' => 'pdfs/sample.pdf', // Relative path to the PDF
            ]
        ];
        Product::insert($products);
    }
}
