<?php $page = 'instructor';
include 'layout/header.php' ?>
<?php include 'layout/sidebar.php' ?>

<section id="main-content">
  <section class="wrapper">
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add new instructor</h5>
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
                  <option value="mid_Faculty">Dct. mid Faculty</option>
                  <option value="SRHR">Dct. mid Faculty SRHR</option>
                  <option value="Principal">Principal</option>
                  <option value="Nursing">Nursing Faculty</option>
                </select>
              </div>
            </div>
            <div class="form-group row">

              <label class="col-sm-2 col-form-label">Contact</label>

              <div class="col-sm-10">
                <input type="text" class="form-control " id="contactt" autocomplete="off">
              </div>
            </div>
            <div class="form-group row">

              <label class="col-sm-2 col-form-label">Email</label>

              <div class="col-sm-10">
                <input type="text" class="form-control " id="emaill" autocomplete="off">
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
            <h5 class="modal-title" id="exampleModalLabel">Instructor</h5>
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
                  <option value="mid_Faculty">Dct. mid Faculty</option>
                  <option value="SRHR">Dct. mid Faculty SRHR</option>
                  <option value="Principal">Principal</option>
                  <option value="Nursing">Nursing Faculty</option>

                </select>
              </div>
            </div>
            <div class="form-group row">

              <label class="col-sm-2 col-form-label">Contact</label>

              <div class="col-sm-10">
                <input type="text" class="form-control " id="econtactt" autocomplete="off">
              </div>
            </div>
            <div class="form-group row">

              <label class="col-sm-2 col-form-label">Email</label>

              <div class="col-sm-10">
                <input type="text" class="form-control " id="eemail" autocomplete="off">
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
      <div class="col-lg-6" style="padding-left: 0px;">
        <label class="sr-only" for="exampleInputEmail2">Instructor Name</label>
        <input type="text" class="form-control " placeholder="Type Instructor name to search" id="sname" oninput="myFunction()" autocomplete="off">

      </div>
      <div class="col-lg-4" style="padding-right:0px;">
        <label class="sr-only" for="exampleInputEmail2">Area</label>

        <select id="sdesignation" class="form-control " autocomplete="off" oninput="myFunction()">
          <option value="">Select a Designation</option>
          <option value="mid_Faculty">Dct. mid Faculty</option>
          <option value="SRHR">Dct. mid Faculty SRHR</option>
          <option value="Principal">Principal</option>
          <option value="Nursing">Nursing Faculty</option>
        </select>
      </div>

      <div class="col-lg-2"  style="padding-right: 0px;">
        <button type="button" class="btn btn-theme" data-toggle="modal" data-target="#exampleModal">
          Add new instructor
        </button>
      </div>

    </form>

    <button type="button" style="float: right;" class="btn btn-primary" onclick="download()">Download Result</button>
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
      if ($("#instituteid").val() != "") {
        var namee = $("#namee").val();
        var id = $("#instituteid").val();
        var contact = $("#contactt").val();
        var email = $("#emaill").val();
        var Designation = $("#Designation").val();
        $.ajax({
          url: "php/instructor.php",
          type: "POST",
          data: {
            namee: namee,
            id: id,
            contact: contact,
            Designation: Designation,
            email: email,
          },
          success: function() {
            $("#namee").val("");
            $("#instituteid").val("");
            $("#institute").val("");
            $("#contactt").val("");
            $("#Designation").val("");
            $("#emaill").val("");
            if (number == 'Empty') {
              showInstitutes(1, search);
            } else {
              showInstitutes(number, search);
            }
          }
        })
      } else {
        alert("No institute found");
      }
    });


    $("#Update").unbind("click").click(function() {
      var id = $("#eid").val();
      var namee = $("#enamee").val();
      var Designation = $("#eDesignation").val();
      var contact = $("#econtactt").val();
      var instituteid = $("#einstituteid").val();
      var email = $("#eemail").val();
      $.ajax({
        url: "php/updateinstructor.php",
        type: "POST",
        data: {
          id: id,
          namee: namee,
          Designation: Designation,
          contact: contact,
          instituteid: instituteid,
          email: email
        },
        success: function() {
          $("#enamee").val("");
          $("#earea").val("");
          $("#econtactt").val("");
          $("#eaddress").val("");
          $("#eemail").val("");
          if (number == 'Empty') {
            showInstitutes(1, search);
          } else {
            showInstitutes(number, search);
          }
        }
      })
    });
  })

  function edit(id, name, Designation, contact, institute_id, institutename, email) {
    $("#eid").val(id);
    $("#enamee").val(name);
    $("#econtactt").val(contact);
    $("#eDesignation").val(Designation);
    $("#einstituteid").val(institute_id);
    $("#einstitute").val(institutename);
    $("#eemail").val(email);
    $('#editModal').modal();
  }

  function myFunction() {
    showInstitutess(1, $("#sname").val(),$("#sdesignation").val());
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
      url: "php/deleteinstructor.php",
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

  function showInstitutess(page, search, designation) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("listt").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET", "php/getinstructor.php?page=" + page + "&search=" + search + "&designation=" + designation + "&time=" + new Date().getTime(), true);
    xmlhttp.send();
  }

  function showInstitutes(page, search) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("listt").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET", "php/getinstructor.php?page=" + page + "&search=" + search + "&time=" + new Date().getTime(), true);
    xmlhttp.send();
  }
  function download() {
        window.location.href = "php/downloadinstructor.php?search=" + $("#sname").val() + "&designation=" + $("#sdesignation").val() + "&time=" + new Date().getTime();
    }
</script>