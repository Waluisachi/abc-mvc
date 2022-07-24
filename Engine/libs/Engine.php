<?php
  /**
   * This is a utility class with helper functions
   */
  class Engine
  {
    /**
    * @Type { function}
    * @Param { Array or other data types such as strings }
    * @Return { boolean (true if empty )}
    ***/
    // TODO: optimize this function
    function __empty($variable)
    {
      switch (gettype($variable)) {
        case 'integer':
          return true;
          break;
        case 'double':
          return true;
          break;
        case 'string':
          return true;
          break;
        case 'array':
          return empty($variable);
          break;
        case 'boolean':
          return true;
          break;
        case NULL:
          return false;
          break;
        default:
          return false;
          break;
      }
    }
  }

 ?>
