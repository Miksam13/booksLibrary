<h1>Library ++</h1>
<a type="button" href="http://localhost/books-library/" class="btn btn-danger">Leave</a>
<?php $page_count = floor(count($data) / 4); ?>
<table class="table">
    <thead>
    <tr>
        <th scope="col">Id</th>
        <th scope="col">Book title</th>
        <th scope="col">Authors</th>
        <th scope="col">Year</th>
        <th scope="col">Does</th>
        <th scope="col">Clicks</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($data['table_books'] as $book) { ?>
        <tr>
            <th scope="row"><?php echo $book["id"]?></th>
            <td><?php echo $book["title"]?></td>
            <td><?php $str = ''; foreach ($book['authors'] as $author){$str .= $author.', ';}echo substr($str,0,-2);?></td>
            <td><?php echo $book["year"]?></td>
            <td><button onclick="$.ajax('http://localhost/books-library/application/admin/api/v1/deleteBook.php?bookId=' + <?php echo $book["id"]?>)
                .then((res) => {
                    console.log(res);
                    window.location = 'http://localhost/books-library/admin'
                })" type="button" class="btn btn-danger buttonDeleteBook">Delete</button></td>
            <td><?php echo $book["clicks"]?></td>
        </tr>
    <?php }?>
    </tbody>
</table>
<nav aria-label="...">
    <ul class="pagination pagination-lg">
        <?php for($i = 0; $i < count($data['books'])/4; $i++) {?>
            <a href="admin?table_page=<?php echo $i+1?>" class="page-link btn"><?php echo $i+1?></a>
        <?php } ?>
    </ul>
</nav>
<form class="row g-3 needs-validation" novalidate>
    <div class="col-md-4">
        <label for="validationCustom01" class="form-label">Title book</label>
        <input type="text" class="form-control" id="title validationCustom01" required>
        <div class="invalid-feedback">
            Type title book
        </div>
    </div>
    <div class="col-md-4">
        <label for="validationCustom02" class="form-label">Description book</label>
        <textarea class="form-control" id="description validationCustom02" required></textarea>
        <div class="invalid-feedback">
            Type description book
        </div>
    </div>
    <div class="col-md-6">
        <label for="validationCustom03" class="form-label">Year of book</label>
        <input type="number" class="form-control" id="year validationCustom03" required>
        <div class="invalid-feedback">
            Type year of this book
        </div>
    </div>
    <div class="col-md-6">
        <label for="validationCustom03" class="form-label">Number pages of book</label>
        <input type="number" class="form-control" id="pages validationCustom03" required>
        <div class="invalid-feedback">
            Type number pages of this book
        </div>
    </div>
    <div class="col-md-3">
        <label for="validationCustom05" class="form-label">1 author book</label>
        <input type="text" class="form-control" id="1author validationCustom05" required>
        <div class="invalid-feedback">
            Please, type 1 author of book
        </div>
    </div>
    <div class="col-md-3">
        <label class="form-label">2 author book</label>
        <input type="text" id="2author" class="form-control" >
    </div>
    <div class="col-md-3">
        <label class="form-label">3 author book</label>
        <input type="text" id="3author" class="form-control" >
    </div>
    <div class="form-file">
        <input id="validationCustom03 customFile file" type="file" required class="form-file-input">
        <label for="validationCustom05" class="form-file-label">
            <span class="form-file-text">Choose file...</span>
            <span class="form-file-button">Browse</span>
        </label>
    </div>
    <div class="col-12">
        <button class="btn btn-primary" type="submit">Add book +</button>
    </div>
</form>
<script>
    // Пример стартового JavaScript для отключения отправки форм при наличии недопустимых полей
    (function () {
        'use strict'

        // Получите все формы, к которым мы хотим применить пользовательские стили проверки Bootstrap
        var forms = document.querySelectorAll('.needs-validation');

        // Зацикливайтесь на них и предотвращайте отправку
        Array.prototype.slice.call(forms)
            .forEach(function (form) {
                $("form").submit(function(e){
                    if (!form.checkValidity()) {
                        e.preventDefault();
                    } else {
                        //formData.append('title', title.value);

                        e.preventDefault();


                        // Создание объекта FormData
                        var formData = new FormData();

                        // Получение значений полей формы
                        var title = document.getElementById('title validationCustom01').value;
                        var description = document.getElementById('description validationCustom02').value;
                        var year = document.getElementById('year validationCustom03').value;
                        var pages = document.getElementById('pages validationCustom03').value;
                        var author1 = document.getElementById('1author validationCustom05').value;
                        var author2 = document.getElementById('2author').value;
                        var author3 = document.getElementById('3author').value;
                        var fileInput = document.getElementById('validationCustom03 customFile file');

                        // Добавление значений полей в объект FormData
                        formData.append('title', title);
                        formData.append('description', description);
                        formData.append('year', year);
                        formData.append('pages', pages);
                        formData.append('author1', author1);
                        formData.append('author2', author2);
                        formData.append('author3', author3);

                        // Добавление загружаемой фотографии в объект FormData
                        var file = fileInput.files[0];
                        formData.append('photo', file);
                        $.ajax({
                            data: formData,
                            processData: false,
                            contentType: false,
                            url: 'http://localhost/books-library/application/admin/api/v1/addBook.php',
                            type: 'POST',
                        })
                            .then((res) => {
                                console.log(res);
                            })
                    }

                    form.classList.add('was-validated')
                })
            })
    })()
</script>