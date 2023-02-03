<?php

class class_articles {

    private $articles;

    private const ID = 0, TITLE = 1, PHOTO = 2, SUMMARY = 3, CONTENT = 4, SHOWCASE = 5;
    private const STATUS = 6, FIRSTPUBLICATIONDATE = 7, LASTMODIFICATIONDATE = 8, LOGINUSER = 9;

    public function __construct($theme, $status){

        if ($theme != "") {  // $theme == "" is used to instanciate an empty object, when creating or deleting one article.
            global $conn, $login;
            if ($theme == "*") {
                if ($status == "*") {
                    $sql = "SELECT id, title, photo, summary, content, showcase, status, firstpublicationdate, lastmodificationdate, loginuser FROM article ORDER BY status ASC";
                }
                else if ($status == "inline") {
                    //$sql = "SELECT id, title, photo, summary, content, showcase, status, firstpublicationdate, lastmodificationdate, loginuser FROM article WHERE status = '$status' ORDER BY firstpublicationdate DESC";
                
                    $sql= "(SELECT id, title, photo, summary, content, showcase, status, firstpublicationdate, lastmodificationdate, loginuser FROM article WHERE status = '$status' AND showcase != 0 ORDER BY showcase DESC)";
                    $sql.= " UNION";
                    $sql.= " (SELECT id, title, photo, summary, content, showcase, status, firstpublicationdate, lastmodificationdate, loginuser FROM article WHERE status = '$status' AND showcase = 0 ORDER BY firstpublicationdate DESC)"; 
                }
            }
            else if ($theme != "*" and $status == "inline"){
                $sql = "SELECT A.id, A.title, A.photo, A.summary, A.content, A.showcasse, A.status, A.firstpublicationdate, A.lastmodificationdate, A.loginuser FROM articleAS A, article_theme AS A_T, theme AS T WHERE A.status = '$status' AND A.id = A_T.idarticle AND A_T.idtheme = T.id AND T.title = '$theme' ORDER BY firstpublicationdate DESC";
            }
            //else : no other use

            $result = $conn->query($sql);
            if($result != null){ // null when the table is empty
                $i=0;
                while($row = $result-> fetch_assoc()){
                    $this->articles[$i][self::ID] = $row['id'];
                    $this->articles[$i][self::TITLE] = $row['title'];
                    $this->articles[$i][self::PHOTO] = $row['photo'];
                    $this->articles[$i][self::SUMMARY] = $row['summary'];
                    $this->articles[$i][self::CONTENT] = $row['content'];
                    $this->articles[$i][self::SHOWCASE] = $row['showcase'];
                    $this->articles[$i][self::STATUS] = $row['status'];
                    $this->articles[$i][self::FIRSTPUBLICATIONDATE] = $row['firstpublicationdate'];
                    $this->articles[$i][self::LASTMODIFICATIONDATE] = $row['lastmodificationdate'];
                    $this->articles[$i][self::LOGINUSER] = $row['loginuser'];

                    $i++;
                }
            }
        }
    }

    public function constructOne($id){
        global $conn;
        $sql = "SELECT id, title, photo, summary, content, showcase, status, firstpublicationdate, lastmodificationdate, loginuser FROM article WHERE id = $id";
        $result = $conn->query($sql);
        if($result != null){ // null when the table is empty
            $i=0;
            while($row = $result-> fetch_assoc()){
                $this->articles[$i][self::ID] = $row['id'];
                $this->articles[$i][self::TITLE] = $row['title'];
                $this->articles[$i][self::PHOTO] = $row['photo'];
                $this->articles[$i][self::SUMMARY] = $row['summary'];
                $this->articles[$i][self::CONTENT] = $row['content'];
                $this->articles[$i][self::SHOWCASE] = $row['showcase'];
                $this->articles[$i][self::STATUS] = $row['status'];
                $this->articles[$i][self::FIRSTPUBLICATIONDATE] = $row['firstpublicationdate'];
                $this->articles[$i][self::LASTMODIFICATIONDATE] = $row['lastmodificationdate'];
                $this->articles[$i][self::LOGINUSER] = $row['loginuser'];

                $i++;
            }
            //echo "<br>constructOne : ".$this->articles[0][self::FIRSTPUBLICATIONDATE];
        }
    }

    public function getId()
    {
        return $this->articles[0][self::ID];
    }
    
    public function getFirstpublicationdate($id)
    {
        global $conn;
        $sql = "SELECT firstpublicationdate FROM article WHERE id = $id";
        $result = $conn->query($sql);
        if($result != null){ // null when the table is empty
            $i=0;
            $row = $result-> fetch_assoc();
            return $row["firstpublicationdate"];
        }
        else return 0;
    }

    public function getAll() 
    {
        return $this->articles;
    }

    public function createArticle($title, $photo, $summary, $content){
        //maj de la base :
        global $conn, $login;
        $date = time();
        $status = "draft";
        $stmt = $conn->prepare("INSERT INTO article (title, photo, summary, content, lastmodificationdate, loginuser, status) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt -> bind_param("ssssiss", $title, $photo, $summary, $content, $date, $login, $status); 
        $stmt ->execute();
        $stmt -> close();
    }
    
    public function updateArticle($id, $title, $photo, $summary, $content, $showcase, $status, $firstpublicationdate, $lastmodificationdate, $loginuser){
        global $conn, $login;
        
        $stmt = $conn->prepare("UPDATE article SET title=?, photo=?, summary=?, content=?, showcase=?, status=?, firstpublicationdate=?, lastmodificationdate=?, loginuser=? WHERE id=?");
        $stmt -> bind_param("ssssisiisi", $title, $photo, $summary, $content, $showcase, $status, $firstpublicationdate, $lastmodificationdate, $loginuser, $id); 
        $stmt ->execute();
        $stmt -> close();
    }
   
    public function deleteArticle($id){
        // DB update :
        global $conn;
        $sql = "DELETE from article WHERE id = $id";
        $conn->query($sql);
    }
}