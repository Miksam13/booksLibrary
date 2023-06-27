<section id="header" class="header-wrapper">
    <nav class="navbar navbar-default">
        <div class="container">
            <div class="col-xs-5 col-sm-2 col-md-2 col-lg-2">
                <div class="logo"><a href="http://localhost/books-library/" class="navbar-brand"><span class="sh">Ш</span><span class="plus">++</span></a></div>
            </div>
            <div class="col-xs-12 col-sm-7 col-md-8 col-lg-8">
                <div class="main-menu">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <form class="navbar-form navbar-right">
                            <div class="form-group">
                                <input id="search" type="text" placeholder="Найти книгу" class="form-control">
                                <script>
                                    $("#search").bind("keypress", function (e) {
                                        if (e.keyCode === 13) {
                                            e.preventDefault();
                                            //const booksArr =
                                            //function Search (books, search) {
                                            //    const searchResult = [];
                                            //    const matchingElements = [];
                                            //    books.map((book) => {
                                            //        if(book.title === search || book.description === search) {
                                            //            matchingElements.push(book);
                                            //        }
                                            //        if(book.title.indexOf(search) >= 0) {
                                            //            matchingElements.push(book);
                                            //        }
                                            //        if(book.description.indexOf(search) >= 0) {
                                            //            matchingElements.push(book);
                                            //        }
                                            //    });
                                            //
                                            //    matchingElements.map((x) => {
                                            //        const el = searchResult.find((k) => k.ID === x.ID)
                                            //        if(!el) {
                                            //            searchResult.push(x)
                                            //        }
                                            //    })
                                            //
                                            //    if(!searchResult.length) {
                                            //        console.log('Not found')
                                            //    } else if (searchResult.length) {
                                            //        console.log('Search result:')
                                            //        console.log(searchResult);
                                            //        return searchResult;
                                            //    }
                                            //}
                                            //const result = Search(booksArr, e.target.value);
                                            if($("#search").val() !== '') {
                                                window.location = `books?search=${$("#search").val()}`
                                            } else {
                                                $("#search").blur();
                                            }
                                        }
                                    })
                                </script>

                                <div class="loader"><img src="img/loading.gif"></div>
                                <div id="list" size="" class="bAutoComplete mSearchAutoComplete"></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-xs-2 col-sm-3 col-md-2 col-lg-2 hidden-xs">
                <div class="social"><a href="https://www.facebook.com/shpp.kr/" target="_blank"><span class="fa-stack fa-sm"><i class="fa fa-facebook fa-stack-1x"></i></span></a><a href="http://programming.kr.ua/ru/courses#faq" target="_blank"><span class="fa-stack fa-sm"><i class="fa fa-book fa-stack-1x"></i></span></a></div>
            </div>
        </div>
    </nav>
</section>
<script>
    $(document).ready(function(){
        let params = new URLSearchParams(window.location.search);
        if(params.has('search')){
            $("#search").attr("value", params.get('search'));
        }
    });
</script>