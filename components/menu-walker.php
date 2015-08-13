<?php
class My_Sub_Menu extends Walker_Nav_Menu {
  function start_lvl( &$output, $depth = 0, $args = array() ) {
    $indent = str_repeat("\t", $depth);
    $output .= "\n$indent<ul class=\"sub-menu depth-". $depth . "\">\n";
  }
  function end_lv( &$output, $depth = 0, $args = array() ) {
    $indent = str_repeat("\t", $depth);
    $output .= "$indent</ul>\n";
  }
}
