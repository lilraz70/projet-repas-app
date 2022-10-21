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
    public $newDatap = [];
    public $newDatav = [];
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
        $dataplante = $this->newDatap; 
        $datavivre =  $this->newDatav;
      
        // ajout du metrepas
        $data = Metrepas::create([
            'idmetrepas' => $this->newData["libmetrepas"],
            'libmetrepas' => $this->newData["libmetrepas"],
            'observation' => $this->newData["observation"] ?? null
        ]);
 // ajout des ingredient

        // cas de plante
        $ingredients = collect($dataplante)->map(function ($ingredient) {
            return ['quantite' => $ingredient];
        });
       
       $data->plantes()->sync(
            $ingredients
        );
         // cas de vivre
         $ingredients2 = collect($datavivre)->map(function ($ingredient2) {
            return ['quantite' => $ingredient2];
        });
       
       $data->vivres()->sync(
            $ingredients2
        );

       


       

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
