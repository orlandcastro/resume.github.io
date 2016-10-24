@extends('layouts.app')
@extends('layouts.header')

@section('title')
    Resume
@endsection

@section('body-class')

@endsection


@section('content')

<div class="container wrap">

<sidebar class="col-md-3 ">

              <div class="row">
                <div class="user">
                  <img src="images/user.png">     
                </div>  
                   <div class="name-panel">
                   <p class="name">
                   <?php if ($if_exist == 1) { ?>
                         <?php echo $userProfile->name; ?>   
                    <?php }else{ ?>
                        {{ $name }}
                    <?php } ?> 
                   </p>
                   <p class="subname">
                    <?php if ($if_exist == 1) { ?>
                         <?php echo $userProfile->position; ?>   
                    <?php }else{ ?>
                       Not Set!
                    <?php } ?>
                    </p>

                 </div>
              </div>

              <div class="row panel-status">
                        <div class="col-md-4 panel-status-1">
                            <img src="images/heart.png"> 
                            <p>2,718</p>
                        </div>
                        <div class="col-md-4 panel-status-2">
                            <img src="images/users.png">
                            <p>5,718</p>  
                        </div>
                        <div class="col-md-4 panel-status-3">
                            <img src="images/eye.png">
                            <p>6,718</p>  
                        </div>
              </div>
              <nav class="row sidebar-menus">
                  <ul>
                       <a href="{{ url('/home') }}"><li><span class="glyphicon glyphicon-inbox">&nbsp;</span>Dashboard</li></a>
                        <?php if ($if_exist_settings == 1) { ?>
                         <?php $URL = 'http://'.str_ireplace('http://','',$userSettings->permalink); ?>
                             <a href="{{$URL}}" target="_blank" ><li><span class="glyphicon glyphicon-list-alt">&nbsp;</span>My CV</li></a>
                        <?php } ?>   
                        <a href="{{ url('/profile') }}"><li><span class="glyphicon glyphicon-star">&nbsp;</span>Profile</li></a>
                        <a href="{{ url('/resume') }}"><li class="menuactive"><span class="glyphicon glyphicon-flag">&nbsp;</span>Resume</li></a>
                        <a href="{{ url('/portfolio') }}"><li><span class="glyphicon glyphicon-send">&nbsp;</span>Portfolio</li></a>
                        <a href="{{ url('/jobs') }}"><li><span class="glyphicon glyphicon-calendar">&nbsp;</span>Jobs</li><span class="jobbagde">6</span></a>    
                        <a href="{{ url('/setting') }}"><li><span class="glyphicon glyphicon-cog">&nbsp;</span>Settings</li></a>
                        <a href="{{ url('/logout') }}"><li><span class="glyphicon glyphicon-off">&nbsp;</span>Logout</li></a>
                  </ul>
              </nav>

</sidebar>
 <content class="col-md-9">
 
 <section class="col-md-12 content-header">

     <div class="col-md-10">
          <h3>Resume</h3>     
      </div>
                  
     <div  class="col-md-2">
        <a href="#"><img  src="images/menu.png" class="nav-menu"></a>
     </div>

     <nav class="content-nav-menu" role="tablist">
          <ul role="presentation">
            <li ><a href="#tab1" role="tab" data-toggle="tab">Experience</a></li>
            <li><a href="#tab2" role="tab" data-toggle="tab">Education</a></li>
            <li><a href="#tab3" role="tab" data-toggle="tab">Skill</a></li>
            <li class="active"><a href="#tab4" role="tab" data-toggle="tab">Certification</a></li>
          </ul>

     </nav>
                 
                   
                    

 </section>


