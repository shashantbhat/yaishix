<?php
class PreviewProvider{

    private $con, $username;

    public function __construct($con, $username){
        $this->con = $con;
        $this->username = $username;
    }

    public function createPreviewVideo($entity){
        
        if($entity == null){
            $entity = $this->getRandomEntity();
        }
        
        //calling entity functions
        
        $id = $entity->get_id();
        $name = $entity->get_name();
        $preview = $entity->get_preview();
        $thumbnail = $entity->get_thumbnail();

        //TO DO: ADD A SUBTITLE

        return "<div class = 'previewContainer' >

                    <img src='$thumbnail' class = 'previewImage' hidden>

                    <video autoplay muted class = 'previewVideo' onended = 'previewEnded()'>
                        <source src='$preview' type='video/mp4'>
                    </video>
 
                    <div class = 'previewOverlay'>
                        
                        <div class = 'mainDetails'>
                            <h3>$name</h3>
                            
                            <div class = 'buttons'>
                                <button><i class='fa-solid fa-play'></i> Play</button>
                                <button onclick = 'toggleVol(this)'><i class='fa-solid fa-volume-mute'></i></button>
                            </div>
                        
                        </div>
                    
                    </div>
        
                </div>";
    }

    public function createEntityPreviewSquare($entity){
        $id = $entity->get_id();
        $thumbnail = $entity->get_thumbnail();
        $name = $entity->get_name();

        return "<a href='Entity.php?id=$id'>
                    <div class = 'previewContainer small'>
                        <img src = '$thumbnail' title = '$name'>
                    </div>
                </a>";        
    }

    private function getRandomEntity() {

        $entity = entityProvider::get_entities($this->con, null, 1);
        return $entity[0];
    }

}

?>