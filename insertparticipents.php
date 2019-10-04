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
       
        <select id="sarea" class="form-control " autocomplete="off"  oninput="myFunction()">
            <option value="">Select a area</option>
            <option value="Dhaka">Dhaka</option>
            <option value="Bogra">Bogra</option>
            <option value="Sylhet">Sylhet</option>
        </select>
      </div>
      <div class="col-lg-3">
        <select id="stype" class="form-control " autocomplete="off"  oninput="myFunction()">
                <option value="Priority">Priority</option>
                <option value="Bogra">Bogra</option>
                
            </select>
      </div>

    </form>


    <hr>
    <div class="row">
    <div  class="col-lg-9" id="listt">

    </div>
    <div  class="col-lg-3" id="participents">

    </div>
</div>


  </section>
  <!-- /wrapper -->
</section>
<?php include 'layout/footer.php' ?>

<script>
  $(document).ready(function() {
    var number = getUrlParam('page', 'Empty');
    var event = getUrlParam('event_id', '');
    showParticipents(event);
    if (number == 'Empty') {
        showInstitutes(1, $("#sname").val(),$("#sarea").val(),$("#stype").val());
    } else {
      showInstitutes(number, $("#sname").val(),$("#sarea").val(),$("#stype").val());
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
            showInstitutes(1, $("#sname").val(),$("#sarea").val(),$("#stype").val());
          } else {
            showInstitutes(number, $("#sname").val(),$("#sarea").val(),$("#stype").val());
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
            showInstitutes(1, $("#sname").val(),$("#sarea").val(),$("#stype").val());
          } else {
            showInstitutes(number, $("#sname").val(),$("#sarea").val(),$("#stype").val());
          }
        }
      })
    });


  })

  function myFunction() {
    showInstitutes(1, $("#sname").val(),$("#sarea").val(),$("#stype").val());
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
    
    var event_id = getUrlParam('event_id', '');
    alert(event_id);
    $.ajax({
      url: "php/deleteparticipents.php",
      type: "POST",
      data: {
        id: id,
        event: event_id
      },
      success: function() {
        showParticipents(event_id);
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

  function showInstitutes(page, search,area,type) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("listt").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET", "php/getInstitute_event.php?page=" + page + "&search=" + search + "&area=" + area + "&type=" + type, true);
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
  function showdropdown(number){
    $("#details"+number).css("display", "flex");
    $("#up"+number).css("display", "flex");
    $("#down"+number).css("display", "none");
  }
  function hidedropdown(number){
    $("#details"+number).css("display", "none");
    $("#up"+number).css("display", "none");
    $("#down"+number).css("display", "flex");
  }
  function assign(number){
    var event_id = getUrlParam('event_id', '');
    $.ajax({
        url: "php/insertParticipents.php",
        type: "POST",
        data: {
          event_id: event_id,
          instructor_id: number,
          present: '1'
        },
        success: function() {
            alert("Successfully added");
            showParticipents(event_id);
        }
      })
  }

  function showParticipents(event) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("participents").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET", "php/getparticipents.php?event=" + event, true);
    xmlhttp.send();
  }
</script>