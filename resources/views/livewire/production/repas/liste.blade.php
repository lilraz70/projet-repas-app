<div class="col-12">
    @if (session()->has('erreur2'))
    <div class="alert alert-danger">
        {{ session('erreur2') }}
    </div>
    @endif
    <div class="card ">
        <div class="card-header bg-success text-white  d-flex align-items-center">
            <h3 class="card-title flex-grow-1"><i class="fa-sharp fa-solid fa-clipboard-list fa-2x mr-1"></i>Liste
                des Repas</h3>
            <div class="card-tools d-flex align-items-center">
                <a class="btn btn-link text-white mr-4 d-block" wire:click.prevent="gotoCreate()"><i class="fa-solid fa-square-plus mr-1"></i>Nouveau </a>
                <div class="input-group input-group-md  mr-4" style="width: 150px" >

                    {{-- <label for="d2 ">Choisir la region</label> --}}
                    <select class="form-control  " wire:model="selectedStatus">
                        <option value="">---Ecole---</option>
                        @foreach ($listsf3 as $list )
                        <option value="{{$list->idecole}}">{{$list->libecole}}</option>
                        @endforeach
    
                    </select>
                </div>
            </div>
        </div>

        <div class="card-body table-responsive p-0" style="height:350px;">
            <table class="table table-head-fixed text-nowrap">
                <thead>
                    <tr>
                       
                      
                        <th style="width:40%" class="text-center">Ecole</th>
                        <th style="width:40%" class="text-center">Met repas</th>
                        <th style="width:40%" class="text-center">Champ</th>
                        <th style="width:40%" class="text-center">Plante</th>
                        <th style="width:40%" class="text-center">Date repas</th>
                        <th style="width:40%" class="text-center">Nombre repas</th>
                        <th style="width:40%" class="text-center">Moment</th>
                        <th style="width:40%" class="text-center">Observation</th>
                        <th style="width:25%" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($lists as $list )
                    <tr>
                        <td class="text-center">{{$list->Ecole->libecole}}</td>
                        <td class="text-center">{{$list->Metrepas->libmetrepas}}</td>
                        <td class="text-center">{{$list->Production->Champ->libchamps}}</td>
                        <td class="text-center">{{$list->Production->Plante->libplante}}</td>
                        <td class="text-center">{{$list->daterepas}}</td>
                        <td class="text-center">{{$list->nbrepas}}</td>
                        <td class="text-center">{{$list->moment}}</td>
                        <td class="text-center">{{$list->observation}}</td>
                        <td class="text-center">
                            <button class="btn btn-link" wire:click="gotoEdit({{$list->idrepas}})"><i class="fa-solid fa-pen-to-square fa-1x "></i></button>
                            <button class="btn btn-link" wire:click="confirmDelete('{{$list->idrepas}}')"><i class="fa-solid fa-trash fa-1x"></i></button>    
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