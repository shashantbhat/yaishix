<?php
class categoryContainers{

    private $con, $username;

    public function __construct($con, $username){
        $this->con = $con;
        $this->username = $username;
    }

    public function showAllCategories(){
        $query = $this->con->prepare("SELECT * FROM categories");
        $query->execute();

        //code below returns all the inner html code in $html

        $html = "<div class = 'previewCategories'>";

        while($row = $query->fetch(PDO::FETCH_ASSOC)){
            $html .= $this->getHtmlCategories($row, null, true, true);
        }
        return $html."</div>";

    }

    private function getHtmlCategories($sqlData, $title, $tv, $movie){
        $categoryId = $sqlData["id"];
        $title = $title == null ? $sqlData["name"] : $title; 

        return $title."<br>";
    }

}

?>