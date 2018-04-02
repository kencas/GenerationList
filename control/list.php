<?php

/*
 *   Define Singleton class
 */
class ListSingleton {
    private static $generationList = array();
    private static $generationObj = NULL;
    private static $index = -1;

    private function __construct() {
        session_start();

        if(isset($_SESSION['generationList']))
        {
            self::$generationList = unserialize($_SESSION['generationList']);
        }
        else
            $_SESSION['generationList'] = serialize(self::$generationList);

            

           // print_r(unserialize($_SESSION['generationList']));
    }

    public static function getInstance()
    {
      if (NULL == self::$generationObj) 
      {
         self::$generationObj = new ListSingleton();
      }

      return self::$generationObj;
    }

    public static function addGeneration($level,$name) {
      if ($name != NULL)
      {
        if (NULL == self::$generationObj) 
        {
           self::$generationObj = new ListSingleton();
        }
        self::$index = $level;
            self::$generationList[self::$index][] = $name;
            $_SESSION['generationList'] = serialize(self::$generationList);
        return self::$generationObj;
      } 
      else 
      {
        return NULL;
      }
    }

    public static function deleteGeneration($id,$fid) {
      if ($id != NULL)
      {
        if (NULL == self::$generationObj) 
        {
           self::$generationObj = new ListSingleton();
        }
        unset(self::$generationList[$id][$fid]);
        $_SESSION['generationList'] = serialize(self::$generationList);
        return self::$generationObj;
      } 
      else 
      {
        return NULL;
      }
    }

    function getGenerationList()
    {
        return self::$generationList;
    }

    
  }
?>
