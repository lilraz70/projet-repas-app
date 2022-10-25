<div class=" p-2  ">

    <div class="card  ">
        <div class="card-header">
            <div class="btn-pdf">
                <a wire:click.prevent="exportPdf()" class="btn btn-success float-right"><i
                        class="fa-solid fa-file-pdf  fa-2xl"></i></a>
            </div>


            <div class="tabletitle">
                <h5 class="tabletitleh5">Déparasitage et supplémentation en vitamine A du 03 au 05 mai 2021</h5>
            </div>


        </div>

        <div class="card-body ">
            <div class="tablediv">
                <table>
                    <thead>

                        <tr>
                            <th>Province</th>
                            <th>CEB</th>
                            <th>NBRE D'ECOLE</th>
                            <th>EFF TOTAL</th>
                            <th>G</th>
                            <th>F</th>

                        </tr>

                    </thead>
                    <tbody>

                        @foreach ($listsf as $list)
                        <tr>
                            <tr>
                                <td rowspan="4">{{$list->libprovince}}</td>
                            </tr>
                               
    
                            <tr>
                                <td>2</td>
                                <td>3</td>
                                <td>4</td>
                                <td>5</td>
                                <td>6</td>
                            </tr>
    
                            <tr class="trtotal1">
                                <td>Total</td>
                                <td>2t</td>
                                <td>3t</td>
                                <td>4t</td>
                                <td>5t</td>
    
                            </tr>
    
                            </tr>
                        @endforeach
                        
                        {{--

                        <tr class="trtotal2">
                            <td>Total</td>
                            <td>2</td>
                            <td>3</td>
                            <td>4</td>
                            <td>5</td>
                            <td>6</td>

                        </tr> --}}


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
        margin-left: 20%;
        align-content: center;
    }

    table {
        border-collapse: collapse;
    }

    thead {
        background-color: #dee2e6;

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