<?php

namespace App\Http\Livewire\gestion;

use App\Models\Csp;
use App\Models\User;
use App\Models\Commune;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;



class Users extends Component
{
    use RegistersUsers;

    use WithPagination;
    protected $paginationTheme = "bootstrap";

    public $isBtnAddclicked = false;
    public $editData = [];
    public $isBtnEditClicked = false;
    public $newData = [];


    protected $rules = [

        'newData.name' => ['required', 'string', 'max:255'],
        'newData.login' => ['required', 'string', 'max:255'],
        'newData.email' => ['required', 'string', 'email', 'max:255',],
        'newData.telephone' => ['required', 'string', 'max:255'],
        'newData.password' => ['required', 'string', 'min:8'],
    ];
    public $search = "";

    public function render()
    {

        try {
            $searchcritere = "%" . $this->search . "%";
            return view('livewire.gestion.user.index', [
                "lists" => User::where('name', 'like', $searchcritere)
                    ->orderBy('name', 'ASC')->paginate(10)
            ])
                ->extends("layouts.dash")
                ->section('contenu');
        } catch (\Throwable $th) {
            session()->flash('erreur', "Oups!! Veuillez contacter l'administrateur");
        }
    }


    public function gotoCreate()
    {
        $this->isBtnAddclicked = true;
    }
    public function gotoEdit($id)
    {
        $this->editData = User::find($id)->toArray();

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
        $this->validate();

        try {

            $data = $this->newData;

            User::create([
                'name' => $data['name'],
                'login' => $data['login'],
                'email' => $data['email'],
                'telephone' => $data['telephone'],
                'password' => Hash::make($data['password']),
                'remember_token' => null
            ]);

            $this->newData = [];

            // $this->dispatchBrowserEvent("showMessageSuccess", []);
            session()->flash('erreur3', "Ajout reussi");
        } catch (\Throwable $th) {
            session()->flash('erreur', "Oups!! Opération non effectuer,Vérifier vos informations");
        }
    }
    public function  editInBd()
    {

        try {

            // User::find($this->editData['id'])->update($this->editData);
            $data = $this->editData;
            
            User::where('id', $data['id'])
                ->update([
                    'name' => $data['name'],
                    'login' => $data['login'],
                    'email' => $data['email'],
                    'telephone' => $data['telephone'],
                    'password' => Hash::make($data['password'])
                ]);

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
            $data = User::find($id);
            $data->delete();
        } catch (\Throwable $th) {
            session()->flash('erreur2', "Oups!! Opération non effectuer,Ces données sont utiliser dans d'autre table");
        }
    }
}
