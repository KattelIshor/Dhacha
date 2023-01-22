
// Category Delete
$(document).ready(function () {
    $('.delete-category').click(function () {
        var url = $(this).attr('data-url');
        $("#deleteForm").attr("action", url);
    });
});
