<?php

namespace App\Http\Livewire\parametre;


use App\Models\Ceb;
use App\Models\Ecole;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class Ecoles extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";
    public $isBtnEditClicked = false;
    public $isBtnAddclicked = false;

    public $newData = [];
    public $search = "";
    public $editData = [];
    public $selectedStatus = ''; 
    protected $rules = [
        'newData.nbclasse' => 'numeric',
    ];

    public function render()
    {
        try {
            $searchcritere = "%".$this->search."%";
        return view('livewire.parametre.ecole.index',[
            "lists"=>Ecole::where('libecole', 'like', $searchcritere)
            ->when($this->selectedStatus, function($query) {
                return $query->where('idceb', $this->selectedStatus);
            })->orderBy('libecole', 'ASC')->paginate(10),
            "listsf"=>Ceb::all()
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
        $this->editData = Ecole::find($id)->toArray();
       
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

        Ecole::create([
    
            'idceb' => $data["idceb"],
            'idusers'=>Auth::User()->id,
            'libecole' => $data["libecole"],
            'nbclasse' =>  $data["nbclasse"]
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

        Ecole::find($this->editData['idecole'])->update($this->editData);
        
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
            $data = Ecole::find($id);
            $data->delete();
        } catch (\Throwable $th) {
            session()->flash('erreur2', "Oups!! Opération non effectuer,Ces données sont utiliser dans d'autre table");
        }
        
       
    }
}
