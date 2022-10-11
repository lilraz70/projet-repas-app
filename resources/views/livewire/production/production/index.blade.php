@if($isBtnAddclicked)

<div class="row p-4 pt-5 d-flex justify-content-center">

    @include('livewire.production.production.create')

</div>
@elseif ($isBtnEditClicked)
<div class="row p-4 pt-5 d-flex justify-content-center">

    @include('livewire.production.production.edit')

</div>

@else
<div class="row p-4 pt-5 ">

    @include('livewire.production.production.liste')

</div>
@endif
