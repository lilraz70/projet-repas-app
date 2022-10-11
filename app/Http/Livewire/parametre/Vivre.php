<?php

namespace App\Http\Livewire\parametre;


use App\Models\Vivres;
use Livewire\Component;
use Livewire\WithPagination;


class Vivre extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";

    public $isBtnAddclicked = false;
    public $isBtnEditClicked = false;
    public $newData = [];
    public $editData = [];
    public $search = "";

    // protected $rules = [
    //     'newData.idprovince' => 'required',
    // ];

    public function render()
    {
        try {
            $searchcritere = "%" . $this->search . "%";
            return view('livewire.parametre.vivres.index', [
                "lists" => Vivres::where('libvivres', 'like', $searchcritere)
                    ->orderBy('libvivres', 'ASC')->paginate(10)
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
        $this->editData = Vivres::find($id)->toArray();
       
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
        // $this->validate();
        try {

            $data = $this->newData;
            Vivres::create([

                'libvivres' => $data["libvivres"],
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

        Vivres::find($this->editData['idvivre'])->update($this->editData);
        
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
            $data = Vivres::find($id);
            $data->delete();
        } catch (\Throwable $th) {
            session()->flash('erreur2', "Oups!! Opération non effectuer,Ces données sont utiliser dans d'autre table");
        }
    }
}
