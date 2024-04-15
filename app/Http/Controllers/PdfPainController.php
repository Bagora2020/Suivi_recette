<?php

namespace App\Http\Controllers;

use App\Models\Pain;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PdfPainController extends Controller
{
    public function index($id)
    {
        
        $invoice= Pain::find($id);
        $total_lettre = $this->numberToWord($invoice->montant);
        $pdf = Pdf::loadView('ordrederecettepdf.pdfpain', compact('invoice','total_lettre'));

        return $pdf->stream();
    }

      
    private function numberToWord($number)
    {
        $units = array('Zéro', 'Un', 'Deux', 'Trois', 'Quatre', 'Cinq', 'Six', 'Sept', 'Huit', 'Neuf');
        $teens = array('Dix', 'Onze', 'Douze', 'Treize', 'Quatorze', 'Quinze', 'Seize', 'Dix-Sept', 'Dix-Huit', 'Dix-Neuf');
        $tens = array('', '', 'Vingt', 'Trente', 'Quarante', 'Cinquante', 'Soixante', 'Soixante-Dix', 'Quatre-Vingt', 'Quatre-Vingt-Dix');
    
        if ($number < 10) {
            return $units[$number];
        } elseif ($number < 20) {
            return $teens[$number - 10];
        } elseif ($number < 100) {
            $tens_digit = (int) ($number / 10);
            $units_digit = $number % 10;
            $total_lettre = $tens[$tens_digit];
            if ($units_digit > 0) {
                $total_lettre .= '-' . $units[$units_digit];
            }
            return $total_lettre;
        } elseif ($number < 1000) {
            $hundreds_digit = (int) ($number / 100);
            $remainder = $number % 100;
            $total_lettre = $units[$hundreds_digit] . ' Cent';
            if ($remainder > 0) {
                $total_lettre .= ' ' . $this->numberToWord($remainder);
            }
            return $total_lettre;
        } elseif ($number < 10000) {
            $thousands_digit = (int) ($number / 1000);
            $remainder = $number % 1000;
            $total_lettre = $this->numberToWord($thousands_digit);
            if ($thousands_digit == 1) {
                $total_lettre .= ' Mille';
            } else {
                $total_lettre .= ' Mille';
            }
            if ($remainder > 0) {
                if ($remainder >= 100) {
                    $total_lettre .= ' ' . $this->numberToWord($remainder);
                } else {
                    $total_lettre .= '-Cent';
                }
            }
            return $total_lettre;
        } elseif ($number < 100000) {
            $ten_thousands_digit = (int) ($number / 10000);
            $remainder = $number % 10000;
    
            if ($remainder > 0) {
                $total_lettre = $tens[$ten_thousands_digit];
                if ($remainder >= 1000) {
                    $total_lettre .= ' ' . $this->numberToWord($remainder);
                } else {
                    $total_lettre .= '-Mille';
                }
            } else {
                $total_lettre = $tens[$ten_thousands_digit] . ' Mille';
            }
    
            return $total_lettre;
        } elseif ($number < 1000000) {
            $hundred_thousands_digit = (int) ($number / 100000);
            $remainder = $number % 100000;
            $total_lettre = $this->numberToWord($hundred_thousands_digit) . ' Cent';
            if ($remainder > 0) {
                $total_lettre .= ' ' . $this->numberToWord($remainder);
            }
            return $total_lettre;
        }elseif ($number < 10000000) {
            $millions_digit = (int) ($number / 1000000);
            $remainder = $number % 1000000;
            if ($millions_digit > 1) {
                $total_lettre = $this->numberToWord($millions_digit) . ' Millions';
            } elseif ($millions_digit == 1) {
                $total_lettre = 'Un Million';
            } else {
                $total_lettre = '';
            }
            if ($remainder > 0) {
                if ($remainder >= 1000) {
                    $thousands_digit = (int) ($remainder / 1000);
                    $remainder %= 1000;
                    $total_lettre .= ($millions_digit > 0 ? ' ' : '') . $this->numberToWord($thousands_digit) . ' Mille';
                    if ($remainder > 0) {
                        $total_lettre .= ' ' . $this->numberToWord($remainder);
                    }
                } else {
                    $total_lettre .= ($millions_digit > 0 ? ' ' : '') . $this->numberToWord($remainder);
                }
            }
            return $total_lettre;
        }
        
    }        
}
