<?php

namespace App\Http\Livewire\gestion;

use App\Models\Csp;
use App\Models\Champ;
use App\Models\Ecole;
use App\Models\Commune;
use Livewire\Component;
use Livewire\WithPagination;

class Champs extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";

    public $isBtnAddclicked = false;
    public $isBtnEditClicked = false;
    public $newData = [];
    public $selectedStatus = '';
    public $editData = [];
    public $search = "";
    protected $rules = [
        'newData.superficie' => 'numeric',
       
    ];

    public function render()
    {
        try {
            $searchcritere = "%".$this->search."%";
        return view('livewire.gestion.champs.index',[
            "lists"=>Champ::where('libchamps', 'like', $searchcritere)
            ->when($this->selectedStatus, function($query) {
                return $query->where('idecole', $this->selectedStatus);
            })->orderBy('libchamps', 'ASC')->paginate(10),
            "listsf"=>Ecole::all()
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
        $this->editData = Champ::find($id)->toArray();
       
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
        $data = $this->newData;
        try {
       Champ::create([
            'idecole' => $data["idecole"],
            'libchamps' => $data["libchamps"],
            'superficie' =>  $data["superficie"],
            'typechamps' =>  $data["typechamps"]
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

        Champ::find($this->editData['idchamps'])->update($this->editData);
        
        $this->editData = [];
        session()->flash('erreur3', "Modification reussi");
        } catch (\Throwable $th) {
            session()->flash('erreur', "Oups!! Opération non effectuer,Vérifier vos informations");
        }

    }
    public function confirmDelete($lib,$id)
    {
        $this->dispatchBrowserEvent("showDelete", [
            "message" =>
            [
                'text' => "Vous-êtes sur le point de supprimer  $lib ",
                'id' => $id

            ]

        ]);
    }
    public function delete($id)
    {

        try {
            $data = Champ::find($id);
            $data->delete();
        } catch (\Throwable $th) {
            session()->flash('erreur2', "Oups!! Opération non effectuer,Ces données sont utiliser dans d'autre table");
        }
        
       
    }
}
