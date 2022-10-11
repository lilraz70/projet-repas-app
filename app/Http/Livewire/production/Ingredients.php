<?php

namespace App\Http\Livewire\production;

use App\Models\Plante;
use Livewire\Component;
use App\Models\Metrepas;
use App\Models\Ingredient;
use Livewire\WithPagination;

class Ingredients extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";

    public $isBtnAddclicked = false;

    // public $editData = [];
    public $newData = [];
    // protected $rules = [
    //     'newData.idprovince' => 'required',
    // ];

    public function render()
    {
        return view('livewire.production.ingredient.index',[
            "lists"=>Ingredient::latest()->paginate(5),
            "listsf"=>Plante::all(),
            "listsf2"=>Metrepas::all()
        ])
        ->extends("layouts.dash")
        ->section('contenu');
    }

    Public function gotoCreate(){
        $this->isBtnAddclicked = true;
    }

    public function goToList(){
        $this->isBtnAddclicked = false;
    }


    public function insertInBd()
    {
    //    $validationAttributes = $this->validate();
       $data = $this->newData;
    //    dump($data);
        return Ingredient::create([
            'idplante' => $data["idplante"],
            'idmetrepas' => $data["idmetrepas"],
            'quantite' =>  $data["quantite"],
            'observation' =>  $data["observation"]
        ]);
        $this->isBtnAddclicked = false;
        $this->newData=[];

        // $this->dispatchBrowserEvent("success",["message"=>"Ajout reussi !"]);
    }
}
