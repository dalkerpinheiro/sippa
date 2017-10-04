<?php
require_once('include_dao.php');

// Carrega as funções do professor
$funcoes = new ProfessorMySqlDAO();

// Verifica se pesquisaram alguma coisa.
if(isset($_GET['pesquisa'])&&!empty($_GET['pesquisa'])){
  $professores = $funcoes->queryByNome($_GET['pesquisa']);  
}
else{
  $professores = $funcoes->queryAllOrderBy("nome"); 
}

// Verifica se foi clicado em algum botão: cadastrar, editar ou excluir.
if(isset($_POST['acao'])){

  $professor = new Professor();
  if($_POST['acao']=='cadastrar'){
    $professor->cod = isset($_POST['cod'])?$_POST['cod']:"";
    $professor->nome = isset($_POST['nome'])?$_POST['nome']:"";
    $professor->usuario = isset($_POST['usuario'])?$_POST['usuario']:"";
    $professor->senha = isset($_POST['senha'])?$_POST['senha']:"";
    $professor->email = isset($_POST['email'])?$_POST['email']:"";
    $funcoes->insert($professor);
    $professores = $funcoes->queryAllOrderBy("nome");
    echo("
        <div class='mensagem center white-text teal ' style='margin-top:3%; margin-bottom: -1%'>                                    
          Registro cadastrado com <b>sucesso</b>!
        </div>
    "); 
  }

  if($_POST['acao']=='editar'){
    $professor->cod = isset($_POST['editarcod'])?$_POST['editarcod']:"";
    $professor->nome = isset($_POST['editarnome'])?$_POST['editarnome']:"";
    $professor->usuario = isset($_POST['editarusuario'])?$_POST['editarusuario']:"";
    $professor->senha = isset($_POST['editarsenha'])?$_POST['editarsenha']:"";
    $professor->email = isset($_POST['editaremail'])?$_POST['editaremail']:"";
    $funcoes->update($professor);
    $professores = $funcoes->queryAllOrderBy("nome");
    echo("      
        <div class='mensagem center white-text teal 'style='margin-top:3%; margin-bottom: -1%'>                                         
          Registro atualizado com <b>sucesso</b>!
        </div>
    "); 
  }

  if($_POST['acao']=='excluir'){
    $funcoes->delete($_POST['excluircod']);
    $professores = $funcoes->queryAllOrderBy("nome");
    echo("      
        <div class='mensagem center  white-text teal 'style='margin-top:3%; margin-bottom: -1%'>                                        
          Registro apagado com <b>sucesso</b>!
        </div>
    "); 
  }
}
?>