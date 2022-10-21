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
            Province</h3>
    </div>

    <form role="form" wire:submit.prevent="insertInBd()">
        <div class="card-body">
            <div class="form-group">
                <div><label for="d2">Region <span class="etoileObligatoire">*</span></label></div>
                <select class="form-control " wire:model="newData.idregion" required>
                    <option value="">----Region---</option>
                    @foreach ($listsf as $list )
                    <option value="{{$list->idregion}}">{{$list->libregion}}</option>
                    @endforeach

                </select>
            </div>
            <div class="form-group">
                <label for="d2">Province <span class="etoileObligatoire">*</span></label>
                <input type="text" wire:model="newData.libprovince" class="form-control" placeholder="Province" required>
            </div>
            <div class="form-group">
                <label for="d2">Superficie</label>
                <input type="text" wire:model="newData.superficie" class="form-control
                @error('newData.superficie')
                    is-invalid
                @enderror" placeholder="Superficie">
                
            </div>
           
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-success float-right mr-2">Ajouter</button>
        </div>
    </form>
</div>

{{-- <script>
    window.addEventListener("showMessageSuccess", event=>{
    Swal.fire({
  position: 'top-end',
  icon: 'success',
  toat: true,
  title: 'Ajout reussi avec succès',
  showConfirmButton: false,
  timer:3000
})
})

</script> --}}