<section  class="tab-content">

         <section role="tabpanel" class="tab-pane " id="tab1">

             @foreach ($userResume_Experience as $userExperience)
              
            <div class="col-md-12 content-panel-header">
              <div class="col-md-9">
                <h3>{{ $userExperience->job_title }}</h3>
              </div>
              <div class="col-md-2 content-panel-pc">
                  <span class="glyphicon glyphicon-pencil" data-toggle="modal" data-target="#exp_{{ $userExperience->id }}"></span>
                  <span class="glyphicon glyphicon-remove" data-toggle="modal" data-target="#delexp_{{ $userExperience->id }}"></span>          
                               
              </div>
         

            </div>
           
                  <div class="col-md-12  content-panel">
                             <div class="col-md-3">
                                <p>Company</p>
                             </div>
                             <div class="col-md-9">                   
                                  <p>{{ $userExperience->company_name }}</p>            
                             </div>
                             <div class="col-md-12 line"></div>                
                   </div>
                    <div class="col-md-12  content-panel">
                             <div class="col-md-3">
                                <p>Years</p>
                             </div>
                             <div class="col-md-9">                   
                                  <p>{{ $userExperience->start_date }} - {{ $userExperience->end_date }}</p>            
                             </div>
                             <div class="col-md-12 line"></div>                
                   </div>
                   <div class="col-md-12  content-panel">
                             <div class="col-md-3">
                                <p><b>Description</b></p>
                             </div>
                             <div class="col-md-9">                   
                                  <p>{{ $userExperience->description }}</p>            
                             </div>
                             <div class="col-md-12 line"></div>                
                   </div>

                   <!-- Modal for updateExperience -->
                                      <section>

                                                 <div class="modal fade" id="exp_{{ $userExperience->id }}" role="dialog">
                                                  <div class="modal-dialog">
                                                  
                                                    <!-- Modal content-->
                                                    <div class="modal-content">

                                      <form method="" action="resume/updateExperience/{{ $userExperience->id }}" class="theme1">

                                                          
                                                          <div class="col-md-12 content-panel-header">
                                                             <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                             <h3>Update Experience</h3>

                                                          </div>
                                                          <section>

                                                               <div class="form-group form-group">
                                                                <div class="col-md-offset-1 col-sm-10">
                                                                  <input class="form-control" name="update_job_title" type="text" value="{{ $userExperience->job_title }}">
                                                                </div>
                                                              </div>

                                                              <div class="form-group form-group">
                                                                <div class="col-md-offset-1 col-sm-10">
                                                                  <input class="form-control" name="update_company" type="text" value="{{ $userExperience->company_name }}">
                                                                </div>
                                                              </div>

                                                              <div class="form-group form-group">
                                                                <div class="col-md-offset-1 col-md-5">
                                                                  <input class="form-control" name="update_start_date" type="text" value="{{ $userExperience->start_date }}">
                                                                </div>
                                                                <div class="col-md-5">
                                                                  <input class="form-control" name="update_end_date" type="text" value="{{ $userExperience->end_date }}">
                                                                </div>
                                                              </div>

                                                             

                                                              <div class="form-group form-group">
                                                                <div class="col-md-offset-1 col-md-10">
                                                                  <textarea class="form-control" name="update_description" rows="5" cols="10">{{ $userExperience->description }}</textarea>
                                                                </div>
                                                               
                                                              </div>

                                                         </section>
                                                <div class="modal-footer">
                                                     <button type="submit" class="btn btn-default">Update</button>   
                                                </div>
                                      </form>
                                            </div>
                                            
                                          </div>
                                        </div>

                                      </section>
                  <!-- Modal for updateExperience -->

                  <!-- Modal for deleteExperience -->
                                      <section>

                                                 <div class="modal fade" id="delexp_{{ $userExperience->id }}" role="dialog">
                                                  <div class="modal-dialog">
                                                  
                                                    <!-- Modal content-->
                                                    <div class="modal-content">

                                                    <form method="" action="resume/deleteExperience/{{ $userExperience->id }}" class="theme1">
                                                               <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                <h4>Delete this Experience?</h4>
                                                              </div>
                                                                        
                                                              <div class="col-md-12 content-panel-header">
                                                                    <h3>Are you sure you want to delete the experience about   {{ $userExperience->job_title }} ?</h3>

                                                              </div>

                                                              <div class="modal-footer">
                                                                   <button type="submit" class="btn btn-default">Delete</button>   
                                                              </div>
                                                    </form>
                                                    </div>
                                            
                                          </div>
                                        </div>

                                      </section>
                  <!-- Modal for deleteExperience -->




            @endforeach

                  <section>
                              <div class="col-md-12 content-panel">
                                      <div class="content-experience">
                                          <center><button data-toggle="modal" data-target="#myModal1">Add Experience</button></center>
                                      </div>
                              </div>   
                  </section>



         </section>


         <section role="tabpanel" class="tab-pane" id="tab2">

          @foreach ($userResume_Education as $userEducation)

            <div class="col-md-12 content-panel-header">
              <div class="col-md-9">
                <h3>{{  $userEducation->course }}</h3>
              </div>
              <div class="col-md-2 content-panel-pc">
                  <span class="glyphicon glyphicon-pencil" data-toggle="modal" data-target="#edu_{{ $userEducation->id }}"></span>
                  <span class="glyphicon glyphicon-remove" data-toggle="modal" data-target="#deledu_{{ $userEducation->id }}"></span>             
              </div>
         

            </div>

                  <div class="col-md-12  content-panel">
                             <div class="col-md-3">
                                <p>University/College</p>
                             </div>
                             <div class="col-md-9">                   
                                  <p>{{  $userEducation->school }}</p>            
                             </div>
                             <div class="col-md-12 line"></div>                
                   </div>
                    <div class="col-md-12  content-panel">
                             <div class="col-md-3">
                                <p>Years</p>
                             </div>
                             <div class="col-md-9">                   
                                  <p>{{  $userEducation->date_start }} - {{  $userEducation->date_end }} </p>            
                             </div>
                             <div class="col-md-12 line"></div>                
                   </div>
                   <div class="col-md-12  content-panel">
                             <div class="col-md-3">
                                <p><b>Award</b></p>
                             </div>
                             <div class="col-md-9">                   
                                  <p>{{  $userEducation->awards_rec }}</p>            
                             </div>
                             <div class="col-md-12 line"></div>                
                   </div>


                    <!-- Modal for updateEducation -->
                                      <section>

                                                 <div class="modal fade" id="edu_{{ $userEducation->id }}" role="dialog">
                                                  <div class="modal-dialog">
                                                  
                                                    <!-- Modal content-->
                                                    <div class="modal-content">

                                      <form method="" action="resume/updateEducation/{{ $userEducation->id }}" class="theme1">

                                                          
                                                          <div class="col-md-12 content-panel-header">
                                                             <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                             <h3>Update Education</h3>

                                                          </div>
                                                          <section>

                                                               <div class="form-group form-group">
                                                                <div class="col-md-offset-1 col-sm-10">
                                                                  <input class="form-control" name="update_course" type="text" value="{{ $userEducation->course }}">
                                                                </div>
                                                              </div>

                                                              <div class="form-group form-group">
                                                                <div class="col-md-offset-1 col-sm-10">
                                                                  <input class="form-control" name="update_school" type="text" value="{{ $userEducation->school }}">
                                                                </div>
                                                              </div>

                                                              <div class="form-group form-group">
                                                                <div class="col-md-offset-1 col-md-5">
                                                                  <input class="form-control" name="update_start_date" type="text" value="{{ $userEducation->date_start }}">
                                                                </div>
                                                                <div class="col-md-5">
                                                                  <input class="form-control" name="update_end_date" type="text" value="{{ $userEducation->date_end }}">
                                                                </div>
                                                              </div>

                                                             

                                                              <div class="form-group form-group">
                                                                <div class="col-md-offset-1 col-md-10">
                                                                  <textarea class="form-control" name="update_award" rows="5" cols="10">{{ $userEducation->awards_rec }}</textarea>
                                                                </div>
                                                               
                                                              </div>

                                                         </section>
                                                <div class="modal-footer">
                                                     <button type="submit" class="btn btn-default">Update</button>   
                                                </div>
                                      </form>
                                            </div>
                                            
                                          </div>
                                        </div>

                                      </section>
                  <!-- Modal for updateEducation -->

                  <!-- Modal for deleteEducation -->
                                      <section>

                                                 <div class="modal fade" id="deledu_{{ $userEducation->id }}" role="dialog">
                                                  <div class="modal-dialog">
                                                  
                                                    <!-- Modal content-->
                                                    <div class="modal-content">

                                                    <form method="" action="resume/deleteEducation/{{ $userEducation->id }}" class="theme1">
                                                               <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                <h4>Delete Educational Background?</h4>
                                                              </div>
                                                                        
                                                              <div class="col-md-12 content-panel-header">
                                                                    <h3>Are you sure you want to delete your educational background about {{ $userEducation->course }}  in {{ $userEducation->school }} ?</h3>

                                                              </div>

                                                              <div class="modal-footer">
                                                                   <button type="submit" class="btn btn-default">Delete</button>   
                                                              </div>
                                                    </form>
                                                    </div>
                                            
                                          </div>
                                        </div>

                                      </section>
                  <!-- Modal for deleteEducation -->

          @endforeach 
               
                  <section>
                              <div class="col-md-12 content-panel">
                                      <div class="content-experience">
                                          <center><button data-toggle="modal" data-target="#myModal2">Add Education</button></center>
                                      </div>
                              </div>   
                  </section>


        </section>



         <section role="tabpanel" class="tab-pane" id="tab3">

          @foreach ($userResume_Skills as $userSkill)

            <div class="col-md-12 content-panel-header">
              <div class="col-md-4">
                <h3>{{ $userSkill->skillname }}</h3>
              </div>
              <div class="col-md-6">
                <input id="" value="{{ $userSkill->rate }}" type="number" class="rating" min=0 max=5 step=0.2 data-size="xs">
              </div>
              <div class="col-md-2 content-panel-pc">
                  <span class="glyphicon glyphicon-pencil" data-toggle="modal" data-target="#ski_{{ $userSkill->id }}"></span>
                  <span class="glyphicon glyphicon-remove" data-toggle="modal" data-target="#delski_{{ $userSkill->id }}"></span>                     
              </div>
            </div> 

                    <!-- Modal for updateSkills -->
                    <section>

                               <div class="modal fade" id="ski_{{ $userSkill->id }}" role="dialog">
                                <div class="modal-dialog">
                                
                                  <!-- Modal content-->
                                  <div class="modal-content">

                    <form method="" action="resume/updateSkill/{{ $userSkill->id}}" class="theme1">

                                        <div class="col-md-12 content-panel-header">
                                           <button type="button" class="close" data-dismiss="modal">&times;</button>
                                           <h3>Update Skill</h3>

                                        </div>

                                        <section>

                                             <div class="form-group form-group">
                                              <div class="col-md-offset-1 col-sm-10">
                                                <input class="form-control" name="skills" type="text" value="{{ $userSkill->skillname }}">
                                              </div>
                                            </div>

                                            <div class="form-group form-group">
                                              <div class="col-md-offset-1 col-sm-10">
                                                <input type="number" value="{{ $userSkill->rate }}" class="form-control" name="rate" min=1 max=5 placeholder="Rate">
                                              </div>
                                            </div>

                                            <div class="form-group form-group">
                                              <div class="col-md-offset-1 col-md-10">
                                                <textarea class="form-control" name="description" rows="5" cols="10">{{ $userSkill->description }}</textarea>
                                              </div>
                                             
                                            </div>

                                       </section>

                              <div class="modal-footer">

                                   <button type="submit" class="btn btn-default">Update</button>
                      

                              </div>
                    </form>
                          </div>
                          
                        </div>
                      </div>

                    </section>
                    <!-- Modal for updateSkills -->
                    <!-- Modal for deleteSkills -->
                                      <section>

                                                 <div class="modal fade" id="delski_{{ $userSkill->id }}" role="dialog">
                                                  <div class="modal-dialog">
                                                  
                                                    <!-- Modal content-->
                                                    <div class="modal-content">

                                                    <form method="" action="resume/deleteSkill/{{ $userSkill->id }}" class="theme1">
                                                               <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                <h4>Delete Skills</h4>
                                                              </div>
                                                                        
                                                              <div class="col-md-12 content-panel-header">
                                                                    <h3>Are you sure you want to delete your skills in {{ $userSkill->skillname }}?</h3>

                                                              </div>

                                                              <div class="modal-footer">
                                                                   <button type="submit" class="btn btn-default">Delete</button>   
                                                              </div>
                                                    </form>
                                                    </div>
                                            
                                          </div>
                                        </div>

                                      </section>
                  <!-- Modal for deleteSkills -->

          @endforeach 
               
                  <section>
                              <div class="col-md-12 content-panel">
                                      <div class="content-experience">
                                          <center><button data-toggle="modal" data-target="#myModal3">Add Skill</button></center>
                                      </div>
                              </div>   
                  </section>


        </section>



         <section role="tabpanel" class="tab-pane active" id="tab4">

          @foreach ($userResume_Certification as $userCertification)

            <div class="col-md-12 content-panel-header">
              <div class="col-md-9">
                <h3>{{  $userCertification->certificate_title }}</h3>
              </div>
              <div class="col-md-2 content-panel-pc">
         
                  <a href="#" data-toggle="modal" data-target="#cer_{{  $userCertification->id }}"><span class="glyphicon glyphicon-pencil"></span></a>
                  <a href="#"  data-toggle="modal" data-target="#delcer_{{  $userCertification->id }}"><span class="glyphicon glyphicon-remove"></span></a>             
              </div>
         

            </div>

                  <div class="col-md-12  content-panel">
                             <div class="col-md-3">
                                <p>Awarded By:</p>
                             </div>
                             <div class="col-md-9">                   
                                  <p>{{  $userCertification->certificate_company }}</p>            
                             </div>
                             <div class="col-md-12 line"></div>                
                   </div>
                    <div class="col-md-12  content-panel">
                             <div class="col-md-3">
                                <p>Years</p>
                             </div>
                             <div class="col-md-9">                   
                                  <p>{{  $userCertification->certificate_receive }} </p>            
                             </div>
                             <div class="col-md-12 line"></div>                
                   </div>

                  <!-- Modal for updateSkills -->
                    <section>

                               <div class="modal fade" id="cer_{{ $userCertification->id }}" role="dialog">
                                <div class="modal-dialog">
                                
                                  <!-- Modal content-->
                                  <div class="modal-content">

                    <form method="" action="resume/updateCertification/{{ $userCertification->id }}" class="theme1">

                                        <div class="col-md-12 content-panel-header">
                                           <button type="button" class="close" data-dismiss="modal">&times;</button>
                                           <h3>Update Certificate</h3>

                                        </div>

                                        <section>

                                             <div class="form-group form-group">
                                              <div class="col-md-offset-1 col-sm-10">
                                                <input class="form-control" name="title" type="text" value="{{ $userCertification->certificate_title }}">
                                              </div>
                                            </div>

                                             <div class="form-group form-group">
                                              <div class="col-md-offset-1 col-sm-10">
                                                <input class="form-control" name="company" type="text" value="{{ $userCertification->certificate_company }}">
                                              </div>
                                            </div>

                                             <div class="form-group form-group">
                                              <div class="col-md-offset-1 col-sm-10">
                                                <input class="form-control" name="title" type="text" value="{{ $userCertification->certificate_receive }}">
                                              </div>
                                            </div>

                                           

                                       </section>

                              <div class="modal-footer">

                                   <button type="submit" class="btn btn-default">Update</button>
                      

                              </div>
                    </form>
                          </div>
                          
                        </div>
                      </div>

                    </section>
                    <!-- Modal for updateSkills -->
                    <!-- Modal for deleteSkills -->
                                      <section>

                                                 <div class="modal fade" id="delcer_{{$userCertification->id}}" role="dialog">
                                                  <div class="modal-dialog">
                                                  
                                                    <!-- Modal content-->
                                                    <div class="modal-content">

                                                    <form method="" action="resume/deleteSkill/{{ $userSkill->id }}" class="theme1">
                                                               <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                <h4>Delete Skills</h4>
                                                              </div>
                                                                        
                                                              <div class="col-md-12 content-panel-header">
                                                                    <h3>Are you sure you want to delete your skills in {{ $userSkill->skillname }}?</h3>

                                                              </div>

                                                              <div class="modal-footer">
                                                                   <button type="submit" class="btn btn-default">Delete</button>   
                                                              </div>
                                                    </form>
                                                    </div>
                                            
                                          </div>
                                        </div>

                                      </section>
                  <!-- Modal for deleteSkills -->
 



          @endforeach 
               
                  <section>
                              <div class="col-md-12 content-panel">
                                      <div class="content-experience">
                                          <center><button data-toggle="modal" data-target="#myModal4">Add Education</button></center>
                                      </div>
                              </div>   
                  </section>


        </section>





