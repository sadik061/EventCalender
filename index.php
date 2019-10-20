<?php include 'layout/header.php' ?>
<?php include 'layout/sidebar.php' ?>
<section id="main-content">

  <section class="wrapper">
    <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="ModalTile">Event</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Event title</label>
                <input type="text" class="form-control" id="title">
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Funded By</label>
                <input type="text" class="form-control" id="fund">
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Start Date:</label>
                <input type="text" class="form-control" id="start">
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">End Date:</label>
                <input type="text" class="form-control" id="end">
              </div>
              <div class="form-group">
              <label for="recipient-name" class="col-form-label">Color:</label>
                <select class="form-control" id="clr">
                  <option value="orange" style="color: orange">Orange</option>
                  <option value="#007bff80" style="color: #007bff80">Blue</option>
                  <option value="#dc3545b5" style="color: #dc3545b5">Red</option>
                </select>
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Description:</label>
                <input type="text" class="form-control" id="Des">
              </div>

            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal" id="save">Save</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal" id="remove">Remove</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

          </div>
        </div>
      </div>
    </div>
    <div class="pn" style="display:none;">

      <!-- /weather-2 header -->
      <div class="row ">
        <div class="col-sm-10 col-md-10 goleft">

          <b style="color: black"> Event:</b>

          <span id="titlee" style="margin-left:6%">
            <b id="titlee"></b>

          </span>
          <br>
          <b style="color: black">Description:</b>
          <span style="margin-left:2%" id="Description">
          </span>
          <br>
          <b style="color: black;top:200px;">Funded By:</b><span style="margin-left:3%" id="funded_by"></span>
        </div>
        <div class="col-sm-2 col-xs-2 goright">
          <h5><i class="fa fa-sun-o fa-2x"></i></h5>
          <h6><b>Sunny</b></h6>
          <h5>7:15 am</h5>
        </div>
      </div>
    </div>
    </div>

    <div id='calendar'>

    </div>
    <!-- /row -->
  </section>
  <!-- /wrapper -->
</section>
<?php include 'layout/footer.php' ?>
<?php include 'layout/chalender.php' ?>