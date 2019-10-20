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
              <label class="col-sm-2 col-form-label" for="exampleFormControlSelect1">Institute</label>
              <input type="text" style="display:none;" class="form-control" id="instituteid" autocomplete="off">
              <div class="col-sm-10">

                <input type="text" class="form-control" oninput="instituteSuggestion()" id="institute" autocomplete="off">
                <div id="suggetions">
                </div>
              </div>
            </div>
            <div class="form-group row">

              <label class="col-sm-2 col-form-label">Designation</label>

              <div class="col-sm-10">
                <select id="Designation" class="form-control ">
                  <option value="Midwives">Midwives</option>
                  <option value="Nurse">Nurse</option>

                </select>
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
              <input type="text" style="display:none;" class="form-control " id="eid" autocomplete="off">
                <input type="text" class="form-control " id="enamee" autocomplete="off">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label" for="exampleFormControlSelect1">Institute</label>
              <input type="text" style="display:none;" class="form-control" id="einstituteid" autocomplete="off">
              <div class="col-sm-10">

                <input type="text" class="form-control" oninput="einstituteSuggestion()" id="einstitute" autocomplete="off">
                <div id="esuggetions">
                </div>
              </div>
            </div>
            <div class="form-group row">

              <label class="col-sm-2 col-form-label">Designation</label>

              <div class="col-sm-10">
                <select id="eDesignation" class="form-control ">
                  <option value="Midwives">Midwives</option>
                  <option value="Nurse">Nurse</option>

                </select>
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
      if ($("#instituteid").val()!= "") {
        var namee = $("#namee").val();
        var id = $("#instituteid").val();
        var contact = $("#contactt").val();
        var Designation = $("#Designation").val();
        $.ajax({
          url: "php/instructor.php",
          type: "POST",
          data: {
            namee: namee,
            id: id,
            contact: contact,
            Designation: Designation,
          },
          success: function() {
            $("#namee").val("");
            $("#instituteid").val("");
            $("#institute").val("");
            $("#contactt").val("");
            $("#Designation").val("");
            if (number == 'Empty') {
              showInstitutes(1, search);
            } else {
              showInstitutes(number, search);
            }
          }
        })
      }else{
        alert("No institute found");
      }
    });
    

    $("#Update").unbind("click").click(function() {
      var id = $("#eid").val();
      var namee = $("#enamee").val();
      var Designation = $("#eDesignation").val();
      var contact = $("#econtactt").val();
      var instituteid = $("#einstituteid").val();
      $.ajax({
        url: "php/updateinstructor.php",
        type: "POST",
        data: {
          id: id,
          namee: namee,
          Designation: Designation,
          contact: contact,
          instituteid: instituteid
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
  function edit(id, name, Designation, contact, institute_id,institutename) {
    $("#eid").val(id);
    $("#enamee").val(name);
    $("#econtactt").val(contact);
    $("#eDesignation").val(Designation);
    $("#einstituteid").val(institute_id); 
    $("#einstitute").val(institutename); 
    $('#editModal').modal();
  }

  function myFunction() {
    showInstitutes(1, $("#sname").val());
  }

  function instituteSuggestion() {
    var search = $("#institute").val()
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("suggetions").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET", "php/searchinstitute.php?search=" + search, true);
    xmlhttp.send();
  }
  function einstituteSuggestion() {
    var search = $("#einstitute").val()
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("esuggetions").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET", "php/searchinstitute.php?search=" + search, true);
    xmlhttp.send();
  }

  

  function remove(id) {
    $.ajax({
      url: "php/delete.php",
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
    xmlhttp.open("GET", "php/getEvent.php", true);
    xmlhttp.send();
  }

  function showInstitutes(page, search) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("listt").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET", "php/getEvent.php?page=" + page + "&search=" + search, true);
    xmlhttp.send();
  }
</script>