</section>

<!-- Modal for Experience -->
<section>

           <div class="modal fade" id="myModal1" role="dialog">
            <div class="modal-dialog">
            
              <!-- Modal content-->
              <div class="modal-content">

<form method="" action="resume/addExperience" class="theme1">

                    
                    <div class="col-md-12 content-panel-header">
                       <button type="button" class="close" data-dismiss="modal">&times;</button>
                       <h3>Add Experience</h3>

                    </div>
                    <section>

                         <div class="form-group form-group">
                          <div class="col-md-offset-1 col-sm-10">
                            <input class="form-control" name="job_title" type="text" placeholder="Job Title">
                          </div>
                        </div>

                        <div class="form-group form-group">
                          <div class="col-md-offset-1 col-sm-10">
                            <input class="form-control" name="company" type="text" placeholder="Company Name">
                          </div>
                        </div>

                        <div class="form-group form-group">
                          <div class="col-md-offset-1 col-md-5">
                            <input class="form-control" name="start_date" type="text" placeholder="Start Date">
                          </div>
                          <div class="col-md-5">
                            <input class="form-control" name="end_date" type="text" placeholder="End Date">
                          </div>
                        </div>

                       

                        <div class="form-group form-group">
                          <div class="col-md-offset-1 col-md-10">
                            <textarea class="form-control" name="description" rows="5" cols="10">Description</textarea>
                          </div>
                         
                        </div>

                   </section>
          <div class="modal-footer">

               <button type="submit" class="btn btn-default">Save</button>
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

          </div>
