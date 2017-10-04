<?php
require_once('include_dao.php');

// Carrega as funções do disciplina
$funcoes = new DisciplinaCursoMySqlDAO();
$funcoesCurso = new CursoMySqlDAO();
$funcoesDisciplina = new DisciplinaMySqlDAO();

// Verifica se pesquisaram alguma coisa.
if(isset($_GET['pesquisa'])&&!empty($_GET['pesquisa'])){
  $disciplinasCursos = $funcoes->queryByNome($_GET['pesquisa']);  
}
else{
  $disciplinasCursos = $funcoes->queryAllOrderBy("ano"); 
}

// Verifica se foi clicado em algum botão: cadastrar, editar ou excluir.
if(isset($_POST['acao'])){

  $disciplinaCurso = new disciplinaCurso();
  if($_POST['acao']=='cadastrar'){
    $disciplinaCurso->ano = isset($_POST['ano'])?$_POST['ano']:"";
    $disciplinaCurso->semestre = isset($_POST['semestre'])?$_POST['semestre']:"";
    $disciplinaCurso->codCurso = isset($_POST['curso'])?$_POST['curso']:"";
    $disciplinaCurso->codDisciplina = isset($_POST['disciplina'])?$_POST['disciplina']:"";
    $funcoes->insert($disciplinaCurso);
    $disciplinasCursos = $funcoes->queryAllOrderBy("ano");
    echo("
        <div class='mensagem center white-text teal ' style='margin-top:3%; margin-bottom: -1%'>                                    
          Registro cadastrado com <b>sucesso</b>!
        </div>
    "); 
  }

  if($_POST['acao']=='editar'){
    $disciplinaCurso->cod = isset($_POST['editarcod'])?$_POST['editarcod']:"";
    $disciplinaCurso->ano = isset($_POST['editarano'])?$_POST['editarano']:"";
    $disciplinaCurso->semestre = isset($_POST['editarsemestre'])?$_POST['editarsemestre']:"";
    $disciplinaCurso->codCurso = isset($_POST['editarcurso'])?$_POST['editarcurso']:"";
    $disciplinaCurso->codDisciplina = isset($_POST['editardisciplina'])?$_POST['editardisciplina']:"";
    $funcoes->update($disciplinaCurso);
    $disciplinasCursos = $funcoes->queryAllOrderBy("ano");
    echo("      
        <div class='mensagem center white-text teal 'style='margin-top:3%; margin-bottom: -1%'>                                         
          Registro atualizado com <b>sucesso</b>!
        </div>
    "); 
  }

  if($_POST['acao']=='excluir'){
    $funcoes->delete($_POST['excluircod']);
    $disciplinasCursos = $funcoes->queryAllOrderBy("ano");
    echo("      
        <div class='mensagem center  white-text teal 'style='margin-top:3%; margin-bottom: -1%'>                                        
          Registro apagado com <b>sucesso</b>!
        </div>
    "); 
  }
}
?>