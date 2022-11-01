<?php

namespace App\Http\Livewire\etatetstatistique;

use App\Models\annescol;
use App\Models\Ecole;
use App\Models\Region;
use Livewire\Component;
use App\Models\Province;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;



class EtatsEcole extends Component
{

    public $etatGlobal = [];
    public $ecole  = 1;
    public $annescolaire = 2022;

    public function render()
    {

        if ($this->ecole == '' && $this->annescolaire == '') {

            return view(
                'livewire.etatetstatistique.etatsecole',
                [
                    'etatGlobals' => $this->etatGlobal,
                    'listsf2' => Ecole::all(),
                    'listsf3' => annescol::all()
                ]
            )
                ->extends("layouts.dash")
                ->section('contenu');
        } else {
            $fer = 'fer';
            $nb16 = 16;
            $nb1 = 1;
            $nb2 = 2;
            $fer = 'fer';
            $alb = 'Albendazole';
            $vita = "Vitamine A";

           
              
            foreach ($classes as $classe) {
                $etatClasse = array();

                $effectif = DB::select("
                    select nbfille,nbgarcon,nbtotal,nbclasse,libceb,libprovince,libregion
                    from eleve,ecole,classe,classeecole,ceb,province,region,commune
                    where eleve.anne =  $this->annescolaire and
                    classe.idclasse = $classe->idclasse and 
                    ecole.idecole = $this->ecole and
                    ecole.idecole = classeecole.idecole 
                    and classe.idclasse = classeecole.idclasse
                    and eleve.idclasse = classe.idclasse and ecole.idceb = ceb.idceb and ceb.idcommune = commune.idcommune and commune.idprovince = province.idprovince and province.idregion = region.idregion
                "); // effectifs total 
                $effectif = $effectif[0];
               
                $nb_16_fer = DB::select("
                    select nbfille,nbgarcon,nbtotal 
                    from consultation,soins,medicament,ecole,classe,classeecole
                    where consultation.anne =  $this->annescolaire and
                    classe.idclasse = $classe->idclasse and 
                    ecole.idecole = $this->ecole and
                    ecole.idecole = classeecole.idecole and 
                    classe.idclasse = classeecole.idclasse and soins.idmedicament = medicament.idmedicament
                    and soins.idconsultation = consultation.idconsultation
                    and medicament.libmedicament ='$fer' and consultation.nb_prise >=$nb16;
                ");
                $nb_16_fer = $nb_16_fer[0];
               
                $nb_moins_16_fer = DB::select("
                select nbfille,nbgarcon,nbtotal 
                from consultation,soins,medicament,ecole,classe,classeecole
                where consultation.anne =  $this->annescolaire and
                classe.idclasse = $classe->idclasse and 
                ecole.idecole = $this->ecole and
                ecole.idecole = classeecole.idecole and 
                classe.idclasse = classeecole.idclasse and soins.idmedicament = medicament.idmedicament
                and soins.idconsultation = consultation.idconsultation
                and medicament.libmedicament ='$fer' and consultation.nb_prise <$nb16;
                ");
                $nb_moins_16_fer =  $nb_moins_16_fer[0];
                
                dd($nb_moins_16_fer);

                $nb_2_alb = DB::select("
                    select nbfille,nbgarcon,nbtotal 
                    from consultation,soins,medicament,ecole,classe,classeecole
                    where consultation.anne =  $this->annescolaire and
                    classe.idclasse = $classe->idclasse and 
                    ecole.idecole = $this->ecole and
                    ecole.idecole = classeecole.idecole and 
                    classe.idclasse = classeecole.idclasse and soins.idmedicament = medicament.idmedicament
                    and soins.idconsultation = consultation.idconsultation
                    and medicament.libmedicament ='$alb' and consultation.nb_prise >= $nb2;
                 ");
                $nb_2_alb =  $nb_2_alb[0];

                $nb_1_alb = DB::select("
                select nbfille,nbgarcon,nbtotal 
                from consultation,soins,medicament,ecole,classe,classeecole
                where consultation.anne =  $this->annescolaire and
                classe.idclasse = $classe->idclasse and 
                ecole.idecole = $this->ecole and
                ecole.idecole = classeecole.idecole and 
                classe.idclasse = classeecole.idclasse and soins.idmedicament = medicament.idmedicament
                and soins.idconsultation = consultation.idconsultation
                and medicament.libmedicament ='$alb' and consultation.nb_prise = $nb1;
             ");
                $nb_1_alb =  $nb_1_alb[0];

                $nb_2_vita = DB::select("
                    select nbfille,nbgarcon,nbtotal 
                    from consultation,soins,medicament,ecole,classe,classeecole
                    where consultation.anne =  $this->annescolaire and
                    classe.idclasse = $classe->idclasse and 
                    ecole.idecole = $this->ecole and
                    ecole.idecole = classeecole.idecole and 
                    classe.idclasse = classeecole.idclasse and soins.idmedicament = medicament.idmedicament
                    and soins.idconsultation = consultation.idconsultation
                    and medicament.libmedicament ='$vita' and consultation.nb_prise =$nb2;
                 ");
                $nb_2_vita =  $nb_2_vita[0];

                $nb_1_vita = DB::select("
                        select nbfille,nbgarcon,nbtotal 
                        from consultation,soins,medicament,ecole,classe,classeecole
                        where consultation.anne =  $this->annescolaire and
                        classe.idclasse = $classe->idclasse and 
                        ecole.idecole = $this->ecole and
                        ecole.idecole = classeecole.idecole and 
                        classe.idclasse = classeecole.idclasse and soins.idmedicament = medicament.idmedicament
                        and soins.idconsultation = consultation.idconsultation
                        and medicament.libmedicament ='$vita' and consultation.nb_prise = $nb1;
                    ");
                $nb_1_vita =  $nb_1_vita[0];
                //  recuperation des resultats

                $etatClasse['detail'] =   ['g' =>  $effectif->nbgarcon, 'f' =>  $effectif->nbfille, 't' =>  $effectif->nbtotal, 'tclasse' => $effectif->nbclasse, 'libceb' => $effectif->libceb, 'libprovince' => $effectif->libprovince, 'libregion' => $effectif->libregion];
                $etatClasse['nb_16_fer'] =   ['g' =>  $nb_16_fer->nbgarcon, 'f' =>  $nb_16_fer->nbfille, 't' =>  $nb_16_fer->nbtotal];
                $etatClasse['nb_moins_16_fer'] =   ['g' =>  $nb_moins_16_fer->nbgarcon, 'f' =>  $nb_moins_16_fer->nbfille, 't' =>  $nb_moins_16_fer->nbtotal];
                $etatClasse['nb_2_alb'] =   ['g' =>  $nb_2_alb->nbgarcon, 'f' =>  $nb_2_alb->nbfille, 't' =>  $nb_2_alb->nbtotal];
                $etatClasse['nb_1_alb'] =   ['g' =>  $nb_1_alb->nbgarcon, 'f' =>  $nb_1_alb->nbfille, 't' =>  $nb_1_alb->nbtotal];
                $etatClasse['nb_1_vita'] =   ['g' => $nb_1_vita->nbgarcon, 'f' => $nb_1_vita->nbfille, 't' =>  $nb_1_vita->nbtotal];
                $etatClasse['nb_2_vita'] =   ['g' =>  $nb_2_vita->nbgarcon, 'f' =>  $nb_2_vita->nbfille, 't' =>  $nb_2_vita->nbtotal];

                $this->etatGlobal[$classe->libclasse] = $etatClasse; // recuperer l'ensemble des donnees

            dd($this->etatGlobal);
            }
            return view(
                'livewire.etatetstatistique.etatsecole',
                [
                    'etatGlobals' => $this->etatGlobal,
                    'listsf2' => Ecole::all(),
                    'listsf3' => annescol::all()

                ]
            )
                ->extends("layouts.dash")
                ->section('contenu');
        }
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
