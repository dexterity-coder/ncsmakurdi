//image preview function
function preview_image(event) {
    var reader = new FileReader();
    reader.onload = function () {
        var output = document.getElementById('output_image');
        output.src = reader.result;
    }
    reader.readAsDataURL(event.target.files[0]);
}

//alternative image function
$document.ready(function () {
    $(".alt_img").on("error", function () {
        $(this).attr('src', 'images/register.jpg');
    });
});

//ptinting function
function printtab() {
    var tab = document.getElementById('dataTable');
    newwin = window.open("");
    newwin.document.write(tab.outerHTML);
    newwin.print();
    newwin.close();
}