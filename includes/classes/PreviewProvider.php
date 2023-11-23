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

        echo "<div class = 'previewContainer' >

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

    private function getRandomEntity(){
        
        $query = $this->con->prepare("SELECT * FROM entities ORDER BY RAND() LIMIT 1");
        $query->execute();

        $row = $query->fetch(PDO::FETCH_ASSOC);
        
        return new entity($this->con, $row);
        }
}

?>