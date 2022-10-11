<?php

namespace App\Http\Livewire\parametre;

use App\Models\Csp;
use App\Models\Commune;
use Livewire\Component;
use Livewire\WithPagination;

class Csps extends Component
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
    //     'newData.superficie' => 'numeric',
    // ];

    public function render()
    {
        try {
            $searchcritere = "%".$this->search."%";
        return view('livewire.parametre.csp.index',[
            "lists"=>Csp::where('libcsp', 'like', $searchcritere)
            ->when($this->selectedStatus, function($query) {
                return $query->where('idcsp', $this->selectedStatus);
            })->orderBy('libcsp', 'ASC')->paginate(10),
            "listsf"=>Commune::all()
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
        $this->editData = Csp::find($id)->toArray();
       
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
       Csp::create([
            
            'idcommune' => $data["idcommune"],
            'codecsp' => $data["codecsp"],
            'libcsp' =>  $data["libcsp"]
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

        Csp::find($this->editData['idcsp'])->update($this->editData);
        
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
            $data = Csp::find($id);
            $data->delete();
        } catch (\Throwable $th) {
            session()->flash('erreur2', "Oups!! Opération non effectuer,Ces données sont utiliser dans d'autre table");
        }
        
       
    }
}
