<?php

namespace App\Http\Livewire\etatetstatistique;

use App\Models\Region;
use Livewire\Component;
use App\Models\Province;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\App;



class EtatsEcole extends Component
{


    public function render()
    {
        return view('livewire.etatetstatistique.etatsecole',
        [
            'listsf'=>Region::all(),
            'listsf2'=>Province::all(),
        
        ])
            ->extends("layouts.dash")
            ->section('contenu');
    }
    // html to pdf using dompdf
    public function exportPdf()
    {
        $pdfContent = PDF::loadView('livewire.etatetstatistique.etatsecole')->output();
        return response()->streamDownload(
            fn () => print($pdfContent),
            "EtatParEcole.pdf"
        );  

    }
}