</form>
      </div>
      
    </div>
  </div>

</section>
<!-- Modal for Experience -->




<!-- Modal for Experience -->
<section>

           <div class="modal fade" id="myModal2" role="dialog">
            <div class="modal-dialog">
            
              <!-- Modal content-->
              <div class="modal-content">

<form method="" action="resume/addEducation" class="theme1">

                    
                    <div class="col-md-12 content-panel-header">
                       <button type="button" class="close" data-dismiss="modal">&times;</button>
                       <h3>Add Education</h3>

                    </div>

                    <section>

                         <div class="form-group form-group">
                          <div class="col-md-offset-1 col-sm-10">
                            <input class="form-control" name="course" type="text" placeholder="Course">
                          </div>
                        </div>

                        <div class="form-group form-group">
                          <div class="col-md-offset-1 col-sm-10">
                            <input class="form-control" name="school" type="text" placeholder="School">
                          </div>
                        </div>

                        <div class="form-group form-group">
                          <div class="col-md-offset-1 col-md-5">
                            <input class="form-control" name="start_date" type="text" placeholder="Start Date">
                          </div>
                          <div class="col-md-5">
                            <input class="form-control" name="end_date" type="text" placeholder="End Date">
                          </div>
                        </div>

                       

                        <div class="form-group form-group">
                          <div class="col-md-offset-1 col-md-10">
                            <textarea class="form-control" name="award" rows="5" cols="10">Award</textarea>
                          </div>
                         
                        </div>

                   </section>

          <div class="modal-footer">

               <button type="submit" class="btn btn-default">Save</button>
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

          </div>
