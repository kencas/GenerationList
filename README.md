# GenerationList
System to Sort the List of Generations by Level

## Design Pattern
The Design Pattern Employed is Singleton, where a new Instance of the ListSingleton class is created via these lines of code

```php

public static function getInstance()
    {
      if (NULL == self::$generationObj) 
      {
         self::$generationObj = new ListSingleton();
      }

      return self::$generationObj;
    }

```

In this model, only an Instance of the class is Created
