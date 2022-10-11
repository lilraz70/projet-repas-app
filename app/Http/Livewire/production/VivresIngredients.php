<?php

namespace App\Http\Livewire\production;

use App\Models\Csp;
use App\Models\Plante;
use App\Models\Vivres;
use App\Models\Commune;
use Livewire\Component;
use App\Models\Metrepas;
use App\Models\Vivreingred;
use Livewire\WithPagination;

class VivresIngredients extends Component
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

    public function render()
    {
        return view('livewire.production.vivresingredients.index',[
            "lists"=>Vivreingred::latest()->paginate(5),
            "listsf"=>Plante::all(),
            "listsf2"=>Metrepas::all(),
            "listsf3"=>Vivres::all()
        ])
        ->extends("layouts.dash")
        ->section('contenu');
    }

    Public function gotoCreate(){
        $this->isBtnAddclicked = true;
    }

    public function goToList(){
        $this->isBtnEditClicked = false;
        $this->isBtnAddclicked = false;
        $this->newData = [];
        $this->editData = [];
    }


    public function insertInBd()
    {
    //    $validationAttributes = $this->validate();
       $data = $this->newData;
    //    dump($data);
        return Vivreingred::create([
            'idvivreingred' => 1,
            'idplante' => $data["idplante"],
            'idmetrepas' => $data["idmetrepas"],
            'idvivre' =>  $data["idvivre"]
        ]);
        $this->isBtnAddclicked = false;
        $this->newData=[];

        // $this->dispatchBrowserEvent("success",["message"=>"Ajout reussi !"]);
    }
}
