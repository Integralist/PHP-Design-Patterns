<?php
    /**
     * The Decorator design pattern is best suited for altering or 
     * "decorating" portions of an existing object's content or functionality 
     * without modifying the structure of the original object
     */

    interface DecoratorInterface
    {
        public function decorate(NationalDebt $object);
    }

    class NationalDebt
    {
        public $debt = 100000000009;
    }
    
    class Decorator implements DecoratorInterface
    {
        public function decorate(NationalDebt $object)
        {
            $object->debt = '$' . number_format($object->debt, 2);
        }
    }
    
    $national = new NationalDebt();
    $decorator = new Decorator();
    $decorator->decorate($national);
    
    echo $national->debt;