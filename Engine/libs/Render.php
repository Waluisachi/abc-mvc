<?php
/**
 * @Type class {Render}
 * @Purpose { Renders templets to the browser }
 */
class Render
{
public function render($file, $include=true)
{
  if ($include) {
    require ("src/views/commons/header.php");
    require ("src/views/".$file.".php");
    require ("src/views/commons/footer.php");
  } else {
    require ("src/views/".$file.".php");
  }
}

}

 ?>
