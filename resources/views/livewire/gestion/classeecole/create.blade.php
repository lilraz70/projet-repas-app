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
            Affecter une classe a une ecole</h3>
    </div>

    <form role="form" wire:submit.prevent="insertInBd()">
        <div class="card-body">
            
            <div class="form-group">
                <div><label for="d2">Classe <span class="etoileObligatoire">*</span></label></div>
                <select class="form-control " wire:model="newData.idclasse" required>
                    <option value="">-------</option>
                    @foreach ($listsf as $list )
                    <option value="{{$list->idclasse}}">{{$list->libclasse}}</option>
                    @endforeach

                </select>
            </div>
            <div class="form-group">
                <div><label for="d2">Ecole <span class="etoileObligatoire">*</span></label></div>
                <select class="form-control " wire:model="newData.idecole" required>
                    <option value="">Ecole-Ceb-Commune-Province</option>
                    @foreach ($listsf2 as $list )
                    
                    <option value="{{$list->idecole}}">{{$list->libecole}} | {{$list->Ceb->libceb}} | {{$list->Ceb->Commune->libcommune}} | {{$list->Ceb->Commune->Province->libprovince}}</option>
                    @endforeach

                </select>
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