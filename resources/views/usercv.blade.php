@extends('main')

@section('content')

    <div class="row ">

        <div class="col-12 ">
            <div class="card">
                <div class="card-body">

                    <form id="regForm" action="">
                        <!-- One "tab" for each step in the form: -->
                        <div class="tab">

                            <h2 style="margin-bottom: 40px; text-align: center;">Personal Details </h2>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="">First Name</label>
                                    <input type="text" class="form-control" id="" placeholder="">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Last Name</label>
                                    <input type="text" class="form-control" id="" placeholder="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="">Fathers Name</label>
                                    <input type="text" class="form-control" id="" placeholder="">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Mothers Name</label>
                                    <input type="text" class="form-control" id="" placeholder="">
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="">Gender</label>
                                    <select class="form-control" id="sel1">
                                        <option>Male</option>
                                        <option>Female</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Religion</label>
                                    <select class="form-control" id="sel1">
                                        <option>Muslim</option>
                                        <option>Hindu</option>
                                        <option>Christian</option>
                                        <option>Buddhist</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="">Ethnicity</label>
                                    <select class="form-control" id="sel1">
                                        <option>Bangali</option>
                                        <option>Adibashi</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Disability</label>
                                    <select class="form-control" id="sel1">
                                        <option>Yes</option>
                                        <option>No</option>
                                    </select>
                                </div>
                            </div>


                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="">Date of Birth</label>
                                    <input type="text" class="form-control" id="" placeholder="">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Skype</label>
                                    <input type="text" class="form-control" id="" placeholder="">
                                </div>
                            </div>


                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="">Nationality</label>
                                    <select class="form-control" id="sel1">
                                        <option>Bangladeshi</option>
                                        <option>Others</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="">NID </label>
                                    <input type="text" class="form-control" id="" placeholder="">
                                </div>

                            </div>



                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="">Contact No.</label>
                                    <input type="text" class="form-control" id="" placeholder="">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Email</label>
                                    <input type="text" class="form-control" id="" placeholder="">
                                </div>
                            </div>




                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="">Current Address</label>
                                    <input type="text" class="form-control" id="" placeholder="">
                                </div>

                            </div>

                            <div class="row">

                                <div class="form-group col-md-12">
                                    <label for="">Permanent Address</label>
                                    <input type="text" class="form-control" id="" placeholder="">
                                </div>

                            </div>

                        </div>


                        <div class="tab">

                            <h2 style="margin-bottom: 40px; text-align: center;">Career Objective </h2>

                            <div class="row">

                                <div class="form-group col-md-12">
                                    <textarea class="form-control" rows="5" id=""></textarea>
                                </div>

                            </div>

                        </div>


                        <div class="tab">

                            <h2 style="margin-bottom: 30px; text-align:center">Education </h2>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <h4>SSC</h4>
                                    <hr>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-5">
                                    <label for="">Institute Name</label>
                                    <input type="text" class="form-control" id="" placeholder="">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="">Group</label>
                                    <select class="form-control" id="sel1">
                                        <option>Science</option>
                                        <option>Arts</option>
                                        <option>Commerce</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="">Year</label>
                                    <input type="text" class="form-control" id="" placeholder="">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="">CGPA</label>
                                    <input type="text" class="form-control" id="" placeholder="">
                                </div>

                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <h4 style="margin-top:30px; ">HSC</h4>
                                    <hr>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-5">
                                    <label for="">Institute Name</label>
                                    <input type="text" class="form-control" id="" placeholder="">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="">Group</label>
                                    <select class="form-control" id="">
                                        <option>Science</option>
                                        <option>Arts</option>
                                        <option>Commerce</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="">Year</label>
                                    <input type="text" class="form-control" id="" placeholder="">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="">CGPA</label>
                                    <input type="text" class="form-control" id="" placeholder="">
                                </div>

                            </div>

                            <div class="row">
                                <div class="form-group col-md-12">
                                    <h4 style="margin-top:30px; ">Undergrade</h4>
                                    <hr>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-5">
                                    <label for="">Institute Name</label>
                                    <input type="text" class="form-control" id="" placeholder="">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="">Department</label>
                                    <select class="form-control" id="">
                                        <option>Science</option>
                                        <option>Arts</option>
                                        <option>Commerce</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="">Year</label>
                                    <input type="text" class="form-control" id="" placeholder="">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="">CGPA</label>
                                    <input type="text" class="form-control" id="" placeholder="">
                                </div>

                            </div>


                            <div class="row">
                                <div class="form-group col-md-12">
                                    <h4 style="margin-top:30px; ">Masters</h4>
                                    <hr>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-5">
                                    <label for="">Institute Name</label>
                                    <input type="text" class="form-control" id="" placeholder="">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="">Department</label>
                                    <select class="form-control" id="">
                                        <option>Science</option>
                                        <option>Arts</option>
                                        <option>Commerce</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="">Year</label>
                                    <input type="text" class="form-control" id="" placeholder="">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="">CGPA</label>
                                    <input type="text" class="form-control" id="" placeholder="">
                                </div>

                            </div>

                            <button type="button" class="btn btn-success">Add More</button>
                        </div>






                        <div class="tab">

                            <h2 style="margin-bottom: 30px;">Professional Certification </h2>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="inputEmail4">Exam Name</label>
                                    <input type="email" class="form-control" id="inputEmail4" placeholder="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-8">
                                    <label for="inputEmail4">Institute Name</label>
                                    <input type="email" class="form-control" id="inputEmail4" placeholder="">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputPassword4">Passing Year</label>
                                    <input type="password" class="form-control" id="inputPassword4" placeholder="">
                                </div>
                            </div>

                            <button type="button" class="btn btn-success">Add More</button>

                        </div>




                        <div class="tab">Birthday:
                            <p><input placeholder="dd" oninput="this.className = ''" name="dd"></p>
                            <p><input placeholder="mm" oninput="this.className = ''" name="nn"></p>
                            <p><input placeholder="yyyy" oninput="this.className = ''" name="yyyy"></p>
                        </div>

                        <div class="tab">Login Info:
                            <p><input placeholder="Username..." oninput="this.className = ''" name="uname"></p>
                            <p><input placeholder="Password..." oninput="this.className = ''" name="pword" type="password"></p>
                        </div>

                        <div style="overflow:auto;">
                            <div style="float:right;">
                                <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                                <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
                            </div>
                        </div>
                        <!-- Circles which indicates the steps of the form: -->
                        <div style="text-align:center;margin-top:40px;">
                            <span class="step"></span>
                            <span class="step"></span>
                            <span class="step"></span>
                            <span class="step"></span>
                            <span class="step"></span>
                        </div>
                    </form>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->

    </div> <!-- end container -->
    </div>
    <!-- end wrapper -->

    <script>
        var currentTab = 0; // Current tab is set to be the first tab (0)
        showTab(currentTab); // Display the crurrent tab

        function showTab(n) {
            // This function will display the specified tab of the form...
            var x = document.getElementsByClassName("tab");
            x[n].style.display = "block";
            //... and fix the Previous/Next buttons:
            if (n == 0) {
                document.getElementById("prevBtn").style.display = "none";
            } else {
                document.getElementById("prevBtn").style.display = "inline";
            }
            if (n == (x.length - 1)) {
                document.getElementById("nextBtn").innerHTML = "Submit";
            } else {
                document.getElementById("nextBtn").innerHTML = "Next";
            }
            //... and run a function that will display the correct step indicator:
            fixStepIndicator(n)
        }

        function nextPrev(n) {
            // This function will figure out which tab to display
            var x = document.getElementsByClassName("tab");
            // Exit the function if any field in the current tab is invalid:
            if (n == 1 && !validateForm()) return false;
            // Hide the current tab:
            x[currentTab].style.display = "none";
            // Increase or decrease the current tab by 1:
            currentTab = currentTab + n;
            // if you have reached the end of the form...
            if (currentTab >= x.length) {
                // ... the form gets submitted:
                document.getElementById("regForm").submit();
                return false;
            }
            // Otherwise, display the correct tab:
            showTab(currentTab);
        }

        function validateForm() {
            // This function deals with validation of the form fields
            var x, y, i, valid = true;
            x = document.getElementsByClassName("tab");
            y = x[currentTab].getElementsByTagName("input");
            // A loop that checks every input field in the current tab:
            for (i = 0; i < y.length; i++) {
                // If a field is empty...
                if (y[i].value == "") {
                    // add an "invalid" class to the field:
                    y[i].className += " invalid";
                    // and set the current valid status to false
                    valid = false;
                }
            }
            // If the valid status is true, mark the step as finished and valid:
            if (valid) {
                document.getElementsByClassName("step")[currentTab].className += " finish";
            }
            return valid; // return the valid status
        }

        function fixStepIndicator(n) {
            // This function removes the "active" class of all steps...
            var i, x = document.getElementsByClassName("step");
            for (i = 0; i < x.length; i++) {
                x[i].className = x[i].className.replace(" active", "");
            }
            //... and adds the "active" class on the current step:
            x[n].className += " active";
        }
    </script>


@endsection