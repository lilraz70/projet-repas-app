<?php

namespace App\Http\Livewire\etatetstatistique;


use Livewire\Component;
use App\Models\annescol;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;



class EtatsSProduitRecu extends Component
{

    public $etatGlobal = [];
    public $annescolaire = 2022; //2022

    public function render()
    {

        /* etat initial de la vue */
        if ($this->annescolaire == '') {

            $this->etatGlobal = array();
            return view(
                'livewire.etatetstatistique.etatssproduitrecu',
                [
                    'etatGlobals' => $this->etatGlobal,
                    'listsf3' => annescol::all()
                ]
            )
                ->extends("layouts.dash")
                ->section('contenu');
        } else {
            /* second etat  de la vue apres avoir choisi l'anne et la province*/
            //  try { // si les requetes donne rien je lui envoi un message avec le try
            $this->etatGlobal = [];
           
            // $medicaments = DB::select(" select * from medicament ");  // si om m'avait demander par detail dans la table consultation
           
            $this->etatGlobal = DB::select("

                                            SELECT libmedicament,
                                            SUM(consultation.nb_recu) as qrecue,
                                            SUM(consultation.nbtotal) as qdistribuee
                                            FROM consultation ,soins,medicament
                                            WHERE consultation.anne =  $this->annescolaire 
                                            and soins.idmedicament = medicament.idmedicament
                                            and soins.idconsultation = consultation.idconsultation
                                            GROUP BY libmedicament
                ");

           // si om m'avait demander par detail dans la table consultation // foreach ($medicaments as $medicament) {

            //     $etatClasse = array();

            //     $etats = DB::select("
            //                     SELECT consultation.nb_recu,nbtotal
            //                     FROM consultation ,soins,medicament
            //                     WHERE consultation.anne =  $this->annescolaire 
            //                     and soins.idmedicament = medicament.idmedicament
            //                     and soins.idconsultation = consultation.idconsultation
                          
            //                         ");

            //     $etats =  $etats[0];

            //     //  recuperation des resultats

            //     $etatClasse['etats'] =   [
            //         'qrecue' =>  $etats->nb_recu,
            //         'qdistribuee' => $etats->nbtotal,
            //         'qrestante' => $etats->nb_recu - $etats->nbtotal,
            //         'qrcsps' =>   $etats->nb_recu
            //     ];

            //     // la quqntite recu reste a revoir 

            //     $this->etatGlobal[$medicament->libmedicament] = $etatClasse; // recuperer l'ensemble des donnees
            // }


            /* ici j'envoi les donnees des requetes */

            return view(
                'livewire.etatetstatistique.etatssproduitrecu',
                [
                    'etatGlobals' => $this->etatGlobal,
                    'listsf3' => annescol::all()

                ]
            )
                ->extends("layouts.dash")
                ->section('contenu');
            // } catch (\Throwable $th) {
            //     session()->flash('erreur2', "Oups!! Aucune donnée trouvée");
            //     $this->etatGlobal = array();
            //     return view(
            //         'livewire.etatetstatistique.etatsregion',
            //         [
            //             'etatGlobals' => $this->etatGlobal,
            //             'listsf3' => annescol::all()
            //         ]
            //     )
            //         ->extends("layouts.dash")
            //         ->section('contenu');
            // }
        }
    }


    // html to pdf using dompdf
    public function exportPdf()
    {
        $pdfContent = PDF::loadView('livewire.etatetstatistique.etatssproduitrecu')->output();
        return response()->streamDownload(
            fn () => print($pdfContent),
            "Etat Situation des produits reçus.pdf"
        );
    }
}
