
{{-- base layout --}}
<x-layout>
    <div class="container  my-5 listCrews">
        @unless (count($crews) == 0)
            {{-- main container --}}
            <div class="row">
                <div>
                    <h2>List of Crews</h2>
                </div>
                <div>
                    <a href="{{route('createCrewInfo')}}" class="btn btn-success">Create New Crew</a>
                </div>
            </div>
            <table class="table table-striped">
                <thead>
                    <th>First name</th>
                    <th>Middle name</th>
                    <th>Last name</th>
                    <th>Email</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @foreach ($crews as $crew)
                        <tr>
                            <td>
                                {{$crew->firstname}}
                            </td>
                            <td>
                                {{$crew->middlename}}
                            </td>
                            <td>
                                {{$crew->lastname}}
                            </td>
                            <td>
                                {{$crew->email}}
                            </td>
                            <td>
                                <a href="{{route('showCrew',$crew->id)}}" class="btn btn-info">View</a>
                                <a href="{{route('editCrew',$crew->id)}}" class="btn btn-primary">Edit</a>
                                <form class="d-inline" method="POST" action="{{route('deleteCrew',$crew->id)}}">
                                    @csrf
                                    @method('delete')
                                    <button onclick="return confirm('Delete {{$crew->firstname}}?')" class="btn btn-danger" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endunless

    </div>
    
</x-layout>

