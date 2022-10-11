<?php

namespace App\Http\Livewire\gestion;

use App\Models\Role;
use App\Models\User;


use Livewire\Component;

use App\Models\Usersroles;
use Livewire\WithPagination;


class UserRoles extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";
    public $isBtnEditClicked = false;
    public $isBtnAddclicked = false;
    public $editData = [];

    public $newData = [];
    // protected $rules = [
    //     'newData.idprovince' => 'required',
    // ];
    
    public $selectedStatus = '';
    public $search = "";
    public function render()
    {
        try {
            $searchcritere = "%".$this->search."%";
        return view('livewire.gestion.usersroles.index',[
            "lists"=>Usersroles::query()
            ->when($this->selectedStatus, function($query) {
                return $query->where('role_id', $this->selectedStatus);
            })->paginate(5),
            "listsf"=>User::all(),
            "listsf2"=>Role::all()
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
        $this->editData = UserRoles::find($id)->toArray();
       
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

        Usersroles::create([
           
            'user_id' => $data["iduser"],
            'role_id' => $data["idrole"]
        
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

        Usersroles::find($this->editData['idusersroles'])->update($this->editData);
        
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
            $data = Usersroles::find($id);
            $data->delete();
        } catch (\Throwable $th) {
            session()->flash('erreur2', "Oups!! Opération non effectuer,Ces données sont utiliser dans d'autre table");
        }
        
       
    }
}
