@extends('layouts.admin', [
  'page_header' => 'Candidates',
  'dash' => '',
  'quiz' => '',
  'users' => '',
  'cand' => 'active',
  'questions' => '',
  'top_re' => '',
  'all_re' => '',
  'sett' => ''
])
@php
$cand = 'active'; 
@endphp
@section('content')
@include('message')
  @if ($auth->role == 'A')
    <div class="margin-bottom">
      <button type="button" class="btn btn-wave" data-toggle="modal" data-target="#createModal">Add Candidates</button>
      <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#AllDeleteModal">Delete All Candidates</button>
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#TurnToStudentModal">Turn to Student</button>
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
            
              {!! Form::open(['method' => 'POST', 'route' => 'all.candidates.destroy']) !!}
                  {!! Form::reset("No", ['class' => 'btn btn-gray', 'data-dismiss' => 'modal']) !!}
                  {!! Form::submit("Yes", ['class' => 'btn btn-danger']) !!}
              {!! Form::close() !!}
         
          
          </div>
        </div>
      </div>
    </div>
    <!-- Create  Candidate -->
    <div id="createModal" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Add Candidate</h4>
          </div>
          {!! Form::open(['method' => 'POST', 'action' => 'UsersController@store']) !!}
            <div class="modal-body">
              <div class="row">
                
                {{-- add first name --}}

                <div class="col-md-6">
                  <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                    {!! Form::label('first_name', 'First Name') !!}
                    <span class="required">*</span>
                    {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Enter Your First Name']) !!}
                    <small class="text-danger">{{ $errors->first('name') }}</small>
                  </div>
                  <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    {!! Form::label('email', 'Email address') !!}
                    <span class="required">*</span>
                    {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'eg: info@examlpe.com', 'required' => 'required']) !!}
                    <small class="text-danger">{{ $errors->first('email') }}</small>
                  </div>
                  <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    {!! Form::label('password', 'Password') !!}
                    <span class="required">*</span>
                    {!! Form::password('password', ['class' => 'form-control', 'placeholder'=>'Enter Your Password', 'required' => 'required']) !!}
                    <small class="text-danger">{{ $errors->first('password') }}</small>
                  </div>
                  <div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}">
                      {!! Form::label('role', 'User Role') !!}
                      <span class="required">*</span>
                      {!! Form::select('role', ['C' => 'Candidate'], null, ['class' => 'form-control select2', 'required' => 'required']) !!}
                      <small class="text-danger">{{ $errors->first('role') }}</small>
                  </div>
                </div>
                {{-- add last name --}}

                <div class="col-md-6">
                  <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                    {!! Form::label('last_name', 'Last Name') !!}
                    <span class="required">*</span>
                    {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Enter Your Last Name']) !!}
                    <small class="text-danger">{{ $errors->first('name') }}</small>
                  </div>
                  <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    {!! Form::label('email', 'Email address') !!}
                    <span class="required">*</span>
                    {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'eg: info@examlpe.com', 'required' => 'required']) !!}
                    <small class="text-danger">{{ $errors->first('email') }}</small>
                  </div>
                  <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    {!! Form::label('password', 'Password') !!}
                    <span class="required">*</span>
                    {!! Form::password('password', ['class' => 'form-control', 'placeholder'=>'Enter Your Password', 'required' => 'required']) !!}
                    <small class="text-danger">{{ $errors->first('password') }}</small>
                  </div>
                  <div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}">
                      {!! Form::label('role', 'User Role') !!}
                      <span class="required">*</span>
                      {!! Form::select('role', ['C' => 'Candidate'], null, ['class' => 'form-control select2', 'required' => 'required']) !!}
                      <small class="text-danger">{{ $errors->first('role') }}</small>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group{{ $errors->has('mobile') ? ' has-error' : '' }}">
                    {!! Form::label('mobile', 'Mobile No.') !!}
                    <span class="required">*</span>
                    {!! Form::text('mobile', null, ['class' => 'form-control', 'placeholder' => 'eg: +212-123-456-7890', 'required' => 'required']) !!}
                    <small class="text-danger">{{ $errors->first('mobile') }}</small>
                  </div>
                  <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                    {!! Form::label('city', 'Enter City') !!}
                    {!! Form::text('city', null, ['class' => 'form-control', 'placeholder'=>'Enter Your City']) !!}
                    <small class="text-danger">{{ $errors->first('city') }}</small>
                  </div>
                  <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                    {!! Form::label('address', 'Address') !!}
                    {!! Form::textarea('address', null, ['class' => 'form-control', 'rows'=>'5', 'placeholder' => 'Enter Your address']) !!}
                    <small class="text-danger">{{ $errors->first('address') }}</small>
                  </div>
                </div>
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
              <th>First name</th>
              <th>last name</th>
              <th>date de naissance</th>
              <th>poste que vous souhaitez</th>
              <th>CV</th>
              <th>ville de residence</th>
              <th>lettre de motivation</th>
              <th>commentaires</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @if ($candidates)
              @php($n = 1)
              @foreach ($candidates as $key => $candidate)
                <tr>
                  <td>
                    {{$n}}
                    @php($n++)
                  </td>
                  <td><input type="checkbox" class="candidate-checkbox" value="{{$candidate->id}}"></td>
                  <td>{{$candidate->first_name}}</td>
                  <td>{{$candidate->last_name}}</td>
                  <td>{{$candidate->date_of_birth}}</td>
                  <td>{{$candidate->desired_position}}</td>
                  <td>{{$candidate->CV}}</td>
                  <td>{{$candidate->city}}</td>
                  <td>{{$candidate->cover_letter}}</td>
                  <td>{{$candidate->comments}}</td>
                  <td>
                    <!-- Edit Button -->
                    <a type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#{{$candidate->id}}EditModal"><i class="fa fa-edit"></i> Edit</a>
                    <!-- Delete Button -->
                    <a type="button" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#{{$candidate->id}}deleteModal"><i class="fa fa-close"></i> Delete</a>
                    <div id="{{$candidate->id}}deleteModal" class="delete-modal modal fade" role="dialog">
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
                            {!! Form::open(['method' => 'DELETE', 'action' => ['UsersController@destroy', $candidate->id]]) !!}
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
                <div id="{{$candidate->id}}EditModal" class="modal fade" role="dialog">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Edit Student </h4>
                      </div>
                      {!! Form::model($candidate, ['method' => 'PATCH', 'action' => ['UsersController@update', $candidate->id]]) !!}
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
                                  
                                  {!! Form::select('role', ['C' => 'Candidate'], null, ['class' => 'form-control select2', 'required' => 'required']) !!}
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


<script>
  $('#ch1').click(function(){
    $('#pass').show();
  });

  $('#ch2').click(function(){
    $('#pass').hide();
  });
</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        // Handle "Select All" checkbox
        $('#select-all').change(function () {
            if ($(this).is(':checked')) {
                $('.candidate-checkbox').prop('checked', true);
            } else {
                $('.candidate-checkbox').prop('checked', false);
            }
        });

        // Handle individual candidate checkboxes
        $('.candidate-checkbox').change(function () {
            if ($('.candidate-checkbox:checked').length === $('.candidate-checkbox').length) {
                $('#select-all').prop('checked', true);
            } else {
                $('#select-all').prop('checked', false);
            }
        });
    });
</script>


@endsection
