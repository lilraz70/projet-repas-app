@if($isBtnAddclicked)

<div class="row p-4 pt-5 d-flex justify-content-center">

    @include('livewire.hygiene.dispositifecole.create')

</div>
@elseif ($isBtnEditClicked)
<div class="row p-4 pt-5 d-flex justify-content-center">

    @include('livewire.hygiene.dispositifecole.edit')

</div>

@else
<div class="row p-4 pt-5 ">

    @include('livewire.hygiene.dispositifecole.liste')

</div>
@endif
