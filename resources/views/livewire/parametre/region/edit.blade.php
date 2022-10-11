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
            <div class="form-group">
                <label for="d2">Region</label>
                <input type="text" wire:model="editData.libregion" class="form-control @error('editData.libregion')
                    is-invalid
                @enderror" placeholder="Region" required>
                @error('editData.libregion')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="d2">Superficie</label>
                <input type="number" wire:model="editData.superficie" class="form-control @error('editData.superficie')
                is-invalid
            @enderror" placeholder="Superficie" required>
            </div>

        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-success float-right mr-2">Modifier</button>
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