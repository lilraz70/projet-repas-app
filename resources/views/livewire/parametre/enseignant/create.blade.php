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
        <h3 class="card-title "><i class="fa-solid fa-square-plus mr-1"></i>Nouveau
            </h3>
    </div>

    <form role="form" wire:submit.prevent="insertInBd()">
        <div class="card-body">
            <div class="row g-3 mx-auto mt-3">
                <div class="col-md-6 mb-4">
                    <div><label for="d2">AnneScolaire  <span class="etoileObligatoire">*</span></label></div>
                    <select class="form-control select2" wire:model="newData.anne" required>
                        <option value="">-----------</option>
                        @foreach ($listsf2 as $list )
                        <option value="{{$list->anne}}">{{$list->anne}} </option>
                        @endforeach

                    </select>
                </div>
                <div class="col-md-4">
                    <div><label for="d2">Ecole <span class="etoileObligatoire">*</span></label></div>
                    <select class="form-control select2" wire:model="newData.idecole">
                        <option value="">-Ecole-Commune-Province</option>
                        @foreach ($listsf as $list )
                        <option value="{{$list->idecole}}">{{$list->libecole}} | {{$list->Ceb->Commune->libcommune}} |
                            {{$list->Ceb->Commune->Province->libprovince}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="d2">Total Garcon<span class="etoileObligatoire">*</span></label>
                    <input type="number" wire:model="newData.nbtg" class="form-control @error('newData.nbtg')
                is-invalid
            @enderror" placeholder="Total Garcon" required>
                </div>
                <div class="col-md-6 mb-4">
                    <label for="d2">Total Fille<span class="etoileObligatoire">*</span></label>
                    <input type="number" wire:model="newData.nbtf" class="form-control @error('newData.nbtf')
                is-invalid
            @enderror" placeholder="Total Fille" required>
                </div>
                <div class="col-md-4">
                    <label for="d2">Total Coges Garcon<span class="etoileObligatoire">*</span></label>
                    <input type="number" wire:model="newData.nbcg" class="form-control @error('newData.nbcg')
                is-invalid
            @enderror" placeholder="Total Coges Garcon" required>
                </div>
                <div class="col-md-4">
                    <label for="d2">Total Coges Fille<span class="etoileObligatoire">*</span></label>
                    <input type="number" wire:model="newData.nbcf" class="form-control @error('newData.nbcf')
                is-invalid
            @enderror" placeholder="Total Coges Fille" required>
                </div>

            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-success float-right mr-2">Ajouter</button>
        </div>
    </form>
</div>

<script src="{{ mix('js/app.js') }}"></script>

<script type="text/javascript">
    $(".select2").select2({
          placeholder: "Selectionner une ecole",
          allowClear: true
      });
</script>

