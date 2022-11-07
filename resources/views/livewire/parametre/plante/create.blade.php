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
            Plante</h3>
    </div>

    <form role="form" wire:submit.prevent="insertInBd()">
        <div class="card-body">
            <div class="form-group">
                <label for="d2">Plante<span class="etoileObligatoire">*</span></label>
                <input type="text" wire:model="newData.libplante" class="form-control" placeholder="Plante" required>
            </div>
            <label for="d2">Type Plante<span class="etoileObligatoire">*</span></label>
            <select class="form-control " wire:model="newData.typeplante" required>
                <option value="">-------</option>
               
                <option value="Legume">Legume</option>
                <option value="Cereale">Cereale</option>
                <option value="Autres">Autres</option>
               

            </select>
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