</form>
      </div>
      
    </div>
  </div>

</section>
<!-- Modal for Experience -->


<!-- Modal for Skills -->
<section>

           <div class="modal fade" id="myModal3" role="dialog">
            <div class="modal-dialog">
            
              <!-- Modal content-->
              <div class="modal-content">

<form method="" action="resume/addSkill" class="theme1">

                    
                    <div class="col-md-12 content-panel-header">
                       <button type="button" class="close" data-dismiss="modal">&times;</button>
                       <h3>Add Skill</h3>

                    </div>

                    <section>

                         <div class="form-group form-group">
                          <div class="col-md-offset-1 col-sm-10">
                            <input class="form-control" name="skills" type="text" placeholder="Skill">
                          </div>
                        </div>

                        <div class="form-group form-group">
                          <div class="col-md-offset-1 col-sm-10">
                            <input type="number" class="form-control" name="rate" min=1 max=5 placeholder="Rate">
                          </div>
                        </div>

                        <div class="form-group form-group">
                          <div class="col-md-offset-1 col-md-10">
                            <textarea class="form-control" name="description" rows="5" cols="10">Description</textarea>
                          </div>
                         
                        </div>

                   </section>

          <div class="modal-footer">

               <button type="submit" class="btn btn-default">Save</button>
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

          </div>
</form>
      </div>
      
    </div>
  </div>

</section>
<!-- Modal for Skills -->









<!-- Modal for Experience -->
<section>

           <div class="modal fade" id="myModal4" role="dialog">
            <div class="modal-dialog">
            
              <!-- Modal content-->
              <div class="modal-content">

<form method="" action="resume/addCertification" class="theme1">

                    
                    <div class="col-md-12 content-panel-header">
                       <button type="button" class="close" data-dismiss="modal">&times;</button>
                       <h3>Add Certification</h3>

                    </div>

                    <section>

                         <div class="form-group form-group">
                          <div class="col-md-offset-1 col-sm-10">
                            <input class="form-control" name="title" type="text" placeholder="Certificate Title">
                          </div>
                        </div>

                        <div class="form-group form-group">
                          <div class="col-md-offset-1 col-sm-10">
                            <input class="form-control" name="company" type="text" placeholder="Awarded At">
                          </div>
                        </div>

                        <div class="form-group form-group">
                         <div class="col-md-offset-1 col-sm-10">
                            <input class="form-control" name="receive" type="text" placeholder="Date Receive">
                          </div>
                          
                        </div>
                       
                   </section>

          <div class="modal-footer">

               <button type="submit" class="btn btn-default">Save</button>
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

          </div>
</form>
      </div>
      
    </div>
  </div>

</section>
<!-- Modal for Experience -->









</content>
              
</div>
@endsection
