<section id="main" class="main-wrapper">
    <div class="container">
        <div id="content" class="book_block col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <script id="pattern" type="text/template">
                <div data-book-id="<?php echo $data['book'][0]['id']?>" class="book_item col-xs-6 col-sm-3 col-md-2 col-lg-2">
                    <div class="book">
                        <a href="/book/<?php echo $data['book'][0]['id']?>"><img src="./static/img/<?php echo $data['book'][0]['id']?>.jpg" alt="{title}">
                            <div data-title="<?php echo $data['book'][0]["title"]?>" class="blockI">
                                <div data-book-title="<?php echo $data['book'][0]["title"]?>" class="title size_text"><?php echo $data['book'][0]["title"]?></div>
                                <div data-book-author="<?php foreach ($data['authors'] as $author){echo $author.' ';}?>" class="author"><?php foreach ($data['authors'] as $author){echo $author.' ';}?></div>
                            </div>
                        </a>
                        <a href="/book/<?php echo $data['book'][0]["id"]?>">
                            <button type="button" class="details btn btn-success">Читать</button>
                        </a>
                    </div>
                </div>
            </script>
            <div id="id" book-id="<?php echo $data['book'][0]["id"]?>">
                <div id="bookImg" class="col-xs-12 col-sm-3 col-md-3 item" style="
    margin:;
"><img src="../static/img/<?php echo $data['book'][0]["id"]?>.jpg" alt="Responsive image" class="img-responsive">

                    <hr>
                </div>
                <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9 info">
                    <div class="bookInfo col-md-12">
                        <div id="title" class="titleBook"><?php echo $data['book'][0]["title"]?></div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="bookLastInfo">
                            <div class="bookRow"><span class="properties">автор:</span><span id="author"><?php $str = ''; foreach ($data['authors'] as $author){$str .= $author.', ';}echo substr($str,0,-2);?></span></div>
                            <div class="bookRow"><span class="properties">год:</span><span id="year"><?php echo $data['book'][0]["year"]?></span></div>
                            <div class="bookRow"><span class="properties">страниц:</span><span id="pages"><?php echo $data['book'][0]["pages"]?></span></div>
                            <div class="bookRow"><span class="properties">isbn:</span><span id="isbn"></span></div>
                        </div>
                    </div>
                    <div class="btnBlock col-xs-12 col-sm-12 col-md-12">
                        <button type="button" class="btnBookID btn-lg btn btn-success">Хочу читать!</button>
                    </div>
                    <div class="bookDescription col-xs-12 col-sm-12 col-md-12 hidden-xs hidden-sm">
                        <h4>О книге</h4>
                        <hr>
                        <p id="description"><?php echo $data['book'][0]["description"]?></p>
                    </div>
                </div>
                <div class="bookDescription col-xs-12 col-sm-12 col-md-12 hidden-md hidden-lg">
                    <h4>О книге</h4>
                    <hr>
                    <p class="description"><?php echo $data['book'][0]["description"]?></p>
                </div>
            </div>
            <script src="<?php echo strpos($_SERVER['REQUEST_URI'], "book/") ? "../static" : "static"?>/js/book.js" defer=""></script>
        </div>
    </div>
</section>