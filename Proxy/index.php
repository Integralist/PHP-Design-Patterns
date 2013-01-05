<?php
    /**
     * The Proxy design pattern is used to ensure that a costly object is only 
     * instantiated when it is actually needed
     */

    interface VideoInterface
    {
        function play();
    }
    
    class Video implements VideoInterface
    {
        private $title;

        public function __construct($title)
        {
            $this->title = $title;
        }

        public function play()
        {
            echo 'Playing ' . $this->title . ' video';
        }
    }
    
    class VideoProxy implements VideoInterface
    {
        private $video = null;
        private $title;

        public function __construct($title)
        {
            $this->title = $title;
        }

        public function play()
        {
            /**
             * Notice although the user creates a new `VideoProxy` object we  * don't create a `Video` object until the user actually decides  * they want to play the video.
             */
            if ($this->video === null) {
                $this->video = new Video($this->title);
            }
            
            $this->video->play();
        }
    }
    
    $test = new VideoProxy('The Fountain');
    $test->play();