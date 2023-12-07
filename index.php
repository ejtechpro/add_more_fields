<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ADDING MORE INPUT FIELDS</title>
 <!--  Bootstrap css file -->
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
</head>
<body>
  <nav class="navbar bg-dark text-white my-4">
    <div class="container-fluid">
      <div class="navbar-brand text-white fw-bolder">ADDING MORE INPUT FIELDS</div>
    </div>
  </nav>
  <div class="container">
    <div class="row">
    <div class="col-md-10 mx-auto">
    <form id="form" action="#" method="post" name="form" autocomplete="off">
      <div class="card rounded-0">
        <div class="card-header d-flex justify-content-between flex-wrap">
        <h5 class="card-title">Deductions</h5>
        <div class="actionBtns d-flex flex-wrap gap-1">
          <div class="removeBtn"></div>
          <button type="button" class="btn btn-primary shadow-none btn-sm me-3 rounded-0" id="addNew">Add More</button>
          <button type="submit" class="btn btn-success shadow-none btn-sm rounded-0" id="submit_btn" for="form">Submit</button>
          </div>
          </div>
        <div class="card-body">
          <div id="Success_msg"></div>
          <div class="deduction-fields">
          <div class="row d-flex justify-content-around">
          <div class="col-md-4">
            <label for="" class="fw-bolder text-nowrap">Deduction Name</label>
            <input type="text" name="deduction_name[]" class="form-control shadow-none mt-2 rounded-0" placeholder="Deduction Name" required>
          </div>
          <div class="col-md-4">
            <label for="" class="fw-bolder">Description</label>
            <textarea type="text" name="description[]"  class="form-control shadow-none mt-2 rounded-0" rows="1" placeholder="Description" required></textarea>
          </div>
          <div class="col-md-3">
            <label for="" class="fw-bolder text-nowrap">Amount deducted</label>
            <input type="number" min="0" name="amount[]" class="form-control shadow-none mt-2 rounded-0" placeholder="Amount deducted" required>
          </div>
          </div>
          </div>
          </div>
        </div>
      </form>
      </div>
    </div>
  </div>

  <!-- jQuery js link -->
  <script src="assets/jQuery/jquery.min.js"></script>
  <!-- Bootstrap js link -->
  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
  <script>
    $(document).ready(function(){
    $(document).on("click", "#addNew", function(e) {
     e.preventDefault();
     $(".deduction-fields").prepend(`<div id="fieldsAdded" class="row fieldsAdded d-flex justify-content-around">
          <div class="col-md-4">
            <label for="" class="fw-bolder text-nowrap">Deduction Name</label>
            <input type="text" name="deduction_name[]" class="form-control shadow-none mt-2 rounded-0" placeholder="Deduction Name" required>
          </div>
          <div class="col-md-4">
            <label for="" class="fw-bolder">Description</label>
            <textarea type="text" name="description[]" class="form-control shadow-none mt-2 rounded-0" rows="1" placeholder="Description" required></textarea>
          </div>
          <div class="col-md-3">
            <label for="" class="fw-bolder text-nowrap">Amount deducted</label>
            <input type="number" min="0" name="amount[]" class="form-control shadow-none mt-2 rounded-0" placeholder="Amount deducted" required>
          </div>
          </div>
     `);

     $(".removeBtn").html(`<button type="button" class="btn btn-danger shadow-none btn-sm me-3 rounded-0" id="removeField">Remove</button>`);

     $("#removeField").on("click", function(e){
      e.preventDefault();
      $("#fieldsAdded").remove();
     })
    });

    $("#form").submit( function(e) {
      e.preventDefault();
      $("#submit_btn").text(`Inserting...`);
      //alert("submited")

      $.ajax({
        type: 'POST',
        url: 'server.php',
        data: $(this).serialize(),
        error: err=>{
        alert("An error occured while inserting data!");
        },
        success:function(result){
          //alert(result)
          $("#submit_btn").text(`Submit`);
          $(".fieldsAdded").remove();
          $(".removeBtn").html("");
          $("#form")[0].reset();

          $("#Success_msg").html(`<div class="alert alert-success" role="alert">${result}</div>`)
        }
      })
    });
    });
  </script>
</body>
</html>