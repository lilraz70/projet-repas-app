<div class="col-12">

    <div class="card ">
        <div class="card-header bg-success text-white  d-flex align-items-center">
            <h3 class="card-title flex-grow-1"><i class="fa-sharp fa-solid fa-clipboard-list fa-2x mr-1"></i>Liste
                des Productions</h3>
                
            <div class="card-tools d-flex align-items-center">
                <a class="btn btn-link text-white mr-4 d-block" wire:click.prevent="gotoCreate()"><i class="fa-solid fa-square-plus mr-1"></i>Nouveau</a>
                
            </div>
            <div class="input-group input-group-md  mr-4" style="width: 150px" >

                <label for="d2 ">Choisir la region</label>
                <select class="form-control  " wire:model="selectedStatus">
                    <option value="">---Champs---</option>
                    @foreach ($listsf as $list )
                    <option value="{{$list->idchamps}}">{{$list->libchamps}} | {{$list->Ecole->libecole}} </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="card-body table-responsive p-0" style="height:350px;">
            <table class="table table-head-fixed text-nowrap">
                <thead>
                    <tr>
                        <th style="width:25%" class="text-center">Champs</th>
                        <th style="width:25%" class="text-center">Plante</th>
                        <th style="width:15%" class="text-center">Date produit</th>
                        <th style="width:25%" class="text-center">Anne</th>
                        <th style="width:25%" class="text-center">Quantite  Conso</th>
                        <th style="width:25%" class="text-center">Quantite vendu</th>
                        <th style="width:25%" class="text-center">Quantite produit</th>
                        <th style="width:25%" class="text-center">Observation</th>
                        <th style="width:25%" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($lists as $list )
                    <tr>
                        
                        <td class="text-center">{{$list->Champ->libchamps}}</td>
                        <td class="text-center">{{$list->Plante->libplante}}</td>
                        <td class="text-center">{{$list->dateproduit}}</td>
                        <td class="text-center">{{$list->anne}}</td>
                        <td class="text-center">{{$list->qteconso}}</td>
                        <td class="text-center">{{$list->qtevendu}}</td>
                        <td class="text-center">{{$list->qteproduit}}</td>
                        <td class="text-center">{{$list->observation}}</td>
                       
                        <td class="text-center">
                            <button class="btn btn-link" wire:click="gotoEdit({{$list->idproduction}})"><i class="fa-solid fa-pen-to-square fa-1x "></i></button>
                            <button class="btn btn-link" wire:click="confirmDelete('{{$list->idproduction}}')"><i class="fa-solid fa-trash fa-1x"></i></button>    
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