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


    <div class="col-lg-12">
            <div class="row">
              <div class="col-md-4 profile-text mt mb">
                <div class="right-divider hidden-sm hidden-xs">
                <h3 id="event_name">Event Name</h3>
                <h6>Organized by</h6>
                <p>Description</p>
                  
                </div>
              </div>
              <!-- /col-md-4 -->
              <div class="col-md-4 profile-text right-divider">
                
              <p id="event_name">Funded by:</p>
              <p>Organized by:</p>
                
              </div>
              <!-- /col-md-4 -->
              <div class="col-md-4 ">
                <div class="profile-pic">
                  
                  <h4 id="event_name">1922</h4>
                  <h6>Participents</h6>
                  <p>Staring date: 12-10-2019</p>
                  <p>Staring date: 12-10-2019</p>
                  <p>
                    <button class="btn btn-theme"><i class="fa fa-check"></i> Follow</button>
                    <button class="btn btn-theme02">Add</button>
                  </p>
                </div>
              </div>
              <!-- /col-md-4 -->
            </div>
            <!-- /row -->
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

    


  })

  function myFunction() {
    showInstitutes(1, $("#sname").val(),$("#sarea").val(),$("#stype").val());
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
            
        }
      })
  }

  var count =0;
  function showCalender(number){
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

      events: 'php/loadInstructorCalender.php?instructor='+number,
      
    })
    calendar.render();
    $("#modalcalender").modal();
    
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