<?php include 'layout/header.php' ?>
<?php include 'layout/sidebar.php' ?>

<section id="main-content">
  <section class="wrapper">
    <!-- Modal -->
    <div class="modal fade" id="fundata" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
      <div class="modal-dialog" role="document" style="    max-width: 70%;">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Add New Funder In The Database</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form>
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
        </div>
      </div>
    </div>
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
    <div class="modal fade" id="custommail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Custom Mail</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">

          <div class="panel-body">
                
                <div class="compose-mail">
                  <form role="form-horizontal" method="post">
                    
                    <div class="form-group">
                      <label for="subject" class="">Subject:</label>
                      <input type="text" id="subject" class="form-control" style="float:right;border: 1px solid lightgray;">
                      
                    </div>
                    <div class="form-group">
                    <textarea rows="4" cols="60" id="msg" class="form-control"></textarea>
                    </div>
                   
                   
                  </form>
                </div>
                <div class="compose-btn pull-right">
                  <button class="btn btn-primary" onclick="customail();"><i class="fa fa-check"></i> Send</button>
                  <button class="btn btn-sm"><i class="fa fa-times"></i> Discard</button>
                 
                </div>
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

      <div class="col-lg-12" style="border: 1px solid lightgray;padding-top: 0%;">
        <h3 style="text-align:center;
