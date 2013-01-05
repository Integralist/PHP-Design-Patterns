<?php
    /**
     * The Singleton design pattern is used to restrict the number of times a 
     * specific object can be created to a single time by providing access to 
     * a shared instance of itself
     */

    interface SingletonInterface
    {
        public static function getInstance();
    }
    
    class Singleton implements SingletonInterface
    {
        private static $instance = null;
        public $tester;

        public function __construct()
        {
            $this->tester = rand();
        }

        public function displayMessage()
        {
            echo 'Hello world!<br>';
            echo $this->tester . '<br><br>';
        }

        public static function getInstance()
        {
            /**
             * If the property is null then we know that no previous instance * has been created and so we can create a new instance
             */
            if (is_null(self::$instance)) {
                self::$instance = new self;
            }

            return self::$instance;
        }
    }
    
    /**
     * $test & $test4 will have same values (as they are using single instance)
     * $test2 & $test3 will have different values
     */
    
    $test = Singleton::getInstance();
    $test->displayMessage();
    $test->displayMessage();
    
    $test2 = new Singleton();
    $test2->displayMessage();
    $test2->displayMessage();
    
    $test3 = new Singleton();
    $test3->displayMessage();
    $test3->displayMessage();
    
    $test4 = Singleton::getInstance();
    $test4->displayMessage();
    $test4->displayMessage();