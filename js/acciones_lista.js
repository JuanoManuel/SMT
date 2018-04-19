$(document).ready(function(){
  $(document).on("keyup","#buscador",filtrarTabla);
});
function filtrarTabla(){
  jQuery("#buscador").keyup(function(){
      if( jQuery(this).val() != ""){
          jQuery("#tablaLaWebera tbody>tr").hide();
          jQuery("#tablaLaWebera td:contiene-palabra('" + jQuery(this).val() + "')").parent("tr").show();
      }
      else{
          jQuery("#tablaLaWebera tbody>tr").show();
      }
  });

  jQuery.extend(jQuery.expr[":"],
  {
      "contiene-palabra": function(elem, i, match, array) {
          return (elem.textContent || elem.innerText || jQuery(elem).text() || "").toLowerCase().indexOf((match[3] || "").toLowerCase()) >= 0;
      }
  });
}
