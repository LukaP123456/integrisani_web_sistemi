$(document).ready(function () {

    setTimeout(function () {
        $('#message').remove('.show');
        $('#message').add('.hide');
    }, 4000);


    $('body').on('click', '.addPrice', function () {
        let html = ' ' +
            '        <div class="row pt-3 prices">\n' +
            '            <div class="col-md-2 ">\n' +
            '                <label for="size" class="form-label">Size</label>\n' +
            '                <input type="text" class="form-control" id="size" name="size[]">\n' +
            '            </div>\n' +
            '            <div class="col-md-2 ">\n' +
            '                <label for="price" class="form-label">Price</label>\n' +
            '                <input type="number" min="1" max="10000" class="form-control" id="price" name="price[]">\n' +
            '            </div>\n' +
            '            <div class="col-md-2 pt-4">\n' +
            '                <button type="button" class="btn btn-primary removePrice">\n' +
            '                    <i class="bi bi-dash"></i>\n' +
            '                </button>\n' +
            '            </div>\n' +
            '        </div>';

        $('.prices').last().after(html);
    });


    $('body').on('click', '.removePrice', function () {
        $(this).closest('.prices').remove();
    });

}); 