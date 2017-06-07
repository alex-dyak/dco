//Filter Clients
$('li.category-item').click(function() {
  var filter = $(this).attr('value');
  filterList(filter);
});

//News filter function
function filterList(value) {
  var list = $(".business-direction-list .client-item");
  $(list).css("color", "gray");
  if (value == "all") {
    $(".business-direction-list").find("a").each(function (i) {
      $(this).css("color", "green");
    });
  } else {
    //Notice this *=" <- This means that if the data-category contains multiple options, it will find them
    //Ex: data-category="Cat1, Cat2"
    $(".business-direction-list").find("a[data-category*=" + value + "]").each(function (i) {
      $(this).css("color", "green");
    });
  }
}
