<?php
/* DOKUWIKI:include_once jquery.datatables.js */
// must be run within Dokuwiki
if (!defined('DOKU_INC')) die();
if (!defined('DOKU_PLUGIN')) define('DOKU_PLUGIN', DOKU_INC.'lib/plugins/');
require_once(DOKU_PLUGIN.'syntax.php');

class syntax_plugin_datatables extends DokuWiki_Syntax_Plugin {
  function getType() { return 'container';}
  function getPType(){ return 'block';}
  function getSort() { return 371; }
  function getAllowedTypes() {return array('container','formatting','substition');}
  function connectTo($mode) {
    $this->Lexer->addEntryPattern('<datatables>',$mode,'plugin_datatables');
  }
  function postConnect() {
    $this->Lexer->addExitPattern('</datatables>','plugin_datatables');
  }
  function handle($match, $state, $pos, &$handler){
    switch ($state) {
      case DOKU_LEXER_ENTER :
        break;
      case DOKU_LEXER_UNMATCHED :
        break;
      case DOKU_LEXER_EXIT :
        break;
    }
    return array($state,"");
  }
  
  function render($mode, &$renderer, $data) {
    list($state,$match) = $data;
    if ($mode == 'xhtml'){
      switch ($state) {
        case DOKU_LEXER_ENTER :
          $renderer->doc .= "<div class=\"dokuwiki__datatables_plugin\">";
          break;
        case DOKU_LEXER_UNMATCHED :
		  $renderer->doc .= "unmatched";
          break;
        case DOKU_LEXER_EXIT :
          $renderer->doc .=  "</div>";
          break;
      }
      return true;
    } 
    return false;
  }
}
  
?>