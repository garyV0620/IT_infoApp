
{{-- base layout --}}
<x-layout>
    <div class="container py-5 ">
        <h2 class="text-center">Add New User</h2>
        <div class="col-lg-6 mx-auto crewForm">
            <form method="POST" action="{{ route('userSave') }}">
                @csrf
                <div class="mb-3">
                    <label for="username" class="form-label">User name</label>
                    <input type="text" class="form-control" id="username" name="username" value="{{ old('username') }}">
                    @error('username')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" value="{{ old('password') }}">
                    @error('password')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Add</button>
                <a href="{{route('userList')}}" class="btn btn-danger">Cancel</a>

            </form>
        </div>
    </div>
    
</x-layout>

