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
        <h3 class="card-title "><i class="fa-solid fa-square-plus mr-1"></i>Nouveau Utilisateur</h3>
    </div>

    <form role="form" wire:submit.prevent="insertInBd()">
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
                    <input  wire:model="newData.name" type="text" class="form-control @error('newData.name') is-invalid @enderror"   placeholder="Nom et Prenom (obligatoire)" required="required">
                
                </div>
            </div>
    
            <div class="col-md-4">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <span class="fa fa-user-circle"></span>
                        </span>                    
                    </div>
                    <input wire:model="newData.login" type="text" class="form-control @error('newData.login') is-invalid @enderror"   placeholder="Login (obligatoire)" required="required">
                
                
                </div>
            </div>
    
            <div class="col-md-4 mb-4">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="fa fa-envelope"></i>
                        </span>                    
                    </div>
                    <input wire:model="newData.email" type="email" class="form-control @error('newData.email') is-invalid @enderror"  placeholder="Adresse Email (obligatoire)" required="required">
                     
                </div>
                
            </div>
    
            <div class="form-group input-group col-md-4">
                <div class="input-group-prepend ">
                    <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
                </div>
                <select class="custom-select" style="max-width: 120px;">
                    <option selected="">+226</option>
                </select>
                <input type="text" wire:model="newData.telephone"  class="form-control @error('newData.telephone') is-invalid @enderror"  placeholder="Telephone (obligatoire)" >
                
            </div>
        <div class="col-md-4">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="fa fa-lock"></i>
                        </span>                    
                    </div>
                    <input  type="password" wire:model="newData.password" class="form-control  @error('newData.password') is-invalid @enderror"  placeholder="Mot de passe (obligatoire)" required="required">
            </div>
        </div>
            
        </div>
    </form>
    <div class="card-footer">
        <button type="submit" class="btn btn-success float-right mr-2">Ajouter</button>
    </div>
</div>
