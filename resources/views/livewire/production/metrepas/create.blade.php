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
        <button type="button" wire:click="goToList()" class="btn btn-success float-right"><i
                class="fa-solid fa-circle-left"></i></button>
        <h3 class="card-title"><i class="fa-solid fa-square-plus mr-1"></i>Nouveau
            Met Repas</h3>
    </div>

    <form role="form" wire:submit.prevent="insertInBd()">
        <div class="card-body table-responsive p-0" style="height:350px;">
           
        {{-- <div class="card-body"> --}}
            
            <div class="row g-3 mx-auto mt-3">
                <div class="col-md-6 mb-4">
                    <label for="d2">Met repas  <span class="etoileObligatoire">*</span></label>
                    <input type="text" wire:model.lazy="newData.libmetrepas" class="form-control" placeholder="Met repas"
                        required>
                </div>
                <div class="col-md-6 mb-4">
                    <label for="d2">Observation</label>
                    <input type="text" wire:model="newData.observation" class="form-control"
                        placeholder="Observation">
                </div>
                <div class="col-md-6 mb-4"> 
                   
                        <label class="required" for="ingredients">Plantes <span class="etoileObligatoire">*</span></label>
                        {{-- <table> --}}
                        <table class="table table-head-fixed text-nowrap">
                            @foreach($listsf as $ingredient)
                            <tr>
                                <td>
                                    <input data-id="{{ $ingredient->idplante }}" type="checkbox"
                                        class="ingredient-enable">
                                </td>
                                <td>
                                    {{ $ingredient->libplante }}
                                </td>
                                <td>
                                    <input data-id="{{ $ingredient->idplante }}"
                                        wire:model.defer="newDatap.{{ $ingredient->idplante }}" type="number"
                                        class="ingredient-amount form-control" placeholder="Quantite" disabled>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                   
                </div>
                <div class="col-md-6 mb-4"> 
                   
                    <label class="required" for="ingredients">Vivres <span class="etoileObligatoire">*</span></label>
                        
                        <table class="table table-head-fixed text-nowrap">
                        @foreach($listsf2 as $ingredient)
                        <tr>
                            <td>
                                <input data-id="{{ $ingredient->idvivre }}" type="checkbox"
                                    class="ingredient-enable">
                            </td>
                            <td>
                                {{ $ingredient->libvivres }}
                            </td>
                            <td>
                                <input data-id="{{ $ingredient->idvivre }}"
                                    wire:model.defer="newDatav.{{ $ingredient->idvivre }}" type="number"
                                    class="ingredient-amount form-control" placeholder="Quantite" disabled>
                            </td>
                        </tr>
                        @endforeach
                    </table>
            </div>
            </div>
            
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-success float-right mr-2">Ajouter</button>
        </div>
    </form>
</div>

{{-- A inclure si j'utilise du js comme jquery --}}

<script src="{{ mix('js/app.js') }}"></script>
<script>
    $('document').ready(function () {
        $('.ingredient-enable').on('click', function () {
            let id = $(this).attr('data-id')
            let enabled = $(this).is(":checked")
            $('.ingredient-amount[data-id="' + id + '"]').attr('disabled', !enabled)
            $('.ingredient-amount[data-id="' + id + '"]').val(null)
        });
    });
</script>