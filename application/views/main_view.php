<section id="main" class="main-wrapper">
    <div class="container">
        <div id="content" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <?php foreach ($data as $book) {?>
                <div data-book-id="<?php echo $book["id"]?>" class="book_item col-xs-6 col-sm-3 col-md-2 col-lg-2">
                    <div class="book">
                        <a onclick="$.ajax('http://localhost/books-library/application/api/v1/addView.php?bookId=<?php echo $book["id"]?>').then((res) => console.log(res));" href="http://localhost/books-library/book/<?php echo $book["id"]?>"><img src="<?php echo strpos($_SERVER['REQUEST_URI'], "books-library/book/") ? '../static' . $book["imgUrl"] : 'static' . $book["imgUrl"]?>" alt="<?php echo $book["title"]?>">
                            <div data-title="<?php echo $book["title"]?>" class="blockI" style="height: 46px;">
                                <div data-book-title="<?php echo $book["title"]?>" class="title size_text"><?php echo $book["title"]?></div>
                                <div data-book-author="<?php $str = ''; foreach ($book['authors'] as $author){$str .= $author.', ';}echo substr($str,0,-2);?>" class="author"><?php $str = ''; foreach ($book['authors'] as $author){$str .= $author.', ';}echo substr($str,0,-2);?></div>
                            </div>
                        </a>
                        <a href="http://localhost/books-library/book/<?php echo $book["id"]?>">
                            <button type="button" class="details btn btn-success">Читать</button>
                        </a>
                    </div>
                </div>
            <?php }?>
        </div>
    </div>
</section>