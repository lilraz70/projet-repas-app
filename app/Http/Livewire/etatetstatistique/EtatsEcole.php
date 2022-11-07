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
    public  $enteteEtat = [];
    public $ecole  = '';
    public $annescolaire = '';

    public function render()
    {

        /* etat initial de la vue */
        if ($this->ecole == '' && $this->annescolaire == '') {
            $this->enteteEtat = array();
            $this->etatGlobal = array();
            return view(
                'livewire.etatetstatistique.etatsecole',
                [
                    'detail' => $this->enteteEtat,
                    'etatGlobals' => $this->etatGlobal,
                    'listsf2' => Ecole::all(),
                    'listsf3' => annescol::all()
                ]
            )
                ->extends("layouts.dash")
                ->section('contenu');
        } else {
            /* second etat  de la vue apres avoir choisi l'anne et l'ecole*/
            try { // si les requetes donne rien je lui envoi un message avec le try
                $this->etatGlobal = [];

                /* constante pour les requetes */
                $fer = 'fer';
                $nb16 = 16;
                $nb1 = 1; // default 1
                $nb2 = 2;
                $fer = 'Fer';
                $alb = 'Albendazole';
                $vita = "Vitamine A";

                $etatDetail = DB::select("
                        select distinct nbfille,nbgarcon,nbtotal,nbclasse,libceb,libprovince,libregion,anne,libecole
                        from eleve,ecole,classe,classeecole,ceb,province,region,commune
                        where eleve.anne =  $this->annescolaire and
                        ecole.idecole = $this->ecole and
                        ecole.idecole = classeecole.idecole 
                        and classe.idclasse = classeecole.idclasse
                        and eleve.idclasse = classe.idclasse and
                        ecole.idceb = ceb.idceb and ceb.idcommune = commune.idcommune
                        and commune.idprovince = province.idprovince 
                        and province.idregion = region.idregion
                    "); // Entete de l'etat 
                $etatDetail =  $etatDetail[0];

                $this->enteteEtat = array();
                $this->enteteEtat['detail'] = [
                    'nbfille' => $etatDetail->nbfille,
                    'nbgarcon' => $etatDetail->nbgarcon,
                    'nbtotal' => $etatDetail->nbtotal,
                    'nbclasse' => $etatDetail->nbclasse,
                    'libceb' => $etatDetail->libceb,
                    'libprovince' => $etatDetail->libprovince,
                    'libregion' => $etatDetail->libregion,
                    'anne' => $etatDetail->anne,
                    'libecole' => $etatDetail->libecole,
                ];

                $classes = DB::select("
                            select * from classe,classeecole,ecole 
                            where classe.idclasse = classeecole.idclasse 
                            and  ecole.idecole = classeecole.idecole
                            and ecole.idecole = $this->ecole
                                            ");
                                           
                foreach ($classes as $classe) {
                    $etatClasse = array();
                    $effectif = DB::select("
                                        select nbfille,nbgarcon,nbtotal
                                        from eleve ,ecole,classe,classeecole
                                        where eleve.anne =  $this->annescolaire and
                                        classe.idclasse = $classe->idclasse and 
                                        ecole.idecole = $this->ecole and
                                        ecole.idecole = classeecole.idecole 
                                        and classe.idclasse = classeecole.idclasse
                                        and eleve.idclasse = classe.idclasse
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
                                    and medicament.libmedicament ='$fer' and consultation.nb_prise < $nb16;
                                    ");
                    $nb_moins_16_fer =  $nb_moins_16_fer[0];


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
                                    and medicament.libmedicament ='$alb' and consultation.nb_prise <= $nb1;
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
                                        and medicament.libmedicament ='$vita' and consultation.nb_prise >=$nb2;
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
                                            and medicament.libmedicament ='$vita' and consultation.nb_prise <= $nb1;
                                        ");
                    $nb_1_vita =  $nb_1_vita[0];

                    //  recuperation des resultats

                    $etatClasse['effectif'] =   ['g' =>  $effectif->nbgarcon, 'f' =>  $effectif->nbfille, 't' =>  $effectif->nbtotal];
                    $etatClasse['nb_16_fer'] =   ['g' =>  $nb_16_fer->nbgarcon, 'f' =>  $nb_16_fer->nbfille, 't' =>  $nb_16_fer->nbtotal];
                    $etatClasse['nb_moins_16_fer'] =   ['g' =>  $nb_moins_16_fer->nbgarcon, 'f' =>  $nb_moins_16_fer->nbfille, 't' =>  $nb_moins_16_fer->nbtotal];
                    $etatClasse['nb_2_alb'] =   ['g' =>  $nb_2_alb->nbgarcon, 'f' =>  $nb_2_alb->nbfille, 't' =>  $nb_2_alb->nbtotal];
                    $etatClasse['nb_1_alb'] =   ['g' =>  $nb_1_alb->nbgarcon, 'f' =>  $nb_1_alb->nbfille, 't' =>  $nb_1_alb->nbtotal];
                    $etatClasse['nb_1_vita'] =   ['g' => $nb_1_vita->nbgarcon, 'f' => $nb_1_vita->nbfille, 't' =>  $nb_1_vita->nbtotal];
                    $etatClasse['nb_2_vita'] =   ['g' =>  $nb_2_vita->nbgarcon, 'f' =>  $nb_2_vita->nbfille, 't' =>  $nb_2_vita->nbtotal];

                    $this->etatGlobal[$classe->libclasse] = $etatClasse; // recuperer l'ensemble des donnees
                }
                /* ici j'envoi les donnees des requetes */
                return view(
                    'livewire.etatetstatistique.etatsecole',
                    [
                        'detail' => $this->enteteEtat,
                        'etatGlobals' => $this->etatGlobal,
                        'listsf2' => Ecole::all(),
                        'listsf3' => annescol::all()
                    ]
                )
                    ->extends("layouts.dash")
                    ->section('contenu');
            } catch (\Throwable $th) {
                session()->flash('erreur2', "Oups!! Aucune donnée trouvée");
                $this->enteteEtat = array();
                $this->etatGlobal = array();
                return view(
                    'livewire.etatetstatistique.etatsecole',
                    [
                        'detail' => $this->enteteEtat,
                        'etatGlobals' => $this->etatGlobal,
                        'listsf2' => Ecole::all(),
                        'listsf3' => annescol::all()

                    ]
                )
                    ->extends("layouts.dash")
                    ->section('contenu');
            }
        }
    }


    // html to pdf using dompdf
    public function exportPdf()
    {
        $listsf2 = Ecole::all();
        $listsf3 = annescol::all();
        // dd($this->enteteEtat, $this->etatGlobal);
        $pdfContent = PDF::loadView('livewire.etatetstatistique.etatsecole',$listsf2)->output();
        return response()->streamDownload(
            fn () => print($pdfContent),
            "EtatParEcole.pdf"
        );
    }
}
