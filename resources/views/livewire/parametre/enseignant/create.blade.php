<!DOCTYPE html>
<html lang="fr">

<head>
 
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet"/>

</head>
<body>
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
            Ecole</h3>
    </div>

    <form role="form" wire:submit.prevent="insertInBd()">
        <div class="card-body">
            <div class="row g-3 mx-auto mt-3">
                <div class="col-md-6 mb-4">
                <div><label for="d2">AnneScolaire</label></div>
                <select class="form-control " wire:model="newData.anne" required >
                    <option value="">-----------</option>
                    @foreach ($listsf2 as $list )
                    <option value="{{$list->anne}}">{{$list->anne}} </option>
                    @endforeach

                </select>
            </div>
            <div class="col-md-4">
                <div><label for="d2">Ecole</label></div>
                <select class="form-control" wire:model="newData.idecole" id="nameid">
                    <option value="">-Ecole-Commune-Province</option>
                    @foreach ($listsf as $list )
                    <option value="{{$list->idecole}}">{{$list->libecole}} | {{$list->Ceb->Commune->libcommune}} | {{$list->Ceb->Commune->Province->libprovince}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <label for="d2">Total Garcon</label>
                <input type="number" wire:model="newData.nbtg" class="form-control @error('newData.nbtg')
                is-invalid
            @enderror" placeholder="Total Garcon" required>
            </div>
            <div class="col-md-6 mb-4">
                <label for="d2">Total Fille</label>
                <input type="number" wire:model="newData.nbtf" class="form-control @error('newData.nbtf')
                is-invalid
            @enderror" placeholder="Total Fille" required>
            </div>
            <div class="col-md-4">
                <label for="d2">Total Coges Garcon</label>
                <input type="number" wire:model="newData.nbcg" class="form-control @error('newData.nbcg')
                is-invalid
            @enderror" placeholder="Total Coges Garcon" required>
            </div>
            <div class="col-md-4">
                <label for="d2">Total Coges Fille</label>
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
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script type="text/javascript">

    $("#nameid").select2({
          placeholder: "Select a Name",
          allowClear: true
      });
</script>

</body>