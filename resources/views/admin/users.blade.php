@extends('admin.admin_template')

@section('content')
    <div class='row'>
        <div class='col-md-12'>
            <!-- Box -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">User Registered with Us!</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="vanaho"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                @if(!empty($users))
                <div class="table-responsive">
                <table class="table table-hover table-striped">
                    <tr>
                      <th>ID</th>
                      <th>Phone</th>
                      <th>Firstname</th>
                      <th>Lastname</th>
                      <th>Idnumber</th>
                      <th>Market</th>
                      <th>Category</th>
                      <th>Status</th>
                      <th>Points</th>
                      <th>Approve</th>
                      <th>Denial request</th>
                    </tr>
                     @foreach ($users as $user)
                    <tr>
                      <td>{{ $user->id }}</td>
                      <td>{{ $user->phone }}</td>
                      <td>{{ $user->persoinfo->firstname }}</td>
                      <td>{{ $user->persoinfo->lastname }}</td>
                      <td>{{ $user->persoinfo->idnumber }}</td>
                      <td>{{ $user->market->market_name }}</td>
                      <td>{{ $user->category->category_name }}</td>
                      <td><span class="label {{ $user->status =='1' ? ' label-success':'label-danger'}} ">{{ $user->status == '1' ? ' approved':'pending'}}</span></td>
                      <td>{{ $user->point->points }}</td>
                      <td><a href="approve?id={{$user->id}}" class="btn btn-xs btn-block {{ $user->status =='1' ? ' btn-danger':'btn-success'}}">{{$user->status == '1' ? 'disable':'Approve'}}</a></td>
                      <td><a href="delete?scope=user&id={{$user->id}}" class="btn btn-xs btn-block {{'btn-primary'}}">delete</a></td>
                    </tr>
                    @endforeach
                  </table> 
                  {!! $users->render() !!}
                  </div>
                  @else
                  <div class="alert alert-success">No User Registered Yet!</div>
                  @endif
                </div><!-- /.box-body -->
                <div class="box-footer">
                </div><!-- /.box-footer-->
            </div><!-- /.box -->
        </div><!-- /.col -->

    </div><!-- /.row -->
@endsection