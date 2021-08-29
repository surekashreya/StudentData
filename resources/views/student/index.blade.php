<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight bg-blue">
            {{ __('Details') }}
        </h2>
    </x-slot>
     <head><meta name="csrf-token" content="{{ csrf_token() }}"></head>          
    <!-- Modal -->
  <div class="modal fade" id="AddStudentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Student</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" >

         <ul id="saveform_errlist"></ul>
        <div class="form-group mb-3">
        <labeL for=""> Name</label>
        <input type="text" class="name form-control">
        </div>
        <div class="form-group mb-3">
        <labeL for="">Email</label>
        <input type="text" class="email  form-control">
        </div>
        <div class="form-group mb-3">
        <labeL for="">Phone</label>
        <input type="text" class="phone form-control">
        </div>
        <div class="form-group mb-3">
        <labeL for="">Course</label>
        <input type="text" class="course form-control">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary add_student" >Save </button>
      </div>
    </div>
  </div>
</div>
 <!-- EditModal -->
 <div class="modal fade" id="EditStudentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit & Update </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" >

         <ul id="updateform_errlist"></ul>
         <input type="hidden" id="edit_student_id">
        <div class="form-group mb-3">
        <labeL for=""> Name</label>
        <input type="text" id="edit_name" class="name form-control">
        </div>
        <div class="form-group mb-3">
        <labeL for="">Email</label>
        <input type="text" id="edit_email" class="email  form-control">
        </div>
        <div class="form-group mb-3">
        <labeL for="">Phone</label>
        <input type="text" id="edit_phone" class="phone form-control">
        </div>
        <div class="form-group mb-3">
        <labeL for="">Course</label>
        <input type="text" id="edit_course" class="course form-control">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary update_student"  >Update</button>
      </div>
    </div>
  </div>
</div>
 <!-- End EditModal -->
 <!-- delete modal-->
 <div class="modal fade" id="DeleteStudentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" >
         <input type="hidden" id="delete_student_id">
          <h4>The Data will be deleted</h4>
        </div>
    
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary delete_student_btn"  >Yes delete</button>
      </div>
    </div>
  </div>
</div>
 <!-- end delete -->

