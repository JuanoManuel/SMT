<?php
session_start();

$nivel=$_SESSION["Nivel"];
if ($nivel=="1") {
  echo "<nav id='accordion' class='' role='tablist'>
    <div class='card'>
      <div id='menuDatosPersonales' class='card-header' role='tab'>
        <h5 class='mb-0'>
          <a data-toggle='collapse' href='#collapseOne' aria-expanded='true' role='button' aria-controls='collapseOne'>
          Mis datos
          </a>
        </h5>
      </div>
      <div id='collapseOne' class='collapse show' role='tabpanel' aria-labelledby='menuDatosPersonales' data-parent='#accordion'>
        <div class='nav flex-column nav-pills' id='v-pills-tab' role='tablist' aria-orientacion='vertical'>
          <a href='#v-pills-bienvenida' class='nav-link' id='v-pills-bienvenida-tab' data-toggle='pill' role='tab' aria-controls='v-pills-bienvenida' aria-selected='false'>Resumen de mi información</a>
        </div>
      </div>
    </div>
    <div class='card'>
      <div id='menuCartas' class='card-header' role='tab'>
        <h5 class='mb-0'>
          <a data-toggle='collapse' href='#collapseThree' aria-expanded='false' aria-controls='collapseThree'>
            Cartas
          </a>
        </h5>
      </div>
      <div id='collapseThree' class='collapse' role='tabpanel' aria-labelledby='menuCartas' data-parent='#accordion'>
        <div class='nav flex-column nav-pills' id='v-pills-tab' role='tablist' aria-orientacion='vertical'>
          <a href='#v-pills-generarCarta' class='nav-link' id='v-pills-generarCarta-tab' data-toggle='pill' role='tab' aria-controls='v-pills-generarCarta' aria-selected='false'>Generar Cartas</a>
          <a href='#v-pills-controlCartas' class='nav-link' id='v-pills-controlCartas-tab' data-toggle='pill' role='tab' aria-controls='v-pills-controlCartas' aria-selected='false'>Control de Cartas</a>
        </div>
      </div>
    </div>
  </nav>";
}elseif ($nivel=="2") {
  echo "<nav id='accordion' class='' role='tablist'>
    <div class='card'>
      <div id='menuDatosPersonales' class='card-header' role='tab'>
        <h5 class='mb-0'>
          <a data-toggle='collapse' href='#collapseOne' aria-expanded='true' role='button' aria-controls='collapseOne'>
          Mis datos
          </a>
        </h5>
      </div>
      <div id='collapseOne' class='collapse show' role='tabpanel' aria-labelledby='menuDatosPersonales' data-parent='#accordion'>
        <div class='nav flex-column nav-pills' id='v-pills-tab' role='tablist' aria-orientacion='vertical'>
          <a href='#v-pills-bienvenida' class='nav-link' id='v-pills-bienvenida-tab' data-toggle='pill' role='tab' aria-controls='v-pills-bienvenida' aria-selected='false'>Resumen de mi información</a>
        </div>
      </div>
    </div>
    <div class='card'>
      <div id='menuEmpleados' class='card-header' role='tab'>
        <h5 class='mb-0'>
          <a data-toggle='collapse' href='#collapseTwo' aria-expanded='true' role='button' aria-controls='collapseTwo'>
          Empleados
          </a>
        </h5>
      </div>
      <div id='collapseTwo' class='collapse' role='tabpanel' aria-labelledby='menuEmpleados' data-parent='#accordion'>
        <div class='nav flex-column nav-pills' id='v-pills-tab' role='tablist' aria-orientacion='vertical'>
          <a href='#v-pills-solicitud' class='nav-link' id='v-pills-solicitud-tab' data-toggle='pill' role='tab' aria-controls='v-pills-solicitud' aria-selected='false'>Solicitud de Empleo</a>
          <a href='#v-pills-listaemp' class='nav-link' id='v-pills-listaemp-tab' data-toggle='pill' role='tab' aria-controls='v-pills-listaemp' aria-selected='false'>Lista de Empleados</a>
          <a href='#v-pills-puestos' class='nav-link' id='v-pills-puestos-tab' data-toggle='pill' role='tab' aria-controls='v-pills-puestos' aria-selected='false'>Control de Vacantes</a>
        </div>
      </div>
    </div>
  </nav>";
}elseif($nivel=="3"){
  echo "<nav id='accordion' class='' role='tablist'>
    <div class='card'>
      <div id='menuDatosPersonales' class='card-header' role='tab'>
        <h5 class='mb-0'>
          <a data-toggle='collapse' href='#collapseOne' aria-expanded='true' role='button' aria-controls='collapseOne'>
          Mis datos
          </a>
        </h5>
      </div>
      <div id='collapseOne' class='collapse show' role='tabpanel' aria-labelledby='menuDatosPersonales' data-parent='#accordion'>
        <div class='nav flex-column nav-pills' id='v-pills-tab' role='tablist' aria-orientacion='vertical'>
          <a href='#v-pills-bienvenida' class='nav-link' id='v-pills-bienvenida-tab' data-toggle='pill' role='tab' aria-controls='v-pills-bienvenida' aria-selected='false'>Resumen de mi información</a>
        </div>
      </div>
    </div>
    <div class='card'>
      <div id='menuEmpleados' class='card-header' role='tab'>
        <h5 class='mb-0'>
          <a data-toggle='collapse' href='#collapseTwo' aria-expanded='true' role='button' aria-controls='collapseTwo'>
          Empleados
          </a>
        </h5>
      </div>
      <div id='collapseTwo' class='collapse' role='tabpanel' aria-labelledby='menuEmpleados' data-parent='#accordion'>
        <div class='nav flex-column nav-pills' id='v-pills-tab' role='tablist' aria-orientacion='vertical'>
          <a href='#v-pills-solicitud' class='nav-link' id='v-pills-solicitud-tab' data-toggle='pill' role='tab' aria-controls='v-pills-solicitud' aria-selected='false'>Solicitud de Empleo</a>
          <a href='#v-pills-listaemp' class='nav-link' id='v-pills-listaemp-tab' data-toggle='pill' role='tab' aria-controls='v-pills-listaemp' aria-selected='false'>Lista de Empleados</a>
          <a href='#v-pills-puestos' class='nav-link' id='v-pills-puestos-tab' data-toggle='pill' role='tab' aria-controls='v-pills-puestos' aria-selected='false'>Control de Vacantes</a>
        </div>
      </div>
    </div>
    <div class='card'>
      <div id='menuCartas' class='card-header' role='tab'>
        <h5 class='mb-0'>
          <a data-toggle='collapse' href='#collapseThree' aria-expanded='false' aria-controls='collapseThree'>
            Cartas
          </a>
        </h5>
      </div>
      <div id='collapseThree' class='collapse' role='tabpanel' aria-labelledby='menuCartas' data-parent='#accordion'>
        <div class='nav flex-column nav-pills' id='v-pills-tab' role='tablist' aria-orientacion='vertical'>
          <a href='#v-pills-generarCarta' class='nav-link' id='v-pills-generarCarta-tab' data-toggle='pill' role='tab' aria-controls='v-pills-generarCarta' aria-selected='false'>Generar Cartas</a>
          <a href='#v-pills-controlCartas' class='nav-link' id='v-pills-controlCartas-tab' data-toggle='pill' role='tab' aria-controls='v-pills-controlCartas' aria-selected='false'>Control de Cartas</a>
        </div>
      </div>
    </div>
  </nav>";
}
