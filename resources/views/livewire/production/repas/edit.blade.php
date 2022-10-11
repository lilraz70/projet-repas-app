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
        <h3 class="card-title "><i class="fa-solid fa-square-plus mr-1"></i>Formulaire d'edition
        </h3>
    </div>

    <form role="form" wire:submit.prevent="editInBd()">
        <div class="card-body">
            <div class="row g-3 mx-auto mt-3">
                <div class="col-md-4">
                    <div><label for="d2">Ecole</label></div>
                    <select class="form-control " wire:model="editData.idecole" required>
                        <option value="">Ecole-Ceb-Commune-Province</option>
                        @foreach ($listsf3 as $list )
                        
                        <option value="{{$list->idecole}}">{{$list->libecole}} | {{$list->Ceb->libceb}} | {{$list->Ceb->Commune->libcommune}} | {{$list->Ceb->Commune->Province->libprovince}}</option>
                        @endforeach
    
                    </select>
                </div>
                <div class="col-md-4">
                    <div><label for="d2">Met repas</label></div>
                    <select class="form-control " wire:model="editData.idmetrepas" required>
                        <option value="">-------</option>
                        @foreach ($listsf4 as $list )
                        <option value="{{$list->idmetrepas}}">{{$list->libmetrepas}}</option>
                        @endforeach

                    </select>
                </div>
                <div class="col-md-4 mb-4">
                    <div><label for="d2">Production</label></div>
                    <select class="form-control " wire:model="editData.idproduction" required>
                        <option value="">Champs-Plante-Anne</option>
                        @foreach ($listsf as $list )
                        <option value="{{$list->idproduction}}">{{$list->Champ->libchamps}} | {{$list->Plante->libplante}} | {{$list->Annescol->anne}}</option>
                        @endforeach

                    </select>
                </div>
               
                <div class="col-md-4">
                    <label for="d2">Nombre repas</label>
                    <input type="text" wire:model="editData.nbrepas" class="form-control @error('editData.nbrepas')
                    is-invalid
                @enderror" placeholder="Nombre repas"
                        required>
                </div>
                <div class="col-md-4">
                    <label for="d2">Date repas</label>
                    <input type="date" wire:model="editData.daterepas" class="form-control" placeholder="Date repas"
                        required>
                </div>
                <div class="col-md-3 mb-4">
                    <label for="d2">Moment</label>
                    <input type="text" wire:model="editData.moment" class="form-control" placeholder="Moment" required>
                </div>
                <div class="col-md-4">
                    <label for="d2">Observation</label>
                    <input type="text" wire:model="editData.observation" class="form-control" placeholder="Observation"
                        required>
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