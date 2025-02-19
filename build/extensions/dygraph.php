<?php
/**
* Dygraph extension script for Joe Padfield's Simple site generator
*
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
* @author Joe Padfield
* @since 18/03/2021
* Last updated 22 Dec 2020
*/


$extensionList["dygraph"] = "extensionDygraph";
/**
 * [extensionDygraph description]
 * @param  array  $d  [description]
 * @param  array  $pd [description]
 * @return [type]     [description]
 */
function extensionDygraph (array $d, array $pd)
{
  if (isset($d["file"]) and file_exists($d["file"])) {
    $dets = getRemoteJsonDetails($d["file"], false, true);
  } else {
    $dets = array();
  }

  $pd["extra_js_scripts"] = array(
    "https://cdnjs.cloudflare.com/ajax/libs/dygraph/2.1.0/dygraph.min.js",
    "https://cdnjs.cloudflare.com/ajax/libs/dygraph/2.1.0/dygraph.min.js.map",
    "js/dygraph_Ext.js",
    //"https://unpkg.com/bootstrap-datepicker@1.9.0/dist/js/bootstrap-datepicker.min.js",
  );

  $pd["extra_css_scripts"] = array(
    "https://cdnjs.cloudflare.com/ajax/libs/dygraph/2.1.0/dygraph.min.css",
    "https://cdnjs.cloudflare.com/ajax/libs/dygraph/2.1.0/dygraph.min.css.map",
    //  "https://unpkg.com/bootstrap-datepicker@1.9.0/dist/css/bootstrap-datepicker.min.css",

  );

  $pd["extra_js"] .= " ";

  /*$pd["extra_onload"] .= "

  $(function () { // INITIALIZE DATEPICKER PLUGIN
  $('.datepicker').datepicker({
  clearBtn: true,
  format: \"yyyy-mm-dd\"});});

  $(function () {
  $('[data-toggle=\"tooltip\"]').tooltip()})

  ";*/

  $titles = array( );

  $inputs = array( );

  //do we need tooltips?
  //<div class="input-group col-md-6" data-toggle="tooltip" data-placement="top" title="Standard operating lux Level.">

  $alerts = array( );

  if (isset($d["file"]) and file_exists($d["file"])) {
    ob_start();
    echo <<<END
    END;
    $mcontent = ob_get_contents();
    ob_end_clean(); // Don't send output to client
    $d["content"] = positionExtraContent ($d["content"], $mcontent);
  }
  return array("d" => $d, "pd" => $pd);
}
