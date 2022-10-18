<?php

namespace App\Http\Livewire\production;


use App\Models\Plante;
use App\Models\Vivres;
use Livewire\Component;
use App\Models\Metrepas;
use App\Models\Ingredient;
use Livewire\WithPagination;

class MetRepa extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";

    public $isBtnAddclicked = false;
    public $isBtnEditClicked = false;
    public $newData = [];
    public $newData1 = [];
    public $newData2 = [];
    public $editData = [];
    public $search = "";
    // protected $rules = [
    //     'newData.quantite' => 'numeric',
    // ];

    public function render()
    {
        try {
            $searchcritere = "%" . $this->search . "%";
            return view('livewire.production.metrepas.index', [
                "lists" => Metrepas::where('libmetrepas', 'like', $searchcritere)
                    ->orderBy('libmetrepas', 'ASC')->paginate(10),
                "listsf" => Plante::all(),
                "listsf2" => Vivres::all()
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
        $this->editData = Metrepas::find($id)->toArray();

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
        //     // $this->validate();
        // try {

            $data = $this->newData;
            $data1 = $this->newData1;
            $data2 = $this->newData2;

            // plante verification de la valeur si c est null
        if (  $data1['0'] == "Aucun") {

              $data1 = null;
        }
        // vivres verification de la valeur si c est null
        if (  $data2['0'] == "Aucun") {

              $data2['0'] = null;
        }

        dd($data1, $data2);

        Metrepas::create([
            'idmetrepas' => $data["libmetrepas"],
            'libmetrepas' => $data["libmetrepas"],
            'observation' => $data["observation"]
        ]);
        Ingredient::create([
            'idplante' => $data["idplante"],
            'idvivre' => $data["idvivre"],
            'idmetrepas' => $data["libmetrepas"],
            'quantite' =>  $data["quantite"],
            'observation' =>  $data["observation"]
        ]);

        //     $this->newData=[];

        //     // $this->dispatchBrowserEvent("showMessageSuccess", []);
        //     session()->flash('erreur3', "Ajout reussi");

        // } catch (\Throwable $th) {
        //     session()->flash('erreur', "Oups!! Opération non effectuer,Vérifier vos informations");
        // }
    }
    public function  editInBd()
    {

        try {

            Metrepas::find($this->editData['idmetrepas'])->update($this->editData);

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
                'text' => "Vous-êtes sure",
                'id' => $id

            ]

        ]);
    }
    public function delete($id)
    {

        try {
            $data = Metrepas::find($id);
            $data->delete();
        } catch (\Throwable $th) {
            session()->flash('erreur2', "Oups!! Opération non effectuer,Ces données sont utiliser dans d'autre table");
        }
    }
}
