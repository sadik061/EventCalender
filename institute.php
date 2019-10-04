<?php include 'layout/header.php' ?>
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
                <input type="text" class="form-control" id="area" autocomplete="off">
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
                <input type="text" class="form-control" id="earea" autocomplete="off">
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

    <form class="form-inline" role="form" _lpchecked="1">
      <div class="col-lg-6">
        <label class="sr-only" for="exampleInputEmail2">Institute Name</label>
        <input type="text" class="form-control " placeholder="Type Institute name to search" id="sname" oninput="myFunction()" autocomplete="off">

      </div>
      <div class="col-lg-3">
        <label class="sr-only" for="exampleInputEmail2">Area</label>
        <input type="text" class="form-control " placeholder="" id="sarea" autocomplete="off">
      </div>
      <div class="col-lg-3">
        <button type="button" class="btn btn-theme" data-toggle="modal" data-target="#exampleModal">
          Add new institution
        </button>
      </div>

    </form>


    <hr>
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
    xmlhttp.open("GET", "php/getInstituteresult.php?search=" + page, true);
    xmlhttp.send();
  }
</script>