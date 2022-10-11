<?php

namespace App\Http\Livewire\etatetstatistique;

use App\Models\Region;
use Livewire\Component;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\App;



class EtatsQPLC extends Component
{


    public function render()
    {
        try {

        return view('livewire.etatetstatistique.etatsqplc',[
            
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
        $pdfContent = PDF::loadView('livewire.etatetstatistique.etatsqplc')->output();
        return response()->streamDownload(
            fn () => print($pdfContent),
            "Etat Quantités de produits locaux récoltés dans les champs scolaires.pdf"
        );  

    }
}
