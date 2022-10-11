<?php

namespace App\Http\Livewire\parametre;


use App\Models\Region;
use Livewire\Component;
use Livewire\WithPagination;
use PhpParser\Node\Stmt\TryCatch;

class Regions extends Component
{

    use WithPagination;
    protected $paginationTheme = "bootstrap";

    public $isBtnAddclicked = false;
    public $isBtnEditClicked = false;
    public $newData = [];
    public $editData = [];
   
    public $search = "";
    protected $rules = [

       
        'newData.superficie' => 'required|numeric'
    ];

    public function render()
    {
        $searchcritere = "%".$this->search."%";
        return view('livewire.parametre.region.index', [
            "lists" => Region::where('libregion', 'like', $searchcritere)->orderBy('libregion', 'ASC')->paginate(10),
        ])
            ->extends("layouts.dash")
            ->section('contenu');
    }

    public function gotoCreate()
    {
        $this->isBtnAddclicked = true;
    }
    public function gotoEdit($id)
    {
        $this->editData = Region::find($id)->toArray();
       
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
        Region::create([
            
            'libregion' => $data["libregion"],
            'superficie' => $data["superficie"],
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

        Region::find($this->editData['idregion'])->update($this->editData);
        
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
            $data = Region::find($id);
            $data->delete();
        } catch (\Throwable $th) {
            session()->flash('erreur2', "Oups!! Opération non effectuer,Ces données sont utiliser dans d'autre table");
        }
        
       
    }
}
