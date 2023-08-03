
{{-- base layout --}}
<x-layout>
    <div class="container  my-5 crewInfo">
        <h2>View User Informations</h2>
        <p>User name: <span class="fw-bold"> {{$user->username}}</span> </p>
        <a href="{{route('userList')}}" class="btn btn-secondary">Back</a>
    </div>
    
</x-layout>

