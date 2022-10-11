<?php

namespace App\Http\Livewire\gestion;


use App\Models\Role;
use Livewire\Component;
use Livewire\WithPagination;




class Roles extends Component
{
   
 
    use WithPagination;
    protected $paginationTheme = "bootstrap";
    public $isBtnEditClicked = false;
    public $isBtnAddclicked = false;
    public $editData = [];

    public $newData = [];
    
    public $search = "";

    public function render()
    {
        try {
            $searchcritere = "%" . $this->search . "%";
            return view('livewire.gestion.role.index', [
                "lists" => Role::where('nom', 'like', $searchcritere)
                    ->orderBy('nom', 'ASC')->paginate(10)
            ])
                ->extends("layouts.dash")
                ->section('contenu');
        } catch (\Throwable $th) {
            session()->flash('erreur2', "Oups!! Veuillez contacter l'administrateur");
        }
    }


    public function gotoCreate()
    {
        $this->isBtnAddclicked = true;
    }
    public function gotoEdit($id)
    {
        $this->editData = Role::find($id)->toArray();
       
        $this->isBtnEditClicked = true;
    }
    public function goToList()
    {
        $this->isBtnEditClicked = false;
        $this->isBtnAddclicked = false;
        $this->newData = [];
        $this->editData = [];
    }


    public function insertInBd()
    {
       
        // try{
          
            $data = $this->newData;
          
           Role::create([
            
                'nom' => $data['nom']
            ]);

            $this->newData = [];

            // $this->dispatchBrowserEvent("showMessageSuccess", []);
        //     session()->flash('erreur3', "Ajout reussi");
        // } catch (\Throwable $th) {
        //     session()->flash('erreur', "Oups!! Opération non effectuer,Vérifier vos informations");
        // }
    }
    public function  editInBd()
    {

        try {

        Role::find($this->editData['id'])->update($this->editData);
        
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
            $data = Role::find($id);
            $data->delete();
        } catch (\Throwable $th) {
            session()->flash('erreur2', "Oups!! Opération non effectuer,Ces données sont utiliser dans d'autre table");
        }
    }
}
