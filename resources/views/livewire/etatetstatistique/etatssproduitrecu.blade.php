<div class=" p-2  ">

    <div class="card  ">
        <div class="card-header">
            <div class="btn-pdf">
                <a wire:click.prevent="exportPdf()" class="btn btn-success float-right"><i
                        class="fa-solid fa-file-pdf  fa-2xl"></i></a>
            </div>


            <div class="tabletitle">
                <h5 class="tabletitleh5">Situation des produits reçus</h5>
            </div>

            <div class="tablechoixdiv">

                <label class=" choixlabel" for="">
                    Année scolaire :
                    <select class="" wire:model.lazy="annescolaire" required>
                        <option value="">-------</option>
                        @foreach ($listsf3 as $list )
                        <option value="{{$list->anne}}">{{$list->anne}}</option>
                        @endforeach

                    </select>
                </label>
            </div>
        </div>

        <div class="card-body ">
            <div class="tablediv">
                <table>
                    <thead>

                        <tr>
                            <th>Désignation des produits</th>
                            <th>Quantités reçus </th>
                            <th>Quantités distribuées</th>
                            <th>Quantités restantes </th>
                            <th>Quantités remises aux CSPS </th>
                        </tr>


                    </thead>
                    <tbody>
                        @foreach ($etatGlobals as $etat )
                       
                        <tr>
                            <td>{{$etat->libmedicament}}</td>
                            <td>{{$etat->qrecue}}</td>
                            <td>{{$etat->qdistribuee}}</td>
                            <td>{{$etat->qrecue - $etat->qdistribuee}}</td>
                            <td>{{$etat->qrecue}}</td>
                        </tr>
                        @endforeach
                       

                    </tbody>
                </table>
            </div>
            <div class="tablechoixdiv2">
                <span class="">* Commentaires sur la distribution des produits :
                    ...................................................................................................................</span>
            </div>
            <div class="tablechoixdiv2">
                <span class="">* Suggestion pour améliorer la distribution:
                    .....................................................................................................</span>
            </div>
            <div class="tablechoixdiv">
                <span class="choixlabel">Fait à : ..............................</span>
                <span class="choixlabel">le : ....................................</span>
            </div>
            <div>
                <span class="tablechoixdiv3">le Directeur provincial</span>
            </div>
        </div>
    </div>

</div>

{{--STYLE DE LA PAGE A CAUSE DE L IMPRESSION --}}

<style>
    /* table title */

    .tabletitle {
        background-color: #f4a261;
        align-content: center;
        text-align: center;
        margin-left: 15%;
        margin-right: 15%;
        padding-bottom: 15px;
        border: solid #333;

    }

    .tabletitleh5 {
        font-weight: bold;
    }

    /* tablechoix */

    .tablechoix {
        margin-top: 30px;
        display: inline-block;


    }

    .tablechoixdiv {
        margin-top: 10px;
      
        margin-top: 30px;
    }

    .tablechoixdiv2 {
        display: block;
        font-weight: bold;
        margin-bottom: 30px;
    }

    .tablechoixdiv3 {
        margin-top: 30px;
        margin-left: 20%;
        font-weight: bold;
    }

    .choixlabel {
        margin-right: 50px;
        font-weight: bold;
    }

    .tablediv {
        margin-top: 10px;
        margin-bottom: 20px;
        align-content: center;
    }

    table,
    thead {


        border-collapse: collapse;
    }


    td,
    th {
        padding: 6px;
        /* font-size: 20px; */
        text-align: center;
        height: 50px;
        border: 1px solid #333;
    }

    tr:hover {
        background-color: green;
    }
</style>