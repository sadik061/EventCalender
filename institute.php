<?php $page = 'institute';
include 'layout/header.php' ?>
<?php include 'layout/sidebar.php' ?>

<section id="main-content">
  <section class="wrapper">
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add new institute</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <div class="modal-body">

            <div class="form-group row">

              <label class="col-sm-2 col-form-label">Name</label>

              <div class="col-sm-10">
                <input type="text" class="form-control " id="namee" autocomplete="off">
              </div>
            </div>
            <div class="form-group row">

              <label class="col-sm-2 col-form-label">Location</label>

              <div class="col-sm-10">
                <select id="area" class="form-control" autocomplete="off">
                  <option value="">Select an area</option>
                  <option value="Dhaka">Dhaka</option>
                  <option value="Barishal ">Barishal</option>
                  <option value="Chittagong ">Chittagong</option>
                  <option value="Mymensingh">Mymensingh</option>
                  <option value="Khulna ">Khulna</option>
                  <option value="Rajshahi">Rajshahi</option>
                  <option value="Rangpur">Rangpur</option>
                  <option value="Sylhet">Sylhet</option>
                </select>
              </div>
            </div>
            <div class="form-group row">

              <label class="col-sm-2 col-form-label">Address</label>

              <div class="col-sm-10">
                <input type="text" class="form-control " id="address" autocomplete="off">
              </div>
            </div>
            <div class="form-group row">

              <label class="col-sm-2 col-form-label">Contact</label>

              <div class="col-sm-10">
                <input type="text" class="form-control " id="contactt" autocomplete="off">
              </div>
            </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button id="submitt" type="button" class="btn btn-primary" data-dismiss="modal">ADD</button>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="Confirm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document" style="max-width: 400px;">
        <div class="modal-content" style="width: 400px;">

          <div class="modal-body">
            <div class="row">
              <div class="col-md-4">
              </div>
              <div class="col-md-4">
                <img src="img/warning-gif.gif" style="width: 97px;">
              </div>
            </div>
            <div class="col-md-4">
            </div>
            <div class="row">

              <div class="col-md-12">
                <h3 style="text-align: center;margin:5% 0%;">Are you sure?</h3>
                <p style="text-align: center;margin:5% 0%;">Do you really want to delete these records? This process can not be undone</p>
              </div>

            </div>
            <div class="row">
              <div class="col-md-3">
              </div>
              <div class="col-md-6" style="text-align: center;margin:5% 0%;">
                <button type="button" class="btn btn-primary red" data-dismiss="modal" id="yes">Delete</button>
                <button type="button" class="btn btn-primary gray" data-dismiss="modal" id="no">Cancel</button>
              </div>
            </div>
            <div class="col-md-3">
            </div>

          </div>

        </div>
      </div>
    </div>


    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add new institute</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <div class="modal-body">

            <div class="form-group row">

              <label class="col-sm-2 col-form-label">Name</label>

              <div class="col-sm-10">
                <input type="text" style="display: none;" class="form-control " id="eid" autocomplete="off">
                <input type="text" class="form-control " id="enamee" autocomplete="off">
              </div>
            </div>
            <div class="form-group row">

              <label class="col-sm-2 col-form-label">Location</label>

              <div class="col-sm-10">

                <select id="earea" class="form-control" autocomplete="off">
                  <option value="">Select a area</option>
                  <option value="Dhaka">Dhaka</option>
                  <option value="Barishal ">Barishal</option>
                  <option value="Chittagong ">Chittagong</option>
                  <option value="Mymensingh">Mymensingh</option>
                  <option value="Khulna ">Khulna</option>
                  <option value="Rajshahi">Rajshahi</option>
                  <option value="Rangpur">Rangpur</option>
                  <option value="Sylhet">Sylhet</option>
                </select>
              </div>
            </div>
            <div class="form-group row">

              <label class="col-sm-2 col-form-label">Address</label>

              <div class="col-sm-10">
                <input type="text" class="form-control " id="eaddress" autocomplete="off">
              </div>
            </div>
            <div class="form-group row">

              <label class="col-sm-2 col-form-label">Contact</label>

              <div class="col-sm-10">
                <input type="text" class="form-control " id="econtactt" autocomplete="off">
              </div>
            </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button id="Update" type="button" class="btn btn-primary" data-dismiss="modal">Update</button>
          </div>
        </div>
      </div>
    </div>

    <form class="form-inline" role="form" _lpchecked="1" style="padding-bottom: 1%;">
      <div class="col-lg-5" style="padding-left:0px;">
        <div class="input-group-prepend">
          <input type="text" style="margin-right: -4px;" class="form-control " placeholder="Type institute name to search" id="sname" oninput="myFunction()" autocomplete="off">
          <span class="input-group-text"><i class="fa fa-search"></i></span>
        </div>
      </div>

      <div class="col-lg-7" style="padding-right:0px;">
      <button type="button" style="float: right;" class="btn btn-primary" onclick="download()"><i class="fa fa-download"></i></button>
        <button type="button" style="float:right; margin-right: 1%;" class="btn btn-theme" data-toggle="modal" data-target="#exampleModal">
          Add New Institution
        </button>
       
      </div>

    </form>
    
    <br>
    <br>
    <div id="listt">

    </div>


  </section>
  <!-- /wrapper -->
