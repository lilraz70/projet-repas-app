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
            Csp</h3>
    </div>

    <form role="form" wire:submit.prevent="insertInBd()">
        <div class="card-body">
            <div class="form-group">
                <div><label for="d2">Commune <span class="etoileObligatoire">*</span></label></div>
                <select class="form-control " wire:model="newData.idcommune" required>
                    <option value="">Commune-Province</option>
                    @foreach ($listsf as $list )
                    <option value="{{$list->idcommune}}">{{$list->libcommune}} | {{$list->Province->libprovince}}</option>
                    @endforeach

                </select>
            </div>
            <div class="form-group">
                <label for="d2">Csp <span class="etoileObligatoire">*</span></label>
                <input type="text" wire:model="newData.libcsp" class="form-control" placeholder="Csp" required>
            </div>
            <div class="form-group">
                <label for="d2">Code Csp </label>
                <input type="text" wire:model="newData.codecsp" class="form-control" placeholder="Code Csp">
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