<?php

namespace App\Http\Livewire\gestion;

use App\Models\Csp;
use App\Models\Classe;
use App\Models\Commune;
use Livewire\Component;
use Livewire\WithPagination;

class Classes extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";

    public $isBtnAddclicked = false;
    public $isBtnEditClicked = false;
    public $newData = [];
    public $search = "";
    public $selectedStatus = ''; 
    public $editData = [];
    // protected $rules = [
    //     'newData.idprovince' => 'required',
    //     'newData.libclasse'=>'unique'
    // ];

    public function render()
    {
        try {
            $searchcritere = "%".$this->search."%";
        return view('livewire.gestion.classe.index',[
            "lists"=>Classe::where('libclasse', 'like', $searchcritere)
            ->orderBy('libclasse', 'ASC')->paginate(10)
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
        $this->editData = Classe::find($id)->toArray();
       
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
    
        Classe::create([
         
            'libclasse' =>  $data["libclasse"]
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

        Classe::find($this->editData['idclasse'])->update($this->editData);
        
        $this->editData = [];
        session()->flash('erreur3', "Modification reussi");
        } catch (\Throwable $th) {
            session()->flash('erreur', "Oups!! Opération non effectuer,Vérifier vos informations");
        }

    }
    public function confirmDelete($lib, $id)
    {
        $this->dispatchBrowserEvent("showDelete", [
            "message" =>
            [
                'text' => "Vous-êtes sur le point de supprimer $lib",
                'id' => $id

            ]

        ]);
    }
    public function delete($id)
    {

        try {
            $data = Classe::find($id);
            $data->delete();
        } catch (\Throwable $th) {
            session()->flash('erreur2', "Oups!! Opération non effectuer,Ces données sont utiliser dans d'autre table");
        }
        
       
    }
}
