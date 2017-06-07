//Filter Clients
$('li.category-item > a').click(function(e) {
  e.preventDefault();
  $(this).parent().siblings().find('a').removeClass('selected-category');
  $(this).addClass('selected-category');
  var filter = $(this).attr('value');
  filterList(filter);
});

//Clients filter function
function filterList(value) {
  var list = $(".business-direction-list .client-item");
  $(list).removeClass("selected-list");
  if (value == "all") {
    $(".business-direction-list").find("a").each(function (i) {
      $(this).addClass("selected-list");
    });
  } else {
    //Notice this *=" <- This means that if the data-category contains multiple options
    $(".business-direction-list").find("a[data-category*=" + value + "]").each(function (i) {
      $(this).addClass("selected-list");
    });
  }
}
