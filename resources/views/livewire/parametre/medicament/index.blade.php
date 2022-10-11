@if($isBtnAddclicked)

<div class="row p-4 pt-5 d-flex justify-content-center">

    @include('livewire.parametre.medicament.create')

</div>
@elseif ($isBtnEditClicked)
<div class="row p-4 pt-5 d-flex justify-content-center">

    @include('livewire.parametre.medicament.edit')

</div>

@else
<div class="row p-4 pt-5 ">

    @include('livewire.parametre.medicament.liste')

</div>
@endif