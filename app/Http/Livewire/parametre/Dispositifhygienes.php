<?php

namespace App\Http\Livewire\parametre;

use App\Models\Disposecole;
use App\Models\Ecole;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Dispositifhyg;

class Dispositifhygienes extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";

    public $isBtnAddclicked = false;
    public $isBtnEditClicked = false;
    public $newData = [];
    public $editData = [];
    public $search = "";
    public $selectedStatus = ''; 
    protected $rules = [
        'newData.quantite' => 'numeric',
    ];

    public function render()
    {
        try {
            $searchcritere = "%".$this->search."%";
        return view('livewire.parametre.dispositifhygiene.index',[
            "lists"=>Dispositifhyg::where('libdispos', 'like', $searchcritere)
            ->when($this->selectedStatus, function($query) {
                return $query->where('iddispos', $this->selectedStatus);
            })->orderBy('libdispos', 'ASC')->paginate(10),
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
        $this->editData = Dispositifhyg::find($id)->toArray();
       
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
       
     Dispositifhyg::create([
            
            'libdispos' => $data["libdispos"],
            'quantite' =>  $data["quantite"]
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

        Dispositifhyg::find($this->editData['iddispos'])->update($this->editData);
        
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
            $data = Dispositifhyg::find($id);
            $data->delete();
        } catch (\Throwable $th) {
            session()->flash('erreur2', "Oups!! Opération non effectuer,Ces données sont utiliser dans d'autre table");
        }
        
       
    }
}
