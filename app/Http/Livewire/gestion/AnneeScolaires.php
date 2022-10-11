<?php

namespace App\Http\Livewire\gestion;

use App\Models\Csp;
use App\Models\Commune;
use Livewire\Component;
use App\Models\annescol;
use Livewire\WithPagination;

class AnneeScolaires extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";
    public $isBtnAddclicked = false;
    public $editData = [];
    public $search = "";
    public $newData = [];
    public $isBtnEditClicked = false;
    // protected $rules = [
    //     'newData.idprovince' => 'required',
    // ];

    public function render()
    {
        try {
            $searchcritere = "%".$this->search."%";
        return view('livewire.gestion.anneescolaire.index',[
            "lists"=>annescol::where('anne', 'like', $searchcritere)
            ->orderBy('anne', 'ASC')->paginate(10),
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
        $this->editData = annescol::find($id)->toArray();
       
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
        try {
            $data = $this->newData;
      annescol::create([
            'anne' => $data["anne"],
            'datedebut' => $data["datedebut"],
            'datefin' =>  $data["datefin"]
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

        annescol::find($this->editData['anne'])->update($this->editData);
        
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
            $data = annescol::find($id);
            $data->delete();
        } catch (\Throwable $th) {
            session()->flash('erreur2', "Oups!! Opération non effectuer,Ces données sont utiliser dans d'autre table");
        }
        
       
    }
}