</section>
<?php include 'layout/footer.php' ?>

<script>
  $(document).ready(function() {
    var number = getUrlParam('page', 'Empty');
    var search = getUrlParam('search', '');
    if (number == 'Empty') {
      showInstitutes(1, search);
    } else {
      showInstitutes(number, search);
    }
    $("#submitt").unbind("click").click(function() {
      var namee = $("#namee").val();
      var area = $("#area").val();
      var contact = $("#contactt").val();
      var address = $("#address").val();
      $.ajax({
        url: "php/institute.php",
        type: "POST",
        data: {
          namee: namee,
          area: area,
          contact: contact,
          address: address,
        },
        success: function() {
          $("#namee").val("");
          $("#area").val("");
          $("#contactt").val("");
          $("#address").val("");
          if (number == 'Empty') {
            showInstitutes(1, search);
          } else {
            showInstitutes(number, search);
          }
        }
      })
    });

    $("#Update").unbind("click").click(function() {
      var id = $("#eid").val();
      var namee = $("#enamee").val();
      var area = $("#earea").val();
      var contact = $("#econtactt").val();
      var address = $("#eaddress").val();
      $.ajax({
        url: "php/updateinstitute.php",
        type: "POST",
        data: {
          id: id,
          namee: namee,
          area: area,
          contact: contact,
          address: address
        },
        success: function() {
          $("#enamee").val("");
          $("#earea").val("");
          $("#econtactt").val("");
          $("#eaddress").val("");
          if (number == 'Empty') {
            showInstitutes(1, search);
          } else {
            showInstitutes(number, search);
          }
        }
      })
    });


  })

  function myFunction() {
    showInstitutes(1, $("#sname").val());
  }

  function edit(id, name, area, contact, address) {
    $("#eid").val(id);
    $("#enamee").val(name);
    $("#earea").val(area);
    $("#econtactt").val(contact);
    $("#eaddress").val(address);
    $('#editModal').modal();
  }

  function remove(id) {
    $('#Confirm').modal();
    $("#yes").unbind("click").click(function() {
      $.ajax({
        url: "php/deleteinstitute.php",
        type: "POST",
        data: {
          id: id
        },
        success: function() {
          var number = getUrlParam('page', 'Empty');
          var search = getUrlParam('search', '');
          if (number == 'Empty') {
            showInstitutes(1, search);
          } else {
            showInstitutes(number, search);
          }
        }
      })
    })
  }

  function getUrlVars() {
    var vars = {};
    var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m, key, value) {
      vars[key] = value;
    });
    return vars;
  }

  function getUrlParam(parameter, defaultvalue) {
    var urlparameter = defaultvalue;
    if (window.location.href.indexOf(parameter) > -1) {
      urlparameter = getUrlVars()[parameter];
    }
    return urlparameter;
  }

  function showInstitutes() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("listt").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET", "php/getInstitute.php", true);
    xmlhttp.send();
  }

  function showInstitutes(page, search) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("listt").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET", "php/getInstitute.php?page=" + page + "&search=" + search, true);
    xmlhttp.send();
  }

  function showInstituteresult(page) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("listt").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET", "php/getInstituteresult.php?search=" + page + "&time=" + new Date().getTime(), true);
    xmlhttp.send();
  }

  function download() {
    window.location.href = "php/downloadinstitute.php?search=" + $("#sname").val() + "&time=" + new Date().getTime();
  }
</script>