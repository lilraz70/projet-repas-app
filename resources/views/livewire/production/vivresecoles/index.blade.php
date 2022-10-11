@if($isBtnAddclicked)

<div class="row p-4 pt-5 d-flex justify-content-center">

    @include('livewire.production.vivresecoles.create')

</div>

@elseif ($isBtnEditClicked)
<div class="row p-4 pt-5 d-flex justify-content-center">

    @include('livewire.production.vivresecoles.edit')

</div>
@else
<div class="row p-4 pt-5 ">

    @include('livewire.production.vivresecoles.liste')

</div>
@endif