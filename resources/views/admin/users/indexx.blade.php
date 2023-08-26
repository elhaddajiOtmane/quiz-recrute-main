@extends('layouts.admin', [
  'page_header' => 'Students',
  'dash' => '',
  'quiz' => '',
  'users' => 'active',
  'questions' => '',
  'top_re' => '',
  'all_re' => '',
  'sett' => ''
])
@php
$cand = ''; 
@endphp
@section('content')
@include('message')
  @if ($auth->role == 'A')
    <div class="margin-bottom">
      <button type="button" class="btn btn-wave" data-toggle="modal" data-target="#createModal">Add Student</button>
      <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#AllDeleteModal">Delete All Students</button>
      <button type="button" class="btn btn-primary" data-toggle="modal" onclick="QuizReminder()">Send Eamil</button>
    </div>
    <!-- All Delete Button -->
    <div id="AllDeleteModal" class="delete-modal modal fade" role="dialog">
      <!-- All Delete Modal -->
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <div class="delete-icon"></div>
          </div>
          <div class="modal-body text-center">
            <h4 class="modal-heading">Are You Sure ?</h4>
            <p>Do you really want to delete "All these records"? This process cannot be undone.</p>
          </div>
          <div class="modal-footer">
            {!! Form::open(['method' => 'POST', 'action' => 'DestroyAllController@AllUsersDestroy']) !!}
                {!! Form::reset("No", ['class' => 'btn btn-gray', 'data-dismiss' => 'modal']) !!}
                {!! Form::submit("Yes", ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
          </div>
        </div>
      </div>
    </div>
    <!-- Create Modal -->
    <div id="createModal" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Add Student</h4>
              </div>
              {!! Form::open(['method' => 'POST', 'action' => 'UsersController@store']) !!}
              <div class="modal-body">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                          {!! Form::label('first_name', 'First Name') !!}
                          <span class="required">*</span>
                          {!! Form::text('first_name', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Enter First Name']) !!}
                          <small class="text-danger">{{ $errors->first('first_name') }}</small>
                      </div>
                  </div>
                  
                      <div class="col-md-6">
                          <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                              {!! Form::label('last_name', 'Last Name') !!}
                              <span class="required">*</span>
                              {!! Form::text('last_name', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Enter Last Name']) !!}
                              <small class="text-danger">{{ $errors->first('last_name') }}</small>
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                              {!! Form::label('email', 'Email address') !!}
                              <span class="required">*</span>
                              {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'eg: info@example.com', 'required' => 'required']) !!}
                              <small class="text-danger">{{ $errors->first('email') }}</small>
                          </div>  
                     </div>

<div class="col-md-6">
  <div class="form-group{{ $errors->has('mobile') ? ' has-error' : '' }}">
      {!! Form::label('mobile', 'Mobile No.') !!}
      <span class="required">*</span>
      {!! Form::text('mobile', null, ['class' => 'form-control', 'placeholder' => 'eg: +212-123-456-7890', 'required' => 'required']) !!}
      <small class="text-danger">{{ $errors->first('mobile') }}</small>
  </div>
</div>

  <div class="col-md-6">
  <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
      {!! Form::label('city', 'City') !!}
      {!! Form::text('city', null, ['class' => 'form-control', 'placeholder' => 'Enter Your City']) !!}
      <small class="text-danger">{{ $errors->first('city') }}</small>
  </div>
</div>
  
<div class="col-md-6">
  <div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}">
    {!! Form::label('role', 'User Role') !!}
    <span class="required">*</span>
    {!! Form::select('role', ['S' => 'Student', 'A'=>'Administrator','C' => 'Candidate'], null, ['class' => 'form-control select2', 'required' => 'required']) !!}
    <small class="text-danger">{{ $errors->first('role') }}</small>
  </div>
</div>
<div class="col-md-6">
  <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
      {!! Form::label('address', 'Address') !!}
      {!! Form::textarea('address', null, ['class' => 'form-control', 'rows'=>'5', 'placeholder' => 'Enter Your Address']) !!}
      <small class="text-danger">{{ $errors->first('address') }}</small>
  </div></div>
  <div class="col-md-6">
  <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
    {!! Form::label('password', 'Password') !!}
    <span class="required">*</span>
    {!! Form::password('password', ['class' => 'form-control', 'placeholder'=>'Enter Your Password', 'required' => 'required']) !!}
    <small class="text-danger">{{ $errors->first('password') }}</small>
  </div></div>

<!-- ... (remaining code) ... -->

                  </div>
              </div>
              <div class="modal-footer">
                  <div class="btn-group pull-right">
                      {!! Form::reset("Reset", ['class' => 'btn btn-default']) !!}
                      {!! Form::submit("Add", ['class' => 'btn btn-wave']) !!}
                  </div>
              </div>
              {!! Form::close() !!}
          </div>
      </div>
  </div>
  
    <div class="content-block box">
      <div class="box-body table-responsive">
        <table id="example1" class="table table-striped">
          <thead>
            <tr>
              <th>#</th>
              <th><input type="checkbox" id="select-all"></th>
              <th>First Name</th>
              <th>Last Name</th>
              <th>Email</th>
              <th>Mobile No.</th>
              <th>City</th>
              <th>Address</th>
              <th>User Role</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @if ($users)
              @php($n = 1)
              @foreach ($users as $key => $user)
                <tr>
                  <td>
                    {{$n}}
                    @php($n++)
                  </td>
                  <td><input type="checkbox" class="checkbox" data-id="{{$user->id}}"></td>
                  <td>{{$user->first_name}}</td>
                  <td>{{$user->last_name}}</td>
                  <td>{{$user->email}}</td>
                  <td>{{$user->mobile}}</td>
                  <td>{{$user->city}}</td>
                  <td>{{$user->address}}</td>
                  <td>{{$user->role == 'S' ? 'Student' : '-'}}</td>
                  <td>
                    {{-- send eamil --}}
                    <!-- Send Email Button -->
                    <a type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#{{$user->id}}sendEmailModal"><i class="fa fa-envelope"></i> Send Email</a>
                    <div id="{{$user->id}}sendEmailModal" class="send-email-modal modal fade" role="dialog">
                      <div class="modal-dialog modal-sm">
                          <div class="modal-content">
                              <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  <div class="send-email-icon"></div>
                              </div>
                              <div class="modal-body text-center">
                                  <h4 class="modal-heading">Send Email</h4>
                                  <!-- Email Form -->
                                  <form action="/send_email" method="post">
                                      @csrf
                                      <div class="form-group">
                                          <label for="recipient">Recipient Email:</label>
                                          <input type="email" class="form-control" id="recipient" name="recipient" required>
                                      </div>
                                      <div class="form-group">
                                          <label for="subject">Subject:</label>
                                          <input type="text" class="form-control" id="subject" name="subject" required>
                                      </div>
                                      <div class="form-group">
                                          <label for="message">Message:</label>
                                          <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
                                      </div>
                                      <div class="modal-footer">
                                          <button type="button" class="btn btn-gray" data-dismiss="modal">Cancel</button>
                                          <button type="submit" class="btn btn-primary">Send</button>
                                      </div>
                                  </form>
                              </div>
                          </div>
                      </div>
                  </div>
                  
                    {{-- end send button --}}
                    <!-- Edit Button -->
                    <a type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#{{$user->id}}EditModal"><i class="fa fa-edit"></i> Edit</a>
                    {{-- end edit button --}}

                    <!-- Delete Button -->
                    <a type="button" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#{{$user->id}}deleteModal"><i class="fa fa-close"></i> Delete</a>
                    <div id="{{$user->id}}deleteModal" class="delete-modal modal fade" role="dialog">
                      <!-- Delete Modal -->
                      <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <div class="delete-icon"></div>
                          </div>
                          <div class="modal-body text-center">
                            <h4 class="modal-heading">Are You Sure ?</h4>
                            <p>Do you really want to delete these records? This process cannot be undone.</p>
                          </div>
                          <div class="modal-footer">
                            {!! Form::open(['method' => 'DELETE', 'action' => ['UsersController@destroy', $user->id]]) !!}
                                {!! Form::reset("No", ['class' => 'btn btn-gray', 'data-dismiss' => 'modal']) !!}
                                {!! Form::submit("Yes", ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}
                          </div>
                        </div>
                      </div>
                    </div>
                  </td>
                </tr>
                <!-- edit model -->
                <div id="{{$user->id}}EditModal" class="modal fade" role="dialog">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Edit Student </h4>
                      </div>
                      {!! Form::model($user, ['method' => 'PATCH', 'action' => ['UsersController@update', $user->id]]) !!}
                        <div class="modal-body">
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                {!! Form::label('name', 'Name') !!}
                                <span class="required">*</span>
                                {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Enter your name']) !!}
                                <small class="text-danger">{{ $errors->first('name') }}</small>
                              </div>
                              <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                {!! Form::label('email', 'Email address') !!}
                                <span class="required">*</span>
                                {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'eg: info@example.com', 'required' => 'required']) !!}
                                <small class="text-danger">{{ $errors->first('email') }}</small>
                              </div>
                              {{-- <label for="">Change Password: </label>
                              <input type="checkbox" name="changepass"> --}}
                              {{-- <input type="radio" value="1" name="changepass" id="ch1">&nbsp;Yes
                               <input type="radio" value="0" name="changepass" checked id="ch2">&nbsp;No --}}
                               <br>
                              <div id="pass" class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                {!! Form::label('password', 'Password') !!}
                                <span class="required">*</span>
                               
                                <input class="form-control" type="password" value="" placeholder="Enter new password" name="password">
                                <small class="text-danger">{{ $errors->first('password') }}</small>
                              </div>

                              <div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}">
                                  {!! Form::label('role', 'User Role') !!}
                                  
                                  {!! Form::select('role', ['S' => 'Student', 'A'=>'Administrator'], null, ['class' => 'form-control select2', 'required' => 'required']) !!}
                                  <small class="text-danger">{{ $errors->first('role') }}</small>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group{{ $errors->has('mobile') ? ' has-error' : '' }}">
                                {!! Form::label('mobile', 'Mobile No.') !!}
                                
                                {!! Form::text('mobile', null, ['class' => 'form-control', 'placeholder' => 'eg: +212-123-456-7890']) !!}
                                <small class="text-danger">{{ $errors->first('mobile') }}</small>
                              </div>
                              <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                                {!! Form::label('city', 'Enter City') !!}
                                {!! Form::text('city', null, ['class' => 'form-control', 'placeholder'=>'Enter Your City']) !!}
                                <small class="text-danger">{{ $errors->first('city') }}</small>
                              </div>
                              <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                                {!! Form::label('address', 'Address') !!}
                                {!! Form::textarea('address', null, ['class' => 'form-control', 'rows'=>'5', 'placeholder' => 'Enter Your Address']) !!}
                                <small class="text-danger">{{ $errors->first('address') }}</small>
                              </div>
                              
                            </div>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <div class="btn-group pull-right">
                            {!! Form::submit("Update", ['class' => 'btn btn-wave']) !!}
                          </div>
                        </div>
                      {!! Form::close() !!}
                    </div>
                  </div>
                </div>
              @endforeach
            @endif
          </tbody>
        </table>
      </div>
    </div>
  @endif
@endsection
@section('scripts')

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<script>
  $('#ch1').click(function(){
    $('#pass').show();
  });

  $('#ch2').click(function(){
    $('#pass').hide();
  });

   // Script for handel selection all item in table
    $('#select-all').click(function(event) {   
      if(this.checked) {
          // Iterate each checkbox
          $(':checkbox').each(function() {
              this.checked = true;                        
          });
      } else {
        $(':checkbox').each(function() {
              this.checked = false;                        
          });
      }
    });

    //  QuizReminder() to send emails of checked users to routes email user controller function quizreminder
    function QuizReminder() {
  var users = [];
  $('.checkbox:checked').each(function () {
    // Instead of pushing the data-id attribute, push the email address
    var email = $(this).closest('tr').find('td:nth-child(5)').text();
    users.push(email);
  -+
  });

  console.log(users);

  if (users.length > 0) {
    
    $.ajax({
  url: "http://127.0.0.1:8000/api/email",
  method: "POST",
  data: { emails: JSON.stringify(users) },
})
.done(function (data) {
  if (data == 'success') {
    toastr.success("Emails sent successfully", "Success");
  } else {
    toastr.error("Emails not sent", "Error");
  }
})
.fail(function (jqXHR, textStatus, errorThrown) {
  console.error("Ajax request failed: " + textStatus, errorThrown);
});
  } else {
    toastr.error("Please select at least one user", "Error");
  }
}

    

</script>


@endsection

