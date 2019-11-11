<aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
          <p class="centered" style="padding-top: 50px;"><a href="profile.html"><img style="border: 1px solid white;border-radius: 41px;"src="img/ui-sam.jpg" class="img-circle" width="80"></a></p>
          <h5 class="centered" style="color: lightgray;border-bottom: 1px solid lightgray; padding-bottom: 46px;">Sam Soffes</h5>
          <li class="mt">
            <a href="index.php" class="<?php if($page=='calender'){echo 'active';}?>">
              <i class="fa fa-calendar"></i>
              <span>Calendar</span>
              </a>
          </li>
          
          
          <li>
            <a href="event.php" class="<?php if($page=='event'){echo 'active';}?>">
              <i class="fa fa-tasks"></i>
              <span>Events </span>
              </a>
          </li>
          <li>
            <a href="institute.php" class="<?php if($page=='institute'){echo 'active';}?>">
              <i class="fa fa-hospital-o"></i>
              <span>Institute </span>
              </a>
          </li>
          <li>
            <a href="instructor.php" class="<?php if($page=='instructor'){echo 'active';}?>">
              <i class="fa fa-female"></i>
              <span>Instructors </span>
              </a>
          </li>
          <li>
            <a href="report.php" class="<?php if($page=='report'){echo 'active';}?>">
              <i class="fa fa-bar-chart-o"></i>
              <span>Report </span>
              </a>
          </li>
          <li>
            <a href="logout.php">
              <i class="fa fa-minus-square"></i>
              <span>Logout </span>
              </a>
          </li>
        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>