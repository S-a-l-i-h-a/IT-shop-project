let htmlList = "";

var productAdmin = {
  init: function() {
    productAdmin.getAllItems();

  },
  listItemById: function(id) {
    if (id != undefined) {
      var refresh = window.location.protocol + "//" + window.location.host + window.location.pathname;
      window.history.pushState({
        path: refresh
      }, '', `?id=${id}`);


    }
    let searchParams = new URLSearchParams(window.location.search);
    let idUrl = searchParams.get('id');

    var html = "";


  },
  getAllItems: function() {

    $.ajax({
      url: `rest/products`,
      type: "GET",
      success: function(data) {
        console.log(data);
        var html = "";
        for (let i = 0; i < data.length; i++) {
          html += `
          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <div class="portfolio-wrap">
              <img src="${data[i].image}" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>${data[i].product_name}</h4>
                <p>Price: ${data[i].product_price} KM</p>
                <p>Description: ${data[i].description}</p>
                <br>
                <button type="button" style="background-color: black" class="btn btn-primary" onclick="getItem(${data[i].id})">Delete From Stock</button>
              </div>
            </div>
          </div>`;


        }
        $("#portfolio-container").html(html);

      }
    });
  },
  getItemsFromCart: function(id){
    $("#items-list").html("")
    //We define html list on begining outside this function because
    //if we define it here it wouldn not be able to "remember" older values
    $.ajax({
      url: `rest/products/${id}`,
      type: "GET",
      success: function(data) {
        htmlList += `<li>${data.product_name}, ${data.product_price}KM</li>`
        $("#items-list").html(htmlList);

      },
    });

  }
}

function getItem(id) {
  let articles = []
  if (localStorage.getItem("id") != null) {
    articles = [localStorage.getItem("id")]
  }
  articles.push(id)
  localStorage.setItem("id", articles)
  console.log(localStorage.getItem("id"));
  console.log("we set id");

}


function getAllItemsInCart(){
  htmlList="";
  let articles = [...localStorage.getItem("id")];
  articles = articles.filter(num => num != ",")

  for(let i=0;i<articles.length;i++){
  //console.log(articles[i]);
  productAdmin.getItemsFromCart(articles[i]);
  }
}
