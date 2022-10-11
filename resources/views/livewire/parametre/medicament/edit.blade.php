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
        <h3 class="card-title "><i class="fa-solid fa-square-plus mr-1"></i>Formulaire d'edition</h3>
    </div>

    <form role="form" wire:submit.prevent="editInBd()">
        <div class="card-body">
            <div class="row g-3 mx-auto mt-3">
                <div class="col-md-6 mb-4">
                <label for="d2">Code Medicament</label>
                <input type="text" wire:model="editData.codemedicament" class="form-control" placeholder="Code Medicament" required>
            </div>
            <div class="col-md-4">
                <label for="d2">Medicament</label>
                <input type="text" wire:model="editData.libmedicament" class="form-control" placeholder="Medicament" required>
            </div>
            <div class="col-md-4">
                <label for="d2">Posologie</label>
                <input type="text" wire:model="editData.posologie" class="form-control" placeholder="Posologie" required>
            </div>
            <div class="col-md-4">
                <label for="d2">Observation</label>
                <input type="text" wire:model="editData.observation" class="form-control" placeholder="Observation" required>
            </div>
            <div class="col-md-4">
            <div><label for="d2">Type medicament</label></div>
            <select class="form-control " wire:model="editData.typemedi" required>
                <option value="">-------</option>
               
                <option value="Déparasitant">Déparasitant</option>
                <option value="Vitatmine">Vitatmines</option>
              

            </select>
        </div>
        </div>
    </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-success float-right mr-2">Modifier</button>
        </div>
    </form>
</div>
{{-- 
<script>
    window.addEventListener("success", event=>{
        console.log(event)

    }


</script> --}}