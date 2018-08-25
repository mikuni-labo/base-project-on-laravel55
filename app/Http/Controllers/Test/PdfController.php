<?php
declare(strict_types=1);

namespace App\Http\Controllers\Test;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use setasign\Fpdi\TcpdfFpdi;
use TCPDF_FONTS;

class PdfController extends Controller
{
    /** @var TcpdfFpdi */
    private $pdf;

    /** @var TCPDF_FONTS */
    private $fonts;

    /**
     * @param TcpdfFpdi $pdf
     * @param TCPDF_FONTS $fonts
     * @return void
     */
    public function __construct(TcpdfFpdi $pdf, TCPDF_FONTS $fonts)
    {
        $this->middleware('auth');

        $this->pdf = $pdf;
        $this->fonts = $fonts;
    }

    /**
     * @param  Request $request
     */
    public function __invoke(Request $request)
    {
        $this->process();

        return view('pdf.test');
    }

    /**
     * @return void
     */
    private function process()
    {
        $this->pdf->SetMargins(0,0,0);
        $this->pdf->SetAutoPageBreak(false);
        $this->pdf->setPrintHeader(false);
        $this->pdf->setPrintFooter(false);
        $this->pdf->setSourceFile(storage_path('system/pdf/postcards/postcard.pdf'));
        $tpl = $this->pdf->importPage(1);
//         $hanamina = $this->fonts->addTTFfont(storage_path('system/fonts/HanaMinA.ttf'));

        // Start of loop.
        $this->pdf->AddPage();
        $this->pdf->useTemplate($tpl, 0, 0, null, null, true);

//         $this->pdf->SetFont($hanamina, '', 24, '', true);
        $this->pdf->SetFont("kozgopromedium", '', 24, '', true);
        $this->pdf->setFontSpacing(3.5);
        $this->pdf->text(44, 50, "test");

//         $this->pdf->SetFont($hanamina, '', 20, '', true);
        $this->pdf->SetFont("kozgopromedium", '', 20, '', true);
        $this->pdf->setFontSpacing(3.5);
        $this->pdf->text(45.0, 12.0, "5430001");

        // End of loop.

        if ($this->pdf->getPage()) {
            $this->pdf->Output('test.pdf');
        }
    }

}
