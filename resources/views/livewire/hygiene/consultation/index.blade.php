@if($isBtnAddclicked)

<div class="row p-4 pt-5 d-flex justify-content-center">

    @include('livewire.hygiene.consultation.create')

</div>
@elseif ($isBtnEditClicked)
<div class="row p-4 pt-5 d-flex justify-content-center">

    @include('livewire.Hygiene.consultation.edit')

</div>

@else
<div class="row p-4 pt-5 ">

    @include('livewire.hygiene.consultation.liste')

</div>
@endif