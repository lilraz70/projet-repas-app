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
            Affectation</h3>
    </div>

    <form role="form" wire:submit.prevent="insertInBd()">
        <div class="card-body">
            <div class="form-group">
                <div><label for="d2">Dispositif Hygiene</label></div>
                <select class="form-control " wire:model="newData.iddispos" required>
                    <option value="">-------</option>
                    @foreach ($listsf2 as $list )
                    <option value="{{$list->iddispos}}">{{$list->libdispos}}</option>
                    @endforeach

                </select>
            </div>
            <div class="form-group">
                <div><label for="d2">Ecole</label></div>
                <select class="form-control " wire:model="newData.idecole" required>
                    <option value="">-------</option>
                    @foreach ($listsf as $list )
                    <option value="{{$list->idecole}}">{{$list->libecole}}</option>
                    @endforeach

                </select>
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