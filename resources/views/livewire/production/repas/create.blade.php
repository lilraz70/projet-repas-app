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
        <h3 class="card-title "><i class="fa-solid fa-square-plus mr-1"></i>Nouveau repas
        </h3>
    </div>

    <form role="form" wire:submit.prevent="insertInBd()">
        <div class="card-body">
            <div class="row g-3 mx-auto mt-3">
                <div class="col-md-4">
                    <div><label for="d2">Ecole <span class="etoileObligatoire">*</span></label></div>
                    <select class="form-control " wire:model="newData.idecole" required>
                        <option value="">Ecole-Ceb-Commune-Province</option>
                        @foreach ($listsf3 as $list )
                        
                        <option value="{{$list->idecole}}">{{$list->libecole}} | {{$list->Ceb->libceb}} | {{$list->Ceb->Commune->libcommune}} | {{$list->Ceb->Commune->Province->libprovince}}</option>
                        @endforeach
    
                    </select>
                </div>
                <div class="col-md-4">
                    <div><label for="d2">Met repas <span class="etoileObligatoire">*</span></label></div>
                    <select class="form-control " wire:model="newData.idmetrepas" required>
                        <option value="">-------</option>
                        @foreach ($listsf4 as $list )
                        <option value="{{$list->idmetrepas}}">{{$list->libmetrepas}}</option>
                        @endforeach

                    </select>
                </div>
                <div class="col-md-4 mb-4">
                    <div><label for="d2">Production <span class="etoileObligatoire">*</span></label></div>
                    <select class="form-control " wire:model="newData.idproduction" required>
                        <option value="">Champs-Plante-Anne</option>
                        @foreach ($listsf as $list )
                        <option value="{{$list->idproduction}}">{{$list->Champ->libchamps}} | {{$list->Plante->libplante}} | {{$list->Annescol->anne}}</option>
                        @endforeach

                    </select>
                </div>
               
                <div class="col-md-4">
                    <label for="d2">Nombre repas <span class="etoileObligatoire">*</span></label>
                    <input type="number" wire:model="newData.nbrepas" class="form-control @error('newData.nbrepas')
                    is-invalid
                @enderror" placeholder="Nombre repas"
                        required>
                </div>
                <div class="col-md-4">
                    <label for="d2">Date repas <span class="etoileObligatoire">*</span></label>
                    <input type="date" wire:model="newData.daterepas" class="form-control" placeholder="Date repas"
                        required>
                </div>
                <div class="col-md-3 mb-4">
                    <label for="d2">Moment <span class="etoileObligatoire">*</span></label>
                    <input type="number" wire:model="newData.moment" class="form-control" placeholder="Moment" required>
                </div>
                <div class="col-md-4">
                    <label for="d2">Observation</label>
                    <input type="text" wire:model="newData.observation" class="form-control" placeholder="Observation"
                        >
                </div>
                
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