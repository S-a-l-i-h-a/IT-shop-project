var ITShopService = {
    init: function(){
      $('row').validate({
        submitHandler: function(form) {
          var todo = Object.fromEntries((new FormData(form)).entries());
          ITShopService.add(todo);
        }
      });
      ITShopService.list();
    },
    <h5 class="card-title">`+ data[i].customer_name +`</h5>

    list: function(){
      $.get("rest/subscription", function(data) {
        $("#fst-italic").html("");
        var html = "";
        for(let i = 0; i < data.length; i++){
          html += `
          <div class="row">
        <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left" data-aos-delay="100">
          <img src="img/itShop.jpg" class="img-fluid" alt="">
        </div>
        <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content" data-aos="fade-right" data-aos-delay="100">
          <h3>Subscribed customers</h3>
          <p class="fst-italic">
            Send emails with latest updates to all subscribed customers.
            `+ data[i].customer_name +`
          </p>
          <p>!!!!!!!!!</p>
          <p>OVDJE TREBA IZLISTATI CUSTOMERE KOJI SU IZ TABELE SUBSRIPTION: getAll <br>Ako im se ne moze poslati mail svima, makar ne ih ovdje izlista </p>
          <a class="button-xsmall" href="#" style="color:black">Send emails</a>

        </div>
      </div>
          `;
        }
        $("#IT-shop").html(html);
      });
    },

    get: function(id){
      $('.Customers-button').attr('disabled', true);
      $.get('rest/Customers/'+id, function(data){
        $("#customer_email").val(data.customer_email);
        $("#customer_name").val(data.customer_name);
        $("#customer_surname").val(data.customer_surname);
        $("#customer_origin").val(data.customer_origin);
        $("#id").val(data.id);
        $("#editModal").modal("show");
        $('.Customers-button').attr('disabled', false);
      })
    },

    add: function(customers){
      $.ajax({
        url: 'rest/Customers/',
        type: 'POST',
        data: JSON.stringify(customers),
        contentType: "application/json",
        dataType: "json",
        success: function(result) {
            $("#Customers-list").html('<div class="spinner-border" role="status"> <span class="sr-only"></span>  </div>');
            ITShopService.list(); // perf optimization
            $("#addToDoModal").modal("hide");
        }
      });
    },



    update: function(){
      $('.save-Customers-button').attr('disabled', true);

      var todo = {};
      todo.customer_name = $('#customer_name').val();
      todo.customer_surname = $('#customer_surname').val();
      todo.customer_email = $('#customer_email').val();
      todo.customer_origin = $('#customer_origin').val();

      $.ajax({
        url: 'rest/Customers/'+$('#id').val(),
        type: 'PUT',
        data: JSON.stringify(todo),
        contentType: "application/json",
        dataType: "json",
        success: function(result) {
            $("#editModal").modal("hide");
            $('.save-Customers-button').attr('disabled', false);
            $("#IT-shop").html('<div class="spinner-border" role="status"> <span class="sr-only"></span>  </div>');
            ITShopService.list(); // perf optimization
        }
      });
    },

    delete: function(id){
      $('.Customers-button').attr('disabled', true);
      $.ajax({
        url: 'rest/Customers/'+id,
        type: 'DELETE',
        success: function(result) {
            $("#IT-shop").html('<div class="spinner-border" role="status"> <span class="sr-only"></span>  </div>');
            ITShopService.list();
        }
      });
    },


}
