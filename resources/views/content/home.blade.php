@extends('layouts/contentLayoutMaster')

@section('title', 'Home')

@section('content')
<!-- Page layout -->
<div class="card">
  <div class="card-header">
    <h4 class="card-title">User List</h4>
  </div>
  <div class="card-body">
      <div class="container">
         <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                  <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Position</th>
                      <th>Status</th>
                  </tr>
              </thead>
              <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        @if($user->position)
                        <td>{{$user->position->position}}</td>
                        <td>
                            @if($user->position->isActive())
                            <span class="badge badge-pill badge-light-primary mr-1">
                               Active
                            </span>
                            @else
                            <span class="badge badge-pill badge-light-secondary mr-1">
                               Inactive
                            </span>
                            @endif
                        </td>
                        @else
                        <td>-</td>
                        <td>
                        <span class="badge badge-pill badge-light-secondary mr-1">
                            Inactive
                        </span>
                        </td>
                        @endif
                    </tr>
                @endforeach
              </tbody>
            </table>
             <div class="d-flex flex-row-reverse">
                 <div class="p-2"> {{ $users->links() }}</div>
             </div>

          </div>

      </div>

  </div>
</div>
<!--/ Page layout -->
@endsection
