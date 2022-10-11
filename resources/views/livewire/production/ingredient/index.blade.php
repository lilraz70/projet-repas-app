@if($isBtnAddclicked)

<div class="row p-4 pt-5 d-flex justify-content-center">

    @include('livewire.production.ingredient.create')
</div>


@else
<div class="row p-4 pt-5 ">

    @include('livewire.production.ingredient.liste')

</div>
@endif