
{{-- base layout --}}
<x-layout>
    <div class="container  my-5 listCrews">
        @unless (count($users) == 0)
            {{-- main container --}}
            <div class="row">
                <div>
                    <h2>List of Users</h2>
                </div>
                <div>
                    <a href="{{route('userAdd')}}" class="btn btn-success">Create New User</a>
                </div>
            </div>
            <table class="table table-striped">
                <thead>
                    <th>User name</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @foreach ($users as $users)
                        <tr>
                            <td>
                                {{$users->username}}
                            </td>
                            
                            <td>
                                <a href="{{route('userShow',$users->id)}}" class="btn btn-info">View</a>
                                {{-- <a href="{{route('editCrew',$users->id)}}" class="btn btn-primary">Edit</a> --}}
                                <form class="d-inline" method="POST" action="{{route('userDelete',$users->id)}}">
                                    @csrf
                                    @method('delete')
                                    <button onclick="return confirm('Delete {{$users->username}}?')" class="btn btn-danger" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endunless

    </div>
    
</x-layout>

