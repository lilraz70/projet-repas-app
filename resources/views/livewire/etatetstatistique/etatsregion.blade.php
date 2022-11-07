<div class=" p-2 ">
    @if (session()->has('erreur2'))
    <div class="alert alert-danger">
        {{ session('erreur2') }}
    </div>
    @endif
    <div class="card  ">
        <div class="card-header">
            <div class="btn-pdf">
                <a wire:click.prevent="exportPdf()" class="btn btn-success float-right"><i
                        class="fa-solid fa-file-pdf  fa-2xl"></i></a>
            </div>


            <div class="tabletitle">
                <h5 class="tabletitleh5">Fiche synthèse de distribution des produits aux élèves : Niveau Ceb</h5>
            </div>

            <div class="tablechoix">

                <div class="tablechoixdiv">
                    <span class="choixlabel" for="">Region de :
                        <select class="" wire:model.lazy="region" required>
                            <option value="">-------</option>
                            @foreach ($listsf2 as $list )
                            <option value="{{$list->idregion}}">{{$list->libregion}}</option>
                            @endforeach

                        </select></span>
            
                    <span class="choixlabel">Effectif total Elèves :{{$detail['detail']['nbtotal'] ?? ''}}</span>
                    <span class="choixlabel">Garçon : {{$detail['detail']['nbgarcon'] ?? ''}}</span>
                    <span class="choixlabel">Filles : {{$detail['detail']['nbfille'] ?? ''}}</span>
                </div>


                <div class="tablechoixdiv">
                    
                    <label class=" choixlabel " for="">
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
        </div>

        <div class="card-body ">
            <div class="tablediv">
                <table>
                    <thead>

                        <tr>
                            <th rowspan="2">Province</th>
                            <th colspan="3">Effectifs</th>
                            <th colspan="3">Nbre d'El. à 16 prises de fer</th>
                            <th colspan="3">Nbre d'El. à moins de 16 prises de fer</th>
                            <th colspan="3">Nbre d'El. à 2 prises d'Alb</th>
                            <th colspan="3">Nbre d'El. à 1 prise d'Alb</th>
                            <th colspan="3">Nbre d'El. à 2 prises de vit. A</th>
                            <th colspan="3">Nbre d'El. à 1 prise de vit. A</th>
                            <th rowspan="2">Observation</th>
                        </tr>
                        <tr>


                            <th>G</th>
                            <th>F</th>
                            <th>T</th>
                            <th>G</th>
                            <th>F</th>
                            <th>T</th>
                            <th>G</th>
                            <th>F</th>
                            <th>T</th>
                            <th>G</th>
                            <th>F</th>
                            <th>T</th>
                            <th>G</th>
                            <th>F</td>
                            <th>T</th>
                            <th>G</th>
                            <th>F</th>
                            <th>T</th>
                            <th>G</th>
                            <th>F</th>
                            <th>T</th>

                        </tr>

                    </thead>
                    <tbody>
                        @foreach ($etatGlobals as $key=>$value)
                        <tr>
                            <td>{{$key}}</td>
                            <td>{{$value['effectif']['g']}}</td>
                            <td>{{$value['effectif']['f']}}</td>
                            <td>{{$value['effectif']['t']}}</td>
                            <td>{{$value['nb_16_fer']['g']}}</td>
                            <td>{{$value['nb_16_fer']['f']}}</td>
                            <td>{{$value['nb_16_fer']['t']}}</td>
                            <td>{{$value['nb_moins_16_fer']['g']}}</td>
                            <td>{{$value['nb_moins_16_fer']['f']}}</td>
                            <td>{{$value['nb_moins_16_fer']['t']}}</td>
                            <td>{{$value['nb_2_alb']['g']}}</td>
                            <td>{{$value['nb_2_alb']['f']}}</td>
                            <td>{{$value['nb_2_alb']['t']}}</td>
                            <td>{{$value['nb_1_alb']['g']}}</td>
                            <td>{{$value['nb_1_alb']['f']}}</td>
                            <td>{{$value['nb_1_alb']['t']}}</td>
                            <td>{{$value['nb_1_vita']['g']}}</td>
                            <td>{{$value['nb_1_vita']['f']}}</td>
                            <td>{{$value['nb_1_vita']['t']}}</td>
                            <td>{{$value['nb_2_vita']['g']}}</td>
                            <td>{{$value['nb_2_vita']['f']}}</td>
                            <td>{{$value['nb_2_vita']['t']}}</td>
                            <td></td>
                        </tr>
                        @endforeach




                        {{-- <tr>
                            <td>Total</td>
                            <td>2</td>
                            <td>3</td>
                            <td>4</td>
                            <td>5</td>
                            <td>6</td>
                            <td>7</td>
                            <td>8</td>
                            <td>9</td>
                            <td>10</td>
                            <td>11</td>
                            <td>22</td>
                            <td>13</td>
                            <td>14</td>
                            <td>15</td>
                            <td>16</td>
                            <td>17</td>
                            <td>18</td>
                            <td>19</td>
                            <td>20</td>
                            <td>21</td>
                            <td>22</td>
                            <td>23</td>
                        </tr> --}}

                        {{-- 10 l --}}
                        {{--
                        <tr>
                            <td colspan="4">Pourcentage</td>
                            <td>5</td>
                            <td>6</td>
                            <td>7</td>
                            <td>8</td>
                            <td>9</td>
                            <td>10</td>
                            <td>11</td>
                            <td>22</td>
                            <td>13</td>
                            <td>14</td>
                            <td>15</td>
                            <td>16</td>
                            <td>17</td>
                            <td>18</td>
                            <td>19</td>
                            <td>20</td>
                            <td>21</td>
                            <td>22</td>
                            <td>23</td>
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

    .tabletitleh5 {
        font-weight: bold;
    }

    /* tablechoix */

    .tablechoix {
        margin-top: 30px;
        display: inline-block;


    }

    .tablechoixdiv {
        margin-top: 30px;


    }

    .choixlabel {
        margin-right: 50px;
        font-weight: bold;
    }

    .tablediv {
        margin-top: 10px;
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