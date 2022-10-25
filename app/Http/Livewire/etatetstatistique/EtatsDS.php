<?php

namespace App\Http\Livewire\etatetstatistique;

use App\Models\Region;
use Livewire\Component;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;



class EtatsDS extends Component
{


    public function render()
    {
        try {
            $idcommune = 1;
            // $datas = DB::select('select libprovince, libceb from province p,ceb ce,commune co where p.idprovince = co.idprovince and co.idcommune = ce.idcommune');
            $datas = region::
            dd($datas);
        return view('livewire.etatetstatistique.etatsds',[
            
            'listsf'=>region::all()
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
        

        // $pdfContent = PDF::loadView('livewire.etatetstatistique.etatsds')->output();
        // return response()->streamDownload(
        //     fn () => print($pdfContent),
        //     "Etat Déparasitage et supplémentation en vitamine A.pdf"
        // );  

    }
}
