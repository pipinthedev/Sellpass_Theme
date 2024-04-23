$(document).ready(function () {
  var filterProducts = function () {
    var searchText = $("#product").val().toLowerCase();
    var selectedCategory = $(".category_button.active").data("category");
    var productFound = false;

    $(".product").each(function () {
      var productName = $(this).find(".text-lg").text().toLowerCase();
      var categories = $(this).data("category-ids").toString().split(",");
      var isCategoryMatch =
        selectedCategory === "all" ||
        categories.includes(selectedCategory.toString());
      var isSearchMatch = productName.includes(searchText);

      if (isCategoryMatch && isSearchMatch) {
        $(this).show();
        productFound = true;
      } else {
        $(this).hide();
      }
    });

    $("#no-products-message").toggle(!productFound);
  };

  $(".category_button").on("click", function () {
    $(".category_button").removeClass("active");
    $(this).addClass("active");
    filterProducts();
  });

  $("#product").on("input", filterProducts);

  filterProducts();
});
