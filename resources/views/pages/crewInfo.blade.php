
{{-- base layout --}}
<x-layout>
    <div class="container  my-5 crewInfo">
        <h2>View Crew Informations</h2>
        <p>First name: <span class="fw-bold"> {{$crew->firstname}}</span> </p>
        <p>Middle name: <span class="fw-bold"> {{$crew->middlename}}</span> </p>
        <p>Last name: <span class="fw-bold"> {{$crew->lastname}}</span> </p>
        <p>Email: <span class="fw-bold"> {{$crew->email}}</span> </p>
        <p>Address: <span class="fw-bold"> {{$crew->address}}</span> </p>
        <p>Education: <span class="fw-bold"> {{$crew->education}}</span> </p>
        <p>Contact Details: <span class="fw-bold"> {{$crew->contact_details}}</span> </p>
        <p>Documents: </p>
        <div>
            <div>
                <a href="{{route('createDocument',$crew->id)}}" class="btn btn-success">Add New Document</a>
            </div>
            <table class="table table-striped">
                <thead>
                    <th>Code</th>
                    <th>Name</th>
                    <th>Document number</th>
                    <th>Date issued</th>
                    <th>Date expiry</th>
                    <th>Remarks</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @if (count($crew->documents) == 0)
                        <tr>
                            <td colspan="7" class="text-center">
                                <p>NO DOCUMENTS FOUND</p>
                            </td>
                        </tr>
                    @endif
                    @foreach ($crew->documents as $document)
                        <tr>
                            <td>
                                {{$document->code}}
                            </td>
                            <td>
                                {{$document->name}}
                            </td>
                            <td>
                                {{$document->document_number}}
                            </td>
                            <td>
                                {{$document->date_issued}}
                            </td>
                            <td>
                                {{$document->date_expiry}}
                            </td>
                            <td>
                                {{$document->remarks}}
                            </td>
                           
                            <td>
                                <a href="{{route('showDocument',$document->id)}}" class="btn btn-info">View</a>
                                <a href="{{route('editDocument',$document->id)}}" class="btn btn-primary">Edit</a>
                                <form class="d-inline" method="POST" action="{{route('deleteDocument',$document->id)}}">
                                    @csrf
                                    @method('delete')
                                    <button onclick="return confirm('Delete {{$document->name}}?')" class="btn btn-danger" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <a href="{{route('dashboard')}}" class="btn btn-secondary">Back</a>
    </div>
    
</x-layout>

