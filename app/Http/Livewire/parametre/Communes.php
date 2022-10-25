<?php

namespace App\Http\Livewire\parametre;

use App\Models\Commune;
use Livewire\Component;
use App\Models\Province;
use Livewire\WithPagination;

class Communes extends Component
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
        return view('livewire.parametre.commune.index',[
            "lists"=>Commune::where('libcommune', 'like', $searchcritere)
            ->when($this->selectedStatus, function($query) {
                return $query->where('idprovince', $this->selectedStatus);
            })->orderBy('libcommune', 'ASC')->paginate(10),
            "listsf"=>Province::all()
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
        $this->editData = Commune::find($id)->toArray();
       
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

         Commune::create([
            'libcommune' =>  $data["libcommune"],
            'idprovince' => $data["idprovince"],
            'superficie' => $data["superficie"] ?? null,
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

        Commune::find($this->editData['idcommune'])->update($this->editData);
        
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
            $data = Commune::find($id);
            $data->delete();
        } catch (\Throwable $th) {
            session()->flash('erreur2', "Oups!! Opération non effectuer,Ces données sont utiliser dans d'autre table");
        }
        
       
    }
}
