<?php

namespace App\Http\Controllers;

use App\Models\RentLogs;
use Illuminate\Http\Request;
use PDF;


class PdfController extends Controller
{
    public function pdfPeminjamanDipinjam()
    {
        $dipinjam = RentLogs::where('status', 'Dipinjam')->get();


        $pdf = PDF::loadView('pages.pdf.peminjaman.dipinjamPDF', compact('dipinjam'));
        return $pdf->stream('SpancaLibrary_dipinjam.pdf');
    }

    public function pdfPeminjamanDipinjamDownload()
    {
        $dipinjam = RentLogs::where('status', 'Dipinjam')->get();


        $pdf = PDF::loadView('pages.pdf.peminjaman.dipinjamPDF', compact('dipinjam'));
        return $pdf->download('SpancaLibrary_dipinjam.pdf');
    }


    public function pdfPeminjamanDikembalikan()
    {
        $dikembalikan = RentLogs::where('status', 'Dikembalikan')
            ->where('denda', null)
            ->get();


        $pdf = PDF::loadView('pages.pdf.peminjaman.dikembalikanPDF', compact('dikembalikan'));
        return $pdf->stream('SpancaLibrary_dikembalikan.pdf');
    }

    public function pdfPeminjamanDikembalikanDownload()
    {
        $dikembalikan = RentLogs::where('status', 'Dikembalikan')
            ->where('denda', null)
            ->get();


        $pdf = PDF::loadView('pages.pdf.peminjaman.dikembalikanPDF', compact('dikembalikan'));
        return $pdf->download('SpancaLibrary_dikembalikan.pdf');
    }


    public function pdfPeminjamanTerlambat()
    {
        $terlambat = RentLogs::where('status', 'Dikembalikan')
            ->where('denda', '!=', null)
            ->get();


        $pdf = PDF::loadView('pages.pdf.pelanggaran.terlambatPDF', compact('terlambat'));
        return $pdf->stream('SpancaLibrary_terlambat.pdf');
    }

    public function pdfPeminjamanTerlambatDownload()
    {
        $terlambat = RentLogs::where('status', 'Dikembalikan')
            ->where('denda', '!=', null)
            ->get();


        $pdf = PDF::loadView('pages.pdf.pelanggaran.terlambatPDF', compact('terlambat'));
        return $pdf->download('SpancaLibrary_terlambat.pdf');
    }


    public function pdfPeminjamanRusak()
    {
        $rusak = RentLogs::where('status', 'Rusak')
            ->where('denda', '!=', null)
            ->get();


        $pdf = PDF::loadView('pages.pdf.pelanggaran.rusakPDF', compact('rusak'));
        return $pdf->stream('SpancaLibrary_rusak.pdf');
    }

    public function pdfPeminjamanRusakDownload()
    {
        $rusak = RentLogs::where('status', 'Rusak')
            ->where('denda', '!=', null)
            ->get();


        $pdf = PDF::loadView('pages.pdf.pelanggaran.rusakPDF', compact('rusak'));
        return $pdf->download('SpancaLibrary_rusak.pdf');
    }


    public function pdfPeminjamanHilang()
    {
        $hilang = RentLogs::where('status', 'Hilang')
            ->where('denda', '!=', null)
            ->get();


        $pdf = PDF::loadView('pages.pdf.pelanggaran.hilangPDF', compact('hilang'));
        return $pdf->stream('SpancaLibrary_hilang.pdf');
    }

    public function pdfPeminjamanHilangDownload()
    {
        $hilang = RentLogs::where('status', 'Hilang')
            ->where('denda', '!=', null)
            ->get();


        $pdf = PDF::loadView('pages.pdf.pelanggaran.hilangPDF', compact('hilang'));
        return $pdf->download('SpancaLibrary_hilang.pdf');
    }
}
