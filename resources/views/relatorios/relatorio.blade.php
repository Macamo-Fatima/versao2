<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>

    <!-- Meta data -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta content="Admitro - Admin Panel HTML template" name="description">
    <meta content="Spruko Technologies Private Limited" name="author">
    <meta name="keywords" content="admin panel ui, user dashboard template, web application templates, premium admin templates, html css admin templates, premium admin templates, best admin template bootstrap 4, dark admin template, bootstrap 4 template admin, responsive admin template, bootstrap panel template, bootstrap simple dashboard, html web app template, bootstrap report template, modern admin template, nice admin template" />

    <!-- Title -->
    <title>Relatório</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">

    <style>
        .page-break {
            page-break-after: always;
        }

        body {
            padding-top: 2rem;
            padding-bottom: 2rem;
        }

        h3 {
            margin-top: 2rem;
        }

        .row {
            margin-bottom: 1rem;
        }

        .row .row {
            margin-top: 1rem;
            margin-bottom: 0;
        }

        [class*="col-"] {
            padding-top: 1rem;
            padding-bottom: 1rem;
            background-color: rgba(86, 61, 124, .15);
            border: 1px solid rgba(86, 61, 124, .2);
        }

        hr {
            margin-top: 2rem;
            margin-bottom: 2rem;
        }

        .explainer {
            color: #a5a5a5;
            font-size: 0.8rem;
            margin-bottom: 0px;
        }

        .push-sm-6,
        .push-xl-4,
        .pull-sm-8 {
            background-color: #98f8f1;
        }

        .invisible-content {
            padding: 5px;
            text-align: center;
        }

        /* add width to element with .center-block because its default is 100% */
        .my-cb {
            width: 200px;
            padding-top: 1rem;
            padding-bottom: 1rem;
            background-color: rgba(86, 61, 124, .15);
            border: 1px solid rgba(86, 61, 124, .2);
        }

        /* start of modification for 5 columns */
        @media (min-width: 768px) {

            .five-columns .col-md-2,
            .five-columns .col-sm-2,
            .five-columns .col-lg-2 {
                width: 20%;
            }
        }

        @media (min-width: 1200px) {

            .five-columns .col-md-2,
            .five-columns .col-sm-2,
            .five-columns .col-lg-2 {
                width: 20%;
            }
        }

        @media (min-width: 768px) and (max-width: 992px) {

            .five-columns .col-md-2,
            .five-columns .col-sm-2,
            .five-columns .col-lg-2 {
                width: 20%;
                float: left;
            }
        }

        /* end of modification for 5 columns */


        footer {
            position: fixed;
            bottom: -60px;
            left: 0px;
            right: 0px;
            height: 55px;
            font-weight: normal;
            background-color: none;
            text-align: left;
            line-height: 35px;
            font-style: italic;
            font-size: 10px;
        }

    </style>

</head>