<div class="container py-5">
    <div class="row">
       <div class="col-md-12">
           <div id="success_message"></div>
           <div class="card">
               <div class="card-header">
                   <h4>Students Data &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                   <a href="#" data-bs-toggle="modal" data-bs-target="#AddStudentModal" class="btn btn-primary float -end btn-sm">Add</a>
                   </h4>
                   </div>
                <div class="card-body">
                  <table class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th>ID</th>
                              <th>Name</th>
                              <th>Email</th>
                              <th>Phone</th>
                              <th>Course</th>
                              <th>Edit</th>
                              <th>Delete</th>
                           </tr>
                        </thead>
                        <tbody>
                           
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
<script>
           
    $(document).ready(function(){

        fetchstudent();

        function fetchstudent()
        {
            $.ajax({
              type:"GET",
              url:"/fetch-students",
              dataType:"json",
              success: function(response){
                 // console.log(response.students);
                 $('tbody').html("");
                 $.each(response.students, function (key, item ){
                     $('tbody').append('<tr>\
                                <td>'+item.id+'</td>\
                                <td>'+item.name+'</td>\
                                <td>'+item.email+'</td>\
                                <td>'+item.phone+'</td>\
                                <td>'+item.course+'</td>\
                                <td><button type="button" value="'+item.id+'" class="edit_student btn btn-primary btn-sm">Edit</button></td>\
                                <td><button type="button" value="'+item.id+'" class="delete_student btn btn-primary btn-sm" style="background-color:red; border-color:red">Delete</button></td>\
                          </tr>');
                 });
               }
            });

        }
        $(document).on('click', '.delete_student',function(e){
           e.preventDefault();
           e.stopImmediatePropagation();
           var stud_id = $(this).val();
          $('#delete_student_id').val(stud_id);
          $('#DeleteStudentModal').modal('show');
        });
        $(document).on('click','.delete_student_btn',function(e){
          e.preventDefault();
          e.stopImmediatePropagation();
          var stud_id = $('#delete_student_id').val();
          
          $.ajaxSetup({
                headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             }
          });

          $.ajax({
              type: "DELETE",
              url:"/delete-student/"+stud_id,
              success: function(response){
                  //console.log(response);
          
                  $('#success_message').addClass('alert alert-success');
                  $('#success_message').text(response.message);
                  $('#DeleteStudentModal').modal('hide');
                  fetchstudent();
              }
          });
        });

        $(document).on('click', '.edit_student',function(e){
           e.preventDefault();
           var stud_id = $(this).val();
           //console.log(stud_id);
           $('#EditStudentModal').modal('show');
           $.ajax({
              type:"GET",
              url:"/edit-student/"+stud_id,
              success: function(response){
                 // console.log(response);
                 if(response.status==404){
                    $('#success_message').html("");
                    $('#success_message').addClass('alert alert-danger');
                     $('#success_message').text(response.message);

                    }
                    else{
                        $("#edit_name").val(response.student.name);
                        $("#edit_email").val(response.student.email);
                        $("#edit_phone").val(response.student.phone);
                        $("#edit_course").val(response.student.course);
                        $("#edit_student_id").val(stud_id);
                    }
                }
           });
        });
        $(document).on('click', '.update_student',function(e){
            e.preventDefault();
            var stud_id = $('#edit_student_id').val();
            var data = {
                'name':$('#edit_name').val(),
                'email':$('#edit_email').val(),
                'phone':$('#edit_phone').val(),
                'course':$('#edit_course').val(),
            }
                //console.log("hello");
            $.ajaxSetup({
                headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             }
           });
            $.ajax({
              type:"PUT",
              url:"/update-student/"+stud_id,
              data: data,
              dataType: "json",
              success: function(response){
                if(response.status== 400)
                {
                    $('#updateform_errlist').html("");
                    $('#updateform_errlist').addClass('alert alert-danger');
                    $.each(response.errors,function (key,err_values) {
                        $('#updateform_errlist').append('<li>'+err_values+'</li>');
                    });
                    $('.update_student').text("Update");
                }
                else if(response.status== 404){
                  $('#updateform_errlist').html("");
                    $('#success_message').addClass('alert alert-success');
                    $('#success_message').text(response.message);
                    $('.update_student').text("Update");
                }
                else{
                    $('#updateform_errlist').html("");
                    $('#success_message').html("");
                    $('#success_message').addClass('alert alert-success');
                    $('#success_message').text(response.message);

                    $('#EditStudentModal').modal('hide');
                    $('.update_student').text("Update");
                     fetchstudent();
                    } 
               

                }
            });
        });
      
        $(document).on('click', '.add_student', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();

          

           var data= {
               'name': $('.name').val(),
               'email': $('.email').val(),
               'phone': $('.phone').val(),
               'course': $('.course').val(),
           }

          // console.log(hello);  

          $.ajaxSetup({
                headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             }
           });

          $.ajax({
              type:"POST",
              url:"/students",
              data: data,
              dataType:"json",
              success: function(response){
               // console.log(response.errors.name);  
                if(response.status== 400)
                {

                    $('#saveform_errlist').html("");
                    $('#saveform_errlist').addClass('alert alert-danger');
                    $.each(response.errors,function (key,err_values) {
                        $('#saveform_errlist').append('<li>'+err_values+'</li>');
                    });
                     $('.add_student').text('Save');
                } 
                else{
                    $('#saveform_errlist').html("");
                    $('#success_message').addClass('alert alert-success')
                    $('#success_message').text(response.message)
                    $('#AddStudentModal').find('input').val("");
                    $('#AddStudentModal').modal('hide');
                    fetchstudent();
                   
                }
              }
          });

        

        });


});

</script>
</x-app-layout>


