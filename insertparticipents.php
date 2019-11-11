<?php include 'layout/header.php' ?>
<?php include 'layout/sidebar.php' ?>

<section id="main-content">
  <section class="wrapper">
    <!-- Modal -->
    <div class="modal fade" id="modalcalender" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Calender</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <div class="modal-body">

            <div id='mcalendar'>
            </div>

          </div>

        </div>
      </div>
    </div>
    <?php
    $id = $_GET["event_id"];

    include 'php/database.php';
    $data = array();

    $query = "SELECT * FROM events where event_id=" . $id;
    $statement = $connect->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    foreach ($result as $row) {
      ?>

      <div class="col-lg-12">
        <div class="row">
          <div class="col-md-4 profile-text ">
            <div class=" hidden-sm hidden-xs">
              <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Event</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control fcc" id="title" value="<?php echo $row["title"] ?>">
                </div>
              </div>
              <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Venu</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control fcc" id="venu" value="<?php echo $row["venu"] ?>">
                </div>
              </div>
              <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Description</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control fcc" id="description" value="<?php echo $row["Description"] ?>">
                </div>
              </div>

            </div>
          </div>
          <!-- /col-md-4 -->
          <div class="col-md-4 profile-text ">

            <div class="form-group row">
              <label for="inputPassword" class="col-sm-4 col-form-label">Organized By</label>
              <div class="col-sm-8">
                <input type="text" class="form-control fcc" id="organize" value="<?php echo $row["organized_by"] ?>">
              </div>
            </div>
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Select from the dropdown to add funders to this event</label>
              <span id="fundlist">
              </span>
            </div>
            <div class="form-group row" style="    margin-bottom: 0rem;">
              <label for="inputPassword" class="col-sm-4 col-form-label">Funded By</label>
              <div class="col-sm-8">
                <span id="selectedfunders"></span>
              </div>
            </div>




          </div>
          <!-- /col-md-4 -->
          <div class="col-md-4">
            <div class="row">
              <div class="col-md-9 profile-text">
                <div class="profile-pic">
                  <div class="form-group row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Start</label>
                    <div class="col-sm-10">
                      <input type="date" class="form-control fcc" id="start" value="<?php echo date('Y-m-d', strtotime($row["start_event"])); ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">End</label>
                    <div class="col-sm-10">
                      <input type="date" class="form-control fcc" id="end" value="<?php echo date('Y-m-d', strtotime($row["end_event"])); ?>">
                    </div>
                  </div>

                </div>
              </div>
              <div class="col-md-3 profile-text mb">
                <button type="button" class="btn btn-primary" data-dismiss="modal" id="update">Update</button>
              </div>
            </div>
           
          </div>
          <!-- /col-md-4 -->
         
        </div>
        <!-- /row -->
      </div>
    <?php } ?>
    <hr>
    <div class="row">
      <div class="col-lg-6">
      <form class="form-inline" role="form" _lpchecked="1">
      <div class="col-lg-8" style="padding-left:0px;">
        <label class="sr-only" for="exampleInputEmail2">Institute Name</label>
        <input type="text" class="form-control " placeholder="Type Institute name to search" id="sname" oninput="myFunction()" autocomplete="off">

      </div>
      <div class="col-lg-4" style="padding-right:0px;">
        <label class="sr-only" for="exampleInputEmail2">Area</label>

        <select id="sarea" class="form-control " autocomplete="off" oninput="myFunction()">
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
    <br>
    <br>
    </form>
        <span id="listt"></span>

      </div>
      <div class="col-lg-6" id="participents">

      </div>
    </div>


  </section>
  <!-- /wrapper -->
</section>
<?php include 'layout/footer.php' ?>

