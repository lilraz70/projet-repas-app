<?php

namespace App\Http\Livewire\gestion;

use App\Models\Csp;
use App\Models\Ecole;
use App\Models\Classe;
use Livewire\Component;
use App\Models\Commune; 
use App\Models\Classeecole;
use Livewire\WithPagination;

class ClassesEcoles extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";

    public $isBtnAddclicked = false;
    public $isBtnEditClicked = false;
    public $newData = [];
    public $editData = [];
    // protected $rules = [
    //     'newData.idprovince' => 'required',
    // ];
    
    public $selectedStatus = '';
    public $search = "";
    public function render()
    {
        try {
            $searchcritere = "%".$this->search."%";
        return view('livewire.gestion.classeecole.index',[
            "lists"=>Classeecole::query()
            ->when($this->selectedStatus, function($query) {
                return $query->where('idecole', $this->selectedStatus);
            })->paginate(5),
            "listsf"=>Classe::all(),
            "listsf2"=>Ecole::all()
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
        $this->editData = Classeecole::find($id)->toArray();
       
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
  
        Classeecole::create([
            'idclasseecole' =>$data["idecole"].$data["idclasse"],
            'idecole' => $data["idecole"],
            'idclasse' => $data["idclasse"]
        
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

        Classeecole::find($this->editData['idclasseecole'])->update($this->editData);
        
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
                'text' => "Vous-êtes sur le point de supprimer une affectation",
                'id' => $id

            ]

        ]);
    }
    public function delete($id)
    {

        try {
            $data =Classeecole::find($id);
            $data->delete();
        } catch (\Throwable $th) {
            session()->flash('erreur2', "Oups!! Opération non effectuer,Ces données sont utiliser dans d'autre table");
        }
        
       
    }
}
