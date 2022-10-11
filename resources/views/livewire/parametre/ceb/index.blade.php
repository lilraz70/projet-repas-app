@if($isBtnAddclicked)

<div class="row p-4 pt-5 d-flex justify-content-center">

    @include('livewire.parametre.ceb.create')

</div>
@elseif ($isBtnEditClicked)
<div class="row p-4 pt-5 d-flex justify-content-center">

    @include('livewire.parametre.ceb.edit')

</div>

@else

<div class="row p-4 pt-5 ">

    @include('livewire.parametre.ceb.liste')

</div>
@endif
