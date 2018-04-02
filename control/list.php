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

//   $generation1 = 'Kene';

//   $generationSingleton = ListSingleton::addGeneration(0,$generation1);

//   //print_r($generationSingleton->getGenerationList());

// //   if($generationSingleton != NULL)
// //     print_r($generationSingleton::getGenerationList());


//     $generation2 = 'Charles';

//   $generationSingleton = ListSingleton::addGeneration(0,$generation2);

//   //print_r($generationSingleton->getGenerationList());

//   $generation3 = 'James';

//   $generationSingleton = ListSingleton::addGeneration(8,$generation3);
//   //print_r($generationSingleton->getGenerationList());


//   $generation3 = 'James Arum';

//   $generationSingleton = ListSingleton::addGeneration(8,$generation3);

//   $generation3 = 'Charles Ifedi';

//   $generationSingleton = ListSingleton::addGeneration(8,$generation3);

//   $generation3 = 'Charles Ifedi 2';

//   $generationSingleton = ListSingleton::addGeneration(18,$generation3);
//   //print_r($generationSingleton->getGenerationList());

//   $keys = array_keys($generationSingleton->getGenerationList());

//   $array = $generationSingleton->getGenerationList();

//   //print_r($keys);

//   foreach($keys as $b1)
//   {
//       echo '<br>' . 'Level: ' . $b1 . '<br>'; 
//       //print_r($array[$b1]);
//         foreach($array[$b1] as $b)
//         {
//             //echo $b;
//             echo '<table border="1"><tr>
//                     <td>'. $b . '</td>'.
//                     '<tr></tr></table><br>';
//         }
        
//   }

//   ?>