">Event Details</h3>
        <div class="row khulja">
          <div class="col-md-4 profile-text ">
          <div id="al" class="alert alert-danger" role="alert" style="display:none;">
                    Please fill all the mendatory(*) fields
                  </div>
            <div class=" hidden-sm hidden-xs">
              <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Event*</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control fcc" id="title" value="<?php echo $row["title"] ?>">
                </div>
              </div>
              <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Venue*</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control fcc" id="venu" value="<?php echo $row["venu"] ?>">
                </div>
              </div>
              <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Note</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control fcc" id="description" value="<?php echo $row["Description"] ?>">
                </div>
              </div>

            </div>
          </div>
          <!-- /col-md-4 -->
          <div class="col-md-4 profile-text ">

            <div class="form-group row">
              <label for="inputPassword" class="col-sm-4 col-form-label">Organized By*</label>
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
              <label for="inputPassword" class="col-sm-4 col-form-label">Funded By*</label>
              <div class="col-sm-8">
                <span id="selectedfunders"></span>
              </div>
            </div>




          </div>
          <!-- /col-md-4 -->
          <div class="col-md-4">
            <div class="row">
              <div class="col-md-12 profile-text">
                <div class="profile-pic">
                  <div class="form-group row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Start*</label>
                    <div class="col-sm-10">
                      <input type="date" class="form-control fcc" id="start" value="<?php echo date('Y-m-d', strtotime($row["start_event"])); ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">End*</label>
                    <div class="col-sm-10">
                      <input type="date" class="form-control fcc" id="end" value="<?php echo date('Y-m-d', strtotime($row["end_event"])); ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Color</label>
                    <div class="col-sm-10">
                    <select class="form-control" id="clr">
                      <option value="orange" <?=$row['color'] == 'orange' ? ' selected="selected"' : '';?>style="color: orange">Orange</option>
                      <option value="#007bff80"  <?=$row['color'] == '#007bff80' ? ' selected="selected"' : '';?> style="color: #007bff80">Blue</option>
                      <option value="#dc3545b5"  <?=$row['color'] == '#dc3545b5' ? ' selected="selected"' : '';?>style="color: #dc3545b5">Red</option>
                      <option value="#e731e7"  <?=$row['color'] == '#e731e7' ? ' selected="selected"' : '';?>style="color: #e731e7">Purple</option>
                      <option value="yellow"  <?=$row['color'] == 'yellow' ? ' selected="selected"' : '';?>style="color: yellow">Yellow</option>
                      <option value="#00ff00"  <?=$row['color'] == '#00ff00' ? ' selected="selected"' : '';?>style="color: #00ff00">Green</option>
                      <option value="#b4b4b4"  <?=$row['color'] == '#b4b4b4' ? ' selected="selected"' : '';?>style="color: #b4b4b4">Gray</option>
                    </select>
                    </div>
                  </div>
                </div>
              </div>
            </div>
           

          </div>
          <!-- /col-md-4 -->

        </div>
        <div class="row khulja" >
            <div class="col-md-12 profile-text mb" style="margin-bottom: 8px;">
                <button type="button" class="btn btn-primary" style="float:right;" data-dismiss="modal" id="update">Update</button>
                <button type="button" class="btn btn-primary" onclick="$('#custommail').modal();" id="email"><i class="fa fa-envelope"></i></button>
                <button type="button" class="btn btn-primary" onclick="sendmail();" id="email"><i class="fa fa-check"></i> Confirm </button>
                
              
              </div>
              
            </div>
            
              
            </div>
            <div class="row">
            <div class="col-md-12 profile-text mb" align="center" style="margin-bottom: 0px;">
            <i class="fa fa-angle-double-up"  style="    font-size: 31px;color: #0D7EFF;background:white;" id="close" onclick="khuljasimsim(0);"></i>
            <i class="fa fa-angle-double-down" id="open" style="display:none;font-size: 31px;color: #0D7EFF;background:white;" onclick="khuljasimsim(1);"></i>
              </div>
        <!-- /row -->
      </div>
    <?php } ?>
   
    <div class="row">
    
      <div class="col-lg-7">
      <h4>Select Participants</h4>
        <form class="form-inline" role="form" _lpchecked="1">
          <div class="col-lg-8" style="padding-left:0px;">
            <label class="sr-only" for="exampleInputEmail2">Institute Name</label>
            <input type="text" class="form-control " placeholder="Type Institute name to search" id="sname" oninput="myFunction()" autocomplete="off">

          </div>
          <div class="col-lg-4" style="padding-right:0px;">
            <label class="sr-only" for="exampleInputEmail2">Area</label>

            <select id="sarea" class="form-control " autocomplete="off" oninput="myFunction()">
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
          <br>
          <br>
        </form>
        
        <span id="listt"></span>

      </div>
      <div class="col-lg-5" >
        <div class="alert alert-success" id="success" role="alert" style="display:none;">
          
        </div>
        <spna id="participents"></spna>

      </div>
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
    var color = $("#clr").val();
    if ((title === "") || (fund === "") || (start === "") || (end === "") || (organize === "") || (venu === "") || count === 0) {
      $("#al").show();
    } else {
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
          venu: venu,
          color: color
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
    }

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
        showParticipents(event_id);
        $("#success").html("You have successfully Added '"+rname+"'");
        $("#success").fadeIn();
        $("#success").fadeOut(3000);
      }
    })
  }


  function myFunction() {
    showInstitutes(1, $("#sname").val(), $("#sarea").val(), $("#stype").val());
  }



  function remove(id,name) {
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
        //alert("Successfully Removed");
        $("#success").html("You have successfully removed '"+name+"'");
        $("#success").fadeIn();
        $("#success").fadeOut(3000);
      }
    })
  }

  function removeResource(id,name) {
    var event_id = getUrlParam('event_id', '');
    $.ajax({
      url: "php/delete_resource.php",
      type: "POST",
      data: {
        id: id
      },
      success: function(data) {
        showParticipents(event_id);
        $("#success").html("You have successfully removed '"+name+"'");
        $("#success").fadeIn();
        $("#success").fadeOut(3000);
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

  function assign(number,name) {
    var event_id = getUrlParam('event_id', '');
    $.ajax({
      url: "php/insertParticipents.php",
      type: "POST",
      data: {
        event_id: event_id,
        instructor_id: number,
        present: '0'
      },
      success: function(data) {
        $("#success").html(data);
        $("#success").fadeIn();
        $("#success").fadeOut(4000);
        showParticipents(event_id);
      }
    })
  }

  function assignResource(number,name) {
    var event_id = getUrlParam('event_id', '');
    $.ajax({
      url: "php/insertParticipents.php",
      type: "POST",
      data: {
        event_id: event_id,
        instructor_id: number,
        present: 1
      },
      success: function(data) {
        $("#success").html(data);
        $("#success").fadeIn();
        $("#success").fadeOut(4000);
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
      count++;
      funder.add(fund);
      funderid.add(fundid);
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
    count--;
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
      var result = '';
      var funderArry = Array.from(funder);
      var fundidArry = Array.from(funderid);
      for (i = 0; i < funder.size; i++) {
        result = result + '<div class="chip">' + funderArry[i] + '<i class="fa fa-times" onclick="removefunder(' + '\'' + funderArry[i] + '\',' + fundidArry[i] + ')"></i></div>';
      }
      document.getElementById("selectedfunders").innerHTML = result;

      }
    })
    showfunders();
  }

  function showaddfund() {
    $("#fundata").modal();
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
          count++;
          funder.add(array[i]);
          funderid.add(array[i + 1]);
        }
        addFunder();
      }
    };
    xmlhttp.open("GET", "php/showthiseventfunders.php?id=" + event_id + "&time=" + new Date().getTime(), true);
    xmlhttp.send();
  }
  function sendmail() {
    var event_id = getUrlParam('event_id', '');
    window.location.href = "php/sendeventemail.php?id=" + event_id + "&time=" + new Date().getTime();
  }
  function customail(){
    var event_id = getUrlParam('event_id', '');
    window.location.href = "php/sendeventemail.php?id=" + event_id + "&subject=" +$("#subject").val()+"&msg=" +$("#msg").val()+ "&time=" + new Date().getTime();

  }
  function khuljasimsim(n){
    if(n==0){
      $("#open").show();
      $("#close").hide();
      $(".khulja").hide();
    }else{
      $("#open").hide();
      $(".khulja").show();
      $("#close").show();
    }

  }
 
</script>