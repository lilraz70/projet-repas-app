<?php

namespace App\Http\Livewire\parametre;

use App\Models\Ceb;
use App\Models\Commune;
use Livewire\Component;
use Livewire\WithPagination;

class Cebs extends Component
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
    //     'newData.libceb' => 'required',
    //     'newData.idcommune' => 'required',
    // ];

    public function render()
    {
        try {
            $searchcritere = "%".$this->search."%";
        return view('livewire.parametre.ceb.index',[
            "cebs"=>Ceb::where('libceb', 'like', $searchcritere)
            ->when($this->selectedStatus, function($query) {
                return $query->where('idceb', $this->selectedStatus);
            })->orderBy('libceb', 'ASC')->paginate(10),
            "communes"=>Commune::all()
        ])
        ->extends("layouts.dash")
        ->section('contenu');
    } catch (\Throwable $th) {
        session()->flash('erreur2', "Oups!! Veuillez contacter l'administrateur");
    }
    }
    public function gotoEdit($id)
    {
        $this->editData = Ceb::find($id)->toArray();
       
        $this->isBtnEditClicked = true;
    }
    Public function gotoCreate(){
        $this->isBtnAddclicked = true;
    }

    public function goToList(){
        $this->isBtnEditClicked = false;
        $this->isBtnAddclicked = false;
        $this->newData = [];
        $this->editData = [];
    }


    public function insertInBd()
    {
        //   $this->validate();
    $data = $this->newData;
    try {
        Ceb::create([
            'libceb' => $data["libceb"],
            'idcommune' =>$data["idcommune"]
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

        Ceb::find($this->editData['idceb'])->update($this->editData);
        
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
            $data = Ceb::find($id);
            $data->delete();
        } catch (\Throwable $th) {
            session()->flash('erreur2', "Oups!! Opération non effectuer,Ces données sont utiliser dans d'autre table");
        }
        
       
    }
}
