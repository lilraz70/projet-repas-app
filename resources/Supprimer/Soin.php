<?php

namespace App\Http\Livewire\hygiene;

use App\Models\Csp;
use App\Models\Soins;
use App\Models\Commune;
use Livewire\Component;
use App\Models\Medicament;
use Livewire\WithPagination;

class Soin extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";

    public $isBtnAddclicked = false;

    public $newData = [];
    // protected $rules = [
    //     'newData.idprovince' => 'required',
    // ];

    public function render()
    {
        return view('livewire.hygiene.soins.index',[
            "lists"=>Soins::latest()->paginate(5),
            "listsf"=>Medicament::all()
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
        return Soins::create([
           'idsoins'=>1,
            'idmedicament' => $data["idmedicament"],
            'dateconsult' =>  $data["dateconsult"]
        ]);
        $this->isBtnAddclicked = false;
        $this->newData=[];

        // $this->dispatchBrowserEvent("success",["message"=>"Ajout reussi !"]);
    }
}
