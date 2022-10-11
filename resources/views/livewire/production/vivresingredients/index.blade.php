@if($isBtnAddclicked)

<div class="row p-4 pt-5 d-flex justify-content-center">

    @include('livewire.production.vivresingredients.create')


</div>
@elseif ($isBtnEditClicked)
<div class="row p-4 pt-5 d-flex justify-content-center">

    @include('livewire.parametre.vivresingredients.edit')

</div>

@else
<div class="row p-4 pt-5 ">

    @include('livewire.production.vivresingredients.liste')

</div>
@endif

