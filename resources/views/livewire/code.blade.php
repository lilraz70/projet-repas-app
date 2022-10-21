
---------------------ajout reussi ------------------------

{{-- au niveau du controller / --}}

$this->dispatchBrowserEvent("showMessage", []);


{{-- au niveau du blade ajout  --}}


<script>
    window.addEventListener("showMessage", event=>{
    Swal.fire({
  position: 'top-end',
  icon: 'success',
  toat: true,
  title: 'Ajout reussi avec succès',
  showConfirmButton: false,
  timer:3000
})

})
</script>














----------------- suppression----------------------

       {{-- au niveau du controlleur  --}}



       {{-- au niveau du blade --}}















-------------------- list bootstrap et code blade-----------------



@if($isBtnAddclicked)

<div class="row p-4 pt-5 d-flex justify-content-center">

    @include('livewire.parametre.ceb.create')

</div>


@else
<div class="row p-4 pt-5 ">

    @include('livewire.parametre.ceb.liste')

</div>
@endif




pour les autres


<div class="row g-3 mx-auto mt-3">

    <div class="col-md-6 mb-4">

        or

        <div class="col-md-4">




            <div class="input-group mb-3">
    
                <span class="etoileObligatoire">*</span>