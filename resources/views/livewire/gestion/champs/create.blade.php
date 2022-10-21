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
        <h3 class="card-title "><i class="fa-solid fa-square-plus mr-1"></i>Nouveau</h3>
    </div>

    <form  role="form" wire:submit.prevent="insertInBd()">
        
        <div class="row g-3 mx-auto mt-3">
            <div class="col-md-6 mb-4">
                <div><label for="d2">Ecole <span class="etoileObligatoire">*</span></label></div>
                <select class="form-control " wire:model="newData.idecole" required>
                    <option value="">Ecole-Commune-Province</option>
                    @foreach ($listsf as $list )
                    <option value="{{$list->idecole}}">{{$list->libecole}} | | {{$list->Ceb->Commune->libcommune}} | {{$list->Ceb->Commune->Province->libprovince}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <label for="d2">Champs <span class="etoileObligatoire">*</span></label>
                <input type="text" wire:model="newData.libchamps" class="form-control" placeholder="Champs" required>
            </div>
        
        
            <div  class="col-md-6">
                <label for="d2">superficie <span class="etoileObligatoire">*</span></label>
                <input type="number" wire:model="newData.superficie" class="form-control @error('newData.superficie')
                is-invalid
            @enderror" placeholder="superficie">
            </div>
           
            <div class="col-md-4">
                <div><label for="d2">Type Champs <span class="etoileObligatoire">*</span></label></div>
                <select class="form-control " wire:model="newData.typechamps" required>
                    <option value="">-------</option>
                    <option value="Champs">Champs</option>
                    <option value="Jardin">Jardin</option>
                </select>
            </div>
            </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-success float-right mr-2">Ajouter</button>
        </div>
    </form>
</div>
