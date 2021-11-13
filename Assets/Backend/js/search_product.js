$(document).ready(function () {
    function loadTable(page,query="")
    {
        $.ajax({
            url : "index.php?area=backend&controller=product&action=search",
            type : "POST",
            data : { page : page,
                query : query
            },
            beforeSend: function() {$("#loading").fadeIn('slow');},
            success:function(data) {
                $("#order_table_text").html(data);4
            }
        });
    }
    $(document).on("click","#pagination li",function (e) {
        e.preventDefault();
        var page_id=$(this).attr("id");
        var query=$("#search_text").val();
        loadTable(page_id,query);
    });
    $("#search_text").keyup(function () {
        var query=$("#search_text").val();
        var page_id=$(this).attr("id");
        loadTable(page_id,query);
    });
});


$(document).ready(function () {
    function loadTableOder(page,query="")
    {
        $.ajax({
            url : "index.php?area=backend&controller=ShoppingCart&action=search",
            type : "POST",
            data : { page : page,
                query : query
            },
            success:function(data) {
                $("#order").html(data);
            }
        });
    }
    $(document).on("click","#pagination_order li",function (e) {
        e.preventDefault();
        var page_id=$(this).attr("id");
        var query=$("#search_shopping").val();
        loadTableOder(page_id,query);
    });
    $("#search_shopping").keyup(function () {
        var query=$("#search_shopping").val();
        var page_id=$(this).attr("id");
        loadTableOder(page_id,query);
    })
});
