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
        <h3 class="card-title "><i class="fa-solid fa-square-plus mr-1"></i>Nouvelle
            Ecole</h3>
    </div>

    <form role="form" wire:submit.prevent="insertInBd()">
        <div class="card-body">
            <div class="form-group">
                <div><label for="d2">Ceb</label></div>
                <select class="form-control " wire:model="newData.idceb" required>
                    <option value="">Ceb-Province-Commune</option>
                    @foreach ($listsf as $list )
                    <option value="{{$list->idceb}}">{{$list->libceb}} <span class="text-info bg-dark"> | {{$list->Commune->Province->libprovince}} | {{$list->Commune->libcommune}} </span></option>
                    @endforeach

                </select>
            </div>
            <div class="form-group">
                <label for="d2">Ecole</label>
                <input type="text" wire:model="newData.libecole" class="form-control" placeholder="Ecole" required>
            </div>
            <div class="form-group">
                <label for="d2">Nombre de Classe</label>
                <input type="text" wire:model="newData.nbclasse" class="form-control @error('newData.nbclasse')
                is-invalid
            @enderror" placeholder="Nombre de Classe" required>
            </div>
            
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-success float-right mr-2">Ajouter</button>
        </div>
    </form>
</div>
{{-- 
<script>
    window.addEventListener("success", event=>{
        console.log(event)

    }


</script> --}}