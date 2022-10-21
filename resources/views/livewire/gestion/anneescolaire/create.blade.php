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
        <h3 class="card-title "><i class="fa-solid fa-square-plus mr-1"></i>Nouveau</h3>
    </div>

    <form role="form" wire:submit.prevent="insertInBd()">
        <div class="card-body">
            
            <div class="form-group">
                <label for="d2">Anne <span class="etoileObligatoire">*</span></label>
                <input type="text" wire:model="newData.anne" class="form-control" placeholder="Anne" required>
            </div>
            <div class="form-group">
                <label for="d2">Date Debut <span class="etoileObligatoire">*</span></label>
                <input type="date" wire:model="newData.datedebut" class="form-control" placeholder="Date Debut" required>
            </div>
            <div class="form-group">
                <label for="d2">Date fin <span class="etoileObligatoire">*</span></label>
                <input type="date" wire:model="newData.datefin" class="form-control" placeholder="Date fin" required>
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