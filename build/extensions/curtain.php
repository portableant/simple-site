<?php
/**
* Curtain extension script for Joe Padfield's Simple site generator
*
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
* @author Joe Padfield
* @since 18/03/2021
* Last updated 22 Dec 2020
* A V&A viewer (https://github.com/vanda/curtain-viewer) based on OpenSeaDragon, using the curtain-sync plugin (https://github.com/cuberis/openseadragon-curtain-sync) for comparing naturally aligned image variants, such as those obtained by multi-spectral imaging, supplied as canvases in a IIIF manifest.
*/

$extensionList["curtain"] = "extensionCurtain";
/**
 * [extensioncurtain description]
 * @param  array  $d  [description]
 * @param  array  $pd [description]
 * @return [type]     [description]
 */
function extensioncurtain (array $d, array $pd) {
  global $extraHTML;
  $workspace = false;
  $mans = '[]';
  $wo = '';
  $codeHTML = "";
  $codecaption = "The complete curtain JSON file used to define the manifests and images presented in this example.";

  if (isset($d["file"]) and isset($d["displaycode"])) {
    $dets = getRemoteJsonDetails($d["file"], false, true);
    $extraHTML .= displayCode ($dets, "The Curtain JSON File", "json", $codecaption);
  }

  $pd["extra_css_scripts"][] = "https://jpadfield.github.io/curtain-viewer/bundle.css";
  $pd["extra_js_scripts"] = array(
    "https://jpadfield.github.io/curtain-viewer/js/1.08958bb6.chunk.js",
    "https://jpadfield.github.io/curtain-viewer/js/app.a955ee34.js"
  );

  $d["content"] = positionExtraContent ($d["content"], '<div class="row"
  style="padding-left:16px;padding-right:16px;"><div class="col-12
  col-lg-12"><div class="curtain-viewer" data-iiif-manifest="' . $d["file"]
  . '"></div></div></div>'.$codeHTML);

  return array("d" => $d, "pd" => $pd);
}
