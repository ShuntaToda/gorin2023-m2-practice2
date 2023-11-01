
@include("header", ["title" => "edit user"])
<div class="container mt-5">
  <div class="border p-3 rounded c-login-form m-auto">
    <h2>Edit User</h2>
      <form action="{{ route('admin.editUser', $user->id) }}" method="POST">
        @method("put")
        @csrf
        <div class="input-group mb-3">
          <span class="input-group-text c-create-user__span">Name</span>
          <input class="form-control" value="{{ $user->name }}" type="text" name="name">
        </div>
        <div class="input-group mb-3">
          <span class="input-group-text c-create-user__span">Email</span>
          <input class="form-control" type="email" value="{{ $user->email }}" name="email">
        </div>
        <div class=" mb-3">
          <span class=" c-create-user__span">Is Active</span>
          <input class="" type="checkbox" {{ $user->is_active ? "checked" : ""}} name="is_active">
        </div>
        @if(session("message"))
        <div>
          <div class="text-primary">{{ session("message") }}</div>
        </div>
        <!-- $errorsにはallが必要 -->
        @elseif(isset( $errors->all()[0]))
        <div>
          <div class="text-danger">入力が間違っています</div>
        </div>
        @endIf
        <button type="submit" class="btn btn-outline-primary">Submit</button>
      </form>
  </div>
</div>

@include("footer")