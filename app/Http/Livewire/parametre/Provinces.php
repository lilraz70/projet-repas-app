<?php

namespace App\Http\Livewire\parametre;

 
use App\Models\Region;
use Livewire\Component;
use App\Models\Province;
use Livewire\WithPagination;
use PhpParser\Node\Stmt\TryCatch;

class Provinces extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";

    public $isBtnAddclicked = false;
    public $isBtnEditClicked = false;
    public $newData = [];
    public $editData = [];
    public $selectedStatus = ''; 
    // public $perPage = 10;
    public $search = "";
    protected $rules = [
        // 'newData.libprovince' => 'required|unique:province,libprovince|string',
        'newData.superficie' => 'required|numeric'
    ];
    public function render()
    {
       $searchcritere = "%".$this->search."%";

            return view('livewire.parametre.province.index',[
                "lists"=>Province::where('libprovince', 'like', $searchcritere)
                ->when($this->selectedStatus, function($query) {
                    return $query->where('idregion', $this->selectedStatus);
                })->orderBy('libprovince', 'ASC')->paginate(10),
                "listsf"=>Region::all()
            ])
            ->extends("layouts.dash")
            ->section('contenu');
      
    }

    Public function gotoCreate(){
        $this->isBtnAddclicked = true;
    }
    public function gotoEdit($id)
    {
        $this->editData = Province::find($id)->toArray();
       
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
        $this->validate();
        try {

       $data = $this->newData;
    
         Province::create([
            'idregion' => $data["idregion"],
            'libprovince' => $data["libprovince"],
            'superficie' =>  $data["superficie"]
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

        Province::find($this->editData['idprovince'])->update($this->editData);
        
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
            $data = Province::find($id);
            $data->delete();
        } catch (\Throwable $th) {
            session()->flash('erreur2', "Oups!! Opération non effectuer,Ces données sont utiliser dans d'autre table");
        }
        
       
    }
}
