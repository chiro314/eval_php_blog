<?php

class class_comments {

    private $comments;

    private const   cID = 0, cSTATUS = 1, cCONTENTMODIF = 2, cCONTENT = 3, 
                    cCREATIONDATE = 4, cLASTMODIFICATIONDATE = 5, cFIRSTPUBLICATIONDATE = 6,
                    cIDARTICLE = 7, cLOGINUSER = 8, cTITLE = 9;

    public function __construct($idarticle, $status){ // (article, status)

        if ($idarticle != "") {  // $idarticle == "" is used to instanciate an empty object, when creating or deleting an object.
             
            if ($idarticle == "*" and $status == "draft") {  //for the admin
                $sql = "SELECT id, status, contentmodif, content, creationdate, lastmodificationdate, firstpublicationdate, idarticle, loginuser FROM comment WHERE status = '$status' ORDER BY creationdate ASC";
            }
            else if ($idarticle != "*" and $status == "inline"){ //for the user
                echo "$idarticle - $status";
                $sql = "SELECT id, status, contentmodif, content, creationdate, lastmodificationdate, firstpublicationdate, idarticle, loginuser FROM comment WHERE idarticle = $idarticle AND status = '$status' ORDER BY firstpublicationdate DESC";
            }
            //else : no other use for now 

            global $conn;
            $result = $conn->query($sql);
           
            if($result != null){ // null when the table is empty 
                $i=0;
                while($row = $result-> fetch_assoc()){
                    $this->comments[$i][self::cID] = $row['id'];
                    $this->comments[$i][self::cSTATUS] = $row['status'];
                    $this->comments[$i][self::cCONTENTMODIF] = $row['contentmodif'];
                    $this->comments[$i][self::cCONTENT] = $row['content'];
                    $this->comments[$i][self::cCREATIONDATE] = $row['creationdate'];
                    $this->comments[$i][self::cLASTMODIFICATIONDATE] = $row['lastmodificationdate'];
                    $this->comments[$i][self::cFIRSTPUBLICATIONDATE] = $row['firstpublicationdate'];
                    $this->comments[$i][self::cIDARTICLE] = $row['idarticle'];
                    $this->comments[$i][self::cLOGINUSER] = $row['loginuser'];
                    
                    $idarticle2 = $row['idarticle'];
                    $sql2 = "SELECT title FROM article  WHERE id = $idarticle2";
                    $result2 = $conn->query($sql2);
                    $row2 = $result2-> fetch_assoc();
                    $this->comments[$i][self::cTITLE] = $row2['title'];

                    $i++;
                }
                return true;
            }
            else return false;
        }
    }

    public function constructOne($idcomment){
        global $conn;
        $sql = "SELECT id, status, contentmodif, content, creationdate, lastmodificationdate, firstpublicationdate, idarticle, loginuser FROM comment WHERE id = $idcomment";
        $result = $conn->query($sql);
        if($result != null){ // null when the table is empty
            $i=0;
            while($row = $result-> fetch_assoc()){
                $this->comments[$i][self::cID] = $row['id'];
                $this->comments[$i][self::cSTATUS] = $row['status'];
                $this->comments[$i][self::cCONTENTMODIF] = $row['contentmodif'];
                $this->comments[$i][self::cCONTENT] = $row['content'];
                $this->comments[$i][self::cCREATIONDATE] = $row['creationdate'];
                $this->comments[$i][self::cLASTMODIFICATIONDATE] = $row['lastmodificationdate'];
                $this->comments[$i][self::cFIRSTPUBLICATIONDATE] = $row['firstpublicationdate'];
                $this->comments[$i][self::cIDARTICLE] = $row['idarticle'];
                $this->comments[$i][self::cLOGINUSER] = $row['loginuser'];
                    
                $idarticle2 = $row['idarticle'];
                $sql2 = "SELECT title FROM article  WHERE id = $idarticle2";
                $result2 = $conn->query($sql2);
                $row2 = $result2-> fetch_assoc();
                $this->comments[$i][self::cTITLE] = $row2['title'];
                
                $i++;
            }
        }
    }

    public function getFirstpublicationdate($id)
    {
        global $conn;
        $sql = "SELECT firstpublicationdate FROM comment WHERE id = $id";
        $result = $conn->query($sql);
        if($result != null){ // null when the table is empty
            $i=0;
            $row = $result-> fetch_assoc();
            return $row["firstpublicationdate"];
        }
        else return 0;
    }
    public function getCreationdate($id)
    {
        global $conn;
        $sql = "SELECT creationdate FROM comment WHERE id = $id";
        $result = $conn->query($sql);
        if($result != null){ // null when the table is empty
            $i=0;
            $row = $result-> fetch_assoc();
            return $row["creationdate"];
        }
        else return 0;
    }
    public function getIdarticle($id)
    {
        global $conn;
        $sql = "SELECT idarticle FROM comment WHERE id = $id";
        $result = $conn->query($sql);
        if($result != null){ // null when the table is empty
            $i=0;
            $row = $result-> fetch_assoc();
            return $row["idarticle"];
        }
        else return 0;
    }
    public function getLoginuser($id)
    {
        global $conn;
        $sql = "SELECT loginuser FROM comment WHERE id = $id";
        $result = $conn->query($sql);
        if($result != null){ // null when the table is empty
            $i=0;
            $row = $result-> fetch_assoc();
            return $row["loginuser"];
        }
        else return 0;
    }


    public function getAll() 
    {
        return $this->comments;
    }

    public function deleteComment($idcomment){
        // DB update :
        global $conn;
        $sql = "DELETE from comment WHERE id = $idcomment";
        $conn->query($sql);
    }
    public function publishComment($idcomment){
        // DB update :
        global $conn;
        $status = "inline";
        $firstpublicationdate = time();

        $stmt = $conn->prepare("UPDATE comment SET status=?, firstpublicationdate=? WHERE id=?");
        $stmt -> bind_param("sii", $status, $firstpublicationdate, $idcomment);
        $stmt ->execute();
        $stmt -> close();
    }

    public function createComment($content, $idarticle){
        //maj de la base :
        global $conn, $login;
        
        $status = "draft";
        $contentmodif = 0;
        $creationdate = time();
        $lastmodificationdate = 0;
        $firstpublicationdate = 0;
        $loginuser = $login;

        $stmt = $conn->prepare("INSERT INTO comment (status, contentmodif, content, creationdate, lastmodificationdate, firstpublicationdate, idarticle, loginuser) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt -> bind_param("sisiiiis", $status, $contentmodif, $content, $creationdate, $lastmodificationdate, $firstpublicationdate, $idarticle, $loginuser); 
        $stmt ->execute();
        $stmt -> close();
    }
    
    public function updateComment($id, $status, $contentmodif, $content, $creationdate, $lastmodificationdate, $firstpublicationdate, $idarticle, $loginuser) {
        global $conn, $login;
        
        $stmt = $conn->prepare("UPDATE comment SET status=?, contentmodif=?, content=?, creationdate=?, lastmodificationdate=?, firstpublicationdate=?, idarticle=?, loginuser=? WHERE id=?");
        $stmt -> bind_param("sisiiiisi", $status, $contentmodif, $content, $creationdate, $lastmodificationdate, $firstpublicationdate, $idarticle, $loginuser, $id);
        $stmt ->execute();
        $stmt -> close();
    }
}