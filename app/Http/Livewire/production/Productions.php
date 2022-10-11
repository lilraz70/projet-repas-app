<?php

namespace App\Http\Livewire\production;

use App\Models\annescol;
use App\Models\Champ;
use App\Models\Plante;
use Livewire\Component;
use App\Models\Production;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;


class Productions extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";
    public $isBtnEditClicked = false;
    public $isBtnAddclicked = false;
    public $editData = [];
    public $newData = [];
    protected $rules = [
        'newData.qtevendu' => 'numeric',
        'newData.qteconso' => 'numeric',
        'newData.qteproduit' => 'numeric',
    ];
   

    public $selectedStatus = '';
    public function render()
    {
        try {
        return view('livewire.production.production.index',[
            "lists"=>Production::query()
            ->when($this->selectedStatus, function($query) {
                return $query->where('idchamps', $this->selectedStatus);
            })->paginate(5),
            "listsf"=>Champ::all(),
            "listsf2"=>Plante::all(),
            "listsf3"=>annescol::all()
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
        $this->editData = Production::find($id)->toArray();
       
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
       Production::create([
            'idproduction'=>$data["idchamps"].$data["idplante"],
            'idchamps' =>$data["idchamps"],
            'idplante'=>$data["idplante"],
            'dateproduit' =>$data["dateproduit"],
            'anne' => (int)$data["dateproduit"],
            'idlogin'=>Auth::User()->id,
            'qteconso' =>  $data["qteconso"],
            'qtevendu' =>  $data["qtevendu"],
            'observation' =>  $data["observation"],
            'qteproduit' =>  $data["qteproduit"]
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

        Production::find($this->editData['idproduction'])->update($this->editData);
        
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
                'text' => "Vous-êtes sur le point de supprimer une Donnée",
                'id' => $id

            ]

        ]);
    }
    public function delete($id)
    {

        try {
            $data =Production::find($id);
            $data->delete();
        } catch (\Throwable $th) {
            session()->flash('erreur2', "Oups!! Opération non effectuer,Ces données sont utiliser dans d'autre table");
        }
        
       
    }
}
