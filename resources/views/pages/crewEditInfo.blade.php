
{{-- base layout --}}
<x-layout>
    <div class="container py-5 ">
        <h2 class="text-center">Edit Crew Information</h2>
        <div class="col-lg-6 mx-auto crewForm">
            <form method="POST" action="{{route('updateCrewInfo',$crew->id)}}">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="firstname" class="form-label">First name</label>
                    <input type="text" class="form-control" id="firstname" name="firstname" value="{{ old('firstname', $crew->firstname) }}">
                    @error('firstname')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="middlename" class="form-label">Middle name</label>
                    <input type="text" class="form-control" id="middlename" name="middlename" value="{{ old('middlename', $crew->middlename) }}">
                    @error('middlename')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="lastname" class="form-label">Last name</label>
                    <input type="text" class="form-control" id="lastname" name="lastname" value="{{ old('lastname', $crew->lastname) }}">
                    @error('lastname')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control" id="email" name="email" value="{{ old('email', $crew->email) }}">
                    @error('email')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" class="form-control" id="address" name="address" value="{{ old('address', $crew->address) }}">
                    @error('address')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="education" class="form-label">Education</label>
                    <input type="text" class="form-control" id="education" name="education" value="{{ old('education', $crew->education) }}">
                    @error('education')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="contact_details" class="form-label">Contact Details</label>
                    <input type="text" class="form-control" id="contact_details" name="contact_details" value="{{ old('contact_details', $crew->contact_details) }}">
                    @error('contact_details')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{route('dashboard')}}" class="btn btn-danger">Cancel</a>

            </form>
        </div>
    </div>
    
</x-layout>

