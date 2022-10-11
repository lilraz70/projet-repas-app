<?php

namespace App\Http\Livewire\production;


use App\Models\Plante;
use Livewire\Component;
use App\Models\Metrepas;
use App\Models\Ingredient;
use Livewire\WithPagination;

class MetRepa extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";

    public $isBtnAddclicked = false;
    public $isBtnEditClicked = false;
    public $newData = [];
    public $editData = [];
    public $search = "";
    protected $rules = [
        'newData.quantite' => 'numeric',
    ];

    public function render()
    {
        try {
            $searchcritere = "%".$this->search."%";
        return view('livewire.production.metrepas.index',[
            "lists"=>Metrepas::where('libmetrepas', 'like', $searchcritere)
            ->orderBy('libmetrepas', 'ASC')->paginate(10),
            "listsf"=>Plante::all()
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
        $this->editData = Metrepas::find($id)->toArray();
       
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
    //     // $this->validate();
        // try {

        $data = $this->newData;

         Metrepas::create([
            'idmetrepas'=>$data["idplante"].$data["quantite"],
            'libmetrepas' => $data["libmetrepas"],
            'observation' => $data["observation"]
        ]);

        Ingredient::create([
            'idplante' => $data["idplante"],
            'idmetrepas' =>$data["idplante"].$data["quantite"], 
            'quantite' =>  $data["quantite"],
            'observation' =>  $data["observation"]
        ]);
    //     $this->newData=[];

    //     // $this->dispatchBrowserEvent("showMessageSuccess", []);
    //     session()->flash('erreur3', "Ajout reussi");
        
    // } catch (\Throwable $th) {
    //     session()->flash('erreur', "Oups!! Opération non effectuer,Vérifier vos informations");
    // }
    }
    public function  editInBd()
    {

        try {

        Metrepas::find($this->editData['idmetrepas'])->update($this->editData);
        
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
            $data = Metrepas::find($id);
            $data->delete();
        } catch (\Throwable $th) {
            session()->flash('erreur2', "Oups!! Opération non effectuer,Ces données sont utiliser dans d'autre table");
        }
        
       
    }
}
