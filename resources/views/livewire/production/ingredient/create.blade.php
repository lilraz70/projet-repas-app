<div class="card card-primary ">

    <div class="card-header bg-success text-white ">
        <button type="button" wire:click="goToList()" class="btn btn-success float-right"><i
                class="fa-solid fa-circle-left"></i></button>
        <h3 class="card-title "><i class="fa-solid fa-square-plus mr-1"></i>Nouveau
            Ingredient</h3>
    </div>

    <form role="form" wire:submit.prevent="insertInBd()">
        <div class="card-body">
            <div class="row g-3 mx-auto mt-3">

                <div class="col-md-6 mb-4">
                    <div><label for="d2">Plante</label></div>
                    <select class="form-control " wire:model="newData.idplante" required>
                        <option value="">-------</option>
                        @foreach ($listsf as $list )
                        <option value="{{$list->idplante}}">{{$list->libplante}}</option>
                        @endforeach

                    </select>
                </div>

                <div class="col-md-4">
                    <div><label for="d2">Met Repas</label></div>
                    <select class="form-control " wire:model="newData.idmetrepas" required>
                        <option value="">-------</option>
                        @foreach ($listsf2 as $list )
                        <option value="{{$list->idmetrepas}}">{{$list->libmetrepas}}</option>
                        @endforeach

                    </select>
                </div>

                <div class="col-md-4">
                    <label for="d2">Quantite</label>
                    <input type="text" wire:model="newData.quantite" class="form-control" placeholder="Quantite"
                        required>
                </div>

                <div class="col-md-4">
                    <label for="d2">Observation</label>
                    <input type="text" wire:model="newData.observation" class="form-control" placeholder="Observation"
                        required>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-success float-right mr-2">Ajouter</button>
        </div>
    </form>
</div>
{{--
<script>
    window.addEventListener("success", event=>{
        console.log(event)

    }


</script> --}}