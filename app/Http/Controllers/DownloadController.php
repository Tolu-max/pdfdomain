<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DownloadController extends Controller
{
    public function downloadPDF()
    {
        // Replace this with logic to generate and return the PDF file for download
        $pdfPath = public_path('pdf/lamladmaths.pdf'); // Adjust the path to your PDF file

        return response()->file($pdfPath);
    }
    
}
