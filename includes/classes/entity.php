<?php 

class entity{

    private $con, $sqlData;

    public function __construct($con, $input){
        $this->con = $con;
        
        if(is_array($input)){
            $this->sqlData= $input;
        }

        else{
            //storing the record info from entity table into sqlData
            $query = $this->con->prepare("SELECT * FROM entities WHERE id=:id");
            $query->bindValue(":id",$input);
            $query->execute();

            $this->sqlData = $query->fetch(PDO::FETCH_ASSOC);

        }

    }
    //to retrieve the record info for entity table

    public function get_id(){
        return $this->sqlData["id"]; 
    }

    public function get_name(){
        return $this->sqlData["name"]; 
    }

    public function get_thumbnail(){
        return $this->sqlData["thumbnail"];
    }

    public function get_preview(){
        return $this->sqlData["preview"];
    }

    public function get_categoryId(){
        return $this->sqlData["categoryId"];
    }

    public function getSeasons() {
        $query = $this->con->prepare("SELECT * FROM videos WHERE entityId=:id
                                    AND isMovie=0 ORDER BY season, episode ASC");
        $query->bindValue(":id", $this->get_id());
        $query->execute();

        $seasons = array();
        $videos = array();
        $currentSeason = null;
        while($row = $query->fetch(PDO::FETCH_ASSOC)) {
            
            if($currentSeason != null && $currentSeason != $row["season"]) {
                $seasons[] = new seasons($currentSeason, $videos);
                $videos = array();
            }

            $currentSeason = $row["season"];
            $videos[] = new video($this->con, $row);

        }

        if(sizeof($videos) != 0) {
            $seasons[] = new seasons($currentSeason, $videos);
        }

        return $seasons;
    }

}
?>
