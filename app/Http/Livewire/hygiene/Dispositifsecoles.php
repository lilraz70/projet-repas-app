<?php

namespace App\Http\Livewire\hygiene;

use App\Models\Ecole;

use Livewire\Component;

use App\Models\Disposecole;
use Livewire\WithPagination;
use App\Models\Dispositifhyg;

class Dispositifsecoles extends Component
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
        'newData.superficie' => 'numeric',
    ];
    

    public function render()
    {
        try {
            $searchcritere = "%".$this->search."%";
           
        return view('livewire.hygiene.dispositifecole.index',[
            
           
            "lists"=>Disposecole::query() //where('idecole', 'like', $searchcritere)
            ->when($this->selectedStatus, function($query) {
                return $query->where('idecole', $this->selectedStatus);
            })
           ->orderBy('idecole', 'ASC')
           ->paginate(10),
            "listsf"=>Ecole::all(),
            "listsf2"=>Dispositifhyg::all()
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
        $this->editData = Disposecole::find($id)->toArray();
       
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

         Disposecole::create([
            'iddisposecole'=>$data["idecole"].$data["iddispos"],
            'idecole' =>  $data["idecole"],
            'iddispos' => $data["iddispos"],
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

        Disposecole::find($this->editData['iddisposecole'])->update($this->editData);
        
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
                'text' => "Vous-êtes sur le point de supprimer une affectation",
                'id' => $id

            ]

        ]);
    }
    public function delete($id)
    {

        try {
            $data =Disposecole::find($id);
            $data->delete();
        } catch (\Throwable $th) {
            session()->flash('erreur2', "Oups!! Opération non effectuer,Ces données sont utiliser dans d'autre table");
        }
        
       
    }
}
