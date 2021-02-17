<html>


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <input type="text" id="hora_desde" value="8:30" />
  <input type="text" id="hora_hasta" value="9:30" />
  <input type="text" id="horas_justificacion_real" />

<script>
function calculardiferencia(){
  var hora_inicio = $('#hora_desde').val();
  var hora_final = $('#hora_hasta').val();
  
  // Expresión regular para comprobar formato
  var formatohora = /^([01]?[0-9]|2[0-3]):[0-5][0-9]$/;
  
  // Si algún valor no tiene formato correcto sale
  if (!(hora_inicio.match(formatohora)
        && hora_final.match(formatohora))){
    return;
  }
  
  // Calcula los minutos de cada hora
  var minutos_inicio = hora_inicio.split(':')
    .reduce((p, c) => parseInt(p) * 60 + parseInt(c));
  var minutos_final = hora_final.split(':')
    .reduce((p, c) => parseInt(p) * 60 + parseInt(c));
  
  // Si la hora final es anterior a la hora inicial sale
  if (minutos_final < minutos_inicio) return;
  
  // Diferencia de minutos
  var diferencia = minutos_final - minutos_inicio;
  
  // Cálculo de horas y minutos de la diferencia
  var horas = Math.floor(diferencia / 60);
  var minutos = diferencia % 60;
  
  $('#horas_justificacion_real').val(horas + ':'
    + (minutos < 10 ? '0' : '') + minutos);  
}

$('#hora_desde').change(calculardiferencia);
$('#hora_hasta').change(calculardiferencia);
calculardiferencia();
</script>




</html>