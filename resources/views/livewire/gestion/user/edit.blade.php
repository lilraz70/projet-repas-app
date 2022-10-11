<div class="card card-primary ">

    <div class="card-header bg-success text-white ">
        <button type="button" wire:click="goToList()" class="btn btn-success float-right"><i class="fa-solid fa-circle-left"></i></button>
        <h3 class="card-title "><i class="fa-solid fa-square-plus mr-1"></i>Formulaire d'edition</h3>
    </div>

    <form role="form" wire:submit.prevent="editInBd()">
        @csrf
        <div class="card-body">
        <div class="row g-3 mx-auto mt-3">
            <div class="col-md-4">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <span class="fa fa-user"></span>
                        </span>                    
                    </div>
                    <input  wire:model="editData.name" type="text" class="form-control @error('editData.name') is-invalid @enderror"   placeholder="Nom et Prenom" required="required">
                
                </div>
            </div>
    
            <div class="col-md-4">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <span class="fa fa-user-circle"></span>
                        </span>                    
                    </div>
                    <input wire:model="editData.login" type="text" class="form-control @error('editData.login') is-invalid @enderror"   placeholder="Login" required="required">
                
                
                </div>
            </div>
    
            <div class="col-md-4 mb-4">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="fa fa-envelope"></i>
                        </span>                    
                    </div>
                    <input wire:model="editData.email" type="email" class="form-control @error('editData.email') is-invalid @enderror"  placeholder="Adresse Email" required="required">
                     
                </div>
                
            </div>
    
            <div class="form-group input-group col-md-4">
                <div class="input-group-prepend ">
                    <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
                </div>
                <select class="custom-select" style="max-width: 120px;">
                    <option selected="">+226</option>
                </select>
                <input wire:model="editData.telephone" name="telephone" class="form-control @error('editData.telephone') is-invalid @enderror"  placeholder="Telephone" type="text">
                
            </div>
        <div class="col-md-4">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="fa fa-lock"></i>
                        </span>                    
                    </div>
                    <input  type="password" wire:model="editData.password" class="form-control @error('editData.password') is-invalid @enderror"  placeholder="Mot de passe" required="required">
                
                
            </div>
        </div>
            
        </div>
    </form>
    <div class="card-footer">
        <button type="submit" class="btn btn-success float-right mr-2">Modifier</button>
    </div>
</div>
