$(".compare-table").on("click", ".remove_column", function (event) {
    var ndx = $(this).parent().index() + 1;
    $("td , th", event.delegateTarget).remove(":nth-child(" + ndx + ")");
});