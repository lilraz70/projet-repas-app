<?php

namespace App\Http\Livewire\etatetstatistique;

use App\Models\Region;
use Livewire\Component;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;



class EtatsRegion extends Component
{


    public function render()
    {
        try {

        return view('livewire.etatetstatistique.etatsRegion',[
            
            'listsf'=>Region::all()
        ])
            ->extends("layouts.dash")
            ->section('contenu');
        } catch (\Throwable $th) {
            session()->flash('erreur2', "Oups!! Veuillez contacter l'administrateur");
        }
    }
    // html to pdf using dompdf
    public function exportPdf()
    {
        $pdfContent = PDF::loadView('livewire.etatetstatistique.etatsregion')->output();
        return response()->streamDownload(
            fn () => print($pdfContent),
            "EtatParRegion.pdf"
        );  

    }
}
