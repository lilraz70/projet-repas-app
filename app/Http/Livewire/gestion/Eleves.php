<?php

namespace App\Http\Livewire\gestion;

use App\Models\Csp;
use App\Models\Eleve;
use App\Models\Classe;
use App\Models\Commune;
use Livewire\Component;
use App\Models\annescol;
use App\Models\Classeecole;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class Eleves extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";
    public $isBtnEditClicked = false;
    public $isBtnAddclicked = false;
    public $editData = [];
    public $selectedStatus = '';
    public $search = "";
    public $newData = [];
    protected $rules = [
        'newData.nbfille' => 'numeric',
        'newData.nbgarcon' => 'numeric',
    ];

    public function render()
    {
        try {
            $searchcritere = "%" . $this->search . "%";
            return view('livewire.gestion.eleve.index', [
                "lists" => Eleve::where('anne', 'like', $searchcritere)->when($this->selectedStatus, function ($query) {
                    return $query->where('idclasse', $this->selectedStatus);
                })->paginate(10),
                "listsf" => Classe::all(),
                "listsf2" => annescol::all()
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
        $this->editData = Eleve::find($id)->toArray();

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
        $data = $this->newData;
        try {
            Eleve::create([
                'ideleve' => $data["idclasse"] . $data["anne"],
                'idclasse' => $data["idclasse"],
                'anne' => $data["anne"],
                'idusers' =>  Auth::User()->id,
                'nbfille' =>  $data["nbfille"],
                'nbgarcon' =>  $data["nbgarcon"],
                'nbtotal' =>  $data["nbfille"] + $data["nbgarcon"]

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

            Eleve::find($this->editData['ideleve'])->update(

                [
                    
                    'idclasse' => $this->editData["idclasse"],
                    'anne' => $this->editData["anne"],
                    'idusers' =>  Auth::User()->id,
                    'nbfille' =>  $this->editData["nbfille"],
                    'nbgarcon' => $this->editData["nbgarcon"],
                    'nbtotal' =>  $this->editData["nbfille"] + $this->editData["nbgarcon"]
                ]

            );

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
                'text' => "Vous-êtes sur le point de supprimer une donnée ",
                'id' => $id

            ]

        ]);
    }
    public function delete($id)
    {

        try {
            $data = Eleve::find($id);
            $data->delete();
        } catch (\Throwable $th) {
            session()->flash('erreur2', "Oups!! Opération non effectuer,Ces données sont utiliser dans d'autre table");
        }
    }
}
