@if($isBtnAddclicked)

<div class="  pt-5 d-flex justify-content-center">

    @include('livewire.gestion.champs.create')

</div>
@elseif ($isBtnEditClicked)
<div class="row p-4 pt-5 d-flex justify-content-center">

    @include('livewire.gestion.champs.edit')

</div>
@else
<div class="row p-4 pt-5 ">

    @include('livewire.gestion.champs.liste')

</div>
@endif
