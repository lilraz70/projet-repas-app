@if($isBtnAddclicked)

<div class="row p-4 pt-5 d-flex justify-content-center">

    @include('livewire.gestion.usersroles.create')

</div>
@elseif ($isBtnEditClicked)
<div class="row p-4 pt-5 d-flex justify-content-center">

    @include('livewire.parametre.usersroles.edit')

</div>

@else
<div class="row p-4 pt-5 ">

    @include('livewire.gestion.usersroles.liste')

</div>
@endif