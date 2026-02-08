<?php declare (strict_types = 1);
class Comments{
    public static function postComment($authorName, $comment, $movie){
    try {
        $conn = Database::getConnection();
        if ($conn == TRUE) {
            $sql = "INSERT INTO `MovieReview_Comment` (`AuthorName`, `Comments`, `Movie`) VALUES ('$authorName', '$comment', '$movie')";
            if($conn->query($sql) === TRUE){
               if(isset($_POST)){
                   header("Location: http://localhost/XSS/index.php#$movie");
                   unset($_POST);
               }
            }
        }
    } catch (Exception $error) {
            die ("Failed to Post, try again ".$error->getMessage());
        }
    }
}