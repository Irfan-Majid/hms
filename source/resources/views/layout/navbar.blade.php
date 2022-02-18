 <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="nav-small-cap">PERSONAL</li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-gauge"></i><span class="hide-menu">Dashboard</span></a>
                            
                        </li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-gauge"></i><span class="hide-menu">General</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{route(Session::get('identity').'.department.index')}}">Manage Department </a></li>
                                <li><a href="{{route(Session::get('identity').'.roomtype.index')}}">Manage Room Category </a></li>
                                <li><a href="{{route(Session::get('identity').'.room.index')}}">Manage Room</a></li>
                                
                                <li><a href="{{route(Session::get('identity').'.ot_type.index')}}">Operation type</a></li>
                                <li><a href="{{route(Session::get('identity').'.o_theatre.index')}}">Operation Room</a></li>
                                <li><a href="{{route(Session::get('identity').'.in-patient.index')}}">Admitter Patient</a></li>
                                <li><a href="{{route(Session::get('identity').'.out-patient.index')}}">Outdoor Patient</a></li>
                                
                                
                            </ul>
                        </li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-gauge"></i><span class="hide-menu">Human Resource</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{route(Session::get('identity').'.doctor.index')}}">Doctor</a></li>
                                <li><a href="{{route(Session::get('identity').'.nurse.index')}}">Nurse</a></li>
                                <li><a href="{{route('users.index')}}">users</a></li>
                                <li><a href="{{route(Session::get('identity').'.employee.index')}}">Employee</a></li>
                            </ul>
                        </li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-bullseye"></i><span class="hide-menu">Appointment</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{route(Session::get('identity').'.dutyshift.index')}}">Duty shift</a></li>
                                <li><a href="{{route(Session::get('identity').'.doctorschedule.index')}}">Doctors Appointment Schedule</a></li>
                                <li><a href="{{route(Session::get('identity').'.appointment.create')}}">Appointment Create</a></li>
                                <li><a href="{{route(Session::get('identity').'.appointment.index')}}">Appointment Index</a></li>
                            </ul>
                        </li>
                        <li class=""> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-chart-bubble"></i><span class="hide-menu">TEst</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{route(Session::get('identity').'.testcategory.index')}}">Test Category</a></li>
                                <li><a href="{{route(Session::get('identity').'.testname.index')}}">Test name</a></li>
                                <li><a href="{{route(Session::get('identity').'.testinvoice.create')}}"> Create Test invoce</a></li>
                                <li><a href="{{route(Session::get('identity').'.testinvoice.index')}}">Test invoce</a></li>
                               
                            </ul>
                        </li>
                        <li class="two-column"> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-book-open-variant"></i><span class="hide-menu">Medicine</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{route(Session::get('identity').'.medicinedetail')}}">Medicine details</a></li>
                                <li><a href="{{route(Session::get('identity').'.medicinegeneric.index')}}">Medicine Generic</a></li>
                                <li><a href="{{route(Session::get('identity').'.medicinebrand.index')}}">Medicine Brand</a></li>
                                <li><a href="{{route(Session::get('identity').'.medpurchase.index')}}">Medicine Purchase</a></li>
                                <li><a href="{{route(Session::get('identity').'.medsale.index')}}">Medicine sale</a></li>
                                
                               
                            </ul>
                        </li>
                        <li class="nav-small-cap">FORMS, TABLE &amp; WIDGETS</li>
                        <li class="two-column"> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-file"></i><span class="hide-menu">ADmitted PAtint</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{route(Session::get('identity').'.intestinvoice.create')}}"> Create Test invoce</a></li>
                                <li><a href="{{route(Session::get('identity').'.operation.create')}}">Operation</a></li>
                                <li><a href="{{route(Session::get('identity').'.inmedsale.create')}}">Sale MEdicine</a></li>
                                <li><a href="{{route(Session::get('identity').'.intestinvoice.index')}}">Test invoice List</a></li>
                                <li><a href="{{route(Session::get('identity').'.operation.index')}}">Operation list</a></li>
                                <li><a href="{{route(Session::get('identity').'.inmedsale.index')}}">Sale MEdicine list</a></li>
                            </ul>
                        </li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-table"></i><span class="hide-menu">Report</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{route(Session::get('identity').'.birthreg.create')}}">Birth report</a></li>
                                <li><a href="{{route(Session::get('identity').'.birthreg.index')}}">Birth report index</a></li>
                                <li><a href="{{route(Session::get('identity').'.deathreg.create')}}">Death report</a></li>
                                <li><a href="{{route(Session::get('identity').'.deathreg.index')}}">Death report index</a></li>
                            </ul>
                        </li>
                       
                        
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->