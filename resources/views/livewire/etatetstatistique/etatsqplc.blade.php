<div class=" p-2  ">

    <div class="card  ">
        <div class="card-header">
            <div class="btn-pdf">
                <a wire:click.prevent="exportPdf()" class="btn btn-success float-right"><i
                        class="fa-solid fa-file-pdf  fa-2xl"></i></a>
            </div>


            <div class="tabletitle">
                <h5 class="tabletitleh5">Quantités de produits locaux récoltés dans les champs scolaires An 1</h5>
            </div>


        </div>

        <div class="card-body ">
            <div class="tablediv">
                <table>
                    <thead>

                        <tr class="thead1">
                            <th>Province</th>
                            <th>CEB</th>
                            <th colspan="3">Céréales (en Kg)</th>
                            
                            <th colspan="3">Légumineuses et oléagineuses (en Kg)</th>
                            
                            <th>TOTAL GENERAL</th>
                        </tr>
                        <tr>
                            <th></th>
                            <th></th>
                            <th>Maïs</th>
                            <th>Sorgho</th>
                            <th>Mil</th>
                            <th>Niébé </th>
                            <th>Soja
                                Mougbing
                                </th>
                            <th>Arachide
                                Sésame
                                Gombo et
                                autres</th>
                            <th>Total(en
                                Kg)
                                </th>

                        </tr>

                    </thead>
                    <tbody>

                        <tr>
                            <td rowspan="2">Province</td>
                            <td>CEB</td>
                            <td>3</td>
                            <td>4</td>
                            <td>5</td>
                            <td>6</td>
                            <td>6</td>
                            <td>6</td>
                            <td>6</td>

                        </tr>
                        <tr class="trtotal1">
                            <td>Total</td>
                            <td>2</td>
                            <td>3</td>
                            <td>4</td>
                            <td>5</td>
                            <td>6</td>
                            <td>6</td>
                            <td>6</td>
                            

                        </tr>
                        <tr class="trtotal2">
                            <td>Total</td>
                            <td>2</td>
                            <td>3</td>
                            <td>4</td>
                            <td>5</td>
                            <td>6</td>
                            <td>6</td>
                            <td>6</td>
                            <td>6</td>

                        </tr>


                    </tbody>
                </table>
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

    .trtotal1 {
        background-color: #fcd5ce;
       
    }

    .trtotal2 {
        background-color: #b7e4c7;

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

    }

    .choixlabel {
        margin-right: 50px;
        font-weight: bold;
    }

    .tablediv {

        margin-top: 10px;
        margin-left:5%;
        align-content: center;
    }

    table,thead {
        border-collapse: collapse;
    }

    thead1 {
        background-color: #dee2e6;

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