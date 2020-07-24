<?
session_start();
include "mysqlconecta.php";
include "mysqlexecuta.php";
//include "valida.php";
$pg = $_GET['pg'];
$sql_evento = "SELECT * FROM tb_evento";
$res_evento = mysqlexecuta($id,$sql_evento);
$row_evento = mysql_fetch_array($res_evento);
$id_usuario = $_SESSION['usuario'];
if($id_usuario==NULL){
   echo "<meta http-equiv='refresh' content=0;url='./login.php'>";
exit();
}
?>

<!DOCTYPE html>

<html class="<? echo $row_evento['cor']; ?>">

  <head>

    <title>FMSYS</title>

    <meta charset="UTF-8">

    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">

    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

    <meta name="description" content="Insira aqui a descrição da página.">

    <link href="/fmsys/struct/stylesheets/locastyle.css" rel="stylesheet" type="text/css">

    <link rel="icon" sizes="192x192" href="/fmsys/struct/images/ico-boilerplate.png">

    <link rel="apple-touch-icon" href="/fmsys/struct/images/ico-boilerplate.png">

  </head>

  <body>

    <div class="ls-topbar ">



  <!-- Barra de Notificações -->

  <div class="ls-notification-topbar">



    <!-- Links de apoio -->

    <div class="ls-alerts-list">

      <a href="#" class="ls-ico-bell-o" data-counter="8" data-ls-module="topbarCurtain" data-target="#ls-notification-curtain"><span>Notificações</span></a>

      <a href="#" class="ls-ico-bullhorn" data-ls-module="topbarCurtain" data-target="#ls-help-curtain"><span>Ajuda</span></a>

      <a href="#" class="ls-ico-question" data-ls-module="topbarCurtain" data-target="#ls-feedback-curtain"><span>Sugestões</span></a>

    </div>



    <!-- Dropdown com detalhes da conta de usuário -->

    <div data-ls-module="dropdown" class="ls-dropdown ls-user-account">

      <a href="#" class="ls-ico-user">

        <!--img src="/fmsys/struct/images/locastyle/avatar-example.jpg" alt="" /-->

        <span class="ls-name"><? echo utf8_encode($row_usuario['nome']); ?></span>

      </a>



      <nav class="ls-dropdown-nav ls-user-menu">

        <ul>

          <li><a href="logout.php">Sair</a></li>

         </ul>

      </nav>

    </div>

  </div>



  <span class="ls-show-sidebar ls-ico-menu"></span>



  <!--a href="/locawebstyle/documentacao/exemplos//pre-painel"  class="ls-go-next"><span class="ls-text">Voltar à lista de serviços</span></a-->



  <!-- Nome do produto/marca com sidebar -->

    <h1 class="ls-brand-name">

      <a href="home" class="ls-ico-earth">

        <small>FMSYS</small>

        <? echo $row_evento['sigla']; ?>

      </a>

    </h1>



  <!-- Nome do produto/marca sem sidebar quando for o pre-painel  -->

</div>





    <aside class="ls-sidebar">



  <div class="ls-sidebar-inner">

<!--      <a href="/locawebstyle/documentacao/exemplos//pre-painel"  class="ls-go-prev"><span class="ls-text">Voltar à lista de serviços</span></a>--->



      <nav class="ls-menu">

        <ul>

           <li><a href="./principal_admin.php?pg=home.php" class="ls-ico-home" title="Home">Home</a></li>

           <li>

           <a href="./principal_admin.php?pg=aparencia.php" class="ls-ico-pencil" title="Apar&eecirc;ncia">Evento</a>

            <ul>

                <li><a href="./principal_admin.php?pg=aparencia.php" title="Dados do Eventos"> Dados do Evento</a></li>

            </ul>

           </li>

           <li>

            <a href="./principal_admin.php?pg=consulta_inscritos.php" class="ls-ico-user" title="Inscritos">Inscritos</a>

                <ul>
                    <li><a href="./principal_admin.php?pg=consulta_inscritos.php" title="Consulta Inscritos"> Consulta Inscritos</a></li>
                    <li><a href="./principal_admin.php?pg=inscritos_cursos.php" title="inscritos Cursos"> Inscritos Cursos</a></li>
                    <li><a href="./principal_admin.php?pg=consulta_inscritos_pagamento.php" title="Consulta Inscritos"> Inscritos N&atilde;o Pagos</a></li>
                    <li><a href="./principal_admin.php?pg=analise.php" title="Valida Categorias"> Validar Categorias </a></li>
                    <li><a href="./exportar_inscritos.php" target="_blank" title="Exportar Inscritos"> Exportar Inscritos </a></li>
                </ul>

           </li>

           <li>

            <a href="./principal_admin.php?pg=consulta_trabalhos.php" class="ls-ico-pencil" title="Trabalhos">Trabalhos</a>

                <ul>

                    <li><a href="./principal_admin.php?pg=consulta_trabalhos.php" title="Consulta Trabalhos"> Consulta Trabalhos</a></li>

                    <li><a href="./principal_admin.php?pg=consulta_trabalhos_nome.php" title="Consulta Trabalhos Nome"> Consulta Trabalhos - Nome</a></li>

                    <li><a href="./principal_admin.php?pg=consulta_trabalhos_avaliacao.php" title="Trabalhos Para Avaliacao"> Trabalhos Para Avaliação</a></li>

                    <li><a href="./principal_admin.php?pg=consulta_trabalhos_pagos.php" title="Consulta Trabalhos Não Pagos"> Consulta Trabalhos - Não Pagos</a></li>

                    <li><a href="./lista_trabalhos.php" target="_blank" title="Lista Trabalhos"> Lista de Trabalhos</a></li>
                    <li><a href="./lista_trabalhos_jovem.php" target="_blank" title="Lista Autores"> Lista de Trabalhos Jovem</a></li>

                    <li><a href="./lista_autores.php" target="_blank" title="Lista Autores"> Lista de Autores</a></li>

                    <li><a href="./exportar_trabalhos.php" target="_blank" title="Exportar Trabalhos"> Exportar Trabalhos</a></li>
                    <li><a href="./todos_trabalhos_pdf.php" target="_blank" title="Exportar Trabalhos PDF"> Todos Trabalhos-PDF</a></li>

                </ul>

           </li>

           

           <li>

            <a href="./principal_admin.php?pg=pagamentos.php" class="ls-ico-cart" title="Pagamentos">Pagamentos</a>

                <ul>

                    <li><a href="./principal_admin.php?pg=lista_boletos.php" title="Boletos">Lista Boletos</a></li>

                    <li><a href="./principal_admin.php?pg=baixa_pagamento.php" title="Baixa Pagamento"> Baixa Pagamento </a></li>

                </ul>

           </li>

           <li>

            <a href="./principal_admin.php?pg=cria_atividade.php" class="ls-ico-accessibility" title="Atividades">Atividades</a>

                <ul>

                    <li><a href="./principal_admin.php?pg=verificar_atividade.php" title="Editar Atividade">Verificar Atividade</a></li>

<!--                    <li><a href="./principal_admin.php?pg=cria_sessao.php" title="Criar Sessão">Criar Sessão</a></li>

                    <li><a href="./principal_admin.php?pg=cria_atividade.php" title="Criar Atividade">Criar Atividade</a></li>

                    <li><a href="./inscritos_cursos.php" target="_blank" title="Inscritos Atividade">Lista Inscritos Cursos</a></li>
-->
                </ul>

           </li> 

           <li>

            <a href="./principal_admin.php?pg=avaliacao.php" class="ls-ico-eye" title="avaliacao">Avaliação</a>

                <ul>
                    <li><a href="./principal_admin.php?pg=form_arquivos_resumos.php" title="Avaliadores">Gerar Arquivos Avaliadores de Painéis</a></li>

                    <li><a href="./principal_admin.php?pg=avaliacao.php" title="Avaliadores">Painel De Avaliação</a></li>

                    <li><a href="./principal_admin.php?pg=cadastrar_avaliador.php" title="Cadastro Avaliadores">Cadastrar Avaliador</a></li>

                    <li><a href="./principal_admin.php?pg=consulta_avaliador.php" title="Consultar Avaliadores">Consultar Avaliador</a></li>
                    <li><a href="./principal_admin.php?pg=classificacao.php" title="Notas">Notas Avaliação</a></li>

                </ul>

           </li>  

           <li>

            <a href="./principal_admin.php?pg=certificados.php" class="ls-ico-docs" title="Certificados">Certificados</a>

                <ul>

                    <li><a href="../user/certificados_todos.php" title="Certificados">Gerar Certificados</a></li>

                </ul>

           </li>           

<!--           <li>

            <a href="#" class="ls-ico-chart-bar-up" title="Configurações">Financeiro</a>

            <ul>

              <li><a href="./principal_admin.php?pg=financeiro.php">Relatório Financeiro</a></li>

              <li><a href="/locawebstyle/documentacao/exemplos/painel1/config-aspect">Aparência</a></li>

              <li><a href="/locawebstyle/documentacao/exemplos/painel1/config-answer">Atendimento</a></li>

              <li><a href="/locawebstyle/documentacao/exemplos/painel1/config-api">Chave de acesso para API</a></li>

            </ul>

          </li>
           <li>

            <a href="#" class="ls-ico-bars" title="Configurações">Enquete</a>

            <ul>

              <li><a href="./principal_admin.php?pg=questionario.php">Resultado Pesquisa</a></li>

            </ul>

          </li-->

        </ul>

      </nav>





  </div>

</aside>

  <main class="ls-main ">

      <div class="container-fluid">

<?

if($pg!=''){

    include $pg;

}

else{

    include 'graficos.php';    

}

?>





<!--

        <p>Este é nosso boilerplate com a estrutura inicial de um projeto. Você pode <a href="http://locaweb.github.io/locawebstyle/documentacao/exemplos/">ver exemplos completos neste link</a>.</p>

        <p>Confira nossa <a href="http://locaweb.github.io/locawebstyle/documentacao/componentes/">documentação com os componentes</a> que você usar aqui.</p>

        <hr>

        <h6 class="ls-title-5">English disclaimer</h6>

        <p>This is your boilerplate with start structure. You can see <a href="http://locaweb.github.io/locawebstyle/documentacao/exemplos/">completed examples here</a>.</p>

        <p>Check out the docs to <a href="http://locaweb.github.io/locawebstyle/documentacao/componentes/">see the components that you can use</a>.</p>

-->

      </div>

    </main>



    <aside class="ls-notification">

      <nav class="ls-notification-list" id="ls-notification-curtain" style="left: 1716px;">

        <h3 class="ls-title-2">Notificações</h3>

        <ul>

          <li class="ls-dismissable">

            <a href="#">Blanditiis est est dolorem iure voluptatem eos deleniti repellat et laborum consequatur</a>

            <a href="#" data-ls-module="dismiss" class="ls-ico-close ls-close-notification"></a>

          </li>

          <li class="ls-dismissable">

            <a href="#">Similique eos rerum perferendis voluptatibus</a>

            <a href="#" data-ls-module="dismiss" class="ls-ico-close ls-close-notification"></a>

          </li>

          <li class="ls-dismissable">

            <a href="#">Qui numquam iusto suscipit nisi qui unde</a>

            <a href="#" data-ls-module="dismiss" class="ls-ico-close ls-close-notification"></a>

          </li>

          <li class="ls-dismissable">

            <a href="#">Nisi aut assumenda dignissimos qui ea in deserunt quo deleniti dolorum quo et consequatur</a>

            <a href="#" data-ls-module="dismiss" class="ls-ico-close ls-close-notification"></a>

          </li>

          <li class="ls-dismissable">

            <a href="#">Sunt consequuntur aut aut a molestiae veritatis assumenda voluptas nam placeat eius ad</a>

            <a href="#" data-ls-module="dismiss" class="ls-ico-close ls-close-notification"></a>

          </li>

        </ul>

      </nav>



      <nav class="ls-notification-list" id="ls-help-curtain" style="left: 1756px;">

        <h3 class="ls-title-2">Feedback</h3>

        <ul>

          <li><a href="#">&gt; quo fugiat facilis nulla perspiciatis consequatur</a></li>

          <li><a href="#">&gt; enim et labore repellat enim debitis</a></li>

        </ul>

      </nav>



      <nav class="ls-notification-list" id="ls-feedback-curtain" style="left: 1796px;">

        <h3 class="ls-title-2">Ajuda</h3>

        <ul>

          <li class="ls-txt-center hidden-xs">

            <a href="#" class="ls-btn-dark ls-btn-tour">Fazer um Tour</a>

          </li>

          <li><a href="#">&gt; Guia</a></li>

          <li><a href="#">&gt; Wiki</a></li>

        </ul>

      </nav>

    </aside>



    <!-- We recommended use jQuery 1.10 or up -->

    <script type="text/javascript" src="http://code.jquery.com/jquery-2.1.4.min.js"></script>

    <script src="http://assets.locaweb.com.br/locastyle/3.8.4/javascripts/locastyle.js" type="text/javascript"></script>

  </body>

</html>