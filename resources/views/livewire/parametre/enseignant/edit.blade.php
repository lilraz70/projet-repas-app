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
        <h3 class="card-title "><i class="fa-solid fa-square-plus mr-1"></i>Formulaire d'edition</h3>
    </div>

    <form role="form" wire:submit.prevent="editInBd()">
        <div class="card-body">
            <div class="form-group">
                <div><label for="d2">AnneScolaire</label></div>
                <select class="form-control " wire:model="editData.annescolaire" required>
                    <option value="">-----------</option>
                    @foreach ($listsf2 as $list )
                    <option value="{{$list->anne}}">{{$list->anne}} </option>
                    @endforeach

                </select>
            </div>
            <div class="form-group">
                <div><label for="d2">Ecole</label></div>
                <select class="form-control  " wire:model="editData.idecole">
                    <option value="">-Ecole-Commune-Province</option>
                    @foreach ($listsf as $list )
                    <option value="{{$list->idecole}}">{{$list->libecole}} | {{$list->Ceb->Commune->libcommune}} | {{$list->Ceb->Commune->Province->libprovince}}</option>
                    @endforeach

                </select>
            </div>
            <div class="form-group">
                <label for="d2">Total Garcon</label>
                <input type="text" wire:model="editData.nb_total_g" class="form-control @error('editData.nbtg')
                is-invalid
            @enderror" placeholder="Total Garcon" required>
            </div>
            <div class="form-group">
                <label for="d2">Total Fille</label>
                <input type="text" wire:model="editData.nb_total_f" class="form-control @error('editData.nbtf')
                is-invalid
            @enderror" placeholder="Total Fille" required>
            </div>
            <div class="form-group">
                <label for="d2">Total Coges Garcon</label>
                <input type="text" wire:model="editData.nb_cges_g" class="form-control @error('editData.nbcg')
                is-invalid
            @enderror" placeholder="Total Coges Garcon" required>
            </div>
            <div class="form-group">
                <label for="d2">Total Coges Fille</label>
                <input type="text" wire:model="editData.nb_cges_f" class="form-control @error('editData.nbcf')
                is-invalid
            @enderror" placeholder="Total Coges Fille" required>
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