<script>
  $(function() {
    $('[data-toggle="tooltip"]').tooltip()
  })
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

      events: 'php/load.php',


      select: function(arg) {
        var start = arg.start.toISOString();
        var end = arg.end.toISOString();
        $("#start").attr("placeholder", start);
        $("#end").attr("placeholder", end);
        $("#Modal").modal();
        // save button bind a click event every time so unbind it also everytime
        $("#save").unbind("click").click(function() {
          var title = $("#title").val();
          var fund = $("#fund").val();
          var Description = $("#Des").val();
          $.ajax({
            url: "php/insert.php",
            type: "POST",
            data: {
              title: title,
              fund: fund,
              start: start,
              end: end,
              Description: Description
            },
            success: function(data) {
              $("#title").val("");
              $("#fund").val("");
              $("#Des").val("");
              $("#start").val("");
              $("#end").val("");
              calendar.refetchEvents();
              window.location.href = 'insertparticipents.php?event_id=' + data;

            }
          })

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
        $("#Modal").modal();
        $("#ModalTile").html(info.event.title);
        $("#start").attr("placeholder", info.event.start);
        $("#remove").unbind("click").click(function() {
          var id = info.event.id;
          $.ajax({
            url: "php/delete.php",
            type: "POST",
            data: {
              id: id
            },
            success: function() {
              calendar.refetchEvents();
            }
          })
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


<script type="text/javascript">
  $(document).ready(function() {
    var unique_id = $.gritter.add({
      // (string | mandatory) the heading of the notification
      title: 'Welcome to Dashio!',
      // (string | mandatory) the text inside the notification
      text: 'Hover me to enable the Close Button. You can hide the left sidebar clicking on the button next to the logo.',
      // (string | optional) the image to display on the left
      image: 'img/ui-sam.jpg',
      // (bool | optional) if you want it to fade out on its own or just sit there
      sticky: false,
      // (int | optional) the time you want it to be alive for before fading out
      time: 8000,
      // (string | optional) the class name you want to apply to that specific message
      class_name: 'my-sticky-class'
    });

    return false;
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
</script>