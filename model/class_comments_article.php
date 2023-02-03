<?php

class class_comments_article {  //comments of one article

    private $comments;

    private const   cID = 0, cSTATUS = 1, cCONTENTMODIF = 2, cCONTENT = 3, 
                    cCREATIONDATE = 4, cLASTMODIFICATIONDATE = 5, cFIRSTPUBLICATIONDATE = 6,
                    cIDARTICLE = 7, cLOGINUSER = 8, cTITLE = 9;

    public function __construct($idarticle, $status){ // comments status

        if ($idarticle != "") {  // $idarticle == "" is never used 
            
            $sql = "SELECT id, status, contentmodif, content, creationdate, lastmodificationdate, firstpublicationdate, idarticle, loginuser FROM comment WHERE idarticle = $idarticle AND status = '$status' ORDER BY firstpublicationdate DESC";

            global $conn;
            $result = $conn->query($sql);
           
            if($result != null){ // null when the table is empty (no comment for this article)
                $i=0;
                while($row = $result-> fetch_assoc()){
                    $this->comments[$i][self::cID] = $row['id'];
                    $this->comments[$i][self::cSTATUS] = $row['status'];
                    $this->comments[$i][self::cCONTENTMODIF] = $row['contentmodif'];
                    $this->comments[$i][self::cCONTENT] = $row['content'];
                    $this->comments[$i][self::cCREATIONDATE] = $row['creationdate'];
                    $this->comments[$i][self::cLASTMODIFICATIONDATE] = $row['lastmodificationdate'];
                    $this->comments[$i][self::cFIRSTPUBLICATIONDATE] = $row['firstpublicationdate'];
                    $this->comments[$i][self::cIDARTICLE] = $row['idarticle']; // idem $idarticle
                    $this->comments[$i][self::cLOGINUSER] = $row['loginuser'];
                    
                    $idarticle2 = $row['idarticle']; // idem $idarticle
                    $sql2 = "SELECT title FROM article  WHERE id = $idarticle2"; // idem $idarticle
                    $result2 = $conn->query($sql2);
                    $row2 = $result2-> fetch_assoc();
                    $this->comments[$i][self::cTITLE] = $row2['title'];

                    $i++;
                }
                return true;
            }
            else return false;
        }
        // else never used
    }

    public function getAll() 
    {
        return $this->comments;
    }
}
