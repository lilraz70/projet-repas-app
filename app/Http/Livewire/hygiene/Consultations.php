<?php

namespace App\Http\Livewire\hygiene;

use App\Models\Csp;
use App\Models\Ecole;
use App\Models\Soins;
use App\Models\Commune;
use Livewire\Component;
use App\Models\annescol;
use App\Models\Medicament;
use App\Models\Consultation;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class Consultations extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";
    public $isBtnEditClicked = false;
    public $isBtnAddclicked = false;

    public $newData = [];
    public $editData = [];

    public $selectedStatus = '';
    protected $rules = [
        'newData.nbfille' => 'numeric',
        'newData.nbgarcon' => 'numeric',
        'newData.phase' => 'numeric'
    ];

    public function render()
    {
        try {

            return view('livewire.hygiene.consultation.index', [
               
                "lists"=>Soins::query()
                ->when($this->selectedStatus, function ($query) {
                    return $query->where('idconsultation', $this->selectedStatus);
                })->paginate(5),
                
                "listsf" => Ecole::all(),
                "listsf2" => Csp::all(),
                "listsf3" => annescol::all(),
                "listsf4" => Medicament::all(),
                "listsf5" => Consultation::all(),

            ])
                ->extends("layouts.dash")
                ->section('contenu');
        } catch (\Throwable $th) {
            session()->flash('erreur2', "Oups!! Veuillez contacter l'administrateur");
        }
    }

    public function gotoCreate()
    {
        $this->isBtnAddclicked = true;
    }
    public function gotoEdit($id1,$id2)
    { 
        $this->editData = Consultation::find($id1)->toArray() + Soins::find($id2)->toArray();
       
        $this->isBtnEditClicked = true;
    }
    public function goToList()
    {
        $this->isBtnEditClicked = false;
        $this->isBtnAddclicked = false;
        $this->newData = [];
        $this->editData = [];
    }


    public function insertInBd()
    {
        $this->validate();
        try {
            $data = $this->newData;
            Consultation::create([
                'idconsultation' =>$data["idecole"].$data['idmedicament'],
                'dateconsult' => $data["dateconsult"],
                'anne' => (int)$data["dateconsult"],
                'idusers' => Auth::User()->id,
                'idecole' =>  $data["idecole"],
                'idcsp' =>  $data["idcsp"],
                'nbfille' =>  $data["nbfille"],
                'nbgarcon' =>  $data["nbgarcon"],
                'nbtotal' =>  $data["nbfille"] + $data["nbgarcon"],
                'phase' =>  $data["phase"]
            ]);
            Soins::create([
                'idsoins'=> $data["idecole"].$data['idmedicament'],
                'idmedicament' => $data['idmedicament'],
                'idconsultation' =>$data["idecole"].$data['idmedicament']
            ]);
            $this->newData = [];

            // $this->dispatchBrowserEvent("showMessageSuccess", []);
            session()->flash('erreur3', "Ajout reussi");
        } catch (\Throwable $th) {
            session()->flash('erreur', "Oups!! Opération non effectuer,Vérifier vos informations");
        }
    }
    public function  editInBd()
    {

        try {
       
        Consultation::find($this->editData['idconsultation'])->update([

            'dateconsult' =>$this->editData["dateconsult"],
            'anne' => (int)$this->editData["dateconsult"],
            'idusers' => Auth::User()->id,
            'idecole' =>  $this->editData["idecole"],
            'idcsp' =>  $this->editData["idcsp"],
            'nbfille' => $this->editData["nbfille"],
            'nbgarcon' =>  $this->editData["nbgarcon"],
            'nbtotal' =>  $this->editData["nbfille"] + $this->editData["nbgarcon"],
            'phase' =>  $this->editData["phase"]

        ]);
        Soins::find($this->editData['idsoins'])->update(
            [
            'idconsultation' => $this->editData["idconsultation"],
            'idmedicament' =>  $this->editData["idmedicament"]
            ]
        );
        
        $this->editData = [];
        session()->flash('erreur3', "Modification reussi");
        } catch (\Throwable $th) {
            session()->flash('erreur', "Oups!! Opération non effectuer,Vérifier vos informations");
        }

    }
    public function confirmDelete($id,$id2)
    {
       
        $this->dispatchBrowserEvent("showDelete", [
            "message" =>
            [
                'text' => "Vous-êtes sur le point de supprimer ces données",
                'id' => $id,
                'id2'=>$id2

            ]

        ]);
    }
    public function delete($id,$id2)
    {
       
      
        try {
            $data = Soins::find($id);
            $data2 = Consultation::find($id2);
            $data->delete();
            $data2->delete();
            
        } catch (\Throwable $th) {
            session()->flash('erreur2', "Oups!! Opération non effectuer,Ces données sont utiliser dans d'autre table");
        }
    }
}
