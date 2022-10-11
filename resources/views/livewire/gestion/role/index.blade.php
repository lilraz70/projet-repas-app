@if($isBtnAddclicked)

<div class="row p-4 pt-5 d-flex justify-content-center">

    @include('livewire.gestion.role.create')

</div>

@elseif ($isBtnEditClicked)
<div class="row p-4 pt-5 d-flex justify-content-center">

    @include('livewire.gestion.role.edit')

</div>
@else
<div class="row p-4 pt-5 ">

    @include('livewire.gestion.role.liste')

</div>
@endif
