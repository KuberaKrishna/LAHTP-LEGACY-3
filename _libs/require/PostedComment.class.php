<?php declare (strict_types = 1);
class PostedComment{
    public static function getPostedComment ($poster){
        try{
            $conn = Database::getConnection();
            if($conn == TRUE){
                $sql = "SELECT `AuthorName`, `Comments` FROM `MovieReview_Comment` JOIN `MovieReview` ON `MovieReview_Comment`.`Movie` = `MovieReview`.`Movie` WHERE `MovieReview`.`Movie` = '$poster' ORDER BY `Comment_Id` DESC";
                $result = $conn->query($sql);
                if($result->num_rows != 0 ){
                    return $result->fetch_all(MYSQLI_ASSOC);
                }
            }
        } catch (Exception $error) {
            die ("Database error: ".$error->getMessage());
        } finally {
            Database::closeConnection();
        }
    }
}