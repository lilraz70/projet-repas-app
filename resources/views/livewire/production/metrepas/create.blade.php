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
        <h3 class="card-title "><i class="fa-solid fa-square-plus mr-1"></i>Nouveau
            Met Repas</h3>
    </div>

    <form role="form" wire:submit.prevent="insertInBd()">
        <div class="card-body">
            <div class="row g-3 mx-auto mt-3">
            <div class="col-md-6 mb-4">
                <label for="d2">Met repas </label>
                <input type="text" wire:model="newData.libmetrepas" class="form-control" placeholder="Met repas" required>
            </div>
            
        
            <div class="col-md-6 mb-4">
                <div><label for="d2">Plante (facultatif)</label></div>
                <select class="form-control " wire:model="newData.idplante" >
                    <option value="">-------</option>
                    @foreach ($listsf as $list )
                    {{-- <option value="{{$list->idplante}}">{{$list->libplante}}</option> --}}
                    <input type="checkbox" class="form-check-input" value="{{$list->idplante}}">
                    @endforeach
    
                </select>
            </div>
            <div class="col-md-6 mb-4">
                <div><label for="d2">Vivres (facultatif)</label></div>
                <select class="form-control " wire:model="newData.idplante">
                    <option value="">-------</option>
                    @foreach ($listsf2 as $list )
                    <option value="{{$list->idvivres}}">{{$list->libvivres}}</option>
                    @endforeach
    
                </select>
            </div>
            
            
            <div class="col-md-4">
                <label for="d2">Quantite</label>
                <input type="text" wire:model="newData.quantite" class="form-control" placeholder="Quantite"
                    required>
            </div>
    
            <div class="col-md-4">
                <label for="d2">Observation</label>
                <input type="text" wire:model="newData.observation" class="form-control" placeholder="Observation"
                    required>
            </div>
        </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-success float-right mr-2">Ajouter</button>
        </div>
    </form>
</div>
