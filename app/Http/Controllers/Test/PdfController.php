<?php
declare(strict_types=1);

namespace App\Http\Controllers\Test;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use setasign\Fpdi\Fpdi;
use TCPDF;

class PdfController extends Controller
{
    /**
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @param  Request $request
     */
    public function __invoke(Request $request)
    {
        $this->fpdi();
//         $this->tcpdf();

        return view('pdf.test');
    }

    /**
     * @return void
     */
    private function fpdi()
    {
        $pdf = new Fpdi();
        $pdf->setSourceFile(storage_path('app/pdf/postcards/postcard.pdf'));
        $pdf->AddPage();
        $pdf->SetMargins(0,0,0);
        $importPage = $pdf->importPage(1);
        $pdf->useTemplate($importPage, 0, 0, null, null, true);
        $pdf->SetFont("helvetica", "", 12);
        $pdf->Text(50, 100, "Hello World!!");
        $pdf->Output('I', 'test.pdf');
    }

    /**
     * @return void
     */
    private function tcpdf()
    {
        $pdf = new TCPDF();
        $pdf->AddPage();
        $pdf->SetMargins(0,0,0);
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);
        $pdf->SetFont("kozminproregular", "", 12);
        $pdf->Text(50, 100, "テスト");
//         $html = view('pdf.test');
//         $pdf->writeHTML($html);
        $pdf->Output("test.pdf");
    }

}
