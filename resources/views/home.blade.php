
@include("header", ["title" => "home"])
<div class="container mt-5">
  <div class="d-flex justify-content-between">
    <h1>Home</h1>
    <a class="btn btn-outline-danger" href="{{ route('logout') }}">Logout</a>
  </div>
  <div>
    <div>
      <span>name: </span>
      <span>{{ Auth::user()->name }}</span>
    </div>
    <div>
      <span>role: </span>
      <span>{{ Auth::user()->role }}</span>
    </div>
  </div>

  <div>
    @can("admin")
    @if(session("message"))
    <div class="text-danger">{{ session("message") }}</div>
    @endif
    <table class="table">
      <thead>
        <tr>
          <th>id</th>
          <th>name</th>
          <th>email</th>
          <th>role</th>
          <th>isActive</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @foreach($users as $user)
          <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->role }}</td>
            <td>{{ $user->is_active }}</td>
            <td>
              <a href="{{ route('admin.showUser', $user->id) }}" class="btn btn-sm btn-outline-primary">表示</a>
              @if($user->role !== "admin")
                <a href="{{ route('admin.editUser', $user->id) }}" class="btn btn-sm btn-outline-primary">編集</a>
                <form class="d-inline" action="{{ route('admin.deleteUser', $user->id) }}" method="POST">
                  <!-- @method("delete")の書き方が分からなかった -->
                  @method("delete")
                  @csrf
                  <button type="submit" class="btn btn-sm btn-outline-danger">削除</button>
                </form>
              @endif
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
    <div>
      <a class="btn btn-outline-primary" href="{{route('admin.createUserForm')}}">ユーザーの追加</a>
    </div>
    @endcan
  </div>
</div>
@include("footer")