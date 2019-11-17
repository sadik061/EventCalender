<?php $page = 'report';
include 'layout/header.php' ?>
<?php include 'layout/sidebar.php' ?>

<section id="main-content">
    <section class="wrapper">
        <!-- Modal -->
        <div class="col-lg-12">
            <div class="row">
                <div class="col-md-12 profile-text ">
                    <div class=" hidden-sm hidden-xs">
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <small class="text-muted">Event name</small>
                                <label class="sr-only" for="exampleInputEmail2">Institute Name</label>
                                <input type="text" class="form-control " placeholder="Type Institute name to search" id="ename" oninput="myFunction()" autocomplete="off">

                            </div>
                            <div class="col-lg-6">
                                <small class="text-muted">Funded By</small>
                                <label class="sr-only" for="exampleInputEmail2">Funded By</label>
                                <span id="fundlist"></span>

                            </div>
                            
                            <div class="col-lg-3">
                                <small class="text-muted">Organized by</small>
                                <label class="sr-only" for="exampleInputEmail2">Institute Name</label>
                                <input type="text" class="form-control " placeholder="Organized by" id="oname" oninput="myFunction()" autocomplete="off">

                            </div>
                            <div class="col-lg-3">
                                <small class="text-muted">Venu name</small>
                                <label class="sr-only" for="exampleInputEmail2">Institute Name</label>
                                <input type="text" class="form-control " placeholder="Type venu name to search" id="vname" oninput="myFunction()" autocomplete="off">

                            </div>

                            <div class="col-lg-3">
                                <small class="text-muted">Quadrant</small>
                                <select id="month" class="form-control " autocomplete="off" oninput="myFunction()">
                                    <option value="">Select a Quarter</option>
                                    <option value="01">Jan - March</option>
                                    <option value="04">April - June</option>
                                    <option value="07">July - September</option>
                                    <option value="10">October - December</option>
                                </select>

                            </div>
                            <div class="col-lg-3">
                                <small class="text-muted">Year</small>
                                <input type="number" class="form-control" id="year" min="2019" max="2099" step="1" value="2019" oninput="myFunction()"/>

                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
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
        showfunders();
        showInstitutes($("#ename").val(), $("#fname").val(), $("#oname").val(), $("#vname").val(), $("#month").val(), $("#year").val());
    })
    

    function myFunction() {
        showInstitutes($("#ename").val(), $("#fname").val(), $("#oname").val(), $("#vname").val(), $("#month").val(), $("#year").val());
    }
    function showInstitutes(ename, fname, oname, vname, month, year) {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("listt").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "php/getreport.php?ename=" + ename + "&fname=" + fname + "&oname=" + oname + "&vname=" + vname + "&month=" + month + "&year=" + year, true);
        xmlhttp.send();
    }
    function download() {
        window.location.href = "php/download.php?ename=" + $("#ename").val() + "&fname=" + $("#fname").val() + "&oname=" + $("#oname").val() + "&vname=" + $("#vname").val() + "&month=" + $("#month").val() + "&year=" + $("#year").val() + "&time=" + new Date().getTime();
    }
    function showfunders() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("fundlist").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET", "php/showfundersonly.php?time=" + new Date().getTime(), true);
    xmlhttp.send();
  }

    
</script>