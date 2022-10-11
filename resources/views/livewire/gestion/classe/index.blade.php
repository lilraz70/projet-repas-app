@if($isBtnAddclicked)

<div class="row p-4 pt-5 d-flex justify-content-center">

    @include('livewire.gestion.classe.create')

</div>
@elseif ($isBtnEditClicked)
<div class="row p-4 pt-5 d-flex justify-content-center">

    @include('livewire.gestion.classe.edit')

</div>

@else
<div class="row p-4 pt-5 ">

    @include('livewire.gestion.classe.liste')

</div>
@endif