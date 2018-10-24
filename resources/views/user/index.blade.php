@extends('main')
@section('content')

    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Add User</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form method="post" action="{{route('user.insert')}}">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Name</label>
                                <input type="text" name="name" placeholder="Name" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label>User Name</label>
                                <input type="text" name="userName" placeholder="user name" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Email</label>
                                <input type="email" name="email" placeholder="Email" class="form-control">
                            </div>

                            <div class="form-group col-md-6">
                                <label>User Type</label>
                                <select class="form-control" name="usertypeid">
                                    <option>Selete User Type</option>
                                    @foreach($usertype as $usertypes)
                                        <option value="{{$usertypes->userTypeId}}">{{$usertypes->userTypeName}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Passowrd</label>
                                <input type="password" id="password" name="password" placeholder="password" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Confirm Password</label>
                                <input type="password" id="confirm_password" name="confirm passwor" placeholder="confirm passwor" class="form-control">
                            </div>


                            <div class="form-group col-md-12">
                                <button class="btn btn-success pull-right">Insert</button>
                            </div>

                        </div>
                    </form>

                </div>

                <!-- Modal footer -->
                <div class="modal-footer">

                </div>

            </div>
        </div>
    </div>


    <!-- The Edit Modal -->
    <div class="modal" id="editModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Update Party</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body" id="editModalBody">

                </div>

                <!-- Modal footer -->
                <div class="modal-footer">

                </div>

            </div>
        </div>
    </div>

    <div class="container">
        <div class="card">
            <div class="card-header">
                <h4 align="center">user List</h4>
                <button type="button" class="btn btn-primary btn-sm pull-right" data-toggle="modal" data-target="#myModal">
                    <i class="fa fa-plus"></i>
                </button>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                    <th> Name</th>
                    <th>Email</th>
                    <th>Action</th>
                    </thead>
                    <tbody>
                    @foreach($user as $user)
                    <tr>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>
                            <button class="btn btn-info btn-sm" data-panel-id="{{$user->userId}}" onclick="edituser(this)">edit</button>

                        </td>
                    </tr>
                    @endforeach
                    {{--<tr>--}}
                        {{--<td>BNP</td>--}}
                        {{--<td>--}}
                            {{--<button class="btn btn-info btn-sm">edit</button>--}}
                            {{--<a href="{{route('user.level')}}" class="btn btn-success btn-sm">view</a>--}}
                        {{--</td>--}}
                    {{--</tr>--}}
                    {{--<tr>--}}
                        {{--<td>BJP</td>--}}
                        {{--<td>--}}
                            {{--<button class="btn btn-info btn-sm">edit</button>--}}
                            {{--<a href="{{route('user.level')}}" class="btn btn-success btn-sm">view</a>--}}
                        {{--</td>--}}
                    {{--</tr>--}}
                    {{--<tr>--}}
                        {{--<td>Jamati Islam</td>--}}
                        {{--<td>--}}
                            {{--<button class="btn btn-info btn-sm">edit</button>--}}
                            {{--<a href="{{route('user.level')}}" class="btn btn-success btn-sm">view</a>--}}
                        {{--</td>--}}
                    {{--</tr>--}}
                    </tbody>
                </table>

            </div>
        </div>
    </div>



@endsection
@section('foot-js')
    <script>
        function edituser(x) {
            var id=$(x).data('panel-id');

            $.ajax({
                type: 'POST',
                url: "{!! route('user.edit') !!}",
                cache: false,
                data: {_token: "{{csrf_token()}}",'id': id},
                success: function (data) {
                    $("#editModalBody").html(data);
                    $('#editModal').modal();
                    // console.log(data);
                }
            });
        }



        var password = document.getElementById("password")
            , confirm_password = document.getElementById("confirm_password");

        function validatePassword(){
            if(password.value != confirm_password.value) {
                confirm_password.setCustomValidity("Passwords Don't Match");
            } else {
                confirm_password.setCustomValidity('');
            }
        }

        password.onchange = validatePassword;
        confirm_password.onkeyup = validatePassword;
    </script>
@endsection