<?php

namespace App\Http\Livewire\etatetstatistique;

use Livewire\Component;
use App\Models\Province;
use Barryvdh\DomPDF\Facade\Pdf;



class EtatsProvince extends Component
{


    public function render()
    {
        return view('livewire.etatetstatistique.etatsProvince',[
        
        'listsf'=>Province::all(),
        'listsf2'=>Province::all()
        
        ])
            ->extends("layouts.dash")
            ->section('contenu');
    }
    // html to pdf using dompdf
    public function exportPdf()
    {
        
        $pdfContent = PDF::loadView('livewire.etatetstatistique.etatsprovince')->output();
        return response()->streamDownload(
            fn () => print($pdfContent),
            "EtatParProvince.pdf"
        );  
      

    }
}
