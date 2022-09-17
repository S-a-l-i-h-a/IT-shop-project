var productIndex = {
  init: function() {
    productIndex.listItemById();
    productIndex.getAllItems();

  },
  listItemById: function(id){
    if(id != undefined){
     var refresh = window.location.protocol + "//" + window.location.host + window.location.pathname;
     window.history.pushState({ path: refresh }, '', `?id=${id}`);


    }
    let searchParams = new URLSearchParams(window.location.search);
    let idUrl = searchParams.get('id');

    var html="";

    $.ajax({
      url: `rest/products/`,
      type: "GET",
      success: function(data) {
        html=`<!-- Left Column / Motor Image -->
        <div class="left-column">
          <img data-image="red" class="active" src="${data.image}" alt="">
        </div>


        <!-- Right Column -->
        <div class="right-column">

          <!-- Product Description -->
          <div class="product-description">
            <span>${data.product_type}</span>
            <h1>${data.product_name}</h1>
            <p>${data.description}</p>
          </div>

          <!-- Product Configuration -->
          <div class="product-configuration">

            `
        $(".container-article").html(html);

      },
    });
  },
  getAllItems: function(search){
    $.ajax({
      url: `rest/products`,
      type: "GET",
      success: function(data) {
        console.log("data");
        var html="";
        for(let i=0;i<data.length;i++){
          html+=`<div class="container-product-list" data-aos="fade-up">

            <div class="section-title">
              <h2>Products</h2>
              <p>Check out our products</p>

            <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">

              <div class="col-lg-4 col-md-6 portfolio-item ">
                <div class="portfolio-wrap">
                  <div class="portfolio-info">
                  <img src="${data.image}" class="img-fluid" alt="">
                  <h4>${data.product_name}</h4>
                <p>${data.product_price}</p>
                    <a class="button-xsmall" href="cart.html">Add to cart</a>
                    <div class="portfolio-links">
                    <div class="portfolio-links">
                <a href="${data.image}" data-gallery="portfolioGallery" class="portfolio-lightbox" title="${data.description}" ><i class="bx bx-plus"></i></a>
                    </div>
                  </div>
                </div>
              </div>`;
        }
        $("#container").html(html);

  })
}
}
