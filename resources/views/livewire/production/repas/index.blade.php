@if($isBtnAddclicked)

<div class="row p-4 pt-5 d-flex justify-content-center">

    @include('livewire.production.repas.create')

</div>

@elseif ($isBtnEditClicked)
<div class="row p-4 pt-5 d-flex justify-content-center">

    @include('livewire.production.repas.edit')

</div>
@else
<div class="row p-4 pt-5 ">

    @include('livewire.production.repas.liste')

</div>
@endif


