"use strict";

$(document).ready(function () {
  $('#dataTables-example').DataTable({
    responsive: true
  });

  function redirect() {
    location = "Cars.php";
  }

  $('[data-toggle="tooltip"]').tooltip();
  $('#lengthNameCheck').hide();
  $('#availName').hide();
  $('#pStock').hide();
  $('#productCheck').hide();
  $('#availCate').hide();
  $('#availSize').hide();
  $('#availUpName').hide();
  $('#lengthUpNameCheck').hide();
  $('#upProductCheck').hide();
  $('#priceCheck').hide();
  $('#prDiCheck').hide();
  $('#upPrDiCheck').hide();
  $('#upPriceCheck').hide(); // KeyPress Validations (add)

  $('#productName').keypress(function (e) {
    var k = e.which;
    var ok = k >= 65 && k <= 90 || k >= 97 && k <= 122 || k == 45 || k == 32 || k == 38;

    if (!ok) {
      e.preventDefault();
    }
  });
  $('#productPrice').keypress(function (e) {
    var k = e.which;
    var ok = k >= 48 && k <= 57;

    if (!ok) {
      e.preventDefault();
    }
  });
  $('#productDiscount').keypress(function (e) {
    var k = e.which;
    var ok = k >= 48 && k <= 57;

    if (!ok) {
      e.preventDefault();
    }
  });
  $('#productStock').keypress(function (e) {
    var k = e.which;
    var ok = k >= 48 && k <= 57;

    if (!ok) {
      e.preventDefault();
    }
  }); // keypress (update)

  $('#updateProductName').keypress(function (e) {
    var k = e.which;
    var ok = k >= 65 && k <= 90 || k >= 97 && k <= 122 || k == 45 || k == 32 || k == 38;

    if (!ok) {
      e.preventDefault();
    }
  });
  $('#updateProductPrice').keypress(function (e) {
    var k = e.which;
    var ok = k >= 48 && k <= 57;

    if (!ok) {
      e.preventDefault();
    }
  });
  $('#updateProductDiscount').keypress(function (e) {
    var k = e.which;
    var ok = k >= 48 && k <= 57;

    if (!ok) {
      e.preventDefault();
    }
  });
  $('#productStock').keypress(function (e) {
    var k = e.which;
    var ok = k >= 48 && k <= 57;

    if (!ok) {
      e.preventDefault();
    }
  }); //price & discout check (add)

  $('#productPrice').keyup(function () {
    var price = $('#productPrice').val();

    if (price != 0 || price >= 10) {
      $('#productDiscount').keyup(function () {
        var discount = $('#productDiscount').val();

        if (discount != "") {
          if (price == discount) {
            $('#prDiCheck').show();
            $('#prDiCheck').html('<span class="text-danger">Price & discount are equal.</span>');
            $('#createProductBtn').attr('disabled', true);
          } else if (price > discount) {
            $('#prDiCheck').hide();
            $('#createProductBtn').attr('disabled', false);
          } else if (price < discount) {
            $('#prDiCheck').show();
            $('#prDiCheck').html('<span class="text-danger">Price is low than discount.</span>');
            $('#createProductBtn').attr('disabled', true);
          }
        }
      });
    } else {
      $('#prDiCheck').hide();
      $('#priceCheck').show();
      $('#priceCheck').html('<span class="text-danger">Price is too low.</span>');
      $('#createProductBtn').attr('disabled', true);
    }
  }); //price & discout check (update)

  $('#updateProductPrice').keyup(function () {
    $('#updateProductDiscount').val("");
    $('#Update').attr('disabled', true);
    var upPrice = $('#updateProductPrice').val();

    if (upPrice != 0 || upPrice >= 10) {
      $('#updateProductDiscount').keyup(function () {
        var upDiscount = $('#updateProductDiscount').val();

        if (upDiscount != "") {
          if (upPrice == upDiscount) {
            $('#upPrDiCheck').show();
            $('#upPrDiCheck').html('<span class="text-danger">Price & discount are equal.</span>');
            $('#Update').attr('disabled', true);
          } else if (upPrice > upDiscount) {
            $('#upPrDiCheck').hide();
            $('#Update').attr('disabled', false);
          } else if (upPrice < upDiscount) {
            $('#upPrDiCheck').show();
            $('#upPrDiCheck').html('<span class="text-danger">Price is low than discount.</span>');
            $('#Update').attr('disabled', true);
          }
        }
      });
    } else {
      $('#upPrDiCheck').hide();
      $('#upPriceCheck').show();
      $('#upPriceCheck').html('<span class="text-danger">Price is too low.</span>');
      $('#Update').attr('disabled', true);
    }
  }); // Stock add or not

  $('#productStatus').on('change', function () {
    var pstat = $(this).val();

    if (pstat == 0 || pstat == 2) {
      $('#pStock').hide();
    } else {
      $('#pStock').show();
    }
  });
  $('#addProductModalBtn').click(function () {
    $('#btnNext').attr('disabled', true);
    $('#productName').val("");
    $('#productCategory').val("");
    $('#productSize').val("");
    $('#productCategory').attr('disabled', true);
    $('#productSize').attr('disabled', true);
    $('#productCheck').hide();
  }); // View

  $(document).on('click', '.view_car', function () {
    var car_id = $(this).attr("id");

    if (car_id != '') {
      $.ajax({
        url: "selectCar.php",
        method: "POST",
        data: {
          car_id: car_id
        },
        success: function success(data) {
          $('#car_detail').html(data);
          $('#viewCarModal').modal('show');
        }
      });
    }
  }); // View

  $(document).on('click', '.view_car_gallery', function () {
    var car_id = $(this).attr("id"); //alert(car_id);  

    if (car_id != '') {
      $.ajax({
        url: "selectCarGallery.php",
        method: "POST",
        data: {
          car_id: car_id
        },
        success: function success(data) {
          $('#car_images_gallery').html(data);
          $('#viewCarImageModal').modal('show');
        }
      });
    }
  }); //Update

  $(document).on('click', '.update_car', function () {
    var car_id = $(this).attr("id");
    $.ajax({
      url: "fetchCar.php",
      method: "POST",
      data: {
        car_id: car_id
      },
      dataType: "json",
      success: function success(data) {
        //$('#updateProductImage').attr('src', ''+data.Product_Image);
        $('#updateCarName').val(data.car_Name);
        $('#updateYear').val(data.car_Year);
        $('#updateCarBrand').val(data.CarBrandId);
        $('#updateCarCondition').val(data.car_Condition);
        $('#updateCarMileage').val(data.car_Mileage);
        $('#updateCarDealer').val(data.car_Dealer);
        $('#updateCarLoc').val(data.car_Location);
        $('#updateCarPrice').val(data.car_Price);
        var isElect = data.car_isElectric;
        var newUsed = data.car_NewUsed; //alert(newUsed);

        if (newUsed == "Used") {
          //alert(newUsed);
          $('#updateUsedRadio').attr('checked', true);
        } else if (newUsed = "New") {
          //alert(newUsed);
          $('#updateNewRadio').attr('checked', true); //$("input:radio[id='newRadio']").prop("checked",true);
        }

        if (isElect == "No") {
          $('#update_isElect_RTwo').attr('checked', true);
        } else if (isElect == "Yes") {
          $('#update_isElect_ROne').attr('checked', true);
        }

        $('#updateCarStatus').val(data.car_Status);
        $('#car_Id').val(data.car_ID);
        $('#updateCarModal').modal('show');
      }
    });
  });
  $('#update_form').on('submit', function () {
    event.preventDefault();
    $.ajax({
      url: "updateCar.php",
      method: "POST",
      data: $('#update_form').serialize(),
      beforeSend: function beforeSend() {
        $('#Update').val("Updating..");
      },
      success: function success(data) {
        $('#update_form')[0].reset();
        $('#updateCarModal').modal('hide'); //$('#product_table').html(data);

        Swal.fire({
          position: 'center',
          type: 'success',
          showCloseButton: true,
          title: 'Car has been updated',
          customClass: 'animated tada',
          showConfirmButton: false,
          timer: 3000
        });
        setTimeout(function () {
          redirect();
        }, 1000);
      }
    });
  }); // Remove			

  $(document).on('click', '.remove_car', function () {
    var id = $(this).parents("tr").attr("id"); //alert(id);

    $.ajax({
      url: 'checkCar.php',
      type: 'POST',
      data: {
        cid: id
      },
      success: function success(data) {
        if (confirm('Are you sure to remove this record ?')) {
          $.ajax({
            url: 'removeCar.php',
            type: 'POST',
            data: {
              rid: id
            },
            error: function error() {
              alert('Something is wrong');
            },
            success: function success(data) {
              $("#" + id).remove();
              Swal.fire({
                position: 'center',
                type: 'warning',
                showCloseButton: true,
                title: 'Car Deleted',
                text: 'Car deleted permanently ...!!',
                customClass: 'animated tada',
                showConfirmButton: false,
                timer: 3000
              });
              setTimeout(function () {
                redirect();
              }, 2000);
            }
          });
        }
      }
    });
  }); // Input validation for add product

  $('#productName').blur(function () {
    var str = $('#productName').val();
    var resultStr = str.replace(/\s+/g, '');
    var len = resultStr.length; //debugger;
    //alert(str);

    if (len < 2) {
      $('#lengthNameCheck').show();
      $('#productCategory').attr('disabled', true);
      $('#productSize').attr('disabled', true);
      $('#lengthNameCheck').html('<span class="text-danger">Length is too short</span>');
    } else {
      $('#lengthNameCheck').hide();
      $('#productCategory').attr('disabled', false);
      $('#productCategory').on('change', function () {
        var cateVal = $('#productCategory').val();
        $('#productSize').attr('disabled', false);
        $('#productSize').on('change', function () {
          var sizeVal = $('#productSize').val();
          $.ajax({
            url: "checkProduct.php",
            method: "POST",
            data: {
              product_name: str,
              product_cate: cateVal,
              product_size: sizeVal
            },
            success: function success(data) {
              if (data == 1) {
                $('#btnNext').attr('disabled', true);
                $('#productCheck').show();
                $('#productCheck').html('<span class="text-danger">This product already exist</span>');
              } else if (data == 0) {
                $('#btnNext').attr('disabled', false);
                $('#productCheck').show();
                $('#productCheck').html('<span class="text-success">No such product exists</span>');
              }
            }
          });
        });
      });
    }
  }); // After click no invalid action can be taken

  $('#btnNext').on('click', function () {
    var str = $('#productName').val();
    var resultStr = str.replace(/\s+/g, '');
    var leng = resultStr.length;
    var cateValue = $('#productCategory').val();
    var sizeValue = $('#productSize').val();

    if (leng == '' || cateValue == '' || sizeValue == '') {
      if (leng == '') {
        $('#availName').show();
        $('#availName').html('<span class="text-danger">Product name is empty.</span>');
        $('#lengthNameCheck').hide();
        $('#productCheck').hide();
      } else if (cateValue == '') {
        $('#availCate').show();
        $('#availCate').html('<span class="text-danger">Product category is not selected.</span>');
        $('#lengthNameCheck').hide();
        $('#productCheck').hide();
      } else if (sizeValue == '') {
        $('#availSize').show();
        $('#availSize').html('<span class="text-danger">Product size is not selected.</span>');
        $('#lengthNameCheck').hide();
        $('#productCheck').hide();
      }
    }
  }); // Update Input validation
  // 1.1 name changes

  $('#updateProductName').keyup(function () {
    $('#btnUpNext').attr('disabled', true);
    var str = $('#updateProductName').val();
    var resultStr = str.replace(/\s+/g, '');
    var len = resultStr.length;
    $('#updateProductCategory').val("");
    $('#updateProductSize').val("");
    $('#updateProductCategory').change(function () {
      var cate = $('#updateProductCategory').val();
      $('#updateProductSize').change(function () {
        var size = $('#updateProductSize').val();

        if (len < 3) {
          $('#lengthUpNameCheck').show();
          $('#lengthUpNameCheck').html('<span class="text-danger">Length is too short</span>');
        } else {
          $('#lengthUpNameCheck').hide();
          $.ajax({
            url: "checkProduct.php",
            method: "POST",
            data: {
              up_product_name: str,
              up_product_cate: cate,
              up_product_size: size
            },
            success: function success(data) {
              if (data != 0) {
                $('#btnUpNext').attr('disabled', true);
                $('#upProductCheck').show();
                $('#upProductCheck').html('<span class="text-danger">Product already exist.</span>');
              } else {
                $('#btnUpNext').attr('disabled', false);
                $('#upProductCheck').show();
                $('#upProductCheck').html('<span class="text-success">Product already not exist.</span>');
              }
            }
          });
        }
      });
    });
  });
  $(".alert-success").delay(500).show(10, function () {
    $(this).delay(3000).hide(10, function () {
      $(this).remove();
      redirect();
    });
  });
  $(document).on('click', '.removedProducts', function () {
    $.ajax({
      url: "selectRemovedProduct.php",
      method: "POST",
      success: function success(data) {
        $('#reproduct_detail').html(data);
        $('#viewremoveProductModal').modal('show');
      }
    });
  });
});