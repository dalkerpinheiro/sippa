// Carrega os dados no modal excluir
function setDadosModalExcluir(cod) { 
  $('#excluircod').val(cod);
  Materialize.updateTextFields();
}

// Carrega os dados no modal editar
function setDadosModalEditarDisciplinaCurso(cod,ano,semestre,curso,disciplina) { 
  $('#editarcod').val(cod);
  $('#editarano').val(ano);
  $('#editarsemestre').val(semestre);
  $('#editarcurso').val(curso);
  $('#editardisciplina').val(disciplina);
  Materialize.updateTextFields();
}
// Carrega os dados no modal editar
function setDadosModalEditarDisciplina(cod,nome) { 
  $('#editarcod').val(cod);
  $('#editarnome').val(nome);
  Materialize.updateTextFields();
}
// Carrega os dados no modal editar
function setDadosModalEditarAluno(id,nome,matricula) { 
  $('#editarid').val(id);
  $('#editarnome').val(nome);
  $('#editarmatricula').val(matricula);
  Materialize.updateTextFields();
} 

// Carrega os dados no modal editar
function setDadosModalEditarCurso(cod,nome) { 
  $('#editarcod').val(cod);
  $('#editarnome').val(nome);
  Materialize.updateTextFields();
}
// Carrega os dados no modal editar
function setDadosModalEditarProfessor(cod,nome,usuario,senha,email) { 
  $('#editarcod').val(cod);
  $('#editarnome').val(nome);
  $('#editarusuario').val(usuario);
  $('#editarsenha').val(senha);
  $('#editaremail').val(email);
  Materialize.updateTextFields();
}

$(document).ready(function(){
  $('.modal').modal();
  $(".button-collapse").sideNav();
  $('select').material_select();
});

$().ready(function() {
  setTimeout(function () {
    $('.mensagem').hide(); // "foo" é o id do elemento que seja manipular.
  }, 3000); // O valor é representado em milisegundos.
});