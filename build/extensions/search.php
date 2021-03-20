<?php

/**
 * Search extension script for Joe Padfield's Simple site generator
 *
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
 * @author Daniel Pett (minimal)
 */
$extensionList["search"] = "extensionSearch";
/**
 * [extensionSearch description]
 * @param  array $d  [description]
 * @param  array $pd [description]
 * @return array     [description]
 */
function extensionSearch( array $d, array $pd)
{

  $pd["extra_js_scripts"] = array(
    "lunr" => "https://cdnjs.cloudflare.com/ajax/libs/lunr.js/2.3.9/lunr.min.js",
    "search" => "js/search.js"
    //"https://unpkg.com/bootstrap-datepicker@1.9.0/dist/js/bootstrap-datepicker.min.js",
  );

  $pd["extra_js"] .= " ";

  if (isset($d["file"]) and isset($d["displaycode"])) {
    $dets = getRemoteJsonDetails($d["file"], false, true);
    $extraHTML .= displayCode ($dets, "The Curtain JSON File", "json", $codecaption);
  }
  return array("d" => $d, "pd" => $pd);
}
