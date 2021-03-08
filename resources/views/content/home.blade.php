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
                      <th>Name</th>
                      <th>Email</th>
                      <th>Position</th>
                      <th>Status</th>
                      <th>Actions</th>
                  </tr>
              </thead>
              <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>Position</td>
                        <td><span class="badge badge-pill badge-light-primary mr-1">Active</span></td>
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn btn-sm dropdown-toggle hide-arrow" data-toggle="dropdown">
                                    <i data-feather="more-vertical"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="javascript:void(0);">
                                        <i data-feather="edit-2" class="mr-50"></i>
                                        <span>Edit</span>
                                    </a>
                                    <a class="dropdown-item" href="javascript:void(0);">
                                        <i data-feather="trash" class="mr-50"></i>
                                        <span>Delete</span>
                                    </a>
                                </div>
                            </div>
                        </td>
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
