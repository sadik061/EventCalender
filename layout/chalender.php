<script>
  $(function() {
    $('[data-toggle="tooltip"]').tooltip()
  })
  var funder = new Set();
  var funderid = new Set();
  var count = 0;
  document.addEventListener('DOMContentLoaded', function() {

    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
      plugins: ['interaction', 'dayGrid', 'timeGrid', 'list'],
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
      },
      timeZone: 'UTC',
      navLinks: true, // can click day/week names to navigate views
      defaultView: 'dayGridMonth',
      navLinks: true, // can click day/week names to navigate views
      editable: true,
      eventLimit: true, // allow "more" link when too many events
      selectable: true,
      selectHelper: true,
      allday: false,

      events: {
        url: 'php/load.php',
        extraParams: function() {
          return {
            cachebuster: new Date().valueOf()
          };
        }
      },


      select: function(arg) {
        var start = arg.start.toISOString();
        var end = arg.end.toISOString();
        if (arg.start.getMonth() < 9) {
          var month = "0" + (arg.start.getMonth() + 1);
        } else {
          month = (arg.start.getMonth() + 1);
        }
        if (arg.start.getDate() < 10) {
          var dayy = "0" + arg.start.getDate();
        } else {
          dayy = arg.start.getDate();
        }
        var sstart = arg.start.getFullYear() + "-" + month + "-" + dayy;
        $('#start').val(sstart);
        $('#end').val(sstart);
        showfunders();
        $("#Modal").modal();
        // save button bind a click event every time so unbind it also everytime
        $("#save").unbind("click").click(function() {
          var title = $("#title").val();
          var fund = $("#fund").val();
          var Description = $("#Des").val();
          var color = $("#clr").val();
          var start = $("#start").val();
          var end = $("#end").val();
          var organize = $("#organize").val();
          var venu = $("#venu").val();
          if( (title ==="") || (fund ==="") || (start ==="") || (end ==="") || (organize ==="") || (venu ==="") || count === 0 ){
            $("#al").show();
          }else{
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
              calendar.refetchEvents();
              var fundidArry = Array.from(funderid);
              for (i = 0; i < funder.size; i++) {
                $.ajax({
                  url: "php/insertfund.php",
                  type: "POST",
                  data: {
                    funder_id: fundidArry[i],
                    event_id: data
                  },
                  success: function() {}
                })
              }
              window.location.href = 'insertparticipents.php?event_id=' + data;
            }
          })
          }

        });

      },

      eventResize: function(info) {
        var title = info.event.title;
        var id = info.event.id;
        $.ajax({
          url: "php/update.php",
          type: "POST",
          data: {
            title: title,
            start: info.event.start.toISOString(),
            end: info.event.end.toISOString(),
            id: id
          },
          success: function() {
            calendar.refetchEvents();
          }
        });

      },

      eventDrop: function(info) {
        var id = info.event.id;
        $.ajax({
          url: "php/update.php",
          type: "POST",
          data: {
            title: info.event.title,
            start: info.event.start.toISOString(),
            end: info.event.end.toISOString(),
            id: id
          },
          success: function() {
            calendar.refetchEvents();
          }
        });
      },


      eventClick: function(info) {
        var id = info.event.id;
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            document.getElementById("preview").innerHTML = this.responseText;
          }
        };
        xmlhttp.open("GET", "php/getpreview.php?event=" + id + "&time=" + new Date().getTime(), true);
        xmlhttp.send();
        $("#previeww").modal();
        $("#pedit").unbind("click").click(function() {
          window.location.href = 'insertparticipents.php?event_id=' + id;
        });

      },
      /*
      eventRender: function(info) {
        return $('<a class="fc-day-grid-event fc-h-event fc-event fc-start fc-end important fc-draggable" data-placement="left" data-toggle="popover" data-html="true" title="' + info.event.description + '"><div class="fc-content"><span class="fc-time">12a</span><span class="fc-title">' + info.event.title + '</span></div></a>');
      },*/
      eventMouseEnter: function(info) {
        $("#titlee").html(info.event.title);
        $("#Description").html(info.event.extendedProps.Description);
        $("#funded_by").html(info.event.extendedProps.funded_by);
        //$('#Modal').modal('show');
      }

    });
    calendar.render();
  });
</script>

<script type="application/javascript">
  $(document).ready(function() {
    $("#date-popover").popover({
      html: true,
      trigger: "manual"
    });
    $("#date-popover").hide();
    $("#date-popover").click(function(e) {
      $(this).hide();
    });

    $("#my-calendar").zabuto_calendar({
      action: function() {
        return myDateFunction(this.id, false);
      },
      action_nav: function() {
        return myNavFunction(this.id);
      },
      ajax: {
        url: "show_data.php?action=1",
        modal: true
      },
      legend: [{
          type: "text",
          label: "Special event",
          badge: "00"
        },
        {
          type: "block",
          label: "Regular event",
        }
      ]
    });
  });

  function myNavFunction(id) {
    $("#date-popover").hide();
    var nav = $("#" + id).data("navigation");
    var to = $("#" + id).data("to");
    console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
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

  function showdetails(number){
      if(number===1){
        $(".details").show();
        $("#hidedetails").hide();
      }else{
        $(".details").hide();
        $("#hidedetails").show();
      }
  }
</script>