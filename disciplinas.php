<?php require_once("header.php");?>
    <div class="container hero-unit">
      <a href="disciplinas.php">
        <div class="section no-pad-bot" id="index-banner">
          <div class="center espacoTitulo">
            <i class="large material-icons tituloIcone">list</i>
          </div>
          <div class="container">
            <h1 class="header center titulo text-darken-2 espacoPesquisa">Disciplinas</h1> 
          </div>
        </div>
    </a>
<?php require_once("disciplinasFuncoes.php");?>
      <div class="section">
          <div class="search-wrapper" > 
            <form  name="pesquisar" >
              <div class="input-field">
                <input id="pesquisa" name="pesquisa" type="search" required placeholder="Pesquisar">
                 <label class="label-icon"><i class="material-icons black-text">search</i></label>
              </div>
            </form>
          </div>      
      </div>

      <div class="section">
        <table class="highlight centered">
          <thead class="tabela"> 
            <tr>
              <th><i class="material-icons tiny icon-demo">view_list</i> Nº</th>
              <th><i class="material-icons tiny icon-demo">forum</i> Nome</th>
              <th class="btnTabela">Editar</th>
              <th class="btnTabela">Remover</th>
            </tr>
          </thead>

          <tbody>
          <?php 
            $numeracao=0;
            foreach ($disciplinas as $disciplina) {
              $numeracao++;
          ?>
            <tr>
              <td><?=$numeracao?></td>
              <td><?=$disciplina->nome?></td>
              <td class="center">
                <a onclick="setDadosModalEditarDisciplina('<?= $disciplina->cod?>','<?= $disciplina->nome?>')" class="btn-floating  waves-effect waves-light grey" href="#modal2">
                  <i class="material-icons" href="#modal2">mode_edit</i>
                </a>
              </td>
              <td class="center">
                <a onclick="setDadosModalExcluirDisciplina('<?= $disciplina->cod?>');" class="small btn-floating waves-effect waves-light grey darken-2 " href="#modal3"><i class="material-icons">delete</i></a>
              </td>
            </tr>
          <?php } ?>    
          </tbody>
        </table>
        <div class="section right-align">
            <a class="waves-effect waves-light btn purple darken-4" href="#modal1">Adicionar<i class="material-icons left">add</i>
            </a>
        </div>
      </div>
    </div>
    
    <!-- CADASTRAR #MODAL -->
    <div id="modal1" class="modal">
      <div class="container">
        <div class="modal-content">
          <div class="center">
            <i class="large material-icons tituloIcone">group</i> 
          </div>
          <div class="center titulo">
            <h3>Cadastrar Disciplina</h3>
          </div>
          <div>
            <form method="post">
              <input type="hidden" name="acao" value="cadastrar">
              <div>
                <div class="input-field col s12">
                  <input id="nome" name="nome" type="text" class="validate" required="required">
                  <label for="nome">Nome</label>
                </div>
              </div>
              <div class="section right-align">
                <button class="waves-effect waves-light btn purple darken-4" type="submit">Cadastrar
                  <i class="material-icons left">add</i>
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    
    <!-- EDITAR #MODAL -->
    <div id="modal2" class="modal">
      <div class="container">
        <div class="modal-content">
          <div class="center">
            <i class="large material-icons tituloIcone">mode_edit</i> 
          </div>
          <div class="center titulo">
            <h3>Editar Disciplina</h3>
          </div>
          <div>
            <form class="col s12" method="post">
              <input type="hidden" name="editarcod" id="editarcod">
              <input type="hidden" name="acao" value="editar">
              <div class="">
                <div class="input-field col s12">
                  <input id="editarnome" name="editarnome" type="text" class="active validate" required="required"><label for="nome" >Nome</label>
                </div>
              </div>
              <div class="section right-align">
                <button class="waves-effect waves-light btn purple darken-4" type="submit">Salvar
                  <i class="material-icons right">offline_pin</i>
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>   

    <!-- EXCLUSÃO #MODAL -->
    <div id="modal3" class="modal">
      <div class="modal-content">
        <form name="excluir" method="post">
          <input type="hidden" id="excluircod" name="excluircod">
          <input type="hidden" name="acao" value="excluir">
        </form>
        <h4 class="center titulo">Confirmação de exclusão</h4>
        <h6 class="center">Deseja realmente excluir o registro selecionado?</h6>
      </div>
      <div class="modal-footer">
        <a onclick="excluir.submit();" class="modal-action modal-close waves-effect waves-green btn purple darken-4">Sim</a>
        <a class="modal-action modal-close waves-effect waves-green btn grey" style="margin-right: 2%">Não</a>
      </div>
    </div>
<?php require_once("rodape.php"); ?>