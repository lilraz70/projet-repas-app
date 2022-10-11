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
        <h3 class="card-title "><i class="fa-solid fa-square-plus mr-1"></i>Formulaire d'edition
           </h3>
    </div>

    <form role="form" wire:submit.prevent="editInBd()">
        <div class="card-body">
            <div class="row g-3 mx-auto mt-3"> 
                
            <div class="col-md-4 mb-4">
                <div><label for="d2">Classe</label></div>
                <select class="form-control " wire:model="editData.idclasse" required>
                    <option value="">-------</option>
                    @foreach ($listsf as $list )
                    <option value="{{$list->idclasse}}">{{$list->libclasse}}</option>
                    @endforeach

                </select>
            </div>
            <div class="col-md-4">
                <div><label for="d2">Anne</label></div>
                <select class="form-control " wire:model="editData.anne" required>
                    <option value="">-------</option>
                    @foreach ($listsf2 as $list )
                    <option value="{{$list->anne}}">{{$list->anne}}</option>
                    @endforeach

                </select>
            </div>
            <div class="col-md-4">
                <label for="d2">Nombre de fille</label>
                <input type="text" wire:model="editData.nbfille" class="form-control  @error('editData.nbfille')
                is-invalid
            @enderror" placeholder="Nombre de fille" required>
            </div>
            <div class="col-md-4">
                <label for="d2">Nombre de garcon</label>
                <input type="text" wire:model="editData.nbgarcon" class="form-control  @error('editData.nbgarcon')
                is-invalid
            @enderror" placeholder="Nombre de garcon" required>
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