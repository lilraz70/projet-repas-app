@if($isBtnAddclicked)

<div class="row p-4 pt-5 d-flex justify-content-center">

    @include('livewire.production.metrepas.create')

</div>
@elseif ($isBtnEditClicked)
<div class="row p-4 pt-5 d-flex justify-content-center">

    @include('livewire.production.metrepas.edit')

</div>

@else
<div class="row p-4 pt-5 ">

    @include('livewire.production.metrepas.liste')

</div>
@endif