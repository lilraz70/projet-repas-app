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
                <div class="col-md-3 mb-4">
                    <label for="d2">Date</label>
                    <input type="date" wire:model="editData.dateconsult" class="form-control" placeholder="Date"
                        required>
                </div>
                <div class="form-group">
                    <div><label for="d2">Ecole</label></div>
                    <select class="form-control " wire:model="editData.idecole" required>
                        <option value="">Ecole-Ceb-Commune-Province</option>
                        @foreach ($listsf as $list )
                        
                        <option value="{{$list->idecole}}">{{$list->libecole}} | {{$list->Ceb->libceb}} | {{$list->Ceb->Commune->libcommune}} | {{$list->Ceb->Commune->Province->libprovince}}</option>
                        @endforeach
    
                    </select>
                </div>
                <div class="col-md-4">
                    <div><label for="d2">Csp</label></div>
                    <select class="form-control " wire:model="editData.idcsp" required>
                        <option value="">Csp-Commune-Province</option>
                        @foreach ($listsf2 as $list )
                        <option value="{{$list->idcsp}}">{{$list->libcsp}} | {{$list->Commune->libcommune}} | {{$list->Commune->Province->libprovince}} </option>
                        @endforeach

                    </select>
                </div>
                <div class="col-md-4 mb-4">
                    <div><label for="d2">Medicament</label></div>
                    <select class="form-control " wire:model="editData.idmedicament" required>
                        <option value="">----Medicament---</option>
                        @foreach ($listsf4 as $list )
                        <option value="{{$list->idmedicament}}">{{$list->libmedicament}}</option>
                        @endforeach
    
                    </select>
                </div>
                <div class="col-md-4 mb-4">
                    <label for="d2">Nombre recu</label>
                    <input type="number" wire:model="editData.nb_recu" class="form-control @error('newData.nb_recu')
                    is-invalid
                @enderror" placeholder="Nombre recu"
                        required>
                </div>
                <div class="col-md-4 mb-4">
                    <label for="d2">Nombre de fille</label>
                    <input type="number" wire:model="editData.nbfille" class="form-control @error('editData.nbfille')
                    is-invalid
                @enderror" placeholder="Nombre de fille"
                        required>
                </div>
                <div class="col-md-4">
                    <label for="d2">Nombre de garcon</label>
                    <input type="number" wire:model="editData.nbgarcon" class="form-control @error('editData.nbgarcon')
                    is-invalid
                @enderror" placeholder="Nombre de garcon"
                        required>
                </div>
                
                <div class="col-md-4 ">
                    <label for="d2">Nombre de prise</label>
                    <input type="number" wire:model="editData.nb_prise" class="form-control  @error('editData.nb_prise')
                    is-invalid
                @enderror" placeholder="Nombre de prise" required>
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