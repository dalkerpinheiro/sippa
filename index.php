<?php require_once("header.php");?>
    <script type="text/javascript">
      $(document).ready(function(){
         $('.slider').slider({
            indicators:false
         }
          );
      });
    </script>
    <style type="text/css">
      .cinza{color:grey;}
      .cinzac{color:#aeadad;}
      .light{text-align: center;}  
    </style>
     <div class="slider">
      <ul class="slides">
        <li>
          <img src="slider/1.jpg"> <!-- random image -->
          <div class="caption center-align">
            <h3 class="cinza">Bem Vindo!</h3>
            <h5 class="cinzac text-lighten-3">Visitante</h5>
          </div>
        </li>
        <li>
          <img src="slider/2.jpg"> <!-- random image -->
          <div class="caption center-align">
            <h3 class="cinza">SCP</h3>
            <h5 class="cinzac text-lighten-3">Sistema de Controle de Presenças.</h5>
          </div>
        </li>
        <li>
          <img src="slider/4.jpg"> <!-- random image -->
          <div class="caption center-align">
            <h3 class="cinza">Produtividade</h3>
            <h5 class="cinzac text-lighten-3">Facilita o Gerenciamento da Instituição de Ensino.</h5>
          </div>
        </li>
        <li>
          <img src="slider/3.jpg"> <!-- random image -->
          <div class="caption center-align">
            <h3 class="cinza">Responsividade</h3>
            <h5 class="cinzac text-lighten-3">Pode ser Utilizado em Dispositivos Móveis</h5>
          </div>
        </li>
      </ul>
    </div>      
    <div class="row">
        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center titulo"><i class="material-icons">assignment_ind</i></h2>
            <h5 class="center titulo">Gerenciamento de Alunos</h5>
            <p class="light">Texto Exemplo.</p>
          </div>
        </div>

        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center titulo"><i class="material-icons">group</i></h2>
            <h5 class="center titulo">Gerenciamento de Turmas</h5>
            <p class="light">Texto Exemplo.</p>
          </div>
        </div>

        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center titulo"><i class="material-icons">assignment</i></h2>
            <h5 class="center titulo">Controle de Frequência</h5>
            <p class="light">Texto exemplo.</p>
          </div>
        </div>
      </div>  
<?php require_once("rodape.php"); ?>