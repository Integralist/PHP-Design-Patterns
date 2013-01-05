<?php
    /**
     * The Factory design pattern provides a simple interface to acquire a new * instance of an object while sheltering the calling code from the steps * to determine which base class is actually instantiated
     */

    class Automobile
    {
        private $vehical_make;
        private $vehical_model;

        public function __construct($make, $model)
        {
            $this->vehical_make = $make;
            $this->vehical_model = $model;
        }

        public function getDetails()
        {
            return $this->vehical_make . ' | ' . $this->vehical_model;
        }
    }
    
    class AutomobileFactory
    {
        public static function create($make, $model)
        {
            return new Automobile($make, $model);
        }
    }

    $veyron = AutomobileFactory::create('Bugatti', 'Veyron');
    
    echo $veyron->getDetails();
    
    /**
     * This code uses a factory to create the Automobile object. There are two * possible benefits to building your code this way, the first is that if * you need to change, rename, or replace the Automobile class later on   * you can do so and you will only have to modify the code in the factory, * instead of every place in your project that uses the Automobile class. * The second possible benefit is that if creating the object is a        * complicated job you can do all of the work in the factory, instead of  * repeating it every time you want to create a new instance.
     * 
     * Using the factory pattern isn’t always necessary (or wise). The example * code used here is so simple that a factory would simply be adding      * unneeded complexity. However if you are making a fairly large or       * complex project you may save yourself a lot of trouble down the road by * using factories.
     */