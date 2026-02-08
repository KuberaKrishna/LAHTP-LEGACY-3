<?php declare(strict_types = 1);
class MovieDet{
    public static function getMovieDetail(){
         try{
            $conn = Database::getConnection();
            if($conn == TRUE){
                $sql = "SELECT `Plot`, `Directors`, `Writers`, `Stars`, `Movie`, `Posters` FROM `MovieReview`";
                $result = $conn->query($sql);
                if($result->num_rows != 0){
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