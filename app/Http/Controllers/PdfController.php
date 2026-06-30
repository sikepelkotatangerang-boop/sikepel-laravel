<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\SKTMDocument;
use App\Models\BelumRumahDocument;
use Barryvdh\DomPDF\Facade\Pdf;

class PdfController extends Controller
{
    public function suratKeluar($id)
    {
        $doc = Document::findOrFail($id);
        $pdf = Pdf::loadView('pdf.surat-keluar', compact('doc'));
        return $pdf->download("surat-keluar-{$doc->nomor_surat}.pdf");
    }

    public function sktm($id)
    {
        $doc = SKTMDocument::with('pejabat')->findOrFail($id);
        $pdf = Pdf::loadView('pdf.sktm', compact('doc'));
        return $pdf->download("sktm-{$doc->nomor_surat}.pdf");
    }

    public function belumRumah($id)
    {
        $doc = BelumRumahDocument::with('pejabat')->findOrFail($id);
        $pdf = Pdf::loadView('pdf.belum-rumah', compact('doc'));
        return $pdf->download("belum-rumah-{$doc->nomor_surat}.pdf");
    }

    public function report($type)
    {
        $data = [];
        $title = '';

        switch ($type) {
            case 'surat-keluar':
                $title = 'Laporan Surat Keluar';
                $data = Document::where('status', '!=', 'deleted')->orderBy('tanggal_surat', 'desc')->get();
                break;
            case 'surat-masuk':
                $title = 'Laporan Surat Masuk';
                $data = \App\Models\SuratMasuk::orderBy('tanggal_surat', 'desc')->get();
                break;
            case 'sktm':
                $title = 'Laporan SKTM';
                $data = SKTMDocument::orderBy('tanggal_surat', 'desc')->get();
                break;
            case 'belum-rumah':
                $title = 'Laporan Belum Rumah';
                $data = BelumRumahDocument::orderBy('tanggal_surat', 'desc')->get();
                break;
            default:
                abort(404);
        }

        $pdf = Pdf::loadView('pdf.report', compact('data', 'title', 'type'));
        return $pdf->download("laporan-{$type}.pdf");
    }
}
