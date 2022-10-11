@if($isBtnAddclicked)

<div class="row p-4 pt-5 d-flex justify-content-center">

    @include('livewire.hygiene.soins.create')

</div>


@else
<div class="row p-4 pt-5 ">

    @include('livewire.hygiene.soins.liste')

</div>
@endif