<?php $page = 'event';
include 'layout/header.php'; ?>
<?php include 'layout/sidebar.php' ?>

<section id="main-content">
  <section class="wrapper">
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document" style="    max-width: 70%;">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="ModalTile">Create New Event</h5>
            <h5 class="modal-title" id="fundtitle" style="display: none;">Add New Funder In The Database</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form id="maincontent">
              <div class="row">
                <div class="col-md-6">
                  <div id="al" class="alert alert-danger" role="alert" style="display:none;">
                    Please fill all the mendatory(*) fields
                  </div>
                  <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Event Title*</label>
                    <input type="text" class="form-control" id="title">
                  </div>

                  <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Organized By*</label>
                    <input type="text" class="form-control" id="organize">
                  </div>
                  <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Venu*</label>
                    <input type="text" class="form-control" id="venu">
                  </div>
                  <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Select from the dropdown to add funders to this event</label>
                    <span id="fundlist">
                    </span>
                    <label for="recipient-name" class="col-form-label">Funded By*</label>
                    <span id="selectedfunders"></span>



                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="recipient-name" class="datepicker col-form-label">Start Date*</label>
                    <input type="date" class="form-control" id="start">
                  </div>
                  <div class="form-group">
                    <label for="recipient-name" class="col-form-label">End Date*</label>
                    <input type="date" class="form-control" id="end">
                  </div>
                  <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Color:</label>
                    <select class="form-control" id="clr">
                      <option value="orange" style="color: orange">Orange</option>
                      <option value="#007bff80" style="color: #007bff80">Blue</option>
                      <option value="#dc3545b5" style="color: #dc3545b5">Red</option>
                      <option value="#e731e7" style="color: #e731e7">Purple</option>
                      <option value="yellow" style="color: yellow">Yellow</option>
                      <option value="#00ff00" style="color: #00ff00">Green</option>
                      <option value="#b4b4b4" style="color: #b4b4b4">Gray</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Note:</label>
                    <input type="text" class="form-control" id="Des">
                  </div>
                </div>
              </div>
            </form>

            <form id="addfunderpanel" style="display:none;">
              <div class="row">
                <div class="col-md-6" id="allfunderlist">


                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label for="recipient-name" class="col-form-label">New Funder name:</label>
                    <input type="text" class="form-control" id="newfunder">
                  </div>
                  <button type="button" class="btn btn-primary" onclick="uploadfunder();">Add funder to database</button>
                </div>
              </div>
            </form>

          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-primary" id="save">Choose participents</button>
            <button style="display:none;" type="button" class="btn" onclick="hideaddfund();" id="back"><i class="fa fa-long-arrow-left"></i></button>
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
                <p  style="text-align: center;margin:5% 0%;">Do you really want to delete these records? This process can not be undone</p>
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


    <form class="form-inline" role="form" _lpchecked="1">
      <div class="col-lg-10">
        <label class="sr-only" for="exampleInputEmail2">Institute Name</label>
        <input type="text" class="form-control " placeholder="Type event name to search" id="sname" oninput="myFunction()" autocomplete="off">

      </div>

      <div class="col-lg-2">
        <button type="button" class="btn btn-theme" data-toggle="modal" data-target="#exampleModal">
          Add new Event
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
  var funder = new Set();
  var funderid = new Set();
  var count = 0;
  $(document).ready(function() {
    var number = getUrlParam('page', 'Empty');
    var search = getUrlParam('search', '');

    showfunders();
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
      } else {
        alert("No institute found");
      }
    });

    $("#save").unbind("click").click(function() {
      var title = $("#title").val();
      var fund = $("#fund").val();
      var Description = $("#Des").val();
      var color = $("#clr").val();
      var start = $("#start").val();
      var end = $("#end").val();
      var organize = $("#organize").val();
      var venu = $("#venu").val();
      if ((title === "") || (fund === "") || (start === "") || (end === "") || (organize === "") || (venu === "") || count === 0) {
        $("#al").show();
      } else {
        $.ajax({
          url: "php/insert.php",
          type: "POST",
          data: {
            title: title,
            fund: fund,
            start: start,
            end: end,
            Description: Description,
            color: color,
            organize: organize,
            venu: venu
          },
          success: function(data) {
            $("#title").val("");
            $("#fund").val("");
            $("#Des").val("");
            $("#start").val("");
            $("#end").val("");
            $("#clr").val("");
            $("#organize").val("");
            $("#venu").val("");
            window.location.href = 'insertparticipents.php?event_id=' + data;
          }
        })
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

  function edit(id, name, Designation, contact, institute_id, institutename) {
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
    $('#Confirm').modal();
    $("#yes").unbind("click").click(function() {
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
      xmlhttp.open("GET", "php/getEvent.php?page=" + page + "&search=" + search + "&time=" + new Date().getTime(), true);
      xmlhttp.send();
    }

    function showfunders() {
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("fundlist").innerHTML = this.responseText;
        }
      };
      xmlhttp.open("GET", "php/showfunders.php?time=" + new Date().getTime(), true);
      xmlhttp.send();
    }

    function addFunder() {
      var fundid = $("#fund").val();
      var fund = $("#fund option:selected").text();
      if (fund != "Select new Funder") {
        count++;
        funder.add(fund);
        funderid.add(fundid)
        var result = '';
        var funderArry = Array.from(funder);
        var fundidArry = Array.from(funderid);
        for (i = 0; i < funder.size; i++) {
          result = result + '<div class="chip">' + funderArry[i] + '<i class="fa fa-times" onclick="removefunder(' + '\'' + funderArry[i] + '\',' + fundidArry[i] + ')"></i></div>';
        }
        document.getElementById("selectedfunders").innerHTML = result;
        showfunders()
      }
    }

    function removefunder(value, id) {
      funder.delete(value);
      funderid.delete(id);
      count--;
      var result = '';
      var funderArry = Array.from(funder);
      var fundidArry = Array.from(funderid);
      for (i = 0; i < funder.size; i++) {
        result = result + '<div class="chip">' + funderArry[i] + '<i class="fa fa-times" onclick="removefunder(' + '\'' + funderArry[i] + '\',' + fundidArry[i] + ')"></i></div>';
      }
      document.getElementById("selectedfunders").innerHTML = result;
      showfunders()
    }

    function showaddfund() {
      $("#fundtitle").show();
      $("#ModalTile").hide();
      $("#maincontent").hide();
      $("#save").hide();
      $("#back").show();
      $("#addfunderpanel").show();
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("allfunderlist").innerHTML = this.responseText;
        }
      };
      xmlhttp.open("GET", "php/showfunderslist.php?time=" + new Date().getTime(), true);
      xmlhttp.send();
    }


    function hideaddfund() {
      $("#ModalTile").show();
      $("#maincontent").show();
      $("#save").show();
      $("#back").hide();
      $("#addfunderpanel").hide();
      $("#fundtitle").hide();
    }

    function uploadfunder() {
      var funderr = $("#newfunder").val();
      $.ajax({
        url: "php/insertfunder.php",
        type: "POST",
        data: {
          name: funderr
        },
        success: function() {
          showaddfund();
          showfunders();
          $("#newfunder").val("");
        }
      })
    }

    function removefunderfromdatabase(id) {
      var r = confirm("Delete funder from main database!");
      if (r == true) {
        $.ajax({
          url: "php/deletefunder.php",
          type: "POST",
          data: {
            id: id
          },
          success: function() {
            showaddfund();
            showfunders();
            $("#newfunder").val("");
          }
        })
      }
    }
</script>