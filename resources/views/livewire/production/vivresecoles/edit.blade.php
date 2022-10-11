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
        <button type="button" wire:click="goToList()" class="btn btn-success float-right"><i
                class="fa-solid fa-circle-left"></i></button>
        <h3 class="card-title "><i class="fa-solid fa-square-plus mr-1"></i>Formulaire d'edition</h3>
    </div>

    <form role="form" wire:submit.prevent="editInBd()">
        <div class="card-body">
            <div class="row g-3 mx-auto mt-3">
                <div class="form-group">
                    <div><label for="d2">Ecole</label></div>
                    <select class="form-control " wire:model="editData.idecole" required>
                        <option value="">Ecole-Ceb-Commune-Province</option>
                        @foreach ($listsf2 as $list )
                        
                        <option value="{{$list->idecole}}">{{$list->libecole}} | {{$list->Ceb->libceb}} | {{$list->Ceb->Commune->libcommune}} | {{$list->Ceb->Commune->Province->libprovince}}</option>
                        @endforeach
    
                    </select>
                </div>
            <div class="col-md-4">
                <div><label for="d2">Vivre</label></div>
                <select class="form-control " wire:model="editData.idvivre" required>
                    <option value="">-------</option>
                    @foreach ($listsf as $list )
                    <option value="{{$list->idvivre}}">{{$list->libvivres}}</option>
                    @endforeach

                </select>
            </div>
            <div class="col-md-4">
                <div><label for="d2">Anne</label></div>
                <select class="form-control " wire:model="editData.anne" required>
                    <option value="">-------</option>
                    @foreach ($listsf3 as $list )
                    <option value="{{$list->anne}}">{{$list->anne}}</option>
                    @endforeach

                </select>
            </div>
            <div class="col-md-4">
                <label for="d2">Quantite recu</label>
                <input type="text" wire:model="editData.qterecu" class="form-control" placeholder="Quantite recu" required>
            </div>
            <div class="col-md-4">
                <label for="d2">Quantite consommee</label>
                <input type="text" wire:model="editData.qteconsommee" class="form-control" placeholder="Quantite consommee" required>
            </div>
            {{-- @foreach ($listsf as $list )
            <div class="form-check form-check-inline">
               
                <input class="form-check-input" type="checkbox" value={{$list->idvivre}} id="inlineCheckbox" wire:model="editData.idvivre">
                <label class="form-check-label" for="inlineCheckbox">
                    {{$list->libvivres}}
                </label>
              
              </div>
              @endforeach --}}

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