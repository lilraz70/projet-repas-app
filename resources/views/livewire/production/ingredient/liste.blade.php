<div class="col-12">
    <div class="card ">
        <div class="card-header bg-success text-white  d-flex align-items-center">
            <h3 class="card-title flex-grow-1"><i class="fa-sharp fa-solid fa-clipboard-list fa-2x mr-1"></i>Liste
                des Ingredients</h3>
            <div class="card-tools d-flex align-items-center">
                {{-- <a class="btn btn-link text-white mr-4 d-block" wire:click.prevent="gotoCreate()"><i class="fa-solid fa-square-plus mr-1"></i>Nouveau</a> --}}
                <div class="input-group input-group-md" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right"
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
                        <th style="width:10%" class="text-center">Plante</th>
                        <th style="width:25%" class="text-center">Met Repas</th>
                        <th style="width:40%" class="text-center">Quantite</th>
                        <th style="width:40%" class="text-center">Observation</th>
                        <th style="width:25%" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($lists as $list )
                    <tr>
                        <td class="text-center">{{$list->Plante->libplante}}</td>
                        <td class="text-center">{{$list->Metrepas->libmetrepas}}</td>
                        <td class="text-center">{{$list->quantite}}</td>
                        <td class="text-center">{{$list->Observation}}</td>
                        <td class="text-center"><button class="btn btn-link">
                                <i class="fa-solid fa-pen-to-square fa-1x mr-2"></i>
                                <i class="fa-solid fa-trash fa-1x"></i>
                            </button></td>
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