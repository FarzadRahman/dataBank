<form method="post" action="{{route('user.update',['id'=>$user->userId])}}">
    {{csrf_field()}}
    <div class="row">
        <div class="form-group col-md-6">
            <label>Name</label>
            <input type="text" name="name" placeholder="Name" class="form-control" value="{{$user->name}}">
        </div>
        <div class="form-group col-md-6">
            <label>User Name</label>
            <input type="text" name="userName" placeholder="user name" class="form-control" value="{{$user->userName}}">
        </div>
        <div class="form-group col-md-6">
            <label>Email</label>
            <input type="email" name="email" placeholder="Email" class="form-control" value="{{$user->email}}">
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
            <input type="password" id="password" name="password" placeholder="password" class="form-control" required>
        </div>
        <div class="form-group col-md-6">
            <label>Confirm Password</label>
            <input type="password" id="confirm_password" name="confirm passwor" placeholder="confirm passwor" class="form-control" required>
        </div>


        <div class="form-group col-md-12">
            <button class="btn btn-success pull-right">Update</button>
        </div>

    </div>
</form>
