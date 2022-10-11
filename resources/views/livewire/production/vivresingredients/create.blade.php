<div class="card card-primary ">

    <div class="card-header bg-success text-white ">
        <button type="button" wire:click="goToList()" class="btn btn-success float-right"><i class="fa-solid fa-circle-left"></i></button>
        <h3 class="card-title "><i class="fa-solid fa-square-plus mr-1"></i>Nouveau
            </h3>
    </div>

    <form role="form" wire:submit.prevent="insertInBd()">
        <div class="card-body">
            
            <div class="form-group">
                <div><label for="d2">Plante</label></div>
                <select class="form-control " wire:model="newData.idplante" required>
                    <option value="">-------</option>
                    @foreach ($listsf as $list )
                    <option value="{{$list->idplante}}">{{$list->libplante}}</option>
                    @endforeach

                </select>
            </div>
            <div class="form-group">
                <div><label for="d2">Met Repas</label></div>
                <select class="form-control " wire:model="newData.idmetrepas" required>
                    <option value="">-------</option>
                    @foreach ($listsf2 as $list )
                    <option value="{{$list->idmetrepas}}">{{$list->libmetrepas}}</option>
                    @endforeach

                </select>
            </div>
            <div class="form-group">
                <div><label for="d2">Vivre</label></div>
                <select class="form-control " wire:model="newData.idvivre" required>
                    <option value="">-------</option>
                    @foreach ($listsf3 as $list )
                    <option value="{{$list->idvivre}}">{{$list->libvivre}}</option>
                    @endforeach

                </select>
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