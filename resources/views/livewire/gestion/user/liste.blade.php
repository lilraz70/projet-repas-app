<div class="col-12">
    <div class="card ">
        <div class="card-header bg-success text-white  d-flex align-items-center">
            <h3 class="card-title flex-grow-1"><i class="fa-sharp fa-solid fa-clipboard-list fa-2x mr-1"></i>Liste
                des Utilisateurs</h3>
            <div class="card-tools d-flex align-items-center">
                <a class="btn btn-link text-white mr-4 d-block" wire:click.prevent="gotoCreate()"><i class="fa-solid fa-square-plus mr-1"></i>Nouveau</a>
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
                       
                        <th style="width:40%" class="text-center">Nom</th>
                        <th style="width:30%" class="text-center">Login</th>
                        <th style="width:40%" class="text-center">Email</th>
                        <th style="width:25%" class="text-center">Telephone</th>
                        
                        <th style="width:25%" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($lists as $list )
                    <tr>
                        <td class="text-center">{{$list->name}}</td>
                        <td class="text-center">{{$list->login}}</td>
                        <td class="text-center">{{$list->email}}</td>
                        <td class="text-center">{{$list->telephone}}</td>
                        
                        <td class="text-center">
                            <button class="btn btn-link" wire:click="gotoEdit({{$list->id}})"><i class="fa-solid fa-pen-to-square fa-1x "></i></button>
                            <button class="btn btn-link" wire:click="confirmDelete('{{$list->name}}', {{$list->id}})"><i class="fa-solid fa-trash fa-1x"></i></button>    
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