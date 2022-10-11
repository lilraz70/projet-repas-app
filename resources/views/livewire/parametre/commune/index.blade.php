@if($isBtnAddclicked)

<div class="row p-4 pt-5 d-flex justify-content-center">

    @include('livewire.parametre.commune.create')

</div>
@elseif ($isBtnEditClicked)
<div class="row p-4 pt-5 d-flex justify-content-center">

    @include('livewire.parametre.commune.edit')

</div>

@else
<div class="row p-4 pt-5 ">

    @include('livewire.parametre.commune.liste')

</div>
@endif
