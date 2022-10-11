<?php

namespace App\Http\Livewire\production;

use App\Models\Csp;
use App\Models\Champ;
use App\Models\Ecole;
use App\Models\Repas;
use App\Models\Plante;
use App\Models\Commune;
use Livewire\Component;
use App\Models\Metrepas;
use App\Models\Production;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class Repa extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";
    public $editData = [];
    public $isBtnAddclicked = false;
    public $selectedStatus = '';
    public $newData = [];
    public $isBtnEditClicked = false;
    protected $rules = [
        'newData.nbrepas' => 'numeric',
    ];

    public function render()
    {
        try {
        
        return view('livewire.production.repas.index',[
            "lists"=>Repas::query()
            ->when($this->selectedStatus, function($query) {
                return $query->where('idecole', $this->selectedStatus);
            })->paginate(5),
            "listsf"=>Production::all(),
            "listsf2"=>Plante::all(),
            "listsf3"=>Ecole::all(),
            "listsf4"=>Metrepas::all()
        ])
        ->extends("layouts.dash")
        ->section('contenu');
    } catch (\Throwable $th) {
        session()->flash('erreur2', "Oups!! Veuillez contacter l'administrateur");
    }
    }

    Public function gotoCreate(){
        $this->isBtnAddclicked = true;
    }
    public function gotoEdit($id)
    {
        $this->editData = Repas::find($id)->toArray();
       
        $this->isBtnEditClicked = true;
    }
    public function goToList(){
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
   
         Repas::create([
            'idproduction' => $data['idproduction'],
            'idusers' =>  Auth::User()->id,
            'idecole' =>  $data["idecole"],
            'idmetrepas' =>  $data["idmetrepas"],
            'nbrepas' =>  $data["nbrepas"],
            'daterepas' =>  $data["daterepas"],
            'moment' =>  $data["moment"],
            'observation' =>  $data["observation"]
        ]);
        $this->newData=[];

        // $this->dispatchBrowserEvent("showMessageSuccess", []);
        session()->flash('erreur3', "Ajout reussi");
        
    } catch (\Throwable $th) {
        session()->flash('erreur', "Oups!! Opération non effectuer,Vérifier vos informations");
    }

    }
    public function  editInBd()
    {

        try {

        Repas::find($this->editData['idrepas'])->update($this->editData);
        
        $this->editData = [];
        session()->flash('erreur3', "Modification reussi");
        } catch (\Throwable $th) {
            session()->flash('erreur', "Oups!! Opération non effectuer,Vérifier vos informations");
        }

    }
    public function confirmDelete($id)
    {
        $this->dispatchBrowserEvent("showDelete", [
            "message" =>
            [
                'text' => "Vous-êtes sur le point de supprimer une Donnée",
                'id' => $id

            ]

        ]);
    }
    public function delete($id)
    {

        try {
            $data =Repas::find($id);
            $data->delete();
        } catch (\Throwable $th) {
            session()->flash('erreur2', "Oups!! Opération non effectuer,Ces données sont utiliser dans d'autre table");
        }
        
       
    }
}