<body>


    @php
    use Illuminate\Support\Facades\DB; 
    
    $id_avaliacao = $dados[0]->id;
    $somaDeCompetencias = DB::table('competences')
    ->where('id_avaliacao', $id_avaliacao)
    ->sum('competencia_funcionario');

    $contagemDeCompetencias = DB::table('competences')
    ->where('id_avaliacao', $id_avaliacao)
    ->count();

    $somaDeObjetivos = DB::table('objetives')
    ->where('id_avaliacao', $id_avaliacao)
    ->sum('objetivo_funcionario');

    $contagemDeObjetivos = DB::table('objetives')
    ->where('id_avaliacao', $id_avaliacao)
    ->count();


    $mediaObjetivos = $somaDeObjetivos/$contagemDeObjetivos;
    $mediaCompetencias = $somaDeCompetencias/$contagemDeCompetencias;

    @endphp



    @php
    if ($dados[0]->grupo_funcional == 'Quadros De Gestão' || $dados[0]->grupo_funcional == 'Quadros de gestão' || $dados[0]->grupo_funcional == 'quadros de gestão') {
    $pesoCompetencias = DB::table('pesos')
    ->where('grupo_funcional', $dados[0]->grupo_funcional)
    ->value('peso_competencias');

    $pesoObjetivos = DB::table('pesos')
    ->where('grupo_funcional', $dados[0]->grupo_funcional)
    ->value('peso_objetivos');

    $pontuacao = round(($mediaCompetencias) * ( $pesoCompetencias/100), 0) + round(($mediaObjetivos) * ($pesoObjetivos/100), 0) ;
    }
    if ($dados[0]->grupo_funcional == 'Quadros Altamente Qualificados' || $dados[0]->grupo_funcional == 'Quadros altamente qualificados' || $dados[0]->grupo_funcional == 'quadros altamente qualificados') {
    $pesoCompetencias = DB::table('pesos')
    ->where('grupo_funcional', $dados[0]->grupo_funcional)
    ->value('peso_competencias');

    $pesoObjetivos = DB::table('pesos')
    ->where('grupo_funcional', $dados[0]->grupo_funcional)
    ->value('peso_objetivos');

    $pontuacao = round(($mediaCompetencias) * ($pesoCompetencias/100), 0)+ round(($mediaObjetivos) * ($pesoObjetivos / 100), 0);
    }
    if ($dados[0]->grupo_funcional == 'Quadros Qualificados' || $dados[0]->grupo_funcional == 'Quadros qualificados' || $dados[0]->grupo_funcional == 'quadros qualificados') {
    $pesoCompetencias = DB::table('pesos')
    ->where('grupo_funcional', $dados[0]->grupo_funcional)
    ->value('peso_competencias');

    $pesoObjetivos = DB::table('pesos')
    ->where('grupo_funcional', $dados[0]->grupo_funcional)
    ->value('peso_objetivos');

    $pontuacao = round(($mediaCompetencias) * ( $pesoCompetencias / 100), 0) + round(($mediaObjetivos) * ($pesoObjetivos / 100), 0);
    }
    if ($dados[0]->grupo_funcional == 'Quadros de Apoio' || $dados[0]->grupo_funcional == 'Quadros de apoio' || $dados[0]->grupo_funcional == 'quadros de apoio') {
    $pesoCompetencias = DB::table('pesos')
    ->where('grupo_funcional', $dados[0]->grupo_funcional)
    ->value('peso_competencias');

    $pesoObjetivos = DB::table('pesos')
    ->where('grupo_funcional', $dados[0]->grupo_funcional)
    ->value('peso_objetivos');

    $pontuacao = round(($mediaCompetencias) * ($pesoCompetencias/ 100), 0) + round(($mediaObjetivos) * ($pesoObjetivos/ 100), 0);
    }
    if ($dados[0]->grupo_funcional == 'Quadros Auxiliares' || $dados[0]->grupo_funcional == 'Quadros auxiliares' || $dados[0]->grupo_funcional == 'quadros auxiliares') {
    $pesoCompetencias = DB::table('pesos')
    ->where('grupo_funcional', $dados[0]->grupo_funcional)
    ->value('peso_competencias');

    $pesoObjetivos = DB::table('pesos')
    ->where('grupo_funcional', $dados[0]->grupo_funcional)
    ->value('peso_objetivos');

    $pontuacao = round(($mediaCompetencias) * ($pesoCompetencias / 100), 0);
    }

    $percentagem = ($pontuacao*100)/5;
    @endphp



    <div class="text-center text-uppercase" style="margin-top: 2px;  margin-bottom: 2px">
        república de moçambique <br>
        ministério de administração estatal e função pública <br>
        instituto nacional de gestão de calamidades
    </div>

    <br>

    <div class="row" style="align-items: center">
        <div class="col-xs-12 text-uppercase text-center" style="padding: 0.5rem; margin:2px; background-color: rgba(0, 100, 0, 1); color: #ffffff;">caracterização</div>

    </div>



    <div class="row" style="align-items: center">
        <div class="col-xs-1 text-left" style="padding: 0.5rem; margin:2px;font-size: 10px">Nº</div>
        <div class="col-xs-2 text-lowercase" style="padding: 0.5rem; margin:2px;font-size: 10px"><?php $numero = '1' . date('u').'-'. rand(1, 999).'-'.$dados[0]->id; echo $numero ?></div>

        <div class="col-xs-3 text-left" style="padding: 0.5rem; margin:2px;font-size: 10px; background-color: transparent; border:none;"></div>
        <div class="col-xs-2 text-left" style="padding: 0.5rem; margin:2px;font-size: 10px">Avaliador</div>
        <div class="col-xs-3 text-capitalize" style="padding: 0.5rem; margin:2px;font-size: 10px">{{$dados[0]->usuario}}</div>
    </div>

    <div class="row" style="align-items: center">
        <div class="col-xs-1 text-left" style="padding: 0.5rem; margin:2px;font-size: 10px">Nome</div>
        <div class="col-xs-2 text-capitalize" style="padding: 0.5rem; margin:2px;font-size: 10px">{{$dados[0]->nome_completo}}</div>
        <div class="col-xs-3 text-left" style="padding: 0.5rem; margin:2px;font-size: 10px; background-color: transparent; border:none;"></div>
        <div class="col-xs-2 text-left" style="padding: 0.5rem; margin:2px;font-size: 10px">Tipo de avaliação</div>
        <div class="col-xs-3 text-capitalize" style="padding: 0.5rem; margin:2px;font-size: 10px">{{$dados[0]->tipo_avaliacao}}</div>
    </div>
    <div class="row" style="align-items: center">
        <div class="col-xs-1 text-left" style="padding: 0.5rem; margin:2px;font-size: 10px">Departamento</div>
        <div class="col-xs-2 text-capitalize" style="padding: 0.5rem; margin:2px;font-size: 10px">{{$dados[0]->departamento}}</div>
        <div class="col-xs-3 text-left" style="padding: 0.5rem; margin:2px;font-size: 10px; background-color: transparent; border:none;"></div>

        <div class="col-xs-2 text-left" style="padding: 0.5rem; margin:2px; font-size: 10px">Função</div>
        <div class="col-xs-3 text-capitalize" style="padding: 0.5rem; margin:2px; font-size: 10px">{{$dados[0]->nome_cargo}}</div>
    </div>
    <div class="row" style="align-items: center">
        <div class="col-xs-1 text-left" style="padding: 0.5rem; margin:2px; font-size: 10px">Data</div>
        <div class="col-xs-2 text-capitalize" style="padding: 0.5rem; margin:2px;font-size: 10px">{{Carbon\Carbon::parse($dados[0]->data)->format('d-m-Y')}}</div>
        <div class="col-xs-3 text-left" style="padding: 0.5rem; margin:2px;font-size: 10px; background-color: transparent; border:none;"></div>

        <div class="col-xs-2 text-left" style="padding: 0.5rem; margin:2px; font-size: 10px">Categoria</div>
        <div class="col-xs-3 text-capitalize" style="padding: 0.5rem; margin:2px; font-size: 10px">{{$dados[0]->grupo_funcional}}</div>

    </div>

    <div class="row" style="align-items: center">
        <div class="col-xs-1 text-left" style="padding: 0.5rem; margin:2px; font-size: 10px">Contato</div>
        <div class="col-xs-2 text-capitalize" style="padding: 0.5rem; margin:2px;font-size: 10px">{{$dados[0]->contato_prof}}</div>
        <div class="col-xs-3 text-left" style="padding: 0.5rem; margin:2px;font-size: 10px; background-color: transparent; border:none;"></div>

        <div class="col-xs-2 text-left" style="padding: 0.5rem; margin:2px; font-size: 10px">Email profissional</div>
        <div class="col-xs-3 text-lowercase" style="padding: 0.5rem; margin:2px; font-size: 10px">{{$dados[0]->email_prof}}</div>

    </div>

    <div class="row" style="align-items: center">
        <div class="col-xs-12 text-uppercase text-center" style="padding: 0.5rem; margin:2px; background-color: rgba(0, 100, 0, 1); color: #ffffff;">resumo da avaliação</div>
    </div>
    <div class="row" style="align-items: center">
        <div class="col-xs-2 text-left" style="padding: 0.5rem; margin:2px; font-size: 10px">Resultado final</div>
        <div class="col-xs-1 text-capitalize" style="padding: 0.5rem; margin:2px;font-size: 10px"> <?php echo $percentagem."%"  ?></div>
        <div class="col-xs-3 text-left" style="padding: 0.5rem; margin:2px;font-size: 10px; background-color: transparent; border:none;"></div>
        <div class="col-xs-2 text-left" style="padding: 0.5rem; margin:2px;font-size: 10px">Parecer final</div>
        <?php
                  if ($pontuacao >= 0 && $pontuacao < 2) { ?>
        <div class="col-xs-3 text-capitalize" style="padding: 0.5rem; margin:2px; font-size: 10px">
            A - Baixo
        </div>
        <?php } ?>

        <?php
                  if ($pontuacao >= 2 && $pontuacao < 3) { ?>
        <div class="col-xs-3 text-capitalize" style="padding: 0.5rem; margin:2px; font-size: 10px">
            B - Médio-Baixo
        </div>

        <?php } ?>
        <?php
                  if ($pontuacao >= 3 && $pontuacao < 4) { ?>
        <div class="col-xs-3 text-capitalize" style="padding: 0.5rem; margin:2px; font-size: 10px">
            C - Médio
        </div>
        <?php } ?>

        <?php
                  if ($pontuacao >= 4 && $pontuacao < 5) { ?>
        <div class="col-xs-3 text-capitalize" style="padding: 0.5rem; margin:2px; font-size: 10px">
            D - Médio-Alto
        </div>
        <?php } ?>

        <?php
                  if ($pontuacao >= 5 && $pontuacao < 7 ) { ?>
        <div class="col-xs-3 text-capitalize" style="padding: 0.5rem; margin:2px; font-size: 10px">
            E - Elevado ou Alto
        </div>
        <?php } ?>





    </div>
    {{-- <p style="font-size: 12px;">Escala de avaliação final</p> --}}
    <div class="row" style="align-items: center">
        <div class="col-xs-12 text-uppercase text-center" style="padding: 0.5rem; margin:2px; background-color: rgba(0, 100, 0, 1); color: #ffffff;">Escala de avaliação final</div>
    </div>

    <p> <small>Classificação do desempenho</small> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<small>Descrição</small></p>
    <table class="table table-bordered border-primary  table-condensed">
        <tbody>
            <tr>
                <th scope="row" style="font-size: 10px; background-color: rgba(0, 100, 0, 1); color: #ffffff;">A</th>
                <td style="font-size: 10px">Necessita de melhoria urgente</td>
                <td style="font-size: 10px">Possui um desempenho baixo no exercício das suas funções, necessita de apoio permanente para conseguir realizar seus trabalhos</td>
            </tr>
            <tr>
                <th scope="row" style="font-size: 10px; background-color: rgba(0, 100, 0, 1); color: #ffffff;">B</th>
                <td style="font-size: 10px">Necessita de desenvolvimento</td>
                <td style="font-size: 10px">Tem um desempenho dentro da média, refletindo a espectativa que tem sobre sí. Está apto para exercício das suas funções </td>
            </tr>
            <tr>
                <th scope="row" style="font-size: 10px; background-color: rgba(0, 100, 0, 1); color: #ffffff;">C</th>
                <td style="font-size: 10px">Cumpre</td>
                <td style="font-size: 10px">Tem um desempenho dentro da média, refletindo a expectativa que tem sobre sí. está apto para exercício das suas funções </td>
            </tr>
            <tr>
                <th scope="row" style="font-size: 10px; background-color: rgba(0, 100, 0, 1); color: #ffffff;">D</th>
                <td style="font-size: 10px">Excede</td>
                <td style="font-size: 10px">Possui um desempenho acima das expectativas, atuando como orientador e apoiante dos demais colegas sempre que necessário</td>
            </tr>
            <tr>
                <th scope="row" style="font-size: 10px; background-color: rgba(0, 100, 0, 1); color: #ffffff;">E</th>
                <td style="font-size: 10px">Excede largamente</td>
                <td style="font-size: 10px">Possui um desempenho acima das expectativas, atuando como orientador e apoiante dos demais colegas sempre que necessário</td>
            </tr>
        </tbody>
    </table>
    <div class="row" style="align-items: center">
        <div class="col-xs-12 text-uppercase text-center" style="padding: 0.5rem; margin:2px; background-color: rgba(0, 100, 0, 1); color: #ffffff;">desenvolvimento</div>
    </div>
    <p style="font-size: 10px">Ações de formação necessárias a melhoria do desempenho do colaborador</p>
    <div class="row" style="align-items: center">
        <div class="col-xs-12 text-left" style="padding: 0.5rem; margin:2px; font-size:1.5rem">
            <span style="font-size: 10px"> {{$dados[0]->acao}}</span>
        </div>
    </div>

    <div class="row" style="align-items: center">
        <div class="col-xs-12 text-uppercase text-center" style="padding: 0.5rem; margin:2px; background-color: rgba(0, 100, 0, 1); color: #ffffff;">comentários do avaliador</div>
    </div>
    <p style="font-size: 10px">Mencionar aspectos relevantes de balanço de desempenho que fundamentam a avaliação do desempenho do colaborador</p>
    <div class="row" style="align-items: center">
        <div class="col-xs-12 text-left" style="padding: 0.5rem; margin:2px; font-size:1.5rem">
            <span style="font-size: 10px"> {{$dados[0]->c_avaliador}}</span>
        </div>
    </div>
    <footer>
        <span>Documento processado por computador</span> &nbsp;
        <?php 
                    $timezone = new \DateTimeZone('Africa/Harare'); // Replace with the desired timezone
                    $dateTime = new \DateTime('now', $timezone);
                    $currentYear = $dateTime->format('Y');
                    $currentTime = $dateTime->format('H:i:s');
                   echo $currentDateTime = $dateTime->format('d-m-Y H:i:s');
                    ?>

    </footer>


    <div class="page-break"></div>
    <div class="text-center text-uppercase" style="margin-top: 2px;  margin-bottom: 2px">
        república de moçambique <br>
        ministério de administração estatal e função pública <br>
        instituto nacional de gestão de calamidades
    </div>
    <br>
    <div class="row" style="align-items: center">
        <div class="col-xs-12 text-uppercase text-center" style="padding: 0.5rem; margin:2px; background-color: rgba(0, 100, 0, 1); color: #ffffff;">comentários do avaliado</div>
    </div>
    <p style="font-size: 10px">Mencionar satisfação em relação à função, ambições profissionais, enventuais condicionantes do seu desempenho, etc</p>
    <div class="row" style="align-items: center">
        <div class="col-xs-12 text-left" style="padding: 0.5rem; margin:2px; font-size:1.5rem; font-family:sans-serif">
            <span style="font-size: 10px"> {{$dados[0]->c_avaliado}}</span>


        </div>
    </div>
    <br><br><br><br>
    <p style="font-size: 10px; font-weight: bolder">A preencher pelo avaliado</p>
    <p style="font-size: 10px; font-weight: normal">Concordo com avaliação efetuada</p>
    <div class="row" style="align-items: center">
        <div class="col-xs-2 text-left" style="padding: 0.5rem; margin:2px; font-size: 10px; background-color: transparent; border:none;"></div>
        <div class="col-xs-2 text-capitalize text-left" style="padding: 0.5rem; margin:2px;font-size: 10px; background-color: transparent; border:none;">Sim/Não</div>
        <div class="col-xs-1 text-left" style="padding: 0.5rem; margin:2px;font-size: 10px; background-color: transparent; border:none;"></div>
        <div class="col-xs-6 text-left" style="padding: 0.5rem; margin:2px;font-size: 10px;background-color: transparent; border:none;">Justificativa</div>
    </div>
    <table class="table table-bordered">
        <tr>
            <td style="width:10px; padding:20px">
            </td>
            <td style="width:90px; padding:20px">
            </td>
        </tr>

    </table>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <div class="text-center" style="margin-top: 2px;  margin-bottom: 2px; font-size: 10px;">
        <p> Assinatura do colaborador </p>

        _______________________________________________<br>
        <br>
        <p> ( {{$dados[0]->nome_completo}} )</p>

    </div>

    <footer style="color: rgb(75, 73, 73);">
        <span>Documento processado por computador</span> &nbsp;
        <?php 
                    $timezone = new \DateTimeZone('Africa/Harare'); // Replace with the desired timezone
                    $dateTime = new \DateTime('now', $timezone);
                    $currentYear = $dateTime->format('Y');
                    $currentTime = $dateTime->format('H:i:s');
                   echo $currentDateTime = $dateTime->format('d-m-Y H:i:s');
                    ?>


    </footer>


</body>
</html>