<script>
  var funder = new Set();
  var funderid = new Set();
  $(document).ready(function() {
    var number = getUrlParam('page', 'Empty');
    var event = getUrlParam('event_id', '');
    showfunders();
    showthiseventfunders();
    showParticipents(event);
    if (number == 'Empty') {
      showInstitutes(1, $("#sname").val(), $("#sarea").val(), $("#stype").val());
    } else {
      showInstitutes(number, $("#sname").val(), $("#sarea").val(), $("#stype").val());
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
            showInstitutes(1, $("#sname").val(), $("#sarea").val(), $("#stype").val());
          } else {
            showInstitutes(number, $("#sname").val(), $("#sarea").val(), $("#stype").val());
          }
        }
      })
    });
  })
  $("#update").unbind("click").click(function() {
    var event_id = getUrlParam('event_id', '');
    var title = $("#title").val();
    var fund = $("#fund").val();
    var Description = $("#description").val();
    var start = $("#start").val();
    var end = $("#end").val();
    var organize = $("#organize").val();
    var venu = $("#venu").val();
    $.ajax({
      url: "php/updatevent.php",
      type: "POST",
      data: {
        id: event_id,
        title: title,
        fund: fund,
        start: start,
        end: end,
        Description: Description,
        organize: organize,
        venu: venu
      },
      success: function() {
        var fundidArry = Array.from(funderid);
        for (i = 0; i < funder.size; i++) {
          $.ajax({
            url: "php/insertfund.php",
            type: "POST",
            data: {
              funder_id: fundidArry[i],
              event_id: event_id
            },
            success: function() {}
          })
        }
        alert("Successfully Updated");
        window.location.href = 'insertparticipents.php?event_id=' + event_id;
      }
    })

  })
  function addr() {
    var event_id = getUrlParam('event_id', '');
    var rname = $("#rrname").val();
    var rorganization = $("#rrorganization").val();
    $.ajax({
      url: "php/add_resource_person.php",
      type: "POST",
      data: {
        rname: rname,
        rorganization: rorganization,
        event_id: event_id
      },
      success: function(data) {
        $("#rrname").val("");
        $("#rrorganization").val("");
        alert(data);
        showParticipents(event_id);
      }
    })
  }


  function myFunction() {
    showInstitutes(1, $("#sname").val(), $("#sarea").val(), $("#stype").val());
  }



  function remove(id) {

    var event_id = getUrlParam('event_id', '');
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
  function removeResource(id){
    var event_id = getUrlParam('event_id', '');
    $.ajax({
      url: "php/delete_resource.php",
      type: "POST",
      data: {
        id: id
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

  function showInstitutes(page, search, area, type) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("listt").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET", "php/getInstitute_event.php?page=" + page + "&search=" + search + "&area=" + area + "&type=" + type, true);
    xmlhttp.send();
  }

  function showdropdown(number) {
    $("#details" + number).css("display", "flex");
    $("#up" + number).css("display", "flex");
    $("#down" + number).css("display", "none");
  }

  function hidedropdown(number) {
    $("#details" + number).css("display", "none");
    $("#up" + number).css("display", "none");
    $("#down" + number).css("display", "flex");
  }

  function assign(number) {
    var event_id = getUrlParam('event_id', '');
    $.ajax({
      url: "php/insertParticipents.php",
      type: "POST",
      data: {
        event_id: event_id,
        instructor_id: number,
        present: '0'
      },
      success: function() {
        alert("Successfully added");
        showParticipents(event_id);
      }
    })
  }

  function assignResource(number) {
    var event_id = getUrlParam('event_id', '');
    $.ajax({
      url: "php/insertParticipents.php",
      type: "POST",
      data: {
        event_id: event_id,
        instructor_id: number,
        present: 1
      },
      success: function() {
        alert("Successfully added");
        showParticipents(event_id);
      }
    })
  }

  function showCalender(number) {
    $('#mcalendar').html('');
    var calendarEl = document.getElementById('mcalendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
      plugins: ['interaction', 'dayGrid', 'timeGrid', 'list'],
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,listWeek'
      },
      timeZone: 'UTC',
      navLinks: true, // can click day/week names to navigate views
      defaultView: 'dayGridMonth',
      navLinks: true, // can click day/week names to navigate views
      eventLimit: true, // allow "more" link when too many events

      events: 'php/loadInstructorCalender.php?instructor=' + number,

    })
    calendar.render();
    $("#modalcalender").modal();

  }

  function showParticipents(event) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        $('#participents').html('');
        document.getElementById("participents").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET", "php/getparticipents.php?event=" + event + "&time=" + new Date().getTime(), true);
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
    } else {
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
    var event_id = getUrlParam('event_id', '');
    $.ajax({
      url: "php/deleteFunderWithEventid.php",
      type: "POST",
      data: {
        id: id,
        event_id: event_id
      },
      success: function(data) {

      }
    })
    addFunder();
    showfunders();
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

  function showthiseventfunders() {
    var event_id = getUrlParam('event_id', '');
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        var result = new Array(this.responseText);
        var array = result[0].split(",");
        console.log(array);
        for (var i = 1; i < array.length; i = i + 2) {
          funder.add(array[i]);
          funderid.add(array[i + 1]);
        }
        addFunder();
      }
    };
    xmlhttp.open("GET", "php/showthiseventfunders.php?id=" + event_id + "&time=" + new Date().getTime(), true);
    xmlhttp.send();
  }
</script>