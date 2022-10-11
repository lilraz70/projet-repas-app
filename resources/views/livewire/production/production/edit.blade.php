<div class="card card-primary ">
    @if (session()->has('erreur'))
    <div class="alert alert-danger">
        {{ session('erreur') }}
    </div>
    @elseif (session()->has('erreur3'))
    <div class="alert alert-success">
        {{ session('erreur3') }}
    </div>
    @endif
    <div class="card-header bg-success text-white ">
        <button type="button" wire:click="goToList()" class="btn btn-success float-right"><i class="fa-solid fa-circle-left"></i></button>
        <h3 class="card-title "><i class="fa-solid fa-square-plus mr-1"></i>Formulaire d'edition
    </div>

    <form role="form" wire:submit.prevent="editInBd()">
        <div class="card-body">
            <div class="row g-3 mx-auto mt-3">
                <div class="col-md-3 mb-4">
                <div><label for="d2">Champs</label></div>
                <select class="form-control " wire:model="editData.idchamps" required>
                    <option value="">Champs-Ecole-Commune-Province</option>
                    @foreach ($listsf as $list )
                    <option value="{{$list->idchamps}}">{{$list->libchamps}} | {{$list->Ecole->libecole}} | {{$list->Ecole->Ceb->Commune->libcommune}} |  {{$list->Ecole->Ceb->Commune->Province->libprovince}}</option>
                    @endforeach

                </select>
            </div>
            <div class="col-md-4">
                <div><label for="d2">Plante</label></div>
                <select class="form-control " wire:model="editData.idplante" required>
                    <option value="">-------</option>
                    @foreach ($listsf2 as $list )
                    <option value="{{$list->idplante}}">{{$list->libplante}}</option>
                    @endforeach

                </select>
            </div>
           
            <div class="col-md-3 mb-4">
                <label for="d2">Date</label>
                <input type="date" wire:model="editData.dateproduit" class="form-control" placeholder="DATE" required>
            </div>
            <div class="col-md-4">
                <label for="d2">Quantite produit</label>
                <input type="text" wire:model="editData.qteproduit" class="form-control @error('editData.qteproduit')
                is-invalid
            @enderror" placeholder="Quantite produit" required>
            </div>
            <div class="col-md-4">
                <label for="d2">Quantite Consommee</label>
                <input type="text" wire:model="editData.qteconso" class="form-control @error('editData.qteconso')
                is-invalid
            @enderror" placeholder="Quantite Consommee" required>
            </div>
            <div class="col-md-4">
                <label for="d2">Quantite vendu</label>
                <input type="text" wire:model="editData.qtevendu" class="form-control @error('editData.qtevendu')
                is-invalid
            @enderror" placeholder="Quantite vendu" required>
            </div>
            <div class="col-md-4">
                <label for="d2">Observation</label>
                <input type="text" wire:model="editData.observation" class="form-control" placeholder="Observation" required>
            </div>
        </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-success float-right mr-2">Modifier</button>
        </div>
    </form>
</div>
{{-- 
<script>
    window.addEventListener("success", event=>{
        console.log(event)

    }


</script> --}}