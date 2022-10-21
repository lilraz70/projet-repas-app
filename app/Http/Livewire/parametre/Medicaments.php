<?php

namespace App\Http\Livewire\parametre;


use Livewire\Component;
use App\Models\Medicament;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class Medicaments extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";
    public $isBtnEditClicked = false;
    public $isBtnAddclicked = false;
    public $search = "";
    
    public $newData = [];
    public $editData = [];
    // protected $rules = [
    //     'newData.idprovince' => 'required',
    // ];

    public function render()
    {
        try {
            $searchcritere = "%".$this->search."%";
        return view('livewire.parametre.medicament.index',[
            "lists"=>Medicament::where('libmedicament', 'like', $searchcritere)
            ->orderBy('libmedicament', 'ASC')->paginate(10),
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
        $this->editData = Medicament::find($id)->toArray();
       
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
       Medicament::create([
            
            'codemedicament' => $data["codemedicament"],
            'libmedicament' => $data["libmedicament"],
            'posologie' =>  $data["posologie"] ?? null,
            'observation' =>  $data["observation"] ?? null,
            'typemedi' =>  $data["typemedi"]
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

        Medicament::find($this->editData['idmedicament'])->update($this->editData);
        
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
            $data = Medicament::find($id);
            $data->delete();
        } catch (\Throwable $th) {
            session()->flash('erreur2', "Oups!! Opération non effectuer,Ces données sont utiliser dans d'autre table");
        }
        
       
    }
}
