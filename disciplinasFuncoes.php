<?php
require_once('include_dao.php');

// Carrega as funções do disciplina
$funcoes = new DisciplinaMySqlDAO();

// Verifica se pesquisaram alguma coisa.
if(isset($_GET['pesquisa'])&&!empty($_GET['pesquisa'])){
  $disciplinas = $funcoes->queryByNome($_GET['pesquisa']);  
}
else{
  $disciplinas = $funcoes->queryAllOrderBy("nome"); 
}

// Verifica se foi clicado em algum botão: cadastrar, editar ou excluir.
if(isset($_POST['acao'])){

  $disciplina = new disciplina();
  if($_POST['acao']=='cadastrar'){
    $disciplina->id = isset($_POST['id'])?$_POST['id']:"";
    $disciplina->nome = isset($_POST['nome'])?$_POST['nome']:"";
    $funcoes->insert($disciplina);
    $disciplinas = $funcoes->queryAllOrderBy("nome");
    echo("
        <div class='mensagem center white-text teal ' style='margin-top:3%; margin-bottom: -1%'>                                    
          Registro cadastrado com <b>sucesso</b>!
        </div>
    "); 
  }

  if($_POST['acao']=='editar'){
    $disciplina->cod = isset($_POST['editarcod'])?$_POST['editarcod']:"";
    $disciplina->nome = isset($_POST['editarnome'])?$_POST['editarnome']:"";
    $funcoes->update($disciplina);
    $disciplinas = $funcoes->queryAllOrderBy("nome");
    echo("      
        <div class='mensagem center white-text teal 'style='margin-top:3%; margin-bottom: -1%'>                                         
          Registro atualizado com <b>sucesso</b>!
        </div>
    "); 
  }

  if($_POST['acao']=='excluir'){
    $funcoes->delete($_POST['excluircod']);
    $disciplinas = $funcoes->queryAllOrderBy("nome");
    echo("      
        <div class='mensagem center  white-text teal 'style='margin-top:3%; margin-bottom: -1%'>                                        
          Registro apagado com <b>sucesso</b>!
        </div>
    "); 
  }
}
?>