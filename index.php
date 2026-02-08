<?php require_once '_libs/load.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="icon/web-logo.png">
    <link rel="stylesheet" href="css/style.css">
    <title>Movie Review</title>
</head>
<body>
<?=loadTemplate('header.php');
loadTemplate('aside.php'); ?>
    <div class="container">
        <main>
        <h1 class="heading">Top 15  Movies of 2025</h1>
<?php
if(isset($_POST['comment']) && isset($_POST['authorName']) && isset($_POST['movieName'])):
    // A vulnerability occurs if there is no sanitization of user input.
        $author = $_POST['authorName'];
        $comment = $_POST['comment'];
        $movieName = $_POST['movieName'];
        Comments::postComment($author, $comment, $movieName);
else:
        $moviesDetail = MovieDet::getMovieDetail();
        foreach($moviesDetail as $movie):
?>
    <div class="movie-container">
                <img class="poster" src="movies-poster/<?=$movie['Posters'];?>" alt="MoviePoster">
            <div class="movie-info"  id="<?=$movie['Movie'];?>">
                <h1><?=$movie['Movie'];?></h1>
                <p><b>Directors: </b><?=$movie['Directors'];?></p>
                <p><b>Writers: </b><?=$movie['Writers'];?></p>
                <p><b>Stars: </b><?=$movie['Stars'];?></p>
                <h2>Plot</h2>
                <p class="movie-plot"><?=$movie['Plot'];?></p>
            </div>
        </div>
    </main>
    <section class="comment-section">
        <div>
        <h3>Comments</h3>
        <form action="index.php" class="form-comment" method="POST">
            <input  name="authorName" class="author"   placeholder="Enter your name" type="text" required>
            <textarea name="comment"  class="comment"  placeholder="Enter your opinion about this movie here!" required></textarea>
            <button name="movieName"  value="<?=$movie['Movie'];?>" class="post">Post</button>
        </form>
    </div>
    <div>
        <h3>Reviews</h3>
        <div class="r-container">
        <?php
            $posted = PostedComment::getPostedComment($movie['Movie']);
            foreach($posted as $pc):
        ?>
            <h3 class="r-authorname"><?='@'.$pc['AuthorName']?></h3>
            <p class="r-comment"><?=$pc['Comments']?></p>
            <?php endforeach; ?>
            </div>
        </div>
    </section>
    <?php endforeach; ?>
    <?php endif; ?>
</div>
<footer>
    <div class="social-links">
        <h5>Follow us on</h5>
        <div class="link-icons">
            <a href="#instagram"><img src="icon/instagram-logo.svg" alt="instagram-logo"></a>
            <a href="#facebook"><img src="icon/facebook-logo.svg" alt="facebook-logo"></a>
            <a href="#X"><img src="icon/X-logo.svg" alt="X-logo"></a>
            <a href="#YouTube"><img src="icon/yt-logo.svg" alt="yt-logo"></a>
        </div>
    </div>
    <div class="certificate">
        &copy;<p>2025-2026 by moviereview.com, Inc.</p>
    </div>
</footer>
<script>
        function clapBoard(){
            const btn = document.querySelector('.take').classList;
            const clapBoard = document.querySelector(".clap-board").classList;
            clapBoard.toggle('show-clap-board');
            btn.toggle('btn-transform');
        }
    </script>
</body>
</html>