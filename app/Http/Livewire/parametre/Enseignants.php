<?php

namespace App\Http\Livewire\parametre;

use App\Models\Ecole;
use Livewire\Component;
use App\Models\annescol;
use App\Models\Enseignant;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class Enseignants extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";
    public $isBtnEditClicked = false;
    public $isBtnAddclicked = false;

    public $newData = [];
    public $search = "";
    public $editData = [];
    public $selectedStatus = '';
    protected $rules = [
        'newData.nbtg' => 'numeric',
        'newData.nbtf' => 'numeric',
        'newData.nbcf' => 'numeric',
        'newData.nbcg' => 'numeric',
    ];

    public function render()
    {
        try {
            $searchcritere = "%" . $this->search . "%";
            return view('livewire.parametre.enseignant.index', [
                "lists" => Enseignant::where('annescolaire', 'like', $searchcritere)
                    ->when($this->selectedStatus, function ($query) {
                        return $query->where('idecole', $this->selectedStatus);
                    })->orderBy('annescolaire', 'ASC')->paginate(10),
                "listsf" => Ecole::all(),
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
        $this->editData = Enseignant::find($id)->toArray();

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
            // dd($data);
            Enseignant::create([
                'annescolaire' => $data["anne"],
                'idecole' => $data["idecole"],
                'nb_total_g' => $data["nbtg"],
                'nb_total_f' => $data["nbtf"],
                'nb_cges_g' => $data["nbcg"],
                'nb_cges_f' => $data["nbcf"]
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

            Enseignant::find($this->editData['annescolaire'])->update($this->editData);

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
                'text' => "Vous-êtes sur le point de supprimer",
                'id' => $id

            ]

        ]);
    }
    public function delete($id)
    {

        try {
            $data = Enseignant::find($id);
            $data->delete();
        } catch (\Throwable $th) {
            session()->flash('erreur2', "Oups!! Opération non effectuer,Ces données sont utiliser dans d'autre table");
        }
    }
}
