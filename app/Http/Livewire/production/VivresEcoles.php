<?php

namespace App\Http\Livewire\production;

use App\Models\annescol;
use App\Models\Csp;
use App\Models\Ecole;
use App\Models\Vivres;
use App\Models\Commune;
use Livewire\Component;
use App\Models\Vivresecole;
use Livewire\WithPagination;

class VivresEcoles extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";

    public $isBtnAddclicked = false;
    public $editData = [];
    public $newData = [];
    public $isBtnEditClicked = false;
    public $selectedStatus = '';
    // protected $rules = [
    //     'newData.idprovince' => 'required',
    // ];

    public function render()
    {
        try {
        return view('livewire.production.vivresecoles.index',[
            "lists"=>Vivresecole::query()
            ->when($this->selectedStatus, function($query) {
                return $query->where('idecole', $this->selectedStatus);
            })->paginate(5),
            "listsf"=>Vivres::all(),
            "listsf2"=>Ecole::all(),
            "listsf3"=>annescol::all(),
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
        $this->editData = Vivresecole::find($id)->toArray();
       
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
    // $this->validate();
    try {
        $data = $this->newData;
       Vivresecole::create([
            'idvivresecole' => $data["idvivre"].$data["idecole"],
            'idvivre' => $data["idvivre"],
            'idecole' =>  $data["idecole"],
            'anne' =>  $data["anne"],
            'qterecu' =>  $data["qterecu"],
            'qteconsommee' =>  $data["qteconsommee"]
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

        Vivresecole::find($this->editData['idvivresecole'])->update($this->editData);
        
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
            $data =Vivresecole::find($id);
            $data->delete();
        } catch (\Throwable $th) {
            session()->flash('erreur2', "Oups!! Opération non effectuer,Ces données sont utiliser dans d'autre table");
        }
        
       
    }
}
