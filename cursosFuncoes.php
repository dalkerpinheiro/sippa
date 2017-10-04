<?php
require_once('include_dao.php');

// Carrega as funções do curso
$funcoes = new CursoMySqlDAO();

// Verifica se pesquisaram alguma coisa.
if(isset($_GET['pesquisa'])&&!empty($_GET['pesquisa'])){
  $cursos = $funcoes->queryByNome($_GET['pesquisa']);  
}
else{
  $cursos = $funcoes->queryAllOrderBy("nome"); 
}

// Verifica se foi clicado em algum botão: cadastrar, editar ou excluir.
if(isset($_POST['acao'])){

  $curso = new Curso();
  if($_POST['acao']=='cadastrar'){
    $curso->id = isset($_POST['id'])?$_POST['id']:"";
    $curso->nome = isset($_POST['nome'])?$_POST['nome']:"";
    $funcoes->insert($curso);
    $cursos = $funcoes->queryAllOrderBy("nome");
    echo("
        <div class='mensagem center white-text teal ' style='margin-top:3%; margin-bottom: -1%'>                                    
          Registro cadastrado com <b>sucesso</b>!
        </div>
    "); 
  }

  if($_POST['acao']=='editar'){
    $curso->cod = isset($_POST['editarcod'])?$_POST['editarcod']:"";
    $curso->nome = isset($_POST['editarnome'])?$_POST['editarnome']:"";
    $funcoes->update($curso);
    $cursos = $funcoes->queryAllOrderBy("nome");
    echo("      
        <div class='mensagem center white-text teal 'style='margin-top:3%; margin-bottom: -1%'>                                         
          Registro atualizado com <b>sucesso</b>!
        </div>
    "); 
  }

  if($_POST['acao']=='excluir'){
    $funcoes->delete($_POST['excluircod']);
    $cursos = $funcoes->queryAllOrderBy("nome");
    echo("      
        <div class='mensagem center  white-text teal 'style='margin-top:3%; margin-bottom: -1%'>                                        
          Registro apagado com <b>sucesso</b>!
        </div>
    "); 
  }
}
?>