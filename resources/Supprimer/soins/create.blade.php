<div class="card card-primary ">

    <div class="card-header bg-success text-white ">
        <button type="button" wire:click="goToList()" class="btn btn-success float-right"><i class="fa-solid fa-circle-left"></i></button>
        <h3 class="card-title "><i class="fa-solid fa-square-plus mr-1"></i>Nouveau
            </h3>
    </div>

    <form role="form" wire:submit.prevent="insertInBd()">
        <div class="card-body">
            
            
            <div class="form-group">
                <div><label for="d2">Medicament</label></div>
                <select class="form-control " wire:model="newData.idmedicament" required>
                    <option value="">-------</option>
                    @foreach ($listsf as $list )
                    <option value="{{$list->idmedicament}}">{{$list->libmedicament}}</option>
                    @endforeach

                </select>
            </div>
            <div class="form-group">
                <label for="d2">Date Consultation</label>
                <input type="date" wire:model="newData.dateconsult" class="form-control" placeholder="Date consultation" required>
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