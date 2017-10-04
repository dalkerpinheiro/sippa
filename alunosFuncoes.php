<?php
require_once('include_dao.php');

// Carrega as funções do aluno
$funcoes = new AlunoMySqlDAO();

// Verifica se pesquisaram alguma coisa.
if(isset($_GET['pesquisa'])&&!empty($_GET['pesquisa'])){
  $alunos = $funcoes->queryByNome($_GET['pesquisa']);  
}
else{
  $alunos = $funcoes->queryAll(); 
}

// Verifica se foi clicado em algum botão: cadastrar, editar ou excluir.
if(isset($_POST['acao'])){

  $aluno = new Aluno();
  if($_POST['acao']=='cadastrar'){
    $aluno->id = isset($_POST['id'])?$_POST['id']:"";
    $aluno->nome = isset($_POST['nome'])?$_POST['nome']:"";
    $aluno->matricula = isset($_POST['matricula'])?$_POST['matricula']:"";
    $funcoes->insert($aluno);
    $alunos = $funcoes->queryAll();
    echo("
        <div class='mensagem center white-text teal ' style='margin-top:3%; margin-bottom: -1%'>                                    
          Registro cadastrado com <b>sucesso</b>!
        </div>
    "); 
  }

  if($_POST['acao']=='editar'){
    $aluno->id = isset($_POST['editarid'])?$_POST['editarid']:"";
    $aluno->nome = isset($_POST['editarnome'])?$_POST['editarnome']:"";
    $aluno->matricula = isset($_POST['editarmatricula'])?$_POST['editarmatricula']:"";
    $funcoes->update($aluno);
    $alunos = $funcoes->queryAll();
    echo("      
        <div class='mensagem center white-text teal 'style='margin-top:3%; margin-bottom: -1%'>                                         
          Registro atualizado com <b>sucesso</b>!
        </div>
    "); 
  }

  if($_POST['acao']=='excluir'){
    $funcoes->delete($_POST['excluirid']);
    $alunos = $funcoes->queryAll();
    echo("      
        <div class='mensagem center  white-text teal 'style='margin-top:3%; margin-bottom: -1%'>                                        
          Registro apagado com <b>sucesso</b>!
        </div>
    "); 
  }
}
?>