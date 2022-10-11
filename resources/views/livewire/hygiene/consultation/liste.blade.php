<div class="col-12">
    @if (session()->has('erreur2'))
    <div class="alert alert-danger">
        {{ session('erreur2') }}
    </div>
    @endif
    <div class="card ">
        <div class="card-header bg-success text-white  d-flex align-items-center">
            <h3 class="card-title flex-grow-1"><i class="fa-sharp fa-solid fa-clipboard-list fa-2x mr-1"></i>Liste
                des Consultations</h3>
            <div class="card-tools d-flex align-items-center">
                <a class="btn btn-link text-white mr-4 d-block" wire:click.prevent="gotoCreate()"><i class="fa-solid fa-square-plus mr-1"></i>Nouvelle Consultation</a>
                <div class="input-group input-group-md  mr-4" style="width: 150px" >

                    {{-- <label for="d2 ">Choisir la region</label> --}}
                    <select class="form-control  " wire:model="selectedStatus">
                        <option value="">---Ecole---</option>
                        @foreach ($listsf5 as $list )
                        <option value="{{$list->idconsultation}}">{{$list->Ecole->libecole}}</option>
                        @endforeach
    
                    </select>
                </div>
            </div>
        </div>

        <div class="card-body table-responsive p-0" style="height:350px;">
            <table class="table table-head-fixed text-nowrap">
                <thead>
                    <tr>
                        <th style="width:10%" class="text-center">Date Consultation</th>
                        <th style="width:40%" class="text-center">Ecole</th>
                        <th style="width:40%" class="text-center">Csp</th>
                        <th style="width:40%" class="text-center">Nombre de fille</th>
                        <th style="width:40%" class="text-center">Nombre de garcon</th>
                        <th style="width:40%" class="text-center">Total</th>
                        <th style="width:40%" class="text-center">Phase</th>
                        <th style="width:40%" class="text-center">Medicament</th>
                        <th style="width:25%" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($lists as $list )
                    <tr>
                        <td class="text-center">{{$list->Consultation->dateconsult}}</td>
                        <td class="text-center">{{$list->Consultation->Ecole->libecole}}</td>
                        <td class="text-center">{{$list->Consultation->Csp->libcsp}}</td>
                        <td class="text-center">{{$list->Consultation->nbfille}}</td>
                        <td class="text-center">{{$list->Consultation->nbgarcon}}</td>
                        <td class="text-center">{{$list->Consultation->nbtotal}}</td>
                        <td class="text-center">{{$list->Consultation->phase}}</td>
                        <td class="text-center">{{$list->Medicament->libmedicament}}</td>
                        <td class="text-center">
                            <button class="btn btn-link"   wire:click="gotoEdit({{$list->idsoins}},{{$list->Consultation->idconsultation}})"><i class="fa-solid fa-pen-to-square fa-1x "></i></button>
                            <button class="btn btn-link" wire:click="confirmDelete('{{$list->idsoins}}', {{$list->Consultation->idconsultation}})"><i class="fa-solid fa-trash fa-1x"></i></button>    
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
        @this.delete(event.detail.message.id,event.detail.message.id2)
     
    }
  })

})


</script>