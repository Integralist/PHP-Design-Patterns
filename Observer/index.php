<?php
    /**
     * The Observer design pattern facilitates the creation of objects that   * watch the state of a targeted functionality that is uncoupled from the * core object.
     */

    interface ObserverInterface
    {
        public function notify(ObservableAbstract $object);
    }

    abstract class ObservableAbstract
    {
        protected $observers = [];

        public function attachObservers($type, ObserverInterface $observer)
        {
            # Create an associative Array with the $type as the key
            $this->observers[$type][] = $observer;
        }

        protected function notifyObservers($type)
        {
            /**
             * If there is a type found in the list of observer types then    * loop through the associated observer objects and trigger notices
             */
            if (!empty($this->observers[$type])) {
                # Loop each observer within the specified type
                foreach ($this->observers[$type] as $observer) {
                    $observer->notify($this);
                }
            }
        }
    }
    
    class Garden extends ObservableAbstract
    {
        public $status = 'unkempt';

        public function weed()
        {
            $this->status = 'weeded';
            $this->notifyObservers('afterweed');
        }

        public function plants()
        {
            $this->status = 'new flowers planted';
            $this->notifyObservers('afterplants');
        }
    }
    
    class GardenObserver implements ObserverInterface
    {
        public function notify(ObservableAbstract $object)
        {
            if ($object->status === 'weeded') {
                echo 'Now I will drink a beer because my garden is ';
                echo $object->status;
                echo '<br><br>';
            } elseif ($object->status === 'new flowers planted') {
                echo 'I will finish off tomorrow. At least I got ';
                echo $object->status;
            }
        }
    }
    
    /**
     * Create a new Garden object 
     * (which extends from the Abstract class `ObservableAbstract`)
     */
    $garden = new Garden();

    /**
     * Create a new Observer object 
     * (which implements the Interface `ObservableInterface`)
     */
    $gardenObserver = new GardenObserver();
    
    # Assign the observer to the garden object for multiple events
    $garden->attachObservers('afterweed', $gardenObserver);
    $garden->attachObservers('afterplants', $gardenObserver);

    # Execute a method which causes any assigned observers to be notified
    $garden->weed();
    $garden->plants();