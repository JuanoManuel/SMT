<?php
session_start();

$nivel=$_SESSION["Nivel"];

if ($nivel=="0") {
  echo "<div class='tab-content' id='v-pills-tabContent'>

    <div class='tab-pane fade show active' id='v-pills-bienvenida' role='tabpanel' aria-labelledby='v-pills-bienvenida-tab'>
    </div>

  </div>";
}elseif($nivel=="1"){
  echo "<div class='tab-content' id='v-pills-tabContent'>

    <div class='tab-pane fade show active' id='v-pills-bienvenida' role='tabpanel' aria-labelledby='v-pills-bienvenida-tab'>
    </div>
    <div class='tab-pane fade' id='v-pills-generarCarta' role='tabpanel' aria-labelledby='v-pills-generarCarta-tab'>
      Entraste al generador de cartas
    </div>
    <div class='tab-pane fade' id='v-pills-controlCartas' role='tabpanel' aria-labelledby='v-pills-controlCartas-tab'>
      Entraste al control de cartas
    </div>
  </div>";
}elseif ($nivel=="2"){
  echo "<div class='tab-content' id='v-pills-tabContent'>

    <div class='tab-pane fade show active' id='v-pills-bienvenida' role='tabpanel' aria-labelledby='v-pills-bienvenida-tab'>
    </div>
    <div class='tab-pane fade' id='v-pills-solicitud' role='tabpanel' aria-labelledby='v-pills-solicitud-tab'>
      <h2>Solicitud de Empleo</h2>
      <h6>Llena todos los campos de la solicitud de empleo para proceder con tu solicitud</h6>
      <hr>
      <form id='formEnviar' method='post' action='llenarbd.php'>
        <div class='row'>
          <div class='col-auto'>
            <div class='form-group'>
              <label for='inputPuesto'>Puesto que solicita</label>
              <select id='inputPuesto' class='form-control' name='Puesto' required=''>
              </select>
            </div>
          </div>
          <div class='col-auto'>
            <div class='form-group sueldos'>
              <label for='inputSueldo'>Sueldo mensual deseado*</label>
              <div class='input-group'>
                <div class='input-group-addon'>
                  <span class='input-group-text' id='sueldo-addon'>$</span>
                </div>
                <input required='' class='form-control validarSueldos' type='text' id='inputSueldo' name='inputSueldo' aria-label='Sueldo mensual deseado' aria-describedby='sueldo-addon'  maxlength='10'>
              </div>
                  <p id='errors1' class='d-none text-danger small'>Campo numérico</p>

            </div>
          </div>
        </div>
        <div class='row'>
          <div class='col-auto'>
            <h5>NOTA: <br>Toda información aquí proporcionada será tratada confidencialmente <br>Todos los campos con un asterisco (*) son obligatorios</h5>

          </div>
        </div>

      <hr>
      <h3>Datos Personales</h3>

        <div class='row justify-content-between'>
          <div class='col-auto'>
            <div class='form-group'>
              <label for='inputApellidoPaterno'>Apellido Paterno*</label>
              <input required='' type='text' name='inputApellidoPaterno' class='form-control validarTexto' id='inputApellidoPaterno'  maxlength='45'>
            </div>
          </div>
          <div class='col-auto'>
            <div class='form-group'>
              <label for='inputApellidoMaterno'>Apellido Materno*</label>
              <input required='' type='text' name='inputApellidoMaterno' class='form-control validarTexto' id='inputApellidoMaterno'  maxlength='45'>
            </div>
          </div>
          <div class='col-auto'>
            <div class='form-group'>
              <label for='inputNombre'>Nombre(s)*</label>
              <input required='' type='text' name='inputNombre' class='form-control validarTexto' id='inputNombre'  maxlength='45'>
            </div>
          </div>
        </div>
        <div class='row justify-content-between'>
          <div class='col-auto'>
              <label for='inputCorreo'>Correo Electronico*</label>
              <div class='input-group'>
                <div class='input-group-addon'>
                  <i class='material-icons' id='addon-correo'>email</i>
                </div>
                <input required='' type='email' id='inputCorreo' name='inputCorreo' class='form-control' placeholder='Correo' aria-label='Correo' aria-describedby='addon-correo'  maxlength='100'>
              </div>
                <p class='d-none text-danger small'>Correo no valido</p>
          </div>
          <div class='col-2'>
            <div class='form-group'>
              <label for='inputEstatura'>Estatura*</label>
              <div class='input-group noSpinner'>
                <input required='' type='number' class='form-control' min='0' max='300' id='inputEstatura' name='inputEstatura' aria-label='Estatura' aria-describedby='estatura-addon'>
                <div class='input-group-addon'>
                  <span class='input-group-text' id='estatura-addon2'>cm</span>
                </div>
              </div>
            </div>
          </div>
          <div class='col-2'>
            <div class='form-group'>
              <label for='inputPeso'>Peso*</label>
              <div class='input-group noSpinner'>
                <input required='' type='number' class='form-control' id='inputPeso' min='30' max='200' name='inputPeso' aria-label='Peso' aria-describedby='peso-addon'>
                <div class='input-group-addon'>
                  <span class='input-group-text' id='peso-addon'>Kg</span>
                </div>
              </div>
            </div>
          </div>
          <div class='col-3'>
            <div class='form-group'>
              <label for='inputOrientacionSexual'>Orientación Sexual*</label>
              <select required='' name='inputOrientacionSexual' id='inputOrientacionSexual' class='form-control'>
                <option value='' selected>Seleccione una opcion</option>
                <option value='Heterosexual'>Heterosexual</option>
                <option value='Homosexual'>Homosexual</option>
                <option value='Bisexual'>Bisexual</option>
                <option value='Otros'>Otros</option>
              </select>
            </div>
          </div>
        </div>
        <div class='row justify-content-between'>
          <div class='col-4'>
            <div class='form-group'>
              <label for='inputEstado'>Estado*</label>
              <select required='' class='form-control' id='inputEstado' name='inputEstado'>
                <option selected>Seleccione una opción</option>
              </select>
            </div>
          </div>
          <div class='col-4'>
            <div class='form-group'>
              <label for='inputMunicipio'>Municipio*</label>
              <select required='' class='form-control' id='inputMunicipio' name='inputMunicipio'>
                <option selected>Seleccione una opción</option>
              </select>
            </div>
          </div>
          <div class='col-4'>
            <div class='form-group'>
              <label for='inputColonia'>Colonia*</label>
              <select required='' class='form-control' id='inputColonia' name='inputColonia'>
                <option selected>Seleccione una opción</option>
              </select>
            </div>
          </div>
          <div class='col-5'>
            <div class='form-group'>
              <label for='inputCalle'>Calle*</label>
              <input required='' type='text' name='inputCalle' class='form-control' id='inputCalle'  maxlength='80'>
            </div>
          </div>
          <div class='col-4'>
            <div class='form-group'>
              <label for='inputNacionalidad'>Nacionalidad*</label>
              <select required='' class='form-control' id='inputNacionalidad' name='inputNacionalidad'>
                <option selected>Seleccione una opción</option>
              </select>
            </div>
          </div>
          <div class='col-3'>
            <div class='form-group'>
              <label for='inputCP'>Código Postal*</label>
              <select name='inputCP' class='form-control' id='inputCP'>
              </select>
              <input type='hidden' name='idDireccion' id='idDireccion' value=''>
            </div>
          </div>
        </div>
        <div class='row justify-content-between'>
          <div class='col-auto'>
            <div class='form-group'>
              <label for='inputNumExt'>Número Exterior*</label>
              <input required='' type='text' name='inputNumExt' id='inputNumExt' class='form-control' maxlength='50'>
            </div>
          </div>
          <div class='col-auto'>
            <div class='form-group'>
              <label for='inputnumInt'>Número Interior</label>
              <input type='text' name='inputnumInt' id='inputnumInt' class='form-control' maxlength='50'>
              <small class='form-text text-muted'>Si no tiene número interior no llene este campo</small>
            </div>
          </div>
          <div class='col-auto'>
            <div class='form-group'>
              <label for='inputEstadoCivil'>Estado Civil*</label>
              <select required='' class='form-control' id='inputEstadoCivil' name='inputEstadoCivil'>
                <option value='' selected>Seleccione una opción</option>
                <option value='Soltero'>Soltero</option>
                <option value='Casado'>Casado</option>
                <option value='Union Libre'>Unión Libre</option>
                <option value='Divorciado'>Divorciado</option>
                <option value='Viudo'>Viudo</option>
              </select>
            </div>
          </div>
        </div>
        <div class='row justify-content-between'>
          <div class='col-auto'>
            <div class='form-group'>
              <label for='inputLugarNacimiento'>Lugar de Nacimiento*</label>
              <input required='' type='text' name='inputLugarNacimiento' class='form-control validarTexto' id='inputLugarNacimiento' maxlength='50'>
            </div>
          </div>
          <div class='col-auto'>
            <div class='form-group'>
              <label for='inputFechaNacimiento'>Fecha de Nacimiento*</label>
              <input required='' type='date' min='1950-01-01' name='inputFechaNacimiento' class='form-control' id='inputFechaNacimiento'>
            </div>
          </div>
          <div class='col-2'>
            <div class='form-group noSpinner'>
              <label for='inputEdad'>Edad*</label>
              <input required='' readonly='' type='number' name='inputEdad' min='15' value='15' max='60' class='form-control' id='inputEdad'>
            </div>
          </div>
          <div class='col-3'>
            <div class='form-group'>
              <label for='inputSexo'>Sexo*</label>
              <select required='' class='form-control' id='inputSexo' name='inputSexo'>
                <option value='' selected>Selecciona una opción</option>
                <option value='M'>Masculino</option>
                <option value='F'>Femenino</option>
                <option value='O'>Otros</option>
              </select>
            </div>
          </div>
        </div>
        <div class='row justify-content-start'>
              <div class='col-3'>
                <div class='form-group'>
                  <label for='inputTelefono'>Teléfono</label>
                  <select class='form-control' id='selectTelefono' name='selectTelefono'>
                    <option value='' selected>Tipo</option>
                    <option value='Fijo'>Fijo</option>
                    <option value='Móvil'>Móvil</option>
                    <option value='Otro'>Otro</option>
                  </select>
                </div>
                <div class='row'>
                  <div class='col noSpinner'>
                    <input type='number' class='form-control' id='inputTelefono' name='inputTelefono' placeholder='Número de Teléfono'>
                    <p id='errorTelefono' class='d-none text-danger small'>Sólo teléfonos de 10 digitos</p>
                    <p id='error2Telefono' class='d-none text-danger small'>Seleccione un tipo de teléfono</p>
                  </div>
                </div>
                <div class='row mt-3 mb-3'>
                  <div class='col-auto'>
                    <button id='btnAddTelefono'  class='btn btn-secondary align-center' type='button'>Agregar teléfono</button>
                  </div>
                </div>
              </div>

              <div class='col-5'>
                <input type='hidden' id='numTelefonos' name='numTelefonos' value=''>
                <table id='tablaTelefonos' class='table telefono'>
                  <thead class='thead-dark'>
                    <tr>
                      <th scope='col'>Tipo</th>
                      <th scope='col'>Número de télefono</th>
                      <th scope='col'></th>
                    </tr>
                  </thead>
                  <tbody>

                  </tbody>
                </table>
              </div>

        </div>
        <div class='row justify-content-between'>
          <div class='col-6'>
            Vive con:*
          </div>
          <div class='col-6'>
            Personas que dependen de usted:*
          </div>
        </div>
        <div class='row justify-content-between'>
          <div class='col-6'>
            <div class='form-check form-check-inline'>
              <input required='' type='radio' name='viveOptions' id='checkVive1' value='Padres'>
              <label for='checkVive1'>Sus padres</label>
            </div>
            <div class='form-check form-check-inline'>
              <input required='' type='radio' name='viveOptions' id='checkVive2' value='Familia'>
              <label for='checkVive2'>Su familia</label>
            </div>
            <div class='form-check-inline'>
              <input required='' type='radio' name='viveOptions' id='checkVive3' value='Parientes'>
              <label for='checkVive3'>Sus parientes</label>
            </div>
            <div class='form-check-inline'>
              <input required='' type='radio' name='viveOptions' id='checkVive4' value='Solo'>
              <label for='checkVive4'>Solo</label>
            </div>

          </div>
          <div class='col-6'>
            <div class='form-check form-check-inline'>
              <input type='checkbox' name='dependenOptions1' id='checkDependen1' value='Hijos'>
              <label for='checkDependen1'>Hijos</label>
            </div>
            <div class='form-check form-check-inline'>
              <input type='checkbox' name='dependenOptions2' id='checkDependen2' value='Cónyuge'>
              <label for='checkDependen2'>Cónyuge</label>
            </div>
            <div class='form-check form-check-inline'>
              <input type='checkbox' name='dependenOptions3' id='checkDependen3' value='Padres'>
              <label for='checkDependen3'>Padres</label>
            </div>
            <div class='form-check form-check-inline'>
              <input type='checkbox' name='dependenOptions4' id='checkDependen4' value='Otros'>
              <label for='checkDependen4'>Otros</label>
            </div>
            <div class='form-check-inline'>
              <input type='checkbox' name='dependenOptions5' id='checkDependen5' value='Nadie'>
              <label for='checkDependen5'>Nadie</label>
            </div>
          </div>
        </div>

      <hr>
      <h3>Documentación</h3>

        <div class='row justify-content-between'>
          <div class='col-auto'>
            <div class='form-group'>
              <label for='inputCurp'>CURP*</label>
              <input required='' type='text' class='form-control' id='inputCurp' name='inputCurp' maxlength='18'>
              <p id='error' class='d-none text-danger small'>CURP no valido</p>
            </div>
          </div>
          <div class='col-auto'>
            <div class='form-group'>
              <label for='inputAfore'>AFORE</label>
              <input type='text' class='form-control' id='inputAfore' name='inputAfore' maxlength='50'>
            </div>
          </div>
          <div class='col-auto'>
            <div class='form-group'>
              <label for='inputPasaporte'>Pasaporte</label>
              <input type='text' class='form-control' id='inputPasaporte' name='inputPasaporte' maxlength='14'>
            </div>
          </div>
          <div class='col-auto'>
            <div class='form-group'>
              <label for='inputRFC'>RFC*</label>
              <input required='' type='text' class='form-control' id='inputRFC' name='inputRFC' maxlength='13'>
              <p class='d-none text-danger small'>RFC no valido</p>
            </div>
          </div>
          <div class='col-auto'>
            <div class='form-group noSpinner'>
              <label for='inputNSS'>Número de Seguro Social (NSS)*</label>
              <input required='' type='number' class='form-control' id='inputNSS' name='inputNSS' maxlength='11'>
              <p class='d-none text-danger small'>Número de seguro social no valido</p>
            </div>
          </div>
          <div class='col-auto'>
            <div class='form-group noSpinner'>
              <label for='inputCartilla'>Cartilla Militar</label>
              <i id='ModalHH' onclick='modalCM(),desactivaFloat()' class='material-icons unselection botonx'>info</i> <!--opcional-->
              <input type='text' class='form-control' id='inputCartilla' placeholder='Ejemplo: D-123456...' name='inputCartilla' maxlength='20'>
              <p class='d-none text-danger small'>Matrícula no valida</p>
            </div>
          </div>
        </div>
        <div class='row'>
          <div class='col-auto'>
            <div class='form-check'>
              <input type='checkbox' name='checkExtranjero' id='checkExtranjero' value='Si'>
              <label for='checkExtranjero' class='unselection'>¿Es extranjero?</label>
            </div>
          </div>
          <div class='col-9'>
            <div class='form-group'>
              <label for='inputDocExtranjero'>Documentos que le permiten trabajar en el país</label>
              <input type='text' required='' disabled='' class='form-control validarTexto' id='inputDocExtranjero' name='inputDocExtranjero' maxlength='80'>
            </div>
          </div>
        </div>
        <div class='row'>
          <div class='col-auto'>
            <div class='form-check'>
              <input type='checkbox' name='checkLicencia' id='checkLicencia' value='Si'>
              <label for='checkLicencia' class='unselection'>¿Tiene licencia de manejo?</label>
            </div>
          </div>
          <div class='col-auto'>
            <div class='form-group'>
              <label for='inputTipoLicencia'>Tipo de Licencia</label>
              <select required='' id='inputTipoLicencia' disabled='' name='inputTipoLicencia' class='form-control'>
                <option value='' selected>Selecciona una opción</option>
                <option value='Menor'>Menores de edad</option>
                <option value='A'>Tipo A</option>
                <option value='Basico'>Tipo B</option>
                <option value='C'>Tipo C</option>
                <option value='D'>Tipo D</option>
              </select>
            </div>
          </div>
          <div class='col-auto'>
            <div class='form-group noSpinner'>
              <label for='inputLicencia'>Número de licencia</label>
              <input required='' type='text' disabled='' maxlength='10' class='form-control' id='inputLicencia' name='inputLicencia'>
            </div>
          </div>
        </div>

      <hr>
      <h3>Estado de Salud y Hábitos Personales</h3>

        <div class='row justify-content-around'>
          <div class='col-auto'>
            <div class='form-group'>
              <label>¿Cómo considera su estado de salúd actual?</label>
              <select required='' id='inputEstadoSalud' class='form-control' name='inputEstadoSalud'>
                <option value=''>Seleccione una opción</option>
                <option value='Bueno'>Bueno</option>
                <option value='Regular'>Regular</option>
                <option value='Malo'>Malo</option>
              </select>
            </div>
          </div>
          <div style='display: none;' class='col-auto detallesSalud'>
            <div class='form-group'>
              <label for='inputDetallesSalud'>Especifique su estado de salud</label>
              <textarea type='text' name='inputDetallesSalud' id='inputDetallesSalud' class='form-control validarTexto'></textarea>
            </div>
          </div>
          <div class='col-auto'>
            <div class='form-group'>
              <label for='inputTipoSangre'>Tipo de Sangre</label>
              <select required='' name='inputTipoSangre' id='inputTipoSangre' class='form-control'>
                <option value='a+'>A+</option>
                <option value='a-'>A-</option>
                <option value='b+'>B+</option>
                <option value='b-'>B-</option>
                <option value='ab+'>AB+</option>
                <option value='ab-'>AB-</option>
                <option value='o+'>O+</option>
                <option value='o-'>O-</option>
              </select>
            </div>
          </div>
        </div>
        <div class='row justify-content-between'>
          <div class='col-12'>
            <table id='tablaSalud' class='table table-striped table-bordered tabla'>
              <thead class='thead-dark'>
                <th scope='col'>Pregunta</th>
                <th scope='col'>Resp.</th>
                <th scope='col'>Especificación</th>
              </thead>
              <tbody>
                <tr>
                  <td scope='row'>¿Padece alguna enfermedad crónica?</td>
                  <td><select class=' form-control' name='checkPreguntaSalud1' id='checkPreguntaSalud1'>
                    <option value='Si'>Sí</option>
                    <option value='No'>No</option>
                  </select></td>
                  <td><textarea maxlength='280' required='' class='form-control validarTexto' name='inputPreguntaSalud1' id='inputPreguntaSalud1' rows='2'></textarea></td>
                </tr>
                <tr>
                  <td scope='row'>¿Practica usted algún deporte?</td>
                  <td><select class=' form-control' name='checkPreguntaSalud2' id='checkPreguntaSalud2'>
                    <option value='Si'>Si</option>
                    <option value='No'>No</option>
                  </select>
                  </td>
                  <td><textarea maxlength='280' required='' class='form-control validarTexto' name='inputPreguntaSalud2' id='inputPreguntaSalud2' rows='2'></textarea></td>
                </tr>
                <tr>
                  <td scope='row'>¿Permanece a algún club social o deportivo?</td>
                  <td><select class=' form-control' name='checkPreguntaSalud3' id='checkPreguntaSalud3'>
                    <option value='Si'>Sí</option>
                    <option value='No'>No</option>
                  </select></td>
                  <td><textarea maxlength='280' required='' class='form-control validarTexto' name='inputPreguntaSalud3' id='inputPreguntaSalud3' rows='2'></textarea></td>
                </tr>
                <tr>
                  <td scope='row'>¿Tiene algún pasatiempo?</td>
                  <td><select class=' form-control' name='checkPreguntaSalud4' id='checkPreguntaSalud4'>
                    <option value='Si'>Sí</option>
                    <option value='No'>No</option>
                  </select></td>
                  <td><textarea maxlength='280' required='' class='form-control validarTexto' name='inputPreguntaSalud4' id='inputPreguntaSalud4' rows='2'></textarea></td>
                </tr>
                <tr>
                  <td scope='row'>¿Tiene alguna alergia?</td>
                  <td><select class=' form-control' name='checkPreguntaSalud5' id='checkPreguntaSalud5'>
                    <option value='Si'>Sí</option>
                    <option value='No'>No</option>
                  </select></td>
                  <td><textarea maxlength='280' required='' class='form-control validarTexto' name='inputPreguntaSalud5' id='inputPreguntaSalud5' rows='2'></textarea></td>
                </tr>
                <tr>
                  <td scope='row'>¿Tiene alguna Discapacidad?</td>
                  <td><select class=' form-control' name='checkPreguntaSalud6' id='checkPreguntaSalud6'>
                    <option value='Si'>Sí</option>
                    <option value='No'>No</option>
                  </select></td>
                  <td><textarea maxlength='280' required='' class='form-control validarTexto' name='inputPreguntaSalud6' id='inputPreguntaSalud6' rows='2'></textarea></td>
                </tr>
                <tr>
                  <td scope='row'>¿Está usted embarazada?</td>
                  <td><select class=' form-control' name='checkPreguntaSalud7' id='checkPreguntaSalud7'>
                    <option value='Si'>Sí</option>
                    <option value='No'>No</option>
                  </select></td>
                  <td><textarea maxlength='280' required='' class='form-control validarTexto' placeholder='Especificar meses y situación actual del embarazo' name='inputPreguntaSalud7' id='inputPreguntaSalud7' rows='2'></textarea></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class='row justify-content-between'>
          <div class='col-10'>
            <div class='form-group'>
              <label>¿Cuál es su meta en la vida?*</label>
              <textarea required=''  maxlength='280' class='form-control' id='inputMetaVida' name='inputMetaVida' rows='4'></textarea>
            </div>
          </div>
        </div>

      <hr>
      <h3>Datos Familiares</h3>

        <div class='row justify-content-between'>
          <div class='col-12'>
            <table id='tablaFamiliares' class='table table-striped tabla'>
              <thead class='thead-dark'>
                <th scope='col'>Parentesco</th>
                <th scope='col'>Nombre completo</th>
                <th scope='col'>Vive</th>
                <th scope='col'>Domicilio</th>
                <th scope='col'>Ocupación</th>
              </thead>
              <tbody>
                <tr>
                  <td scope='row'>Padre*</td>
                  <td><input required='' type='text' maxlength='70' name='inputNombreFamiliar1' class='form-control validarTexto' value=''></td>
                  <td><select class='form-control-sm form-control requerido' name='checkFamiliar1' id='checkFamiliar1'>
                    <option value='Si' selected>Sí</option>
                    <option value='No'>No</option>
                  </select></td>
                  <td><input required='' class='form-control' maxlength='100' type='text' id='inputDomicilioFamilia1' name='inputDomicilioFamilia1'></td>
                  <td><input required='' type='text' name='inputFamiliarOcupacion1' maxlength='30' id='inputFamiliarOcupacion1' class='form-control validarTexto'></td>
                </tr>
                <tr>
                  <td scope='row'>Madre*</td>
                  <td><input required='' type='text' name='inputNombreFamiliar2' maxlength='70' class='form-control validarTexto' value=''></td>
                  <td><select class='form-control-sm form-control requerido' name='checkFamiliar2' id='checkFamiliar2'>
                    <option value='Si' selected>Sí</option>
                    <option value='No'>No</option>
                  </select></td>
                  <td><input required='' class='form-control' type='text' maxlength='100' id='inputDomicilioFamilia2' name='inputDomicilioFamilia2'></td>
                  <td><input required='' type='text' name='inputFamiliarOcupacion2' maxlength='30' id='inputFamiliarOcupacion2' class='form-control validarTexto'></td>
                </tr>
                <tr>
                  <td scope='row'>Espos@</td>
                  <td><input type='text' name='inputNombreFamiliar3' maxlength='70' class='form-control validarTexto' value=''></td>
                  <td><select class='form-control-sm form-control' name='checkFamiliar3' id='checkFamiliar3'>
                    <option value='Si' selected>Sí</option>
                    <option value='No'>No</option>
                  </select></td>
                  <td><input class='form-control' type='text' id='inputDomicilioFamilia3' maxlength='100' name='inputDomicilioFamilia3'></td>
                  <td><input type='text' name='inputFamiliarOcupacion3' id='inputFamiliarOcupacion3' maxlength='30' class='form-control validarTexto'></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class='row'>
          <div class='col-auto'>
            <p>Hijos:</p>
          </div>
        </div>
        <div class='row justify-content-between'>
          <div class='col-9'>
            <input type='hidden' name='numHijos' id='numHijos' value=''>
            <table id='tablaHijos' class='table table-striped tabla tabla-hijos'>
              <thead class='thead-dark'>
                <th scope='col'>Nombre completo</th>
                <th scope='col'>Edad</th>
                <th scope='col'><i id='agregarHijos' class='material-icons unselection'>add_box</i></th>
              </thead>
              <tbody>

              </tbody>
            </table>
          </div>
        </div>

      <hr>
      <h3>Escolaridad <i id='ModalHH' onclick='modalESCOL(),desactivaFloat()' class='material-icons unselection botonx'>info</i></h3>
                <div class='modal fade bd-example-modal-lg' id='exampleModal' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                <div class='modal-dialog modal-lg  modal-dialog-centered' role='document'>
                    <div class='modal-content'>
                      <div class='modal-header'>
                        <h3 class='modal-title' id='exampleModalLabel'>¿CÓMO LLENAR EL CAMPO DE HORARIO?</h3>
                        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                          <span aria-hidden='true'>&times;</span>
                        </button>
                      </div>
                      <div class='modal-body' style='text-align: center;'>
                        <img style='width: 90%;' src='img/ejemplo-horario.jpg'>
                      </div>
                      <div class='modal-footer'>
                      </div>
                    </div>
                  </div>
                </div>

                <div class='modal fade bd-example-modal-lg' id='modalEMP' tabindex='-1' role='dialog' aria-labelledby='emp' aria-hidden='true'>
                <div class='modal-dialog modal-lg  modal-dialog-centered' role='document'>
                    <div class='modal-content'>
                      <div class='modal-header'>
                        <h3 class='modal-title' id='emp'>¿CÓMO REGISTRAR UN EMPLEO CORRECTAMENTE?</h3>
                        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                          <span aria-hidden='true'>&times;</span>
                        </button>
                      </div>
                      <div class='modal-body' style='text-align: center;'>
                        <img style='width: 90%;' src='img/ejemplo-empleo.jpg'>
                      </div>
                      <div class='modal-footer'>
                      </div>
                    </div>
                  </div>
                </div>

                <div class='modal fade bd-example-modal-lg' id='ESCOL' tabindex='-1' role='dialog' aria-labelledby='escol' aria-hidden='true'>
                <div class='modal-dialog modal-lg  modal-dialog-centered' role='document'>
                    <div class='modal-content'>
                      <div class='modal-header'>
                        <h3 class='modal-title' id='escol'>¿CÓMO AGREGAR CORRECTAMENTE UNA ESCUELA?</h3>
                        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                          <span aria-hidden='true'>&times;</span>
                        </button>
                      </div>
                      <div class='modal-body' style='text-align: center;'>
                         <img style='width: 90%;' src='img/ejemplo-escuela.jpg'>
                      </div>
                      <div class='modal-footer'>
                      </div>
                    </div>
                  </div>
                </div>


                <div class='modal fade bd-example-modal-lg' id='ModalCM' tabindex='-1' role='dialog' aria-labelledby='CM' aria-hidden='true'>
                <div class='modal-dialog modal-lg  modal-dialog-centered' role='document'>
                    <div class='modal-content'>
                      <div class='modal-header'>
                        <h3 class='modal-title' id='CM'>¿CÓMO LLENAR EL CAMPO CARTILLA MILITAR?</h3>
                        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                          <span aria-hidden='true'>&times;</span>
                        </button>
                      </div>
                      <div class='modal-body' style='text-align: center;'>
                        <img style='width: 90%;' src='img/ejemplo-cartilla.jpg'>
                      </div>
                      <div class='modal-footer'>
                      </div>
                    </div>
                  </div>
                </div>

        <div class='row'>
          <div class='col-12'>
            <div class='setBorder p-3'>
              <div class='agregarEscuela'>
                  <h5 class='noEscuela'>No hay escuela</h5>
              </div>
              <div class='row justify-content-end'>
                <div class='col-4 mt-2'>
                  <button type='button' id='btnQuitarEscuela' class='btn colorBMT btn-block'>Quitar Escuela</button>
                </div>
                <div class='col-4 mt-2'>
                  <button type='button' id='btnAgregarEscuela' class='btn colorBMT btn-block'>Agregar Escuela</button>
                  <input type='hidden' name='numEscuela' id='numEscuela' value='0'>
                </div>
              </div>
            </div>
          </div>
        </div>
      <hr>
      <h3>Conocimientos Generales</h3>

        <div class='row justify-content-start'>
          <div class='col-6'>
            <div class='row'>
              <div class='col-auto'>Idiomas que habla:</div>
            </div>
            <div class='row'>
              <div class='col-12'>
                <input type='hidden' name='numIdiomas' id='numIdiomas' value=''>
                <table id='tablaIdiomas' class='table tabla nospinner table-striped tabla-idioma'>
                  <thead class='thead-dark'>
                    <th scope='col'>Idioma</th>
                    <th scope='col'>Nivel</th>
                    <th scope='col'><i id='agregarIdioma' class='material-icons unselection'>add_circle</i></th>
                  </thead>
                  <tbody>

                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <div class='row justify-content-start'>
          <div class='col-auto'>
            Sistemas operativos que maneja:
          </div>
        </div>
        <div class='row justify-content-between'>
          <div class='col-auto'>
            <div class='form-group'>
              <label for='selectWindows'>Windows</label>
              <select required='' id='selectWindows' name='selectWindows' class='form-control'>
                <option value='No uso'>No lo uso</option>
                <option value='Basico'>Básico</option>
                <option value='Intermedio'>Intermedio</option>
                <option value='Avanzado'>Avanzado</option>
              </select>
            </div>
          </div>
          <div class='col-auto'>
            <div class='form-group'>
              <label for='selectIOS'>IOS</label>
              <select required='' id='selectIOS' name='selectIOS' class='form-control'>
                <option value='No uso'>No lo uso</option>
                <option value='Basico'>Básico</option>
                <option value='Intermedio'>Intermedio</option>
                <option value='Avanzado'>Avanzado</option>
              </select>
            </div>
          </div>
          <div class='col-auto'>
            <div class='form-group'>
              <label for='selectAndroid'>Android</label>
              <select required='' id='selectAndroid' name='selectAndroid' class='form-control'>
                <option value='No uso'>No lo uso</option>
                <option value='Basico'>Básico</option>
                <option value='Intermedio'>Intermedio</option>
                <option value='Avanzado'>Avanzado</option>
              </select>
            </div>
          </div>
          <div class='col-auto'>
            <div class='form-group'>
              <label for='selectLinux'>Linux</label>
              <select required='' id='selectLinux' name='selectLinux' class='form-control'>
                <option value='No uso'>No lo uso</option>
                <option value='Basico'>Básico</option>
                <option value='Intermedio'>Intermedio</option>
                <option value='Avanzado'>Avanzado</option>
              </select>
            </div>
          </div>
        </div>
        <div class='row'>
          <div class='col-auto'>
            <div class='form-check'>
              <input type='checkbox' name='checkOtrosOS' id='checkOtrosOS' value='Si'>
              <label for='checkOtrosOS' class='unselection'>Otro</label>
            </div>
          </div>
        </div>
        <div class='row justify-content-between form-group'>
          <label class='col-form-label col-auto' for='inputOtroSistemaOperativo'>Especifique otro sistema operativo que maneja</label>
          <div class='col-auto'>
            <input type='text' name='inputOtroSistemaOperativo' maxlength='40' placeholder='Especificar sólo uno' id='inputOtroSistemaOperativo' class='form-control'>
          </div>
          <div class='col-auto'>
            <select id='selectOtrosOS' name='selectOtrosOS' class='form-control'>
              <option value='Basico'>Básico</option>
              <option value='Intermedio'>Intermedio</option>
              <option value='Avanzado'>Avanzado</option>
            </select>
          </div>
        </div>

        <div class='row justify-content-start'>
          <div class='col-auto'>
              Manejo de Redes Sociales:
          </div>
        </div>
        <div class='row justify-content-between'>
          <div class='col-auto'>
            <div class='form-group'>
              <label for='selectFacebook'>Facebook</label>
              <select required='' id='selectFacebook' name='selectFacebook' class='form-control'>
                <option value='No uso'>No lo uso</option>
                <option value='Basico'>Básico</option>
                <option value='Intermedio'>Intermedio</option>
                <option value='Avanzado'>Avanzado</option>
              </select>
            </div>
          </div>
          <div class='col-auto'>
            <div class='form-group'>
              <label for='selectTwitter'>Twitter</label>
              <select required='' id='selectTwitter' name='selectTwitter' class='form-control'>
                <option value='No uso'>No lo uso</option>
                <option value='Basico'>Básico</option>
                <option value='Intermedio'>Intermedio</option>
                <option value='Avanzado'>Avanzado</option>
              </select>
            </div>
          </div>
          <div class='col-auto'>
            <div class='form-group'>
              <label for='selectPinterest'>Pinterest</label>
              <select required='' id='selectPinterest' name='selectPinterest' class='form-control'>
                <option value='No uso'>No lo uso</option>
                <option value='Basico'>Básico</option>
                <option value='Intermedio'>Intermedio</option>
                <option value='Avanzado'>Avanzado</option>
              </select>
            </div>
          </div>
          <div class='col-auto'>
            <div class='form-group'>
              <label for='selectYoutube'>Youtube</label>
              <select required='' id='selectYoutube' name='selectYoutube' class='form-control'>
                <option value='No uso'>No lo uso</option>
                <option value='Basico'>Básico</option>
                <option value='Intermedio'>Intermedio</option>
                <option value='Avanzado'>Avanzado</option>
              </select>
            </div>
          </div>
          <div class='col-auto'>
            <div class='form-group'>
              <label for='selectLinkedin'>Linkedin</label>
              <select required='' id='selectLinkedin' name='selectLinkedin' class='form-control'>
                <option value='No uso'>No lo uso</option>
                <option value='Basico'>Básico</option>
                <option value='Intermedio'>Intermedio</option>
                <option value='Avanzado'>Avanzado</option>
              </select>
            </div>
          </div>
          <div class='col-auto'>
            <div class='form-group'>
              <input type='checkbox' name='checkOtrosRS' id='checkOtrosRS' value='Si'>
              <label for='checkOtrosRS' class='unselection'>Otros</label>
            </div>
          </div>
        </div>
        <div class='form-group row justify-content-between'>
            <label for='inputOtraRedSocial' class='col-form-label col-auto'>Especifique qué otra red social maneja:</label>
          <div class='col-5'>
            <input type='text' maxlength='40' placeholder='Especificar solo uno' id='inputOtraRedSocial' name='inputOtraRedSocial' class='form-control'>
          </div>
          <div class='col-auto'>
            <select id='selectOtrosRS' name='selectOtrosRS' class='form-control'>
              <option value='Basico'>Básico</option>
              <option value='Intermedio'>Intermedio</option>
              <option value='Avanzado'>Avanzado</option>
            </select>
          </div>
        </div>
        <div class='row justify-content-start'>
          <div class='col-auto'>
            Paqueteria de Office:
          </div>
        </div>
        <div class='row justify-content-around'>
          <div class='col-auto'>
            <div class='form-group'>
              <label for='selectExcel'>Excel</label>
              <select required='' id='selectExcel' name='selectExcel' class='form-control'>
                <option value='No uso'>No lo uso</option>
                <option value='Basico'>Básico</option>
                <option value='Intermedio'>Intermedio</option>
                <option value='Avanzado'>Avanzado</option>
              </select>
            </div>
          </div>
          <div class='col-auto'>
            <div class='form-group'>
              <label for='selectWord'>Word</label>
              <select required='' id='selectWord' name='selectWord' class='form-control'>
                <option value='No uso'>No lo uso</option>
                <option value='Basico'>Básico</option>
                <option value='Intermedio'>Intermedio</option>
                <option value='Avanzado'>Avanzado</option>
              </select>
            </div>
          </div>
          <div class='col-auto'>
            <div class='form-group'>
              <label for='selectOutlook'>Outlook</label>
              <select required='' id='selectOutlook' name='selectOutlook' class='form-control'>
                <option value='No uso'>No lo uso</option>
                <option value='Basico'>Básico</option>
                <option value='Intermedio'>Intermedio</option>
                <option value='Avanzado'>Avanzado</option>
              </select>
            </div>
          </div>
        </div>
        <div class='row justify-content-around'>
          <div class='col-auto'>
            <div class='form-group'>
              <label for='selectPowerPoint'>Power Point</label>
              <select required='' id='selectPowerPoint' name='selectPowerPoint' class='form-control'>
                <option value='No uso'>No lo uso</option>
                <option value='Basico'>Básico</option>
                <option value='Intermedio'>Intermedio</option>
                <option value='Avanzado'>Avanzado</option>
              </select>
            </div>
          </div>
          <div class='col-auto'>
            <div class='form-group'>
              <label for='selectAccess'>Access</label>
              <select required='' id='selectAccess' name='selectAccess' class='form-control'>
                <option value='No uso'>No lo uso</option>
                <option value='Basico'>Básico</option>
                <option value='Intermedio'>Intermedio</option>
                <option value='Avanzado'>Avanzado</option>
              </select>
            </div>
          </div>
          <div class='col-auto'>
            <div class='form-group'>
              <label for='selectPublisher'>Publisher</label>
              <select required='' id='selectPublisher' name='selectPublisher' class='form-control'>
                <option value='No uso'>No lo uso</option>
                <option value='Basico'>Básico</option>
                <option value='Intermedio'>Intermedio</option>
                <option value='Avanzado'>Avanzado</option>
              </select>
            </div>
          </div>
        </div>
        <div class='row justify-content-start'>
          <div class='col-auto'>
            Aplicaciones:
          </div>
        </div>
        <div class='row justify-content-around'>
          <div class='col-auto'>
            <div class='form-group'>
              <label for='selectWhatsapp'>Whatsapp</label>
              <select required='' id='selectWhatsapp' name='selectWhatsapp' class='form-control'>
                <option value='No uso'>No lo uso</option>
                <option value='Basico'>Básico</option>
                <option value='Intermedio'>Intermedio</option>
                <option value='Avanzado'>Avanzado</option>
              </select>
            </div>
          </div>
          <div class='col-auto'>
            <div class='form-group'>
              <label for='selectSkype'>Skype</label>
              <select required='' id='selectSkype' name='selectSkype' class='form-control'>
                <option value='No uso'>No lo uso</option>
                <option value='Basico'>Básico</option>
                <option value='Intermedio'>Intermedio</option>
                <option value='Avanzado'>Avanzado</option>
              </select>
            </div>
          </div>
          <div class='col-auto'>
            <div class='form-group'>
              <label for='selectOnedrive'>Onedrive</label>
              <select required='' id='selectOnedrive'  name='selectOnedrive' class='form-control'>
                <option value='No uso'>No lo uso</option>
                <option value='Basico'>Básico</option>
                <option value='Intermedio'>Intermedio</option>
                <option value='Avanzado'>Avanzado</option>
              </select>
            </div>
          </div>
        </div>
        <div class='row justify-content-start'>
          <div class='col-auto'>
            <div class='form-check'>
              <input type='checkbox' name='checkOtrosApp' id='checkOtrosApp' value='Si'>
              <label for='checkOtrosApp' class='unselection'>Otros</label>
            </div>
          </div>
        </div>
        <div class='row form-group justify-content-start'>
          <label for='inputOtraAplicacion' class='col-form-label col-auto'>Especifique que otras aplicaciones que maneja:</label>
          <div class='col-auto'>
            <input type='text' maxlength='40' placeholder='Especificar solo uno' name='inputOtraAplicacion' id='inputOtraAplicacion' class='form-control'>
          </div>
          <div class='col-auto'>
            <select class='form-control' id='selectOtrosApp' name='selectOtrosApp'>
              <option value='Basico'>Básico</option>
              <option value='Intermedio'>Intermedio</option>
              <option value='Avanzado'>Avanzado</option>
            </select>
          </div>
        </div>
        <div class='row'>
          <div class='col-auto'>
            Otro software o funciones que domina:
          </div>
        </div>
        <div class='row justify-content-start'>
          <div class='col-6'>
            <input type='hidden' name='numSoft' id='numSoft' value=''>
            <table id='tablaSoftware' class='table tabla table-striped tabla-software'>
              <thead class='thead-dark'>
                <th>Software</th>
                <th>Nivel</th>
                <th><i id='agregarSoftware' class='material-icons unselection'>add_circle</i></th>
              </thead>
              <tbody>

              </tbody>
            </table>
          </div>
        </div>
        <div class='row justify-content-start'>
          <div class='col-auto'>
            <h5>Competencias:</h5>
          </div>
        </div>
        <div class='row justify-content-around'>
          <div class='col-3'>
            <div class='form-group'>
              <label for='selectEtica'>Ética</label>
              <select required='' id='selectEtica' name='selectEtica' class='form-control'>
                <option value='Basico'>Básico</option>
                <option value='Medio'>Medio</option>
                <option value='Alto'>Alto</option>
              </select>
            </div>
          </div>
          <div class='col-3'>
            <div class='form-group'>
              <label for='selectCDA'>Capacidad de Análisis</label>
              <select required='' id='selectCDA' name='selectCDA' class='form-control'>
                <option value='Basico'>Básico</option>
                <option value='Medio'>Medio</option>
                <option value='Alto'>Alto</option>
              </select>
            </div>
          </div>
          <div class='col-3'>
            <div class='form-group'>
              <label for='selectTD'>Toma de Decisiones</label>
              <select required='' id='selectTD' name='selectTD' class='form-control'>
                <option value='Basico'>Básico</option>
                <option value='Medio'>Medio</option>
                <option value='Alto'>Alto</option>
              </select>
            </div>
          </div>
          <div class='col-3'>
            <div class='form-group'>
              <label for='selectCreatividad'>Creatividad</label>
              <select required='' id='selectCreatividad' name='selectCreatividad' class='form-control'>
                <option value='Basico'>Básico</option>
                <option value='Medio'>Medio</option>
                <option value='Alto'>Alto</option>
              </select>
            </div>
          </div>
        </div>
        <div class='row justify-content-around'>
          <div class='col-3'>
            <div class='form-group'>
              <label for='selectHV'>Habilidad Verbal</label>
              <select required='' id='selectHV' name='selectHV' class='form-control'>
                <option value='Basico'>Básico</option>
                <option value='Medio'>Medio</option>
                <option value='Alto'>Alto</option>
              </select>
            </div>
          </div>
          <div class='col-3'>
            <div class='form-group'>
              <label for='selectApegado'>Apegado a instrucciones</label>
              <select required='' id='selectApegado' name='selectApegadoInstrucciones' class='form-control'>
                <option value='Basico'>Básico</option>
                <option value='Medio'>Medio</option>
                <option value='Alto'>Alto</option>
              </select>
            </div>
          </div>
          <div class='col-3'>
            <div class='form-group'>
              <label for='selectIniciativa'>Iniciativa</label>
              <select required='' id='selectIniciativa' name='selectIniciativa' class='form-control'>
                <option value='Basico'>Básico</option>
                <option value='Medio'>Medio</option>
                <option value='Alto'>Alto</option>
              </select>
            </div>
          </div>
          <div class='col-3'>
            <div class='form-group'>
              <label for='selectDisciplina'>Disciplina</label>
              <select required='' id='selectDisciplina' name='selectDisciplina' class='form-control'>
                <option value='Basico'>Básico</option>
                <option value='Medio'>Medio</option>
                <option value='Alto'>Alto</option>
              </select>
            </div>
          </div>
        </div>
        <div class='row justify-content-around'>
          <div class='col-3'>
            <div class='form-group'>
              <label for='selectLiderazgo'>Liderazgo</label>
              <select required='' id='selectLiderazgo' name='selectLiderazgo' class='form-control'>
                <option value='Basico'>Básico</option>
                <option value='Medio'>Medio</option>
                <option value='Alto'>Alto</option>
              </select>
            </div>
          </div>
          <div class='col-3'>
            <div class='form-group'>
              <label for='selectEmpatia'>Empatía</label>
              <select required='' id='selectEmpatia' name='selectEmpatia' class='form-control'>
                <option value='Basico'>Básico</option>
                <option value='Medio'>Medio</option>
                <option value='Alto'>Alto</option>
              </select>
            </div>
          </div>
          <div class='col-3'>
            <div class='form-group'>
              <label for='selectPersistencia'>Persistencia</label>
              <select required='' id='selectPersistencia' name='selectPersistencia' class='form-control'>
                <option value='Basico'>Básico</option>
                <option value='Medio'>Medio</option>
                <option value='Alto'>Alto</option>
              </select>
            </div>
          </div>
          <div class='col-3'>
            <div class='form-group'>
              <label for='selectCompromiso'>Compromiso</label>
              <select required='' id='selectCompromiso' name='selectCompromiso' class='form-control'>
                <option value='Basico'>Básico</option>
                <option value='Medio'>Medio</option>
                <option value='Alto'>Alto</option>
              </select>
            </div>
          </div>
        </div>
        <div class='row justify-content-around'>
          <div class='col-3'>
            <div class='form-group'>
              <label for='selectAutoconfianza'>Autoconfianza</label>
              <select required='' id='selectAutoconfianza' name='selectAutoconfianza' class='form-control'>
                <option value='Basico'>Básico</option>
                <option value='Medio'>Medio</option>
                <option value='Alto'>Alto</option>
              </select>
            </div>
          </div>
          <div class='col-3'>
            <div class='form-group'>
              <label for='selectAdaptabilidad'>Adaptabilidad</label>
              <select required='' id='selectAdaptabilidad' name='selectAdaptabilidad' class='form-control'>
                <option value='Basico'>Básico</option>
                <option value='Medio'>Medio</option>
                <option value='Alto'>Alto</option>
              </select>
            </div>
          </div>
          <div class='col-3'>
            <div class='form-group'>
              <label for='selectIndependencia'>Independencia</label>
              <select required='' id='selectIndependencia' name='selectIndependencia' class='form-control'>
                <option value='Basico'>Básico</option>
                <option value='Medio'>Medio</option>
                <option value='Alto'>Alto</option>
              </select>
            </div>
          </div>
          <div class='col-3'>
            <div class='form-group'>
              <label for='selectIndagacion'>Indagación</label>
              <select required='' id='selectIndagacion' name='selectIndagacion' class='form-control'>
                <option value='Basico'>Básico</option>
                <option value='Medio'>Medio</option>
                <option value='Alto'>Alto</option>
              </select>
            </div>
          </div>
        </div>
        <div class='row justify-content-around'>
          <div class='col-3'>
            <div class='form-group'>
              <label for='selectTE'>Trabajo en Equipo</label>
              <select required='' id='selectTE' name='selectTE' class='form-control'>
                <option value='Basico'>Básico</option>
                <option value='Medio'>Medio</option>
                <option value='Alto'>Alto</option>
              </select>
            </div>
          </div>
          <div class='col-3'>
            <div class='form-group'>
              <label for='selectSeguimiento'>Seguimiento</label>
              <select required='' id='selectSeguimiento' name='selectSeguimiento' class='form-control'>
                <option value='Basico'>Básico</option>
                <option value='Medio'>Medio</option>
                <option value='Alto'>Alto</option>
              </select>
            </div>
          </div>
          <div class='col-3'>
            <div class='form-group'>
              <label for='selectVision'>Visión</label>
              <select required='' id='selectVision' name='selectVision' class='form-control'>
                <option value='Basico'>Básico</option>
                <option value='Medio'>Medio</option>
                <option value='Alto'>Alto</option>
              </select>
            </div>
          </div>
          <div class='col-3'>
            <div class='form-group'>
              <label for='selectOrganizacion'>Organización</label>
              <select required='' id='selectOrganizacion' name='selectOrganizacion' class='form-control'>
                <option value='Basico'>Básico</option>
                <option value='Medio'>Medio</option>
                <option value='Alto'>Alto</option>
              </select>
            </div>
          </div>
        </div>
        <div class='row justify-content-around'>
          <div class='col-3'>
            <div class='form-group'>
              <label for='selectAutocontrol'>Autocontrol</label>
              <select required='' id='selectAutocontrol' name='selectAutocontrol' class='form-control'>
                <option value='Basico'>Básico</option>
                <option value='Medio'>Medio</option>
                <option value='Alto'>Alto</option>
              </select>
            </div>
          </div>
          <div class='col-3'>
            <div class='form-group'>
              <label for='selectPlanificacion'>Planificación</label>
              <select required='' id='selectPlanificacion' name='selectPlanificacion' class='form-control'>
                <option value='Basico'>Básico</option>
                <option value='Medio'>Medio</option>
                <option value='Alto'>Alto</option>
              </select>
            </div>
          </div>
          <div class='col-3'>
            <div class='form-group'>
              <label for='selectDG'>Desarrollo de Gente</label>
              <select required='' id='selectDG' name='selectDG' class='form-control'>
                <option value='Basico'>Básico</option>
                <option value='Medio'>Medio</option>
                <option value='Alto'>Alto</option>
              </select>
            </div>
          </div>
          <div class='col-3'>
            <div class='form-group'>
              <label for='selectCG'>Control de Grupos</label>
              <select required='' id='selectCG' name='selectCG' class='form-control'>
                <option value='Basico'>Básico</option>
                <option value='Medio'>Medio</option>
                <option value='Alto'>Alto</option>
              </select>
            </div>
          </div>
        </div>
        <div class='row justify-content-around'>
          <div class='col-3'>
            <div class='form-group'>
              <label for='selectTF'>Tolerancia a la frustación</label>
              <select required='' id='selectTF' name='selectTF' class='form-control'>
                <option value='Basico'>Básico</option>
                <option value='Medio'>Medio</option>
                <option value='Alto'>Alto</option>
              </select>
            </div>
          </div>
          <div class='col-3'>
            <div class='form-group'>
              <label for='selectMotivacion' class='align-bottom'>Motivación</label>
              <select required='' id='selectMotivacion' name='selectMotivacion' class='form-control align-bottom'>
                <option value='Basico'>Básico</option>
                <option value='Medio'>Medio</option>
                <option value='Alto'>Alto</option>
              </select>
            </div>
          </div>
          <div class='col-3'>
            <div class='form-group'>
              <label for='selectDelegar'>Delegación</label>
              <select required='' id='selectDelegar' name='selectDelegar' class='form-control'>
                <option value='Basico'>Básico</option>
                <option value='Medio'>Medio</option>
                <option value='Alto'>Alto</option>
              </select>
            </div>
          </div>
          <div class='col-3'>
            <div class='form-group'>
              <label for='selectPersuacion'>Persuación</label>
              <select required='' id='selectPersuacion' name='selectPersuacion' class='form-control'>
                <option value='Basico'>Básico</option>
                <option value='Medio'>Medio</option>
                <option value='Alto'>Alto</option>
              </select>
            </div>
          </div>
        </div>
        <div class='row justify-content-around'>
          <div class='col-3'>
            <div class='form-group'>
              <label for='selectPersuacion'>Seguir Instrucciones</label>
              <select required='' id='selectPersuacion' name='selectSeguirInstrucciones' class='form-control'>
                <option value='Basico'>Básico</option>
                <option value='Medio'>Medio</option>
                <option value='Alto'>Alto</option>
              </select>
            </div>
          </div>
          <div class='col-3'>
            <div class='form-group'>
              <label for='selectOR'>Orientación a resultados</label>
              <select required='' id='selectOR' name='selectOR' class='form-control'>
                <option value='Basico'>Básico</option>
                <option value='Medio'>Medio</option>
                <option value='Alto'>Alto</option>
              </select>
            </div>
          </div>
        </div>
        <hr>
        <h3>Empleo Actual y Anteriores<i id='ModalHH' onclick='modalEMP(),desactivaFloat()' class='material-icons unselection botonx'>info</i></h3>
        <h5>NOTA: Anotar empleos de los últimos 5 años</h5>
        <div class='row'>
          <div class='col-12'>
            <div class='setBorder p-3'>
              <div class='agregarEmpleo'>
                <h5 class='noEmpleo'>No hay empleos</h5>

              </div>
              <div class='row justify-content-end mt-3'>
                <div class='col-4'>
                  <button class='btn colorBMT btn-block' id='btnQuitarEmpleo' type='button'>Quitar Empleo</button>
                </div>
                <div class='col-4'>
                  <button class='btn colorBMT btn-block' id='btnAgregarEmpleo' type='button'>Agregar Empleo</button>
                  <input type='hidden' name='numEmpleo' id='numEmpleo' value='1'>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class='row mt-5 justify-content-center'>
          <div class='col-auto'>
            <div class='form-check'>
              <label for='checkPedirInformes' class='unselection'>¿Podemos pedir informes?*</label>
            </div>
            <div class='form-check form-check-inline'>
              <input type='radio' name='checkPedirInformes' id='checkPedirInformes1' value='Si'>
              <label for='checkPedirInformes1'>Si</label>
            </div>
            <div class='form-check form-check-inline'>
              <input class='radios_informes' type='radio' name='checkPedirInformes' id='checkPedirInformes2' value='No'>
              <label for='checkPedirInformes2' >No</label>
            </div>
          </div>
          <div class='col-8'>
            <div class='form-group'>
              <label for='inputRazonesInformes'>Razones:</label>
              <input type='text' maxlength='50' name='inputRazonesInformes' id='inputRazonesInformes' class='form-control'>
            </div>
          </div>
        </div>
        <hr>
        <h3>Referencias Personales (Favor de no incluir jefes anteriores)</h3>
        <div class='row'>
          <div class='col-12'>
            <table class='table table-sm table-striped tabla table-responsive'>
              <thead class='thead-dark'>
                <th scope='col'>Nombre completo</th>
                <th scope='col'>Domicilio</th>
                <th scope='col'>Teléfono</th>
                <th scope='col-auto'>Ocupación</th>
                <th scope='col'>Años conociéndolo</th>
              </thead>
              <tbody class='noSpinner'>
                <tr>
                  <td><input type='text' maxlength='70' name='inputNombreReferencia' id='inputNombreReferencia' class='form-control validarTexto form-control-sm'></td>
                  <td><input type='text' maxlength='100' name='inputDomicilioReferencia' id='inputDomicilioReferencia' class='form-control form-control-sm'></td>
                  <td><input type='text' maxlength='10' name='inputTelefonoReferencia' id='inputTelefonoReferencia' class='form-control form-control-sm validarTelefono'></td>
                  <td><input type='text' maxlength='30' name='inputOcupacionReferencia' id='inputOcupacionReferencia' class='form-control validarTexto form-control-sm'></td>
                  <td class='noSpinner'>
                    <div class='input-group input-group-sm'>
                          <input type='number' name='inputTimepoConociendo' min='0' max='120' class='form-control' aria-describedby='spanAnio'>
                          <div class='input-group-addon'>
                        <span class='input-group-text' id='spanAnio'>Año(s)</span>
                      </div>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td><input type='text' maxlength='70' name='inputNombreReferencia1' id='inputNombreReferencia1' class='form-control validarTexto form-control-sm'></td>
                  <td><input type='text' maxlength='100' name='inputDomicilioReferencia1' id='inputDomicilioReferencia1' class='form-control form-control-sm'></td>
                  <td><input type='text' maxlength='10' name='inputTelefonoReferencia1' id='inputTelefonoReferencia1' class='form-control form-control-sm validarTelefono'></td>
                  <td><input type='text' maxlength='30' name='inputOcupacionReferencia1' id='inputOcupacionReferencia1' class='form-control validarTexto form-control-sm'></td>
                  <td class='noSpinner'>
                    <div class='input-group input-group-sm'>
                          <input type='number' min='0' max='120' name='inputTimepoConociendo1' class='form-control' aria-describedby='spanAnio'>
                          <div class='input-group-addon'>
                        <span class='input-group-text' id='spanAnio'>Año(s)</span>
                      </div>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td><input type='text' maxlength='70' name='inputNombreReferencia2' id='inputNombreReferencia2' class='form-control validarTexto form-control-sm'></td>
                  <td><input type='text' maxlength='100' name='inputDomicilioReferencia2' id='inputDomicilioReferencia2' class='form-control form-control-sm'></td>
                  <td><input type='text' name='inputTelefonoReferencia2' maxlength='10' id='inputTelefonoReferencia2' class='form-control form-control-sm validarTelefono'></td>
                  <td><input type='text' maxlength='30' name='inputOcupacionReferencia2' id='inputOcupacionReferencia2' class='form-control validarTexto form-control-sm'></td>
                  <td class='noSpinner'>
                    <div class='input-group input-group-sm'>
                          <input type='number' min='0' max='120' name='inputTimepoConociendo2' class='form-control' aria-describedby='spanAnio'>
                          <div class='input-group-addon'>
                        <span class='input-group-text' id='spanAnio'>Año(s)</span>
                      </div>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td><input type='text' maxlength='70' name='inputNombreReferencia3' id='inputNombreReferencia3' class='form-control validarTexto form-control-sm'></td>
                  <td><input type='text' maxlength='100' name='inputDomicilioReferencia3' id='inputDomicilioReferencia3' class='form-control form-control-sm'></td>
                  <td><input type='text' maxlength='10' name='inputTelefonoReferencia3' id='inputTelefonoReferencia3' class='form-control form-control-sm validarTelefono'></td>
                  <td><input type='text' maxlength='30' name='inputOcupacionReferencia3' id='inputOcupacionReferencia3' class='form-control validarTexto form-control-sm'></td>
                  <td class='noSpinner'>
                    <div class='input-group input-group-sm'>
                          <input type='number' min='0' max='120' name='inputTimepoConociendo3' class='form-control' aria-describedby='spanAnio'>
                          <div class='input-group-addon'>
                        <span class='input-group-text' id='spanAnio'>Año(s)</span>
                      </div>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td><input type='text' maxlength='70' name='inputNombreReferencia4' id='inputNombreReferencia4' class='form-control validarTexto form-control-sm'></td>
                  <td><input type='text' maxlength='100' name='inputDomicilioReferencia4' id='inputDomicilioReferencia4' class='form-control form-control-sm'></td>
                  <td><input type='text' maxlength='10' name='inputTelefonoReferencia4' id='inputTelefonoReferencia4' class='form-control form-control-sm validarTelefono'></td>
                  <td><input type='text' maxlength='30' name='inputOcupacionReferencia4' id='inputOcupacionReferencia4' class='form-control validarTexto form-control-sm'></td>
                  <td class='noSpinner'>
                    <div class='input-group input-group-sm'>
                          <input type='number' min='0' max='120' name='inputTimepoConociendo4' class='form-control' aria-describedby='spanAnio'>
                          <div class='input-group-addon'>
                        <span class='input-group-text' id='spanAnio'>Año(s)</span>
                      </div>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <hr>
        <!--Aqui empieza-->
        <h2>Datos Económicos</h2>
        <div class='form-row'>
          <div class='col-6'>
            <label class='col-form-label'>¿Tiene usted otros ingresos?</label>
          </div>
          <div class='col-6'>
            <label class='col-form-label'>¿Su cónyugue trabaja?</label>
          </div>
        </div>
        <div class='form-row'>
        <div class='col-6'>
          <div class='row'>
            <div class='col-4'>
                <div class='form-check form-check-inline'>
                    <input type='radio' name='Ingresos' id='checkIngresos1' value='option1'>
                    <label for='checkIngresos1'>No</label>
                </div>
                <div class='form-check form-check-inline'>
                    <input type='radio' name='Ingresos' id='checkIngresos2' value='Si'>
                    <label for='checkIngresos2'>Si</label>
                </div>
            </div>
            <div class='col-2'>
              <label for='' >Monto:</label>
            </div>
            <div class='col-6 sueldos '>
            <div class='input-group input-group-sm'>
              <div class='input-group-addon'>
                <span class='input-group-text' id='pesosjeIcon'>$</span>
              </div>
              <input type='text' name='inputMontoIngresos' maxlength='7' disabled=''  id='inputMontoIngresos' placeholder='Monto' class='form-control form-control-sm validarSueldos' aria-describedby='porcentajeIcon'>

            </div>
            <p id='errors1' class='d-none text-danger small'>Campo numérico</p>
            </div>

          </div>
        </div>
        <div class='col-6'>
          <div class='row'>
            <div class='col-auto'>
              <div class='form-check form-check-inline'>
                  <input type='radio' name='Conyugue' id='checkConyugue1' value='option1'>
                  <label for='checkConyugue1'>No</label>
              </div>
              <div class='form-check form-check-inline'>
                  <input type='radio' name='Conyugue' id='checkConyugue2' value='Si'>
                  <label for='checkConyugue2'>Sí</label>
              </div>
            </div>
            <div class='col-auto'>
              <label for='' >Percepción mensual:</label>
            </div>
            <div class='col sueldos'>
              <div class='input-group input-group-sm'>
                <div class='input-group-addon'>
                  <span class='input-group-text' id='pesosjeIcon'>$</span>
                </div>
                <input type='text' maxlength='7' disabled='' name='PercepcionMC' id='inputPercepcionMensual' placeholder='Monto' class='form-control form-control-sm validarSueldos' aria-describedby='porcentajeIcon'>
              </div>
              <p id='errors1' class='d-none text-danger small'>Campo numérico</p>
            </div>
          </div>
        </div>
        </div>
        <div class='form-row mt-2'>
          <div class='col-2'>
            <label>Describalos:</label>
          </div>
          <div class='col-4'>
            <input type='text' maxlength='50' name='DesOI' id='inputDescribirIngresos' disabled='' placeholder='Descripción' class='form-control validarTexto form-control-sm'>
          </div>
          <div class='col-1'>
            <label>Dónde:</label>
          </div>
          <div class='col-5'>
            <input type='text' disabled='' maxlength='50' placeholder='Descripción' class='form-control validarTexto form-control-sm' name='inputConyugeDonde' id='inputConyugeDonde'>
          </div>
        </div>
        <div class='form-row mt-2'>
          <div class='col-6'>
            <label class='col-form-label'>¿Vive en casa propia?</label>
          </div>
          <div class='col-6'>
            <label class='col-form-label'>¿Paga renta?</label>
          </div>
        </div>
        <div class='form-row mt-2'>
          <div class='col-6'>
            <div class='row'>
              <div class='col-auto'>
                <div class='form-check form-check-inline'>
                    <input type='radio' name='Casa' id='checkCasa1' value='option1'>
                    <label for='checkCasa1'>No</label>
                </div>
                <div class='form-check form-check-inline'>
                    <input type='radio' name='Casa' id='checkCasa2' value='Si'>
                    <label for='checkCasa2'>Sí</label>
                </div>
              </div>
              <div class='col-auto'>
                <label>Valor aproximado:</label>
              </div>
              <div class='col sueldos'>
                <div class='input-group input-group-sm'>
                <div class='input-group-addon'>
                  <span class='input-group-text' id='pesosjeIcon'>$</span>
                </div>
                <input type='text' maxlength='7' disabled='' name='inputValorC' id='inputValorAproximado' placeholder='Monto' class='form-control validarSueldos form-control-sm' aria-describedby='porcentajeIcon'>
                </div>
                <p id='errors1' class='d-none text-danger small'>Campo numérico</p>
              </div>

            </div>
            <div class='row'>
              <div class='col-12'>
                <label class='col-form-label'>¿Tiene automóvil propio?</label>
              </div>
            </div>
            <div class='row mt-2'>
              <div class='col-auto'>
                <div class='form-check form-check-inline'>
                    <input type='radio' name='Auto' id='checkAuto1' value='option1'>
                    <label for='checkAuto1'>No</label>
                </div>
                <div class='form-check form-check-inline'>
                    <input type='radio' name='Auto' id='checkAuto2' value='Si'>
                    <label for='checkAuto2'>Sí</label>
                </div>
              </div>
              <div class='col-auto'>
                <label>Marca:</label>
              </div>
              <div class='col'>
                <input type='text' name='inputMaraC' maxlength='50' disabled='' id='inputMarca' placeholder='Marca y Modelo' class='form-control form-control-sm'>
              </div>
            </div>
          </div>
          <div class='col-6'>
            <div class='row'>
              <div class='col-auto'>
                <div class='form-check form-check-inline'>
                    <input type='radio' name='Renta' id='checkRenta1' value='option1'>
                    <label for='checkRenta1'>No</label>
                </div>
                <div class='form-check form-check-inline'>
                    <input type='radio' name='Renta' id='checkRenta2' value='Si'>
                    <label for='checkRenta2'>Sí</label>
                </div>
              </div>
              <div class='col-auto'>
                <label for=''>Renta mensual:</label>
              </div>
              <div class='col sueldos'>
                <div class='input-group input-group-sm'>
                <div class='input-group-addon'>
                  <span class='input-group-text' id='pesosjeIcon'>$</span>
                </div>
                <input type='text' disabled='' maxlength='7' name='inputRM' id='inputRentaMensual' placeholder='Monto' class='form-control validarSueldos form-control-sm' aria-describedby='porcentajeIcon'>
                </div>
                <p id='errors1' class='d-none text-danger small'>Campo numérico</p>
              </div>
            </div>
            <div class='row'>
              <div class='col'>
                <label for='' class='col-form-label'>¿Tiene deudas?</label>
              </div>
            </div>
            <div class='row mt-2'>
              <div class='col-auto'>
                <div class='form-check form-check-inline'>
                    <input type='radio' name='Deudas' id='checkDeudas1' value='option1'>
                    <label for='checkDeudas1'>No</label>
                </div>
                <div class='form-check form-check-inline'>
                    <input type='radio' name='Deudas' id='checkDeudas2' value='Si'>
                    <label for='checkDeudas2'>Sí</label>
                </div>
              </div>
              <div class='col-auto'>
                <label for=''>Importe:</label>
              </div>
              <div class='col sueldos'>
                <div class='input-group input-group-sm'>
                <div class='input-group-addon'>
                  <span class='input-group-text' id='pesosjeIcon'>$</span>
                </div>
                <input type='text' disabled='' maxlength='7' name='inportMD' id='inputImporte' placeholder='Monto' class='form-control validarSueldos form-control-sm' aria-describedby='porcentajeIcon'>
                </div>
                <p id='errors1' class='d-none text-danger small'>Campo numérico</p>
              </div>
            </div>
          </div>
        </div>
        <div class='form-row'>
          <div class='col-6'>
            <label class='col-form-label'>Año:</label>
          </div>
          <div class='col-6'>
            <label class='col-form-label'>¿Con quién?</label>
          </div>
        </div>
        <div class='form-row'>
          <div class='col-6 noSpinner'>
            <input type='number' name='ModeloC' min='1980'  id='inputModelo' disabled='' placeholder='Modelo' class='form-control form-control-sm'>
          </div>
          <div class='col-6'>
            <input type='text' disabled='' maxlength='50' name='QuienD' id='inputConQuien' placeholder='Nombre' class='form-control form-control-sm'>
          </div>
        </div>
        <div class='form-row'>
          <div class='col-6'>
            <label for='' class='col-form-label'>¿A cuánto ascienden sus gastos mensuales?</label>
          </div>
          <div class='col-6'>
            <label for='' class='col-form-label'>¿Cuánto abona mensualmente?</label>
          </div>
        </div>
        <div class='form-row noSpinner'>
          <div class='col-6'>
            <input required='' type='number' min='0' max='500000' name='GastosM' id='inputGastos' placeholder='Monto' class='form-control form-control-sm'>
          </div>
          <div class='col-6'>
            <input type='number' disabled='' min='0' max='100000' name='AbonoC' id='inputAbono' placeholder='Monto' class='form-control form-control-sm'>
          </div>
        </div>
        <hr>
        <h2>Datos Generales</h2>


        <div class='form-row'>
          <div class='col-6'>
            <div class='row justify-content-between'>
              <div class='col-7'>
                <label for='' class='col-form-label'>¿Cómo supo de este empleo?</label>
              </div>
              <div class='col-4'>
                <select required='' id='selectSaberEmpleo' name='selectSaberEmpleo' class='form-control'>
                  <option value='Anuncio'>Anuncio</option>
                  <option value='BolsaTrabajo'>Bolsa de trabajo de delegación</option>
                  <option value='Facebook'>Facebook</option>
                  <option value='Conocidos'>Conocidos</option>
                  <option value='Pagina'>Página de Marktac</option>
                  <option value='otros'>Otros</option>
                </select>
              </div>
            </div>
            <div class='row mt-3 justify-content-between'>
              <div class='col-3'>
                <label for='' class='col-form-label'>Especifique:</label>
              </div>
              <div class='col-8'>
                <input type='text' maxlength='50' name='EspecifiqueSE' id='inputEspecifique' disabled='' placeholder='Especifique' class='form-control form-control-sm validarTexto'>
              </div>
            </div>
          </div>
          <div class='col-6'>
            <div class='row '>
              <div class='col-12'>
                <label class='col-form-label'>¿Tiene parientes trabajando en esta empresa?</label>
              </div>
            </div>
            <div class='row justify-content-start mt-3'>
              <div class='col-auto'>
                <div class='form-check form-check-inline'>
                    <input type='radio' name='ParientesOptions' id='checkPari1' value='option1'>
                    <label for='checkPari1'>No</label>
                </div>
                <div class='form-check form-check-inline'>
                    <input type='radio' name='ParientesOptions' id='checkPari2' value='Si'>
                    <label for='checkPari2'>Sí</label>
                </div>
              </div>
              <div class='col'>
                <div class='row'>
                  <div class='col-auto'>
                    <label>Nombrelos:</label>
                  </div>
                  <div class='col-7'>
                    <input type='text' disabled='' maxlength='50' name='NombreParientes' id='inputParientes' placeholder='Nombrelos' class='form-control form-control-sm validarTexto'>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class='form-row  mt-2'>
          <div class='col-6'>
            <label class='col-form-label'>¿Ha estado afianzado?</label>
          </div>
          <div class='col-6'>
            <label class='col-form-label'>¿Ha estado afiliado a algún sindicato?</label>
          </div>
        </div>
        <div class='form-row mt-2'>
          <div class='col-2'>
            <div class='form-check form-check-inline'>
                    <input type='radio' name='Afian' id='checkAfian1' value='option1'>
                    <label for='checkAfian1'>No</label>
                </div>
                <div class='form-check form-check-inline'>
                    <input type='radio' name='Afian' id='checkAfian2' value='Si'>
                    <label for='checkAfian2'>Sí</label>
                </div>
          </div>
          <div class='col-1'>
            <label >Cia:</label>
          </div>
          <div class='col-3'>
            <input type='text' disabled='' maxlength='50' name='inputCiaA' id='inputAfianCia' placeholder='Cia' class='form-control form-control-sm'>
          </div>
          <div class='col-2'>
            <div class='form-check form-check-inline'>
                    <input type='radio' name='Sind' id='checkSind1' value='option1'>
                    <label for='checkSind1'>No</label>
                </div>
                <div class='form-check form-check-inline'>
                    <input type='radio' name='Sind' id='checkSind2' value='Si'>
                    <label for='checkSind2'>Sí</label>
                </div>
          </div>
          <div class='col-1'>
            <label >Cia:</label>
          </div>
          <div class='col-3'>
            <input type='text' disabled='' maxlength='50' name='inputCiaS' id='inputSindCia'  placeholder='Cia' class='form-control  form-control-sm'>
          </div>

        </div>
        <div class='form-row mt-2'>
          <div class='col-6'>
            <label class='col-form-label'>¿Tiene seguro de vida?</label>
          </div>
          <div class='col-6'>
            <label class='col-form-label'>¿Puede viajar?</label>
          </div>
        </div>
        <div class='form-row mt-2'>
          <div class='col-2'>
            <div class='form-check form-check-inline'>
                    <input type='radio' name='Segurovi' id='checkSegurovi1' value='option1'>
                    <label for='checkSegurovi1'>No</label>
                </div>
                <div class='form-check form-check-inline'>
                    <input type='radio' name='Segurovi' id='checkSegurovi2' value='Si'>
                    <label for='checkSegurovi2'>Sí</label>
                </div>
          </div>
          <div class='col-1'>
            <label >Cia:</label>
          </div>
          <div class='col-3'>
            <input type='text' disabled='' maxlength='' ='50' id='inputSeguro' name='inputCiaSV' placeholder='Cia' class='form-control form-control-sm'>
          </div>
          <div class='col-2'>
            <div class='form-check form-check-inline'>
                    <input type='radio' name='Viajar' id='checkViajar1' value='No'>
                    <label for='checkViajar1'>No</label>
                </div>
                <div class='form-check form-check-inline'>
                    <input type='radio' name='Viajar' id='checkViajar2' value='option2'>
                    <label for='checkViajar2'>Sí</label>
                </div>
          </div>
          <div class='col-1'>
            <label >Razones:</label>
          </div>
          <div class='col-3'>
            <input type='text' disabled='' maxlength='50' name='inputRazonesViajar' id='inputViajar' placeholder='Razones' class='form-control form-control-sm'>
          </div>

        </div>
        <div class='form-row mt-2'>
          <div class='col-6'>
            <div class='row'>
              <div class='col-12'>
                <label class='col-form-label'>¿Está dispuesto a cambiar de lugar de residencia?</label>
              </div>
            </div>
            <div class='row'>
              <div class='col-4'>
                <div class='form-check form-check-inline'>
                    <input type='radio' name='Residcenia' id='checkResidencia1' value='No'>
                    <label for='checkResidencia1'>No</label>
                </div>
                <div class='form-check form-check-inline'>
                    <input type='radio' name='Residcenia' id='checkResidencia2' value='option2'>
                    <label for='checkResidencia2'>Sí</label>
                </div>
              </div>
              <div class='col-2'>
                <label>Razones:</label>
              </div>
              <div class='col-6'>
                <input type='text' disabled='' maxlength='50' name='inputRazonesCambioR' id='inputRazonesResidencia' placeholder='Razones' class='form-control form-control-sm'>
              </div>
            </div>
          </div>
          <div class='col-3'>
            <label class='col-form-label'>Fecha en que podría presentarse a trabajar:</label>
          </div>
          <div class='col-3'>
            <input required='' id='FechaTrabajar' type='date' name='FechaTrabajar' class='form-control'>
          </div>
        </div>
        <hr>
        <h2>Datos Extras</h2>
        <div class='row justify-content-around'>
          <div class='col-4'>
            <div class='form-group'>
              <label for='inputTallaCamisa'>Talla de Camisa*</label>
              <select required='' class='form-control' name='inputTallaCamisa' id='inputTallaCamisa'>
                <option value='Extra chica'>Extra chica</option>
                <option value='Chica'>Chica</option>
                <option value='Mediana'>Mediana</option>
                <option value='Grande'>Grande</option>
                <option value='Extra grande'>Extra grande</option>
              </select>
            </div>
          </div>
          <div class='col-4'>
            <div class='form-group noSpinner'>
              <label for='inputTallaPantalon'>Talla de Pantalón*</label>
              <input required='' type='number' class='form-control' min='0' max='60' value='' id='inputTallaPantalon' name='inputTallaPantalon'>
            </div>
          </div>
          <div class='col-auto'>
            <div class='form-group'>
              <label for='inputPastel'>Pastel Favorito*</label>
              <input required='' maxlength='50' type='text' name='inputPastel' id='inputPastel' class='form-control validarTexto'>
            </div>
          </div>
        </div>
        <div class='row justify-content-around'>
          <div class='col-4'>
            <div class='form-group'>
              <label for='inputGelatina'>Gelatina Favorita*</label>
              <input required='' maxlength='45' type='text' name='inputGelatina' id='inputGelatina' class='form-control validarTexto'>
            </div>
          </div>
          <div class='col-4'>
            <div class='form-group'>
              <label for='inputColor'>Color Favorito*</label>
              <input required='' maxlength='45' type='text' name='inputColor' id='inputColor' class='form-control validarTexto'>
            </div>
          </div>
          <div class='col-auto'>
            <div class='form-group'>
              <label for='inputComida'>Comida Favorita*</label>
              <input required='' maxlength='45' type='text' name='inputComida' id='inputComida' class='form-control validarTexto'>
            </div>
          </div>
        </div>
        <div class='row justify-content-around'>
          <div class='col-4'>
            <div class='form-group'>
              <label for='inputFacebook'>Cuenta de Facebook</label>
              <input type='text' class='form-control' maxlength='50' name='inputFacebook' id='inputFacebook'>
            </div>
          </div>
          <div class='col-4'>
            <div class='form-group'>
              <label for='inputTwitter'>Cuenta de Twitter</label>
              <div class='input-group'>
                <div class='input-group-addon'>
                  <span class='input-group-text' id='arroba-addon'>@</span>
                </div>
                <input type='text' name='inputTwitter' maxlength='50' id='inputTwitter' class='form-control' aria-label='Cuenta de Twitter' aria-describedby='sarroba-addon'>
              </div>
            </div>
          </div>
        </div>
        <div class='row justify-content-around'>
          <div class='col-4'>
            <div class='form-group'>
              <label for='inputInstagram'>Cuenta de Instagram</label>
              <div class='input-group'>
                <div class='input-group-addon'>
                  <span class='input-group-text' id='arroba-addon'>@</span>
                </div>
                <input type='text' name='inputInstagram' maxlength='50' id='inputInstagram' class='form-control' aria-label='Cuenta de Instagram' aria-describedby='sarroba-addon'>
              </div>
            </div>
          </div>
          <div class='col-4'>
            <div class='form-group'>
              <label for='inputYoutube'>Canal de Youtube</label>
              <div class='input-group'>
                <input class='form-control' id='inputYoutube'  type='text' maxlength='50' name='inputYoutube' aria-label='Canal de Youtube' aria-describedby='sarroba-addon'>
              </div>
            </div>
          </div>
        </div>
        <div class='row justify-content-start ml-3'>
          <div class='col-auto'>
            <div class='row'>Contactos de Emergencia</div>
            <div class='row'>
              <table id='tablaContactos' class='table table-striped table-responsive tabla'>
                <thead class='thead-dark'>
                  <th>Nombre</th>
                  <th>Parentesco</th>
                  <th>Teléfono</th>
                </thead>
                <tbody>
                  <tr>
                    <td><input type='text' maxlength='70' name='NombreCE1' id='NombreCE1' class='form-control validarTexto NombreCE'></td>
                    <td><input type='text' maxlength='40' name='ParentescoCE1' id='ParentescoCE1' class='form-control validarTexto'></td>
                    <td><input type='text' maxlength='10' name='TelefonoCE1' id='TelefonoCE1' class='form-control validarTelefono'></td>
                  </tr>
                  <tr>
                    <td><input type='text' maxlength='70' name='NombreCE2' id='NombreCE2' class='form-control validarTexto NombreCE'></td>
                    <td><input type='text' maxlength='40' name='ParentescoCE2' id='ParentescoCE2' class='form-control validarTexto'></td>
                    <td><input type='text' maxlength='10' name='TelefonoCE2' id='TelefonoCE2' class='form-control validarTelefono'></td>
                  </tr>
                  <tr>
                    <td><input type='text' maxlength='70' name='NombreCE3' id='NombreCE3' class='form-control validarTexto NombreCE'></td>
                    <td><input type='text' maxlength='40' name='ParentescoCE3' id='ParentescoCE3' class='form-control validarTexto'></td>
                    <td><input type='text' maxlength='10' name='TelefonoCE3' id='TelefonoCE3' class='form-control validarTelefono'></td>
                  </tr>
                  <tr>
                    <td><input type='text' maxlength='70' name='NombreCE4' id='NombreCE4' class='form-control validarTexto NombreCE'></td>
                    <td><input type='text' maxlength='40' name='ParentescoCE4' id='ParentescoCE4' class='form-control validarTexto'></td>
                    <td><input type='text' maxlength='10' name='TelefonoCE4' id='TelefonoCE4' class='form-control validarTelefono'></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <hr>
        <div class='row justify-content-md-center mt-2 mb-3'>
          <div class='col'>
            <button type='submit' class='btn btn-block colorBMT'>Enviar solicitud</button>
          </div>
        </div>
        <!--Aqui termina-->
      </form>
    </div>
    <div class='tab-pane fade' id='v-pills-listaemp' role='tabpanel' aria-labelledby='v-pills-listaemp-tab'>
      <h2 class='mb-3'>Empleados</h2>
      <div class='form-row justify-content-between'>
        <div class='form-group col'>
          <div class='input-group'>
            <div class='input-group-addon'><i class='material-icons'>search</i></div>
            <input type='text' class='form-control' id='buscador'  placeholder='Buscar'>
          </div>
        </div>
      </div>

      <div class='row'>
        <div class='col' id='respuesta'>

        </div>
      </div>
    </div>
    <div class='tab-pane fade' id='v-pills-puestos' role='tabpanel' aria-labelledby='v-pills-puestos-tab'>
            <h2>Control de Vacantes</h2>
            <hr>
            <div class='row justify-content-center'>
              <div class='col-12'>
                En el siguiente listado se mostraran de lado izquierdo todos los puestos con los que cuenta la empresa y de lado derecho estaran los puestos vacantes.
              </div>
              <div class='col-12'>
                Para habilitar o deshabilitar las vacantes que estaran en la solicitud de empleo solo es necesario agregar los puestos a la lista de vacantes (lado derecho). Ademas, en caso de ser necesario se pueden agregar o eliminar puestos.
              </div>
            </div>
            <hr>
            <div class='row justify-content-center'>
              <div class='col-5'>
                <p>Puestos</p>
              </div>
              <div class='col-1'></div>
              <div class='col-5'>
                <p>Vacantes</p>
              </div>
            </div>
            <div class='row mb-5'>
              <div class='col-12'>
                <div id='controlPuestos' class='row justify-content-center'>
                  <div class='col-5'>
                    <select id='puestosSelect' multiple class='form-control'>
                    </select>
                  </div>
                  <div class='col-1 align-center'>
                    <div class='row'>
                      <div class='col'><img id='agregarVacante' src='img/next.png'>
                      </div>
                      <div class='col mt-3'>
                          <img id='quitarVacante' src='img/next-invertido.png'>
                      </div>
                      <div class='col mt-3'>
                        <img id='agregarPuesto' src='img/add-sign.png' data-toggle='modal' data-target='#agregarNuevoPuesto'>
                      </div>
                      <div class='col mt-3'>
                        <img id='eliminarPuesto' src='img/delete.png'>
                      </div>
                    </div>
                  </div>
                  <div class='col-5'>
                    <select id='vacantesSelect' multiple class='form-control'>
                    </select>
                  </div>
                </div>
              </div>
            </div>
            <div class='row justify-content-center'>
              <div class='col-5'>
                <button id='savePuestos' class='btn btn-lg btn-block colorBMT'>Guardar Cambios</button>
              </div>
            </div>
          </div>
  </div>";
}elseif ($nivel=="3"){
  echo "<div class='tab-content' id='v-pills-tabContent'>

    <div class='tab-pane fade show active' id='v-pills-bienvenida' role='tabpanel' aria-labelledby='v-pills-bienvenida-tab'>
    </div>
    <div class='tab-pane fade' id='v-pills-solicitud' role='tabpanel' aria-labelledby='v-pills-solicitud-tab'>
      <h2>Solicitud de Empleo</h2>
      <h6>Llena todos los campos de la solicitud de empleo para proceder con tu solicitud</h6>
      <hr>
      <form id='formEnviar' method='post' action='llenarbd.php'>
        <div class='row'>
          <div class='col-auto'>
            <div class='form-group'>
              <label for='inputPuesto'>Puesto que solicita</label>
              <select id='inputPuesto' class='form-control' name='Puesto' required=''>
              </select>
            </div>
          </div>
          <div class='col-auto'>
            <div class='form-group sueldos'>
              <label for='inputSueldo'>Sueldo mensual deseado*</label>
              <div class='input-group'>
                <div class='input-group-addon'>
                  <span class='input-group-text' id='sueldo-addon'>$</span>
                </div>
                <input required='' class='form-control validarSueldos' type='text' id='inputSueldo' name='inputSueldo' aria-label='Sueldo mensual deseado' aria-describedby='sueldo-addon'  maxlength='10'>
              </div>
                  <p id='errors1' class='d-none text-danger small'>Campo numérico</p>

            </div>
          </div>
        </div>
        <div class='row'>
          <div class='col-auto'>
            <h6 class='text-justify'>Toda información aquí proporcionada será tratada confidencialmente <br>Todos los campos con un asterisco (*) son obligatorios</h6>
            <h6 class='text-justify'>En esta empresa no  discriminamos  por  razón  de  raza,  color,  religión,  origen, sexo, edad mayor  de  40  años, impedimento  físico  o mental, información  genética, ni  por  ninguna  otra  condición  protegida  por  ley  o  normativas. Es  nuestra  intención ofrecer igualdad de oportunidades de empleo a todos los solicitantes calificados y que las decisiones de selección se basen en factores relacionados con el trabajo.</h6>

          </div>
        </div>

      <hr>
      <h3>Datos Personales</h3>

        <div class='row justify-content-between'>
          <div class='col-auto'>
            <div class='form-group'>
              <label for='inputApellidoPaterno'>Apellido Paterno*</label>
              <input required='' type='text' name='inputApellidoPaterno' class='form-control validarTexto' id='inputApellidoPaterno'  maxlength='45'>
            </div>
          </div>
          <div class='col-auto'>
            <div class='form-group'>
              <label for='inputApellidoMaterno'>Apellido Materno*</label>
              <input required='' type='text' name='inputApellidoMaterno' class='form-control validarTexto' id='inputApellidoMaterno'  maxlength='45'>
            </div>
          </div>
          <div class='col-auto'>
            <div class='form-group'>
              <label for='inputNombre'>Nombre(s)*</label>
              <input required='' type='text' name='inputNombre' class='form-control validarTexto' id='inputNombre'  maxlength='45'>
            </div>
          </div>
        </div>
        <div class='row justify-content-between'>
          <div class='col-auto'>
              <label for='inputCorreo'>Correo Electronico*</label>
              <div class='input-group'>
                <div class='input-group-addon'>
                  <i class='material-icons' id='addon-correo'>email</i>
                </div>
                <input required='' type='email' id='inputCorreo' name='inputCorreo' class='form-control' placeholder='Correo' aria-label='Correo' aria-describedby='addon-correo'  maxlength='100'>
              </div>
                <p class='d-none text-danger small'>Correo no valido</p>
          </div>
          <div class='col-3'>
            <div class='form-group'>
              <label for='inputEstatura'>Estatura*</label>
              <div class='input-group noSpinner'>
                <input required='' type='number' class='form-control' min='0' max='300' id='inputEstatura' name='inputEstatura' aria-label='Estatura' aria-describedby='estatura-addon'>
                <div class='input-group-addon'>
                  <span class='input-group-text' id='estatura-addon2'>cm</span>
                </div>
              </div>
            </div>
          </div>
          <div class='col-3'>
            <div class='form-group'>
              <label for='inputPeso'>Peso*</label>
              <div class='input-group noSpinner'>
                <input required='' type='number' class='form-control' id='inputPeso' min='30' max='200' name='inputPeso' aria-label='Peso' aria-describedby='peso-addon'>
                <div class='input-group-addon'>
                  <span class='input-group-text' id='peso-addon'>Kg</span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class='row justify-content-between'>
          <div class='col-4'>
            <div class='form-group'>
              <label for='inputEstado'>Estado*</label>
              <select required='' class='form-control' id='inputEstado' name='inputEstado'>
                <option selected>Seleccione una opción</option>
              </select>
            </div>
          </div>
          <div class='col-4'>
            <div class='form-group'>
              <label for='inputMunicipio'>Municipio*</label>
              <select required='' class='form-control' id='inputMunicipio' name='inputMunicipio'>
                <option selected>Seleccione una opción</option>
              </select>
            </div>
          </div>
          <div class='col-4'>
            <div class='form-group'>
              <label for='inputColonia'>Colonia*</label>
              <select required='' class='form-control' id='inputColonia' name='inputColonia'>
                <option selected>Seleccione una opción</option>
              </select>
            </div>
          </div>
          <div class='col-5'>
            <div class='form-group'>
              <label for='inputCalle'>Calle*</label>
              <input required='' type='text' name='inputCalle' class='form-control' id='inputCalle'  maxlength='80'>
            </div>
          </div>
          <div class='col-4'>
            <div class='form-group'>
              <label for='inputNacionalidad'>Nacionalidad*</label>
              <select required='' class='form-control' id='inputNacionalidad' name='inputNacionalidad'>
                <option selected>Seleccione una opción</option>
              </select>
            </div>
          </div>
          <div class='col-3'>
            <div class='form-group'>
              <label for='inputCP'>Código Postal*</label>
              <select name='inputCP' class='form-control' id='inputCP'>
              </select>
              <input type='hidden' name='idDireccion' id='idDireccion' value=''>
            </div>
          </div>
        </div>
        <div class='row justify-content-between'>
          <div class='col-auto'>
            <div class='form-group'>
              <label for='inputNumExt'>Número Exterior*</label>
              <input required='' type='text' name='inputNumExt' id='inputNumExt' class='form-control' maxlength='50'>
            </div>
          </div>
          <div class='col-auto'>
            <div class='form-group'>
              <label for='inputnumInt'>Número Interior</label>
              <input type='text' name='inputnumInt' id='inputnumInt' class='form-control' maxlength='50'>
              <small class='form-text text-muted'>Si no tiene número interior no llene este campo</small>
            </div>
          </div>
          <div class='col-auto'>
            <div class='form-group'>
              <label for='inputEstadoCivil'>Estado Civil*</label>
              <select required='' class='form-control' id='inputEstadoCivil' name='inputEstadoCivil'>
                <option value='' selected>Seleccione una opción</option>
                <option value='Soltero'>Soltero</option>
                <option value='Casado'>Casado</option>
                <option value='Union Libre'>Unión Libre</option>
                <option value='Divorciado'>Divorciado</option>
                <option value='Viudo'>Viudo</option>
              </select>
            </div>
          </div>
        </div>
        <div class='row justify-content-between'>
          <div class='col-auto'>
            <div class='form-group'>
              <label for='inputLugarNacimiento'>Lugar de Nacimiento*</label>
              <input required='' type='text' name='inputLugarNacimiento' class='form-control validarTexto' id='inputLugarNacimiento' maxlength='50'>
            </div>
          </div>
          <div class='col-auto'>
            <div class='form-group'>
              <label for='inputFechaNacimiento'>Fecha de Nacimiento*</label>
              <input required='' type='date' min='1950-01-01' name='inputFechaNacimiento' class='form-control' id='inputFechaNacimiento'>
            </div>
          </div>
          <div class='col-2'>
            <div class='form-group noSpinner'>
              <label for='inputEdad'>Edad*</label>
              <input required='' readonly='' type='number' name='inputEdad' min='15' value='15' max='60' class='form-control' id='inputEdad'>
            </div>
          </div>
          <div class='col-3'>
            <div class='form-group'>
              <label for='inputSexo'>Sexo*</label>
              <select required='' class='form-control' id='inputSexo' name='inputSexo'>
                <option value='' selected>Selecciona una opción</option>
                <option value='M'>Masculino</option>
                <option value='F'>Femenino</option>
                <option value='O'>Otros</option>
              </select>
            </div>
          </div>
        </div>
        <div class='row justify-content-start'>
              <div class='col-3'>
                <div class='form-group'>
                  <label for='inputTelefono'>Teléfono</label>
                  <select class='form-control' id='selectTelefono' name='selectTelefono'>
                    <option value='' selected>Tipo</option>
                    <option value='Fijo'>Fijo</option>
                    <option value='Móvil'>Móvil</option>
                    <option value='Otro'>Otro</option>
                  </select>
                </div>
                <div class='row'>
                  <div class='col noSpinner'>
                    <input type='number' class='form-control' id='inputTelefono' name='inputTelefono' placeholder='Número de Teléfono'>
                    <p id='errorTelefono' class='d-none text-danger small'>Sólo teléfonos de 10 digitos</p>
                    <p id='error2Telefono' class='d-none text-danger small'>Seleccione un tipo de teléfono</p>
                  </div>
                </div>
                <div class='row mt-3 mb-3'>
                  <div class='col-auto'>
                    <button id='btnAddTelefono'  class='btn btn-secondary align-center' type='button'>Agregar teléfono</button>
                  </div>
                </div>
              </div>

              <div class='col-5'>
                <input type='hidden' id='numTelefonos' name='numTelefonos' value=''>
                <table id='tablaTelefonos' class='table telefono'>
                  <thead class='thead-dark'>
                    <tr>
                      <th scope='col'>Tipo</th>
                      <th scope='col'>Número de télefono</th>
                      <th scope='col'></th>
                    </tr>
                  </thead>
                  <tbody>

                  </tbody>
                </table>
              </div>

        </div>
        <div class='row justify-content-between'>
          <div class='col-6'>
            Vive con:*
          </div>
          <div class='col-6'>
            Personas que dependen de usted:*
          </div>
        </div>
        <div class='row justify-content-between'>
          <div class='col-6'>
            <div class='form-check form-check-inline'>
              <input required='' type='radio' name='viveOptions' id='checkVive1' value='Padres'>
              <label for='checkVive1'>Sus padres</label>
            </div>
            <div class='form-check form-check-inline'>
              <input required='' type='radio' name='viveOptions' id='checkVive2' value='Familia'>
              <label for='checkVive2'>Su familia</label>
            </div>
            <div class='form-check-inline'>
              <input required='' type='radio' name='viveOptions' id='checkVive3' value='Parientes'>
              <label for='checkVive3'>Sus parientes</label>
            </div>
            <div class='form-check-inline'>
              <input required='' type='radio' name='viveOptions' id='checkVive4' value='Solo'>
              <label for='checkVive4'>Solo</label>
            </div>

          </div>
          <div class='col-6'>
            <div class='form-check form-check-inline'>
              <input type='checkbox' name='dependenOptions1' id='checkDependen1' value='Hijos'>
              <label for='checkDependen1'>Hijos</label>
            </div>
            <div class='form-check form-check-inline'>
              <input type='checkbox' name='dependenOptions2' id='checkDependen2' value='Cónyuge'>
              <label for='checkDependen2'>Cónyuge</label>
            </div>
            <div class='form-check form-check-inline'>
              <input type='checkbox' name='dependenOptions3' id='checkDependen3' value='Padres'>
              <label for='checkDependen3'>Padres</label>
            </div>
            <div class='form-check form-check-inline'>
              <input type='checkbox' name='dependenOptions4' id='checkDependen4' value='Otros'>
              <label for='checkDependen4'>Otros</label>
            </div>
            <div class='form-check-inline'>
              <input type='checkbox' name='dependenOptions5' id='checkDependen5' value='Nadie'>
              <label for='checkDependen5'>Nadie</label>
            </div>
          </div>
        </div>

      <hr>
      <h3>Documentación</h3>

        <div class='row justify-content-between'>
          <div class='col-auto'>
            <div class='form-group'>
              <label for='inputCurp'>CURP*</label>
              <input required='' type='text' class='form-control' id='inputCurp' name='inputCurp' maxlength='18'>
              <p id='error' class='d-none text-danger small'>CURP no valido</p>
            </div>
          </div>
          <div class='col-auto'>
            <div class='form-group'>
              <label for='inputAfore'>AFORE</label>
              <input type='text' class='form-control' id='inputAfore' name='inputAfore' maxlength='50'>
            </div>
          </div>
          <div class='col-auto'>
            <div class='form-group'>
              <label for='inputPasaporte'>Pasaporte</label>
              <input type='text' class='form-control' id='inputPasaporte' name='inputPasaporte' maxlength='14'>
            </div>
          </div>
          <div class='col-auto'>
            <div class='form-group'>
              <label for='inputRFC'>RFC*</label>
              <input required='' type='text' class='form-control' id='inputRFC' name='inputRFC' maxlength='13'>
              <p class='d-none text-danger small'>RFC no valido</p>
            </div>
          </div>
          <div class='col-auto'>
            <div class='form-group noSpinner'>
              <label for='inputNSS'>Número de Seguro Social (NSS)*</label>
              <input required='' type='number' class='form-control' id='inputNSS' name='inputNSS' maxlength='11'>
              <p class='d-none text-danger small'>Número de seguro social no valido</p>
            </div>
          </div>
          <div class='col-auto'>
            <div class='form-group noSpinner'>
              <label for='inputCartilla'>Cartilla Militar</label>
              <i id='ModalHH' onclick='modalCM(),desactivaFloat()' class='material-icons unselection botonx'>info</i> <!--opcional-->
              <input type='text' class='form-control' id='inputCartilla' placeholder='Ejemplo: D-123456...' name='inputCartilla' maxlength='20'>
              <p class='d-none text-danger small'>Matrícula no valida</p>
            </div>
          </div>
        </div>
        <div class='row'>
          <div class='col-auto'>
            <div class='form-check'>
              <input type='checkbox' name='checkExtranjero' id='checkExtranjero' value='Si'>
              <label for='checkExtranjero' class='unselection'>¿Es extranjero?</label>
            </div>
          </div>
          <div class='col-9'>
            <div class='form-group'>
              <label for='inputDocExtranjero'>Documentos que le permiten trabajar en el país</label>
              <input type='text' required='' disabled='' class='form-control validarTexto' id='inputDocExtranjero' name='inputDocExtranjero' maxlength='80'>
            </div>
          </div>
        </div>
        <div class='row'>
          <div class='col-auto'>
            <div class='form-check'>
              <input type='checkbox' name='checkLicencia' id='checkLicencia' value='Si'>
              <label for='checkLicencia' class='unselection'>¿Tiene licencia de manejo?</label>
            </div>
          </div>
          <div class='col-auto'>
            <div class='form-group'>
              <label for='inputTipoLicencia'>Tipo de Licencia</label>
              <select required='' id='inputTipoLicencia' disabled='' name='inputTipoLicencia' class='form-control'>
                <option value='' selected>Selecciona una opción</option>
                <option value='Menor'>Menores de edad</option>
                <option value='A'>Tipo A</option>
                <option value='Basico'>Tipo B</option>
                <option value='C'>Tipo C</option>
                <option value='D'>Tipo D</option>
              </select>
            </div>
          </div>
          <div class='col-auto'>
            <div class='form-group noSpinner'>
              <label for='inputLicencia'>Número de licencia</label>
              <input required='' type='text' disabled='' maxlength='10' class='form-control' id='inputLicencia' name='inputLicencia'>
            </div>
          </div>
        </div>

      <hr>
      <h3>Estado de Salud y Hábitos Personales</h3>

        <div class='row justify-content-around'>
          <div class='col-auto'>
            <div class='form-group'>
              <label>¿Cómo considera su estado de salúd actual?</label>
              <select required='' id='inputEstadoSalud' class='form-control' name='inputEstadoSalud'>
                <option value=''>Seleccione una opción</option>
                <option value='Bueno'>Bueno</option>
                <option value='Regular'>Regular</option>
                <option value='Malo'>Malo</option>
              </select>
            </div>
          </div>
          <div style='display: none;' class='col-auto detallesSalud'>
            <div class='form-group'>
              <label for='inputDetallesSalud'>Especifique su estado de salud</label>
              <textarea type='text' name='inputDetallesSalud' id='inputDetallesSalud' class='form-control validarTexto'></textarea>
            </div>
          </div>
          <div class='col-auto'>
            <div class='form-group'>
              <label for='inputTipoSangre'>Tipo de Sangre</label>
              <select required='' name='inputTipoSangre' id='inputTipoSangre' class='form-control'>
                <option value='a+'>A+</option>
                <option value='a-'>A-</option>
                <option value='b+'>B+</option>
                <option value='b-'>B-</option>
                <option value='ab+'>AB+</option>
                <option value='ab-'>AB-</option>
                <option value='o+'>O+</option>
                <option value='o-'>O-</option>
              </select>
            </div>
          </div>
        </div>
        <div class='row justify-content-between'>
          <div class='col-12'>
            <table id='tablaSalud' class='table table-striped table-bordered tabla'>
              <thead class='thead-dark'>
                <th scope='col'>Pregunta</th>
                <th scope='col'>Resp.</th>
                <th scope='col'>Especificación</th>
              </thead>
              <tbody>
                <tr>
                  <td scope='row'>¿Padece alguna enfermedad crónica?</td>
                  <td><select class=' form-control' name='checkPreguntaSalud1' id='checkPreguntaSalud1'>
                    <option value='Si'>Sí</option>
                    <option value='No'>No</option>
                  </select></td>
                  <td><textarea maxlength='280' required='' class='form-control validarTexto' name='inputPreguntaSalud1' id='inputPreguntaSalud1' rows='2'></textarea></td>
                </tr>
                <tr>
                  <td scope='row'>¿Practica usted algún deporte?</td>
                  <td><select class=' form-control' name='checkPreguntaSalud2' id='checkPreguntaSalud2'>
                    <option value='Si'>Si</option>
                    <option value='No'>No</option>
                  </select>
                  </td>
                  <td><textarea maxlength='280' required='' class='form-control validarTexto' name='inputPreguntaSalud2' id='inputPreguntaSalud2' rows='2'></textarea></td>
                </tr>
                <tr>
                  <td scope='row'>¿Permanece a algún club social o deportivo?</td>
                  <td><select class=' form-control' name='checkPreguntaSalud3' id='checkPreguntaSalud3'>
                    <option value='Si'>Sí</option>
                    <option value='No'>No</option>
                  </select></td>
                  <td><textarea maxlength='280' required='' class='form-control validarTexto' name='inputPreguntaSalud3' id='inputPreguntaSalud3' rows='2'></textarea></td>
                </tr>
                <tr>
                  <td scope='row'>¿Tiene algún pasatiempo?</td>
                  <td><select class=' form-control' name='checkPreguntaSalud4' id='checkPreguntaSalud4'>
                    <option value='Si'>Sí</option>
                    <option value='No'>No</option>
                  </select></td>
                  <td><textarea maxlength='280' required='' class='form-control validarTexto' name='inputPreguntaSalud4' id='inputPreguntaSalud4' rows='2'></textarea></td>
                </tr>
                <tr>
                  <td scope='row'>¿Tiene alguna alergia?</td>
                  <td><select class=' form-control' name='checkPreguntaSalud5' id='checkPreguntaSalud5'>
                    <option value='Si'>Sí</option>
                    <option value='No'>No</option>
                  </select></td>
                  <td><textarea maxlength='280' required='' class='form-control validarTexto' name='inputPreguntaSalud5' id='inputPreguntaSalud5' rows='2'></textarea></td>
                </tr>
                <tr>
                  <td scope='row'>¿Tiene alguna Discapacidad?</td>
                  <td><select class=' form-control' name='checkPreguntaSalud6' id='checkPreguntaSalud6'>
                    <option value='Si'>Sí</option>
                    <option value='No'>No</option>
                  </select></td>
                  <td><textarea maxlength='280' required='' class='form-control validarTexto' name='inputPreguntaSalud6' id='inputPreguntaSalud6' rows='2'></textarea></td>
                </tr>
                <tr>
                  <td scope='row'>¿Está usted embarazada?</td>
                  <td><select class=' form-control' name='checkPreguntaSalud7' id='checkPreguntaSalud7'>
                    <option value='Si'>Sí</option>
                    <option value='No'>No</option>
                  </select></td>
                  <td><textarea maxlength='280' required='' class='form-control validarTexto' placeholder='Especificar meses y situación actual del embarazo' name='inputPreguntaSalud7' id='inputPreguntaSalud7' rows='2'></textarea></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class='row justify-content-between'>
          <div class='col-10'>
            <div class='form-group'>
              <label>¿Cuál es su meta en la vida?*</label>
              <textarea required=''  maxlength='280' class='form-control' id='inputMetaVida' name='inputMetaVida' rows='4'></textarea>
            </div>
          </div>
        </div>

      <hr>
      <h3>Datos Familiares</h3>

        <div class='row justify-content-between'>
          <div class='col-12'>
            <table id='tablaFamiliares' class='table table-striped tabla'>
              <thead class='thead-dark'>
                <th scope='col'>Parentesco</th>
                <th scope='col'>Nombre completo</th>
                <th scope='col'>Vive</th>
                <th scope='col'>Domicilio</th>
                <th scope='col'>Ocupación</th>
              </thead>
              <tbody>
                <tr>
                  <td scope='row'>Padre*</td>
                  <td><input required='' type='text' maxlength='70' name='inputNombreFamiliar1' class='form-control validarTexto' value=''></td>
                  <td><select class='form-control-sm form-control requerido' name='checkFamiliar1' id='checkFamiliar1'>
                    <option value='Si' selected>Sí</option>
                    <option value='No'>No</option>
                  </select></td>
                  <td><input required='' class='form-control' maxlength='100' type='text' id='inputDomicilioFamilia1' name='inputDomicilioFamilia1'></td>
                  <td><input required='' type='text' name='inputFamiliarOcupacion1' maxlength='30' id='inputFamiliarOcupacion1' class='form-control validarTexto'></td>
                </tr>
                <tr>
                  <td scope='row'>Madre*</td>
                  <td><input required='' type='text' name='inputNombreFamiliar2' maxlength='70' class='form-control validarTexto' value=''></td>
                  <td><select class='form-control-sm form-control requerido' name='checkFamiliar2' id='checkFamiliar2'>
                    <option value='Si' selected>Sí</option>
                    <option value='No'>No</option>
                  </select></td>
                  <td><input required='' class='form-control' type='text' maxlength='100' id='inputDomicilioFamilia2' name='inputDomicilioFamilia2'></td>
                  <td><input required='' type='text' name='inputFamiliarOcupacion2' maxlength='30' id='inputFamiliarOcupacion2' class='form-control validarTexto'></td>
                </tr>
                <tr>
                  <td scope='row'>Espos@</td>
                  <td><input type='text' name='inputNombreFamiliar3' maxlength='70' class='form-control validarTexto' value=''></td>
                  <td><select class='form-control-sm form-control' name='checkFamiliar3' id='checkFamiliar3'>
                    <option value='Si' selected>Sí</option>
                    <option value='No'>No</option>
                  </select></td>
                  <td><input class='form-control' type='text' id='inputDomicilioFamilia3' maxlength='100' name='inputDomicilioFamilia3'></td>
                  <td><input type='text' name='inputFamiliarOcupacion3' id='inputFamiliarOcupacion3' maxlength='30' class='form-control validarTexto'></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class='row'>
          <div class='col-auto'>
            <p>Hijos:</p>
          </div>
        </div>
        <div class='row justify-content-between'>
          <div class='col-9'>
            <input type='hidden' name='numHijos' id='numHijos' value=''>
            <table id='tablaHijos' class='table table-striped tabla tabla-hijos'>
              <thead class='thead-dark'>
                <th scope='col'>Nombre completo</th>
                <th scope='col'>Edad</th>
                <th scope='col'><i id='agregarHijos' class='material-icons unselection'>add_box</i></th>
              </thead>
              <tbody>

              </tbody>
            </table>
          </div>
        </div>

      <hr>
      <h3>Escolaridad <i id='ModalHH' onclick='modalESCOL(),desactivaFloat()' class='material-icons unselection botonx'>info</i></h3>
                <div class='modal fade bd-example-modal-lg' id='exampleModal' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                <div class='modal-dialog modal-lg  modal-dialog-centered' role='document'>
                    <div class='modal-content'>
                      <div class='modal-header'>
                        <h3 class='modal-title' id='exampleModalLabel'>¿CÓMO LLENAR EL CAMPO DE HORARIO?</h3>
                        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                          <span aria-hidden='true'>&times;</span>
                        </button>
                      </div>
                      <div class='modal-body' style='text-align: center;'>
                        <img style='width: 90%;' src='img/ejemplo-horario.jpg'>
                      </div>
                      <div class='modal-footer'>
                      </div>
                    </div>
                  </div>
                </div>

                <div class='modal fade bd-example-modal-lg' id='modalEMP' tabindex='-1' role='dialog' aria-labelledby='emp' aria-hidden='true'>
                <div class='modal-dialog modal-lg  modal-dialog-centered' role='document'>
                    <div class='modal-content'>
                      <div class='modal-header'>
                        <h3 class='modal-title' id='emp'>¿CÓMO REGISTRAR UN EMPLEO CORRECTAMENTE?</h3>
                        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                          <span aria-hidden='true'>&times;</span>
                        </button>
                      </div>
                      <div class='modal-body' style='text-align: center;'>
                        <img style='width: 90%;' src='img/ejemplo-empleo.jpg'>
                      </div>
                      <div class='modal-footer'>
                      </div>
                    </div>
                  </div>
                </div>

                <div class='modal fade bd-example-modal-lg' id='ESCOL' tabindex='-1' role='dialog' aria-labelledby='escol' aria-hidden='true'>
                <div class='modal-dialog modal-lg  modal-dialog-centered' role='document'>
                    <div class='modal-content'>
                      <div class='modal-header'>
                        <h3 class='modal-title' id='escol'>¿CÓMO AGREGAR CORRECTAMENTE UNA ESCUELA?</h3>
                        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                          <span aria-hidden='true'>&times;</span>
                        </button>
                      </div>
                      <div class='modal-body' style='text-align: center;'>
                         <img style='width: 90%;' src='img/ejemplo-escuela.jpg'>
                      </div>
                      <div class='modal-footer'>
                      </div>
                    </div>
                  </div>
                </div>


                <div class='modal fade bd-example-modal-lg' id='ModalCM' tabindex='-1' role='dialog' aria-labelledby='CM' aria-hidden='true'>
                <div class='modal-dialog modal-lg  modal-dialog-centered' role='document'>
                    <div class='modal-content'>
                      <div class='modal-header'>
                        <h3 class='modal-title' id='CM'>¿CÓMO LLENAR EL CAMPO CARTILLA MILITAR?</h3>
                        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                          <span aria-hidden='true'>&times;</span>
                        </button>
                      </div>
                      <div class='modal-body' style='text-align: center;'>
                        <img style='width: 90%;' src='img/ejemplo-cartilla.jpg'>
                      </div>
                      <div class='modal-footer'>
                      </div>
                    </div>
                  </div>
                </div>

        <div class='row'>
          <div class='col-12'>
            <div class='setBorder p-3'>
              <div class='agregarEscuela'>
                  <h5 class='noEscuela'>No hay escuela</h5>
              </div>
              <div class='row justify-content-end'>
                <div class='col-4 mt-2'>
                  <button type='button' id='btnQuitarEscuela' class='btn colorBMT btn-block'>Quitar Escuela</button>
                </div>
                <div class='col-4 mt-2'>
                  <button type='button' id='btnAgregarEscuela' class='btn colorBMT btn-block'>Agregar Escuela</button>
                  <input type='hidden' name='numEscuela' id='numEscuela' value='0'>
                </div>
              </div>
            </div>
          </div>
        </div>
      <hr>
      <h3>Conocimientos Generales</h3>

        <div class='row justify-content-start'>
          <div class='col-6'>
            <div class='row'>
              <div class='col-auto'>Idiomas que habla:</div>
            </div>
            <div class='row'>
              <div class='col-12'>
                <input type='hidden' name='numIdiomas' id='numIdiomas' value=''>
                <table id='tablaIdiomas' class='table tabla nospinner table-striped tabla-idioma'>
                  <thead class='thead-dark'>
                    <th scope='col'>Idioma</th>
                    <th scope='col'>Nivel</th>
                    <th scope='col'><i id='agregarIdioma' class='material-icons unselection'>add_circle</i></th>
                  </thead>
                  <tbody>

                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <div class='row justify-content-start'>
          <div class='col-auto'>
            Sistemas operativos que maneja:
          </div>
        </div>
        <div class='row justify-content-between'>
          <div class='col-auto'>
            <div class='form-group'>
              <label for='selectWindows'>Windows</label>
              <select required='' id='selectWindows' name='selectWindows' class='form-control'>
                <option value='No uso'>No lo uso</option>
                <option value='Basico'>Básico</option>
                <option value='Intermedio'>Intermedio</option>
                <option value='Avanzado'>Avanzado</option>
              </select>
            </div>
          </div>
          <div class='col-auto'>
            <div class='form-group'>
              <label for='selectIOS'>IOS</label>
              <select required='' id='selectIOS' name='selectIOS' class='form-control'>
                <option value='No uso'>No lo uso</option>
                <option value='Basico'>Básico</option>
                <option value='Intermedio'>Intermedio</option>
                <option value='Avanzado'>Avanzado</option>
              </select>
            </div>
          </div>
          <div class='col-auto'>
            <div class='form-group'>
              <label for='selectAndroid'>Android</label>
              <select required='' id='selectAndroid' name='selectAndroid' class='form-control'>
                <option value='No uso'>No lo uso</option>
                <option value='Basico'>Básico</option>
                <option value='Intermedio'>Intermedio</option>
                <option value='Avanzado'>Avanzado</option>
              </select>
            </div>
          </div>
          <div class='col-auto'>
            <div class='form-group'>
              <label for='selectLinux'>Linux</label>
              <select required='' id='selectLinux' name='selectLinux' class='form-control'>
                <option value='No uso'>No lo uso</option>
                <option value='Basico'>Básico</option>
                <option value='Intermedio'>Intermedio</option>
                <option value='Avanzado'>Avanzado</option>
              </select>
            </div>
          </div>
        </div>
        <div class='row'>
          <div class='col-auto'>
            <div class='form-check'>
              <input type='checkbox' name='checkOtrosOS' id='checkOtrosOS' value='Si'>
              <label for='checkOtrosOS' class='unselection'>Otro</label>
            </div>
          </div>
        </div>
        <div class='row justify-content-between form-group'>
          <label class='col-form-label col-auto' for='inputOtroSistemaOperativo'>Especifique otro sistema operativo que maneja</label>
          <div class='col-auto'>
            <input type='text' name='inputOtroSistemaOperativo' maxlength='40' placeholder='Especificar sólo uno' id='inputOtroSistemaOperativo' class='form-control'>
          </div>
          <div class='col-auto'>
            <select id='selectOtrosOS' name='selectOtrosOS' class='form-control'>
              <option value='Basico'>Básico</option>
              <option value='Intermedio'>Intermedio</option>
              <option value='Avanzado'>Avanzado</option>
            </select>
          </div>
        </div>

        <div class='row justify-content-start'>
          <div class='col-auto'>
              Manejo de Redes Sociales:
          </div>
        </div>
        <div class='row justify-content-between'>
          <div class='col-auto'>
            <div class='form-group'>
              <label for='selectFacebook'>Facebook</label>
              <select required='' id='selectFacebook' name='selectFacebook' class='form-control'>
                <option value='No uso'>No lo uso</option>
                <option value='Basico'>Básico</option>
                <option value='Intermedio'>Intermedio</option>
                <option value='Avanzado'>Avanzado</option>
              </select>
            </div>
          </div>
          <div class='col-auto'>
            <div class='form-group'>
              <label for='selectTwitter'>Twitter</label>
              <select required='' id='selectTwitter' name='selectTwitter' class='form-control'>
                <option value='No uso'>No lo uso</option>
                <option value='Basico'>Básico</option>
                <option value='Intermedio'>Intermedio</option>
                <option value='Avanzado'>Avanzado</option>
              </select>
            </div>
          </div>
          <div class='col-auto'>
            <div class='form-group'>
              <label for='selectPinterest'>Pinterest</label>
              <select required='' id='selectPinterest' name='selectPinterest' class='form-control'>
                <option value='No uso'>No lo uso</option>
                <option value='Basico'>Básico</option>
                <option value='Intermedio'>Intermedio</option>
                <option value='Avanzado'>Avanzado</option>
              </select>
            </div>
          </div>
          <div class='col-auto'>
            <div class='form-group'>
              <label for='selectYoutube'>Youtube</label>
              <select required='' id='selectYoutube' name='selectYoutube' class='form-control'>
                <option value='No uso'>No lo uso</option>
                <option value='Basico'>Básico</option>
                <option value='Intermedio'>Intermedio</option>
                <option value='Avanzado'>Avanzado</option>
              </select>
            </div>
          </div>
          <div class='col-auto'>
            <div class='form-group'>
              <label for='selectLinkedin'>Linkedin</label>
              <select required='' id='selectLinkedin' name='selectLinkedin' class='form-control'>
                <option value='No uso'>No lo uso</option>
                <option value='Basico'>Básico</option>
                <option value='Intermedio'>Intermedio</option>
                <option value='Avanzado'>Avanzado</option>
              </select>
            </div>
          </div>
          <div class='col-auto'>
            <div class='form-group'>
              <input type='checkbox' name='checkOtrosRS' id='checkOtrosRS' value='Si'>
              <label for='checkOtrosRS' class='unselection'>Otros</label>
            </div>
          </div>
        </div>
        <div class='form-group row justify-content-between'>
            <label for='inputOtraRedSocial' class='col-form-label col-auto'>Especifique qué otra red social maneja:</label>
          <div class='col-5'>
            <input type='text' maxlength='40' placeholder='Especificar solo uno' id='inputOtraRedSocial' name='inputOtraRedSocial' class='form-control'>
          </div>
          <div class='col-auto'>
            <select id='selectOtrosRS' name='selectOtrosRS' class='form-control'>
              <option value='Basico'>Básico</option>
              <option value='Intermedio'>Intermedio</option>
              <option value='Avanzado'>Avanzado</option>
            </select>
          </div>
        </div>
        <div class='row justify-content-start'>
          <div class='col-auto'>
            Paqueteria de Office:
          </div>
        </div>
        <div class='row justify-content-around'>
          <div class='col-auto'>
            <div class='form-group'>
              <label for='selectExcel'>Excel</label>
              <select required='' id='selectExcel' name='selectExcel' class='form-control'>
                <option value='No uso'>No lo uso</option>
                <option value='Basico'>Básico</option>
                <option value='Intermedio'>Intermedio</option>
                <option value='Avanzado'>Avanzado</option>
              </select>
            </div>
          </div>
          <div class='col-auto'>
            <div class='form-group'>
              <label for='selectWord'>Word</label>
              <select required='' id='selectWord' name='selectWord' class='form-control'>
                <option value='No uso'>No lo uso</option>
                <option value='Basico'>Básico</option>
                <option value='Intermedio'>Intermedio</option>
                <option value='Avanzado'>Avanzado</option>
              </select>
            </div>
          </div>
          <div class='col-auto'>
            <div class='form-group'>
              <label for='selectOutlook'>Outlook</label>
              <select required='' id='selectOutlook' name='selectOutlook' class='form-control'>
                <option value='No uso'>No lo uso</option>
                <option value='Basico'>Básico</option>
                <option value='Intermedio'>Intermedio</option>
                <option value='Avanzado'>Avanzado</option>
              </select>
            </div>
          </div>
        </div>
        <div class='row justify-content-around'>
          <div class='col-auto'>
            <div class='form-group'>
              <label for='selectPowerPoint'>Power Point</label>
              <select required='' id='selectPowerPoint' name='selectPowerPoint' class='form-control'>
                <option value='No uso'>No lo uso</option>
                <option value='Basico'>Básico</option>
                <option value='Intermedio'>Intermedio</option>
                <option value='Avanzado'>Avanzado</option>
              </select>
            </div>
          </div>
          <div class='col-auto'>
            <div class='form-group'>
              <label for='selectAccess'>Access</label>
              <select required='' id='selectAccess' name='selectAccess' class='form-control'>
                <option value='No uso'>No lo uso</option>
                <option value='Basico'>Básico</option>
                <option value='Intermedio'>Intermedio</option>
                <option value='Avanzado'>Avanzado</option>
              </select>
            </div>
          </div>
          <div class='col-auto'>
            <div class='form-group'>
              <label for='selectPublisher'>Publisher</label>
              <select required='' id='selectPublisher' name='selectPublisher' class='form-control'>
                <option value='No uso'>No lo uso</option>
                <option value='Basico'>Básico</option>
                <option value='Intermedio'>Intermedio</option>
                <option value='Avanzado'>Avanzado</option>
              </select>
            </div>
          </div>
        </div>
        <div class='row justify-content-start'>
          <div class='col-auto'>
            Aplicaciones:
          </div>
        </div>
        <div class='row justify-content-around'>
          <div class='col-auto'>
            <div class='form-group'>
              <label for='selectWhatsapp'>Whatsapp</label>
              <select required='' id='selectWhatsapp' name='selectWhatsapp' class='form-control'>
                <option value='No uso'>No lo uso</option>
                <option value='Basico'>Básico</option>
                <option value='Intermedio'>Intermedio</option>
                <option value='Avanzado'>Avanzado</option>
              </select>
            </div>
          </div>
          <div class='col-auto'>
            <div class='form-group'>
              <label for='selectSkype'>Skype</label>
              <select required='' id='selectSkype' name='selectSkype' class='form-control'>
                <option value='No uso'>No lo uso</option>
                <option value='Basico'>Básico</option>
                <option value='Intermedio'>Intermedio</option>
                <option value='Avanzado'>Avanzado</option>
              </select>
            </div>
          </div>
          <div class='col-auto'>
            <div class='form-group'>
              <label for='selectOnedrive'>Onedrive</label>
              <select required='' id='selectOnedrive'  name='selectOnedrive' class='form-control'>
                <option value='No uso'>No lo uso</option>
                <option value='Basico'>Básico</option>
                <option value='Intermedio'>Intermedio</option>
                <option value='Avanzado'>Avanzado</option>
              </select>
            </div>
          </div>
        </div>
        <div class='row justify-content-start'>
          <div class='col-auto'>
            <div class='form-check'>
              <input type='checkbox' name='checkOtrosApp' id='checkOtrosApp' value='Si'>
              <label for='checkOtrosApp' class='unselection'>Otros</label>
            </div>
          </div>
        </div>
        <div class='row form-group justify-content-start'>
          <label for='inputOtraAplicacion' class='col-form-label col-auto'>Especifique que otras aplicaciones que maneja:</label>
          <div class='col-auto'>
            <input type='text' maxlength='40' placeholder='Especificar solo uno' name='inputOtraAplicacion' id='inputOtraAplicacion' class='form-control'>
          </div>
          <div class='col-auto'>
            <select class='form-control' id='selectOtrosApp' name='selectOtrosApp'>
              <option value='Basico'>Básico</option>
              <option value='Intermedio'>Intermedio</option>
              <option value='Avanzado'>Avanzado</option>
            </select>
          </div>
        </div>
        <div class='row'>
          <div class='col-auto'>
            Otro software o funciones que domina:
          </div>
        </div>
        <div class='row justify-content-start'>
          <div class='col-6'>
            <input type='hidden' name='numSoft' id='numSoft' value=''>
            <table id='tablaSoftware' class='table tabla table-striped tabla-software'>
              <thead class='thead-dark'>
                <th>Software</th>
                <th>Nivel</th>
                <th><i id='agregarSoftware' class='material-icons unselection'>add_circle</i></th>
              </thead>
              <tbody>

              </tbody>
            </table>
          </div>
        </div>
        <div class='row justify-content-start'>
          <div class='col-auto'>
            <h5>Competencias:</h5>
          </div>
        </div>
        <div class='row justify-content-around'>
          <div class='col-3'>
            <div class='form-group'>
              <label for='selectEtica'>Ética</label>
              <select required='' id='selectEtica' name='selectEtica' class='form-control'>
                <option value='Basico'>Básico</option>
                <option value='Medio'>Medio</option>
                <option value='Alto'>Alto</option>
              </select>
            </div>
          </div>
          <div class='col-3'>
            <div class='form-group'>
              <label for='selectCDA'>Capacidad de Análisis</label>
              <select required='' id='selectCDA' name='selectCDA' class='form-control'>
                <option value='Basico'>Básico</option>
                <option value='Medio'>Medio</option>
                <option value='Alto'>Alto</option>
              </select>
            </div>
          </div>
          <div class='col-3'>
            <div class='form-group'>
              <label for='selectTD'>Toma de Decisiones</label>
              <select required='' id='selectTD' name='selectTD' class='form-control'>
                <option value='Basico'>Básico</option>
                <option value='Medio'>Medio</option>
                <option value='Alto'>Alto</option>
              </select>
            </div>
          </div>
          <div class='col-3'>
            <div class='form-group'>
              <label for='selectCreatividad'>Creatividad</label>
              <select required='' id='selectCreatividad' name='selectCreatividad' class='form-control'>
                <option value='Basico'>Básico</option>
                <option value='Medio'>Medio</option>
                <option value='Alto'>Alto</option>
              </select>
            </div>
          </div>
        </div>
        <div class='row justify-content-around'>
          <div class='col-3'>
            <div class='form-group'>
              <label for='selectHV'>Habilidad Verbal</label>
              <select required='' id='selectHV' name='selectHV' class='form-control'>
                <option value='Basico'>Básico</option>
                <option value='Medio'>Medio</option>
                <option value='Alto'>Alto</option>
              </select>
            </div>
          </div>
          <div class='col-3'>
            <div class='form-group'>
              <label for='selectApegado'>Apegado a instrucciones</label>
              <select required='' id='selectApegado' name='selectApegadoInstrucciones' class='form-control'>
                <option value='Basico'>Básico</option>
                <option value='Medio'>Medio</option>
                <option value='Alto'>Alto</option>
              </select>
            </div>
          </div>
          <div class='col-3'>
            <div class='form-group'>
              <label for='selectIniciativa'>Iniciativa</label>
              <select required='' id='selectIniciativa' name='selectIniciativa' class='form-control'>
                <option value='Basico'>Básico</option>
                <option value='Medio'>Medio</option>
                <option value='Alto'>Alto</option>
              </select>
            </div>
          </div>
          <div class='col-3'>
            <div class='form-group'>
              <label for='selectDisciplina'>Disciplina</label>
              <select required='' id='selectDisciplina' name='selectDisciplina' class='form-control'>
                <option value='Basico'>Básico</option>
                <option value='Medio'>Medio</option>
                <option value='Alto'>Alto</option>
              </select>
            </div>
          </div>
        </div>
        <div class='row justify-content-around'>
          <div class='col-3'>
            <div class='form-group'>
              <label for='selectLiderazgo'>Liderazgo</label>
              <select required='' id='selectLiderazgo' name='selectLiderazgo' class='form-control'>
                <option value='Basico'>Básico</option>
                <option value='Medio'>Medio</option>
                <option value='Alto'>Alto</option>
              </select>
            </div>
          </div>
          <div class='col-3'>
            <div class='form-group'>
              <label for='selectEmpatia'>Empatía</label>
              <select required='' id='selectEmpatia' name='selectEmpatia' class='form-control'>
                <option value='Basico'>Básico</option>
                <option value='Medio'>Medio</option>
                <option value='Alto'>Alto</option>
              </select>
            </div>
          </div>
          <div class='col-3'>
            <div class='form-group'>
              <label for='selectPersistencia'>Persistencia</label>
              <select required='' id='selectPersistencia' name='selectPersistencia' class='form-control'>
                <option value='Basico'>Básico</option>
                <option value='Medio'>Medio</option>
                <option value='Alto'>Alto</option>
              </select>
            </div>
          </div>
          <div class='col-3'>
            <div class='form-group'>
              <label for='selectCompromiso'>Compromiso</label>
              <select required='' id='selectCompromiso' name='selectCompromiso' class='form-control'>
                <option value='Basico'>Básico</option>
                <option value='Medio'>Medio</option>
                <option value='Alto'>Alto</option>
              </select>
            </div>
          </div>
        </div>
        <div class='row justify-content-around'>
          <div class='col-3'>
            <div class='form-group'>
              <label for='selectAutoconfianza'>Autoconfianza</label>
              <select required='' id='selectAutoconfianza' name='selectAutoconfianza' class='form-control'>
                <option value='Basico'>Básico</option>
                <option value='Medio'>Medio</option>
                <option value='Alto'>Alto</option>
              </select>
            </div>
          </div>
          <div class='col-3'>
            <div class='form-group'>
              <label for='selectAdaptabilidad'>Adaptabilidad</label>
              <select required='' id='selectAdaptabilidad' name='selectAdaptabilidad' class='form-control'>
                <option value='Basico'>Básico</option>
                <option value='Medio'>Medio</option>
                <option value='Alto'>Alto</option>
              </select>
            </div>
          </div>
          <div class='col-3'>
            <div class='form-group'>
              <label for='selectIndependencia'>Independencia</label>
              <select required='' id='selectIndependencia' name='selectIndependencia' class='form-control'>
                <option value='Basico'>Básico</option>
                <option value='Medio'>Medio</option>
                <option value='Alto'>Alto</option>
              </select>
            </div>
          </div>
          <div class='col-3'>
            <div class='form-group'>
              <label for='selectIndagacion'>Indagación</label>
              <select required='' id='selectIndagacion' name='selectIndagacion' class='form-control'>
                <option value='Basico'>Básico</option>
                <option value='Medio'>Medio</option>
                <option value='Alto'>Alto</option>
              </select>
            </div>
          </div>
        </div>
        <div class='row justify-content-around'>
          <div class='col-3'>
            <div class='form-group'>
              <label for='selectTE'>Trabajo en Equipo</label>
              <select required='' id='selectTE' name='selectTE' class='form-control'>
                <option value='Basico'>Básico</option>
                <option value='Medio'>Medio</option>
                <option value='Alto'>Alto</option>
              </select>
            </div>
          </div>
          <div class='col-3'>
            <div class='form-group'>
              <label for='selectSeguimiento'>Seguimiento</label>
              <select required='' id='selectSeguimiento' name='selectSeguimiento' class='form-control'>
                <option value='Basico'>Básico</option>
                <option value='Medio'>Medio</option>
                <option value='Alto'>Alto</option>
              </select>
            </div>
          </div>
          <div class='col-3'>
            <div class='form-group'>
              <label for='selectVision'>Visión</label>
              <select required='' id='selectVision' name='selectVision' class='form-control'>
                <option value='Basico'>Básico</option>
                <option value='Medio'>Medio</option>
                <option value='Alto'>Alto</option>
              </select>
            </div>
          </div>
          <div class='col-3'>
            <div class='form-group'>
              <label for='selectOrganizacion'>Organización</label>
              <select required='' id='selectOrganizacion' name='selectOrganizacion' class='form-control'>
                <option value='Basico'>Básico</option>
                <option value='Medio'>Medio</option>
                <option value='Alto'>Alto</option>
              </select>
            </div>
          </div>
        </div>
        <div class='row justify-content-around'>
          <div class='col-3'>
            <div class='form-group'>
              <label for='selectAutocontrol'>Autocontrol</label>
              <select required='' id='selectAutocontrol' name='selectAutocontrol' class='form-control'>
                <option value='Basico'>Básico</option>
                <option value='Medio'>Medio</option>
                <option value='Alto'>Alto</option>
              </select>
            </div>
          </div>
          <div class='col-3'>
            <div class='form-group'>
              <label for='selectPlanificacion'>Planificación</label>
              <select required='' id='selectPlanificacion' name='selectPlanificacion' class='form-control'>
                <option value='Basico'>Básico</option>
                <option value='Medio'>Medio</option>
                <option value='Alto'>Alto</option>
              </select>
            </div>
          </div>
          <div class='col-3'>
            <div class='form-group'>
              <label for='selectDG'>Desarrollo de Gente</label>
              <select required='' id='selectDG' name='selectDG' class='form-control'>
                <option value='Basico'>Básico</option>
                <option value='Medio'>Medio</option>
                <option value='Alto'>Alto</option>
              </select>
            </div>
          </div>
          <div class='col-3'>
            <div class='form-group'>
              <label for='selectCG'>Control de Grupos</label>
              <select required='' id='selectCG' name='selectCG' class='form-control'>
                <option value='Basico'>Básico</option>
                <option value='Medio'>Medio</option>
                <option value='Alto'>Alto</option>
              </select>
            </div>
          </div>
        </div>
        <div class='row justify-content-around'>
          <div class='col-3'>
            <div class='form-group'>
              <label for='selectTF'>Tolerancia a la frustación</label>
              <select required='' id='selectTF' name='selectTF' class='form-control'>
                <option value='Basico'>Básico</option>
                <option value='Medio'>Medio</option>
                <option value='Alto'>Alto</option>
              </select>
            </div>
          </div>
          <div class='col-3'>
            <div class='form-group'>
              <label for='selectMotivacion' class='align-bottom'>Motivación</label>
              <select required='' id='selectMotivacion' name='selectMotivacion' class='form-control align-bottom'>
                <option value='Basico'>Básico</option>
                <option value='Medio'>Medio</option>
                <option value='Alto'>Alto</option>
              </select>
            </div>
          </div>
          <div class='col-3'>
            <div class='form-group'>
              <label for='selectDelegar'>Delegación</label>
              <select required='' id='selectDelegar' name='selectDelegar' class='form-control'>
                <option value='Basico'>Básico</option>
                <option value='Medio'>Medio</option>
                <option value='Alto'>Alto</option>
              </select>
            </div>
          </div>
          <div class='col-3'>
            <div class='form-group'>
              <label for='selectPersuacion'>Persuación</label>
              <select required='' id='selectPersuacion' name='selectPersuacion' class='form-control'>
                <option value='Basico'>Básico</option>
                <option value='Medio'>Medio</option>
                <option value='Alto'>Alto</option>
              </select>
            </div>
          </div>
        </div>
        <div class='row justify-content-around'>
          <div class='col-3'>
            <div class='form-group'>
              <label for='selectPersuacion'>Seguir Instrucciones</label>
              <select required='' id='selectPersuacion' name='selectSeguirInstrucciones' class='form-control'>
                <option value='Basico'>Básico</option>
                <option value='Medio'>Medio</option>
                <option value='Alto'>Alto</option>
              </select>
            </div>
          </div>
          <div class='col-3'>
            <div class='form-group'>
              <label for='selectOR'>Orientación a resultados</label>
              <select required='' id='selectOR' name='selectOR' class='form-control'>
                <option value='Basico'>Básico</option>
                <option value='Medio'>Medio</option>
                <option value='Alto'>Alto</option>
              </select>
            </div>
          </div>
        </div>
        <hr>
        <h3>Empleo Actual y Anteriores<i id='ModalHH' onclick='modalEMP(),desactivaFloat()' class='material-icons unselection botonx'>info</i></h3>
        <h5>NOTA: Anotar empleos de los últimos 5 años</h5>
        <div class='row'>
          <div class='col-12'>
            <div class='setBorder p-3'>
              <div class='agregarEmpleo'>
                <h5 class='noEmpleo'>No hay empleos</h5>

              </div>
              <div class='row justify-content-end mt-3'>
                <div class='col-4'>
                  <button class='btn colorBMT btn-block' id='btnQuitarEmpleo' type='button'>Quitar Empleo</button>
                </div>
                <div class='col-4'>
                  <button class='btn colorBMT btn-block' id='btnAgregarEmpleo' type='button'>Agregar Empleo</button>
                  <input type='hidden' name='numEmpleo' id='numEmpleo' value='1'>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class='row mt-5 justify-content-center'>
          <div class='col-auto'>
            <div class='form-check'>
              <label for='checkPedirInformes' class='unselection'>¿Podemos pedir informes?*</label>
            </div>
            <div class='form-check form-check-inline'>
              <input type='radio' name='checkPedirInformes' id='checkPedirInformes1' value='Si'>
              <label for='checkPedirInformes1'>Si</label>
            </div>
            <div class='form-check form-check-inline'>
              <input class='radios_informes' type='radio' name='checkPedirInformes' id='checkPedirInformes2' value='No'>
              <label for='checkPedirInformes2' >No</label>
            </div>
          </div>
          <div class='col-8'>
            <div class='form-group'>
              <label for='inputRazonesInformes'>Razones:</label>
              <input type='text' maxlength='50' name='inputRazonesInformes' id='inputRazonesInformes' class='form-control'>
            </div>
          </div>
        </div>
        <hr>
        <h3>Referencias Personales (Favor de no incluir jefes anteriores)</h3>
        <div class='row'>
          <div class='col-12'>
            <table class='table table-sm table-striped tabla table-responsive'>
              <thead class='thead-dark'>
                <th scope='col'>Nombre completo</th>
                <th scope='col'>Domicilio</th>
                <th scope='col'>Teléfono</th>
                <th scope='col-auto'>Ocupación</th>
                <th scope='col'>Años conociéndolo</th>
              </thead>
              <tbody class='noSpinner'>
                <tr>
                  <td><input type='text' maxlength='70' name='inputNombreReferencia' id='inputNombreReferencia' class='form-control validarTexto form-control-sm'></td>
                  <td><input type='text' maxlength='100' name='inputDomicilioReferencia' id='inputDomicilioReferencia' class='form-control form-control-sm'></td>
                  <td><input type='text' maxlength='10' name='inputTelefonoReferencia' id='inputTelefonoReferencia' class='form-control form-control-sm validarTelefono'></td>
                  <td><input type='text' maxlength='30' name='inputOcupacionReferencia' id='inputOcupacionReferencia' class='form-control validarTexto form-control-sm'></td>
                  <td class='noSpinner'>
                    <div class='input-group input-group-sm'>
                          <input type='number' name='inputTimepoConociendo' min='0' max='120' class='form-control' aria-describedby='spanAnio'>
                          <div class='input-group-addon'>
                        <span class='input-group-text' id='spanAnio'>Año(s)</span>
                      </div>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td><input type='text' maxlength='70' name='inputNombreReferencia1' id='inputNombreReferencia1' class='form-control validarTexto form-control-sm'></td>
                  <td><input type='text' maxlength='100' name='inputDomicilioReferencia1' id='inputDomicilioReferencia1' class='form-control form-control-sm'></td>
                  <td><input type='text' maxlength='10' name='inputTelefonoReferencia1' id='inputTelefonoReferencia1' class='form-control form-control-sm validarTelefono'></td>
                  <td><input type='text' maxlength='30' name='inputOcupacionReferencia1' id='inputOcupacionReferencia1' class='form-control validarTexto form-control-sm'></td>
                  <td class='noSpinner'>
                    <div class='input-group input-group-sm'>
                          <input type='number' min='0' max='120' name='inputTimepoConociendo1' class='form-control' aria-describedby='spanAnio'>
                          <div class='input-group-addon'>
                        <span class='input-group-text' id='spanAnio'>Año(s)</span>
                      </div>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td><input type='text' maxlength='70' name='inputNombreReferencia2' id='inputNombreReferencia2' class='form-control validarTexto form-control-sm'></td>
                  <td><input type='text' maxlength='100' name='inputDomicilioReferencia2' id='inputDomicilioReferencia2' class='form-control form-control-sm'></td>
                  <td><input type='text' name='inputTelefonoReferencia2' maxlength='10' id='inputTelefonoReferencia2' class='form-control form-control-sm validarTelefono'></td>
                  <td><input type='text' maxlength='30' name='inputOcupacionReferencia2' id='inputOcupacionReferencia2' class='form-control validarTexto form-control-sm'></td>
                  <td class='noSpinner'>
                    <div class='input-group input-group-sm'>
                          <input type='number' min='0' max='120' name='inputTimepoConociendo2' class='form-control' aria-describedby='spanAnio'>
                          <div class='input-group-addon'>
                        <span class='input-group-text' id='spanAnio'>Año(s)</span>
                      </div>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td><input type='text' maxlength='70' name='inputNombreReferencia3' id='inputNombreReferencia3' class='form-control validarTexto form-control-sm'></td>
                  <td><input type='text' maxlength='100' name='inputDomicilioReferencia3' id='inputDomicilioReferencia3' class='form-control form-control-sm'></td>
                  <td><input type='text' maxlength='10' name='inputTelefonoReferencia3' id='inputTelefonoReferencia3' class='form-control form-control-sm validarTelefono'></td>
                  <td><input type='text' maxlength='30' name='inputOcupacionReferencia3' id='inputOcupacionReferencia3' class='form-control validarTexto form-control-sm'></td>
                  <td class='noSpinner'>
                    <div class='input-group input-group-sm'>
                          <input type='number' min='0' max='120' name='inputTimepoConociendo3' class='form-control' aria-describedby='spanAnio'>
                          <div class='input-group-addon'>
                        <span class='input-group-text' id='spanAnio'>Año(s)</span>
                      </div>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td><input type='text' maxlength='70' name='inputNombreReferencia4' id='inputNombreReferencia4' class='form-control validarTexto form-control-sm'></td>
                  <td><input type='text' maxlength='100' name='inputDomicilioReferencia4' id='inputDomicilioReferencia4' class='form-control form-control-sm'></td>
                  <td><input type='text' maxlength='10' name='inputTelefonoReferencia4' id='inputTelefonoReferencia4' class='form-control form-control-sm validarTelefono'></td>
                  <td><input type='text' maxlength='30' name='inputOcupacionReferencia4' id='inputOcupacionReferencia4' class='form-control validarTexto form-control-sm'></td>
                  <td class='noSpinner'>
                    <div class='input-group input-group-sm'>
                          <input type='number' min='0' max='120' name='inputTimepoConociendo4' class='form-control' aria-describedby='spanAnio'>
                          <div class='input-group-addon'>
                        <span class='input-group-text' id='spanAnio'>Año(s)</span>
                      </div>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <hr>
        <!--Aqui empieza-->
        <h2>Datos Económicos</h2>
        <div class='form-row'>
          <div class='col-6'>
            <label class='col-form-label'>¿Tiene usted otros ingresos?</label>
          </div>
          <div class='col-6'>
            <label class='col-form-label'>¿Su cónyugue trabaja?</label>
          </div>
        </div>
        <div class='form-row'>
        <div class='col-6'>
          <div class='row'>
            <div class='col-4'>
                <div class='form-check form-check-inline'>
                    <input type='radio' name='Ingresos' id='checkIngresos1' value='option1'>
                    <label for='checkIngresos1'>No</label>
                </div>
                <div class='form-check form-check-inline'>
                    <input type='radio' name='Ingresos' id='checkIngresos2' value='Si'>
                    <label for='checkIngresos2'>Si</label>
                </div>
            </div>
            <div class='col-2'>
              <label for='' >Monto:</label>
            </div>
            <div class='col-6 sueldos '>
            <div class='input-group input-group-sm'>
              <div class='input-group-addon'>
                <span class='input-group-text' id='pesosjeIcon'>$</span>
              </div>
              <input type='text' name='inputMontoIngresos' maxlength='7' disabled=''  id='inputMontoIngresos' placeholder='Monto' class='form-control form-control-sm validarSueldos' aria-describedby='porcentajeIcon'>

            </div>
            <p id='errors1' class='d-none text-danger small'>Campo numérico</p>
            </div>

          </div>
        </div>
        <div class='col-6'>
          <div class='row'>
            <div class='col-auto'>
              <div class='form-check form-check-inline'>
                  <input type='radio' name='Conyugue' id='checkConyugue1' value='option1'>
                  <label for='checkConyugue1'>No</label>
              </div>
              <div class='form-check form-check-inline'>
                  <input type='radio' name='Conyugue' id='checkConyugue2' value='Si'>
                  <label for='checkConyugue2'>Sí</label>
              </div>
            </div>
            <div class='col-auto'>
              <label for='' >Percepción mensual:</label>
            </div>
            <div class='col sueldos'>
              <div class='input-group input-group-sm'>
                <div class='input-group-addon'>
                  <span class='input-group-text' id='pesosjeIcon'>$</span>
                </div>
                <input type='text' maxlength='7' disabled='' name='PercepcionMC' id='inputPercepcionMensual' placeholder='Monto' class='form-control form-control-sm validarSueldos' aria-describedby='porcentajeIcon'>
              </div>
              <p id='errors1' class='d-none text-danger small'>Campo numérico</p>
            </div>
          </div>
        </div>
        </div>
        <div class='form-row mt-2'>
          <div class='col-2'>
            <label>Describalos:</label>
          </div>
          <div class='col-4'>
            <input type='text' maxlength='50' name='DesOI' id='inputDescribirIngresos' disabled='' placeholder='Descripción' class='form-control validarTexto form-control-sm'>
          </div>
          <div class='col-1'>
            <label>Dónde:</label>
          </div>
          <div class='col-5'>
            <input type='text' disabled='' maxlength='50' placeholder='Descripción' class='form-control validarTexto form-control-sm' name='inputConyugeDonde' id='inputConyugeDonde'>
          </div>
        </div>
        <div class='form-row mt-2'>
          <div class='col-6'>
            <label class='col-form-label'>¿Vive en casa propia?</label>
          </div>
          <div class='col-6'>
            <label class='col-form-label'>¿Paga renta?</label>
          </div>
        </div>
        <div class='form-row mt-2'>
          <div class='col-6'>
            <div class='row'>
              <div class='col-auto'>
                <div class='form-check form-check-inline'>
                    <input type='radio' name='Casa' id='checkCasa1' value='option1'>
                    <label for='checkCasa1'>No</label>
                </div>
                <div class='form-check form-check-inline'>
                    <input type='radio' name='Casa' id='checkCasa2' value='Si'>
                    <label for='checkCasa2'>Sí</label>
                </div>
              </div>
              <div class='col-auto'>
                <label>Valor aproximado:</label>
              </div>
              <div class='col sueldos'>
                <div class='input-group input-group-sm'>
                <div class='input-group-addon'>
                  <span class='input-group-text' id='pesosjeIcon'>$</span>
                </div>
                <input type='text' maxlength='7' disabled='' name='inputValorC' id='inputValorAproximado' placeholder='Monto' class='form-control validarSueldos form-control-sm' aria-describedby='porcentajeIcon'>
                </div>
                <p id='errors1' class='d-none text-danger small'>Campo numérico</p>
              </div>

            </div>
            <div class='row'>
              <div class='col-12'>
                <label class='col-form-label'>¿Tiene automóvil propio?</label>
              </div>
            </div>
            <div class='row mt-2'>
              <div class='col-auto'>
                <div class='form-check form-check-inline'>
                    <input type='radio' name='Auto' id='checkAuto1' value='option1'>
                    <label for='checkAuto1'>No</label>
                </div>
                <div class='form-check form-check-inline'>
                    <input type='radio' name='Auto' id='checkAuto2' value='Si'>
                    <label for='checkAuto2'>Sí</label>
                </div>
              </div>
              <div class='col-auto'>
                <label>Marca:</label>
              </div>
              <div class='col'>
                <input type='text' name='inputMaraC' maxlength='50' disabled='' id='inputMarca' placeholder='Marca y Modelo' class='form-control form-control-sm'>
              </div>
            </div>
          </div>
          <div class='col-6'>
            <div class='row'>
              <div class='col-auto'>
                <div class='form-check form-check-inline'>
                    <input type='radio' name='Renta' id='checkRenta1' value='option1'>
                    <label for='checkRenta1'>No</label>
                </div>
                <div class='form-check form-check-inline'>
                    <input type='radio' name='Renta' id='checkRenta2' value='Si'>
                    <label for='checkRenta2'>Sí</label>
                </div>
              </div>
              <div class='col-auto'>
                <label for=''>Renta mensual:</label>
              </div>
              <div class='col sueldos'>
                <div class='input-group input-group-sm'>
                <div class='input-group-addon'>
                  <span class='input-group-text' id='pesosjeIcon'>$</span>
                </div>
                <input type='text' disabled='' maxlength='7' name='inputRM' id='inputRentaMensual' placeholder='Monto' class='form-control validarSueldos form-control-sm' aria-describedby='porcentajeIcon'>
                </div>
                <p id='errors1' class='d-none text-danger small'>Campo numérico</p>
              </div>
            </div>
            <div class='row'>
              <div class='col'>
                <label for='' class='col-form-label'>¿Tiene deudas?</label>
              </div>
            </div>
            <div class='row mt-2'>
              <div class='col-auto'>
                <div class='form-check form-check-inline'>
                    <input type='radio' name='Deudas' id='checkDeudas1' value='option1'>
                    <label for='checkDeudas1'>No</label>
                </div>
                <div class='form-check form-check-inline'>
                    <input type='radio' name='Deudas' id='checkDeudas2' value='Si'>
                    <label for='checkDeudas2'>Sí</label>
                </div>
              </div>
              <div class='col-auto'>
                <label for=''>Importe:</label>
              </div>
              <div class='col sueldos'>
                <div class='input-group input-group-sm'>
                <div class='input-group-addon'>
                  <span class='input-group-text' id='pesosjeIcon'>$</span>
                </div>
                <input type='text' disabled='' maxlength='7' name='inportMD' id='inputImporte' placeholder='Monto' class='form-control validarSueldos form-control-sm' aria-describedby='porcentajeIcon'>
                </div>
                <p id='errors1' class='d-none text-danger small'>Campo numérico</p>
              </div>
            </div>
          </div>
        </div>
        <div class='form-row'>
          <div class='col-6'>
            <label class='col-form-label'>Año:</label>
          </div>
          <div class='col-6'>
            <label class='col-form-label'>¿Con quién?</label>
          </div>
        </div>
        <div class='form-row'>
          <div class='col-6 noSpinner'>
            <input type='number' name='ModeloC' min='1980'  id='inputModelo' disabled='' placeholder='Modelo' class='form-control form-control-sm'>
          </div>
          <div class='col-6'>
            <input type='text' disabled='' maxlength='50' name='QuienD' id='inputConQuien' placeholder='Nombre' class='form-control form-control-sm'>
          </div>
        </div>
        <div class='form-row'>
          <div class='col-6'>
            <label for='' class='col-form-label'>¿A cuánto ascienden sus gastos mensuales?</label>
          </div>
          <div class='col-6'>
            <label for='' class='col-form-label'>¿Cuánto abona mensualmente?</label>
          </div>
        </div>
        <div class='form-row noSpinner'>
          <div class='col-6'>
            <input required='' type='number' min='0' max='500000' name='GastosM' id='inputGastos' placeholder='Monto' class='form-control form-control-sm'>
          </div>
          <div class='col-6'>
            <input type='number' disabled='' min='0' max='100000' name='AbonoC' id='inputAbono' placeholder='Monto' class='form-control form-control-sm'>
          </div>
        </div>
        <hr>
        <h2>Datos Generales</h2>


        <div class='form-row'>
          <div class='col-6'>
            <div class='row justify-content-between'>
              <div class='col-7'>
                <label for='' class='col-form-label'>¿Cómo supo de este empleo?</label>
              </div>
              <div class='col-4'>
                <select required='' id='selectSaberEmpleo' name='selectSaberEmpleo' class='form-control'>
                  <option value='Anuncio'>Anuncio</option>
                  <option value='BolsaTrabajo'>Bolsa de trabajo de delegación</option>
                  <option value='Facebook'>Facebook</option>
                  <option value='Conocidos'>Conocidos</option>
                  <option value='Pagina'>Página de Marktac</option>
                  <option value='otros'>Otros</option>
                </select>
              </div>
            </div>
            <div class='row mt-3 justify-content-between'>
              <div class='col-3'>
                <label for='' class='col-form-label'>Especifique:</label>
              </div>
              <div class='col-8'>
                <input type='text' maxlength='50' name='EspecifiqueSE' id='inputEspecifique' disabled='' placeholder='Especifique' class='form-control form-control-sm validarTexto'>
              </div>
            </div>
          </div>
          <div class='col-6'>
            <div class='row '>
              <div class='col-12'>
                <label class='col-form-label'>¿Tiene parientes trabajando en esta empresa?</label>
              </div>
            </div>
            <div class='row justify-content-start mt-3'>
              <div class='col-auto'>
                <div class='form-check form-check-inline'>
                    <input type='radio' name='ParientesOptions' id='checkPari1' value='option1'>
                    <label for='checkPari1'>No</label>
                </div>
                <div class='form-check form-check-inline'>
                    <input type='radio' name='ParientesOptions' id='checkPari2' value='Si'>
                    <label for='checkPari2'>Sí</label>
                </div>
              </div>
              <div class='col'>
                <div class='row'>
                  <div class='col-auto'>
                    <label>Nombrelos:</label>
                  </div>
                  <div class='col-7'>
                    <input type='text' disabled='' maxlength='50' name='NombreParientes' id='inputParientes' placeholder='Nombrelos' class='form-control form-control-sm validarTexto'>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class='form-row  mt-2'>
          <div class='col-6'>
            <label class='col-form-label'>¿Ha estado afianzado?</label>
          </div>
          <div class='col-6'>
            <label class='col-form-label'>¿Ha estado afiliado a algún sindicato?</label>
          </div>
        </div>
        <div class='form-row mt-2'>
          <div class='col-2'>
            <div class='form-check form-check-inline'>
                    <input type='radio' name='Afian' id='checkAfian1' value='option1'>
                    <label for='checkAfian1'>No</label>
                </div>
                <div class='form-check form-check-inline'>
                    <input type='radio' name='Afian' id='checkAfian2' value='Si'>
                    <label for='checkAfian2'>Sí</label>
                </div>
          </div>
          <div class='col-1'>
            <label >Cia:</label>
          </div>
          <div class='col-3'>
            <input type='text' disabled='' maxlength='50' name='inputCiaA' id='inputAfianCia' placeholder='Cia' class='form-control form-control-sm'>
          </div>
          <div class='col-2'>
            <div class='form-check form-check-inline'>
                    <input type='radio' name='Sind' id='checkSind1' value='option1'>
                    <label for='checkSind1'>No</label>
                </div>
                <div class='form-check form-check-inline'>
                    <input type='radio' name='Sind' id='checkSind2' value='Si'>
                    <label for='checkSind2'>Sí</label>
                </div>
          </div>
          <div class='col-1'>
            <label >Cia:</label>
          </div>
          <div class='col-3'>
            <input type='text' disabled='' maxlength='50' name='inputCiaS' id='inputSindCia'  placeholder='Cia' class='form-control  form-control-sm'>
          </div>

        </div>
        <div class='form-row mt-2'>
          <div class='col-6'>
            <label class='col-form-label'>¿Tiene seguro de vida?</label>
          </div>
          <div class='col-6'>
            <label class='col-form-label'>¿Puede viajar?</label>
          </div>
        </div>
        <div class='form-row mt-2'>
          <div class='col-2'>
            <div class='form-check form-check-inline'>
                    <input type='radio' name='Segurovi' id='checkSegurovi1' value='option1'>
                    <label for='checkSegurovi1'>No</label>
                </div>
                <div class='form-check form-check-inline'>
                    <input type='radio' name='Segurovi' id='checkSegurovi2' value='Si'>
                    <label for='checkSegurovi2'>Sí</label>
                </div>
          </div>
          <div class='col-1'>
            <label >Cia:</label>
          </div>
          <div class='col-3'>
            <input type='text' disabled='' maxlength='' ='50' id='inputSeguro' name='inputCiaSV' placeholder='Cia' class='form-control form-control-sm'>
          </div>
          <div class='col-2'>
            <div class='form-check form-check-inline'>
                    <input type='radio' name='Viajar' id='checkViajar1' value='No'>
                    <label for='checkViajar1'>No</label>
                </div>
                <div class='form-check form-check-inline'>
                    <input type='radio' name='Viajar' id='checkViajar2' value='option2'>
                    <label for='checkViajar2'>Sí</label>
                </div>
          </div>
          <div class='col-1'>
            <label >Razones:</label>
          </div>
          <div class='col-3'>
            <input type='text' disabled='' maxlength='50' name='inputRazonesViajar' id='inputViajar' placeholder='Razones' class='form-control form-control-sm'>
          </div>

        </div>
        <div class='form-row mt-2'>
          <div class='col-6'>
            <div class='row'>
              <div class='col-12'>
                <label class='col-form-label'>¿Está dispuesto a cambiar de lugar de residencia?</label>
              </div>
            </div>
            <div class='row'>
              <div class='col-4'>
                <div class='form-check form-check-inline'>
                    <input type='radio' name='Residcenia' id='checkResidencia1' value='No'>
                    <label for='checkResidencia1'>No</label>
                </div>
                <div class='form-check form-check-inline'>
                    <input type='radio' name='Residcenia' id='checkResidencia2' value='option2'>
                    <label for='checkResidencia2'>Sí</label>
                </div>
              </div>
              <div class='col-2'>
                <label>Razones:</label>
              </div>
              <div class='col-6'>
                <input type='text' disabled='' maxlength='50' name='inputRazonesCambioR' id='inputRazonesResidencia' placeholder='Razones' class='form-control form-control-sm'>
              </div>
            </div>
          </div>
          <div class='col-3'>
            <label class='col-form-label'>Fecha en que podría presentarse a trabajar:</label>
          </div>
          <div class='col-3'>
            <input required='' id='FechaTrabajar' type='date' name='FechaTrabajar' class='form-control'>
          </div>
        </div>
        <hr>
        <h2>Datos Extras</h2>
        <div class='row justify-content-around'>
          <div class='col-4'>
            <div class='form-group'>
              <label for='inputTallaCamisa'>Talla de Camisa*</label>
              <select required='' class='form-control' name='inputTallaCamisa' id='inputTallaCamisa'>
                <option value='Extra chica'>Extra chica</option>
                <option value='Chica'>Chica</option>
                <option value='Mediana'>Mediana</option>
                <option value='Grande'>Grande</option>
                <option value='Extra grande'>Extra grande</option>
              </select>
            </div>
          </div>
          <div class='col-4'>
            <div class='form-group noSpinner'>
              <label for='inputTallaPantalon'>Talla de Pantalón*</label>
              <input required='' type='number' class='form-control' min='0' max='60' value='' id='inputTallaPantalon' name='inputTallaPantalon'>
            </div>
          </div>
          <div class='col-auto'>
            <div class='form-group'>
              <label for='inputPastel'>Pastel Favorito*</label>
              <input required='' maxlength='50' type='text' name='inputPastel' id='inputPastel' class='form-control validarTexto'>
            </div>
          </div>
        </div>
        <div class='row justify-content-around'>
          <div class='col-4'>
            <div class='form-group'>
              <label for='inputGelatina'>Gelatina Favorita*</label>
              <input required='' maxlength='45' type='text' name='inputGelatina' id='inputGelatina' class='form-control validarTexto'>
            </div>
          </div>
          <div class='col-4'>
            <div class='form-group'>
              <label for='inputColor'>Color Favorito*</label>
              <input required='' maxlength='45' type='text' name='inputColor' id='inputColor' class='form-control validarTexto'>
            </div>
          </div>
          <div class='col-auto'>
            <div class='form-group'>
              <label for='inputComida'>Comida Favorita*</label>
              <input required='' maxlength='45' type='text' name='inputComida' id='inputComida' class='form-control validarTexto'>
            </div>
          </div>
        </div>
        <div class='row justify-content-around'>
          <div class='col-4'>
            <div class='form-group'>
              <label for='inputFacebook'>Cuenta de Facebook</label>
              <input type='text' class='form-control' maxlength='50' name='inputFacebook' id='inputFacebook'>
            </div>
          </div>
          <div class='col-4'>
            <div class='form-group'>
              <label for='inputTwitter'>Cuenta de Twitter</label>
              <div class='input-group'>
                <div class='input-group-addon'>
                  <span class='input-group-text' id='arroba-addon'>@</span>
                </div>
                <input type='text' name='inputTwitter' maxlength='50' id='inputTwitter' class='form-control' aria-label='Cuenta de Twitter' aria-describedby='sarroba-addon'>
              </div>
            </div>
          </div>
        </div>
        <div class='row justify-content-around'>
          <div class='col-4'>
            <div class='form-group'>
              <label for='inputInstagram'>Cuenta de Instagram</label>
              <div class='input-group'>
                <div class='input-group-addon'>
                  <span class='input-group-text' id='arroba-addon'>@</span>
                </div>
                <input type='text' name='inputInstagram' maxlength='50' id='inputInstagram' class='form-control' aria-label='Cuenta de Instagram' aria-describedby='sarroba-addon'>
              </div>
            </div>
          </div>
          <div class='col-4'>
            <div class='form-group'>
              <label for='inputYoutube'>Canal de Youtube</label>
              <div class='input-group'>
                <input class='form-control' id='inputYoutube'  type='text' maxlength='50' name='inputYoutube' aria-label='Canal de Youtube' aria-describedby='sarroba-addon'>
              </div>
            </div>
          </div>
        </div>
        <div class='row justify-content-start ml-3'>
          <div class='col-auto'>
            <div class='row'>Contactos de Emergencia</div>
            <div class='row'>
              <table id='tablaContactos' class='table table-striped table-responsive tabla'>
                <thead class='thead-dark'>
                  <th>Nombre</th>
                  <th>Parentesco</th>
                  <th>Teléfono</th>
                </thead>
                <tbody>
                  <tr>
                    <td><input type='text' maxlength='70' name='NombreCE1' id='NombreCE1' class='form-control validarTexto NombreCE'></td>
                    <td><input type='text' maxlength='40' name='ParentescoCE1' id='ParentescoCE1' class='form-control validarTexto'></td>
                    <td><input type='text' maxlength='10' name='TelefonoCE1' id='TelefonoCE1' class='form-control validarTelefono'></td>
                  </tr>
                  <tr>
                    <td><input type='text' maxlength='70' name='NombreCE2' id='NombreCE2' class='form-control validarTexto NombreCE'></td>
                    <td><input type='text' maxlength='40' name='ParentescoCE2' id='ParentescoCE2' class='form-control validarTexto'></td>
                    <td><input type='text' maxlength='10' name='TelefonoCE2' id='TelefonoCE2' class='form-control validarTelefono'></td>
                  </tr>
                  <tr>
                    <td><input type='text' maxlength='70' name='NombreCE3' id='NombreCE3' class='form-control validarTexto NombreCE'></td>
                    <td><input type='text' maxlength='40' name='ParentescoCE3' id='ParentescoCE3' class='form-control validarTexto'></td>
                    <td><input type='text' maxlength='10' name='TelefonoCE3' id='TelefonoCE3' class='form-control validarTelefono'></td>
                  </tr>
                  <tr>
                    <td><input type='text' maxlength='70' name='NombreCE4' id='NombreCE4' class='form-control validarTexto NombreCE'></td>
                    <td><input type='text' maxlength='40' name='ParentescoCE4' id='ParentescoCE4' class='form-control validarTexto'></td>
                    <td><input type='text' maxlength='10' name='TelefonoCE4' id='TelefonoCE4' class='form-control validarTelefono'></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <hr>
        <div class='row justify-content-md-center mt-2 mb-3'>
          <div class='col'>
            <button type='submit' class='btn btn-block colorBMT'>Enviar solicitud</button>
          </div>
        </div>
        <!--Aqui termina-->
      </form>
    </div>
    <div class='tab-pane fade' id='v-pills-listaemp' role='tabpanel' aria-labelledby='v-pills-listaemp-tab'>
      <h2 class='mb-3'>Empleados</h2>
      <div class='form-row justify-content-between'>
        <div class='form-group col'>
          <div class='input-group'>
            <div class='input-group-addon'><i class='material-icons'>search</i></div>
            <input type='text' class='form-control' id='buscador'  placeholder='Buscar'>
          </div>
        </div>
      </div>

      <div class='row'>
        <div class='col' id='respuesta'>

        </div>
      </div>
    </div>
    <div class='tab-pane fade' id='v-pills-puestos' role='tabpanel' aria-labelledby='v-pills-puestos-tab'>
            <h2>Control de Vacantes</h2>
            <hr>
            <div class='row justify-content-center'>
              <div class='col-12'>
                En el siguiente listado se mostraran de lado izquierdo todos los puestos con los que cuenta la empresa y de lado derecho estaran los puestos vacantes.
              </div>
              <div class='col-12'>
                Para habilitar o deshabilitar las vacantes que estaran en la solicitud de empleo solo es necesario agregar los puestos a la lista de vacantes (lado derecho). Ademas, en caso de ser necesario se pueden agregar o eliminar puestos.
              </div>
            </div>
            <hr>
            <div class='row justify-content-center'>
              <div class='col-5'>
                <p>Puestos</p>
              </div>
              <div class='col-1'></div>
              <div class='col-5'>
                <p>Vacantes</p>
              </div>
            </div>
            <div class='row mb-5'>
              <div class='col-12'>
                <div id='controlPuestos' class='row justify-content-center'>
                  <div class='col-5'>
                    <select id='puestosSelect' multiple class='form-control'>
                    </select>
                  </div>
                  <div class='col-1 align-center'>
                    <div class='row'>
                      <div class='col'><img id='agregarVacante' src='img/next.png'>
                      </div>
                      <div class='col mt-3'>
                          <img id='quitarVacante' src='img/next-invertido.png'>
                      </div>
                      <div class='col mt-3'>
                        <img id='agregarPuesto' src='img/add-sign.png' data-toggle='modal' data-target='#agregarNuevoPuesto'>
                      </div>
                      <div class='col mt-3'>
                        <img id='eliminarPuesto' src='img/delete.png'>
                      </div>
                    </div>
                  </div>
                  <div class='col-5'>
                    <select id='vacantesSelect' multiple class='form-control'>
                    </select>
                  </div>
                </div>
              </div>
            </div>
            <div class='row justify-content-center'>
              <div class='col-5'>
                <button id='savePuestos' class='btn btn-lg btn-block colorBMT'>Guardar Cambios</button>
              </div>
            </div>
          </div>
    <div class='tab-pane fade' id='v-pills-generarCarta' role='tabpanel' aria-labelledby='v-pills-generarCarta-tab'>
      Entraste al generador de cartas
    </div>
    <div class='tab-pane fade' id='v-pills-controlCartas' role='tabpanel' aria-labelledby='v-pills-controlCartas-tab'>
      Entraste al control de cartas
    </div>
  </div>";
}
