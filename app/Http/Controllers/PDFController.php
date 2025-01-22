<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

class PDFController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function generatePDF(Request $request)
    {
        // echo "hhhhh";die;
        $data = [
            'title' => 'Welcome to CodeSolutionStuff.com',
            'date' => date('m/d/Y')
        ];
          
        $pdf = PDF::loadView('admin.myPDF', $data);
    
        return $pdf->download('codesolutionstuff.pdf');
    }
}
