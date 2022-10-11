<div class="col-12">
    @if (session()->has('erreur2'))
    <div class="alert alert-danger">
        {{ session('erreur2') }}
    </div>
    @endif
    <div class="card ">
        <div class="card-header bg-success text-white  d-flex align-items-center">
            <h3 class="card-title flex-grow-1"><i class="fa-sharp fa-solid fa-clipboard-list fa-2x mr-1"></i>Liste
                des eleves</h3>
            <div class="card-tools d-flex align-items-center">
                <a class="btn btn-link text-white mr-4 d-block" wire:click.prevent="gotoCreate()"><i class="fa-solid fa-square-plus mr-1"></i>Nouveau eleve</a>
                <div class="input-group input-group-md  mr-4" style="width: 150px" >

                    {{-- <label for="d2 ">Choisir la region</label> --}}
                    <select class="form-control  " wire:model="selectedStatus">
                        <option value="">---Classe---</option>
                        @foreach ($listsf as $list )
                        <option value="{{$list->idclasse}}">{{$list->libclasse}}</option>
                        @endforeach
    
                    </select>
                </div>
                <div class="input-group input-group-md" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control " wire:model.debounce='search'
                        placeholder="Rechercher">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-default">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-body table-responsive p-0" style="height:350px;">
            <table class="table table-head-fixed text-nowrap">
                <thead>
                    <tr>
                        <th style="width:10%" class="text-center">Classe</th>
                        <th style="width:25%" class="text-center">Anne</th>
                        <th style="width:40%" class="text-center">Nombre de fille</th>
                        <th style="width:40%" class="text-center">Nombre de garcon</th>
                        <th style="width:40%" class="text-center">Nombre total</th>
                        <th style="width:25%" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($lists as $list )
                    <tr>
                        <td class="text-center">{{$list->Classe->libclasse}}</td>
                        <td class="text-center">{{$list->annescol->anne}}</td>
                        <td class="text-center">{{$list->nbfille}}</td>
                        <td class="text-center">{{$list->nbgarcon}}</td>
                        <td class="text-center">{{$list->nbtotal}}</td>
                        <td class="text-center">
                            <button class="btn btn-link" wire:click="gotoEdit({{$list->ideleve}})"><i class="fa-solid fa-pen-to-square fa-1x "></i></button>
                            <button class="btn btn-link" wire:click="confirmDelete({{$list->ideleve}})"><i class="fa-solid fa-trash fa-1x"></i></button>    
                            </td>
                    </tr>
                    @endforeach

                </tbody>

            </table>
        </div>

        <div class="card-footer ">
            <div class="float-right "> {{ $lists->links() }}</div>
        </div>


    </div>

</div>

<script>
    
    window.addEventListener("showDelete", event=>{

        Swal.fire({
    title: 'Êtes-vous sûre  ?',
    text: event.detail.message.text,
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#00FF00',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Oui, Supprime!',
    cancelButtonText: 'Annuler'
  }).then((result) => {
    if (result.isConfirmed) {
        @this.delete(event.detail.message.id)
     
    }
  })

})


</script>