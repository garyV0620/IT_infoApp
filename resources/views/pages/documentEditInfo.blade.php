
{{-- base layout --}}
<x-layout>
    <div class="container py-5 ">
        <h2 class="text-center">Edit Document Information</h2>
        <div class="col-lg-6 mx-auto crewForm">
            <form method="POST" action="{{route('updateDocumentInfo',$document->id)}}">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="code" class="form-label">Code</label>
                    <input type="text" class="form-control" id="code" name="code" value="{{ old('code', $document->code) }}">
                    @error('code')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $document->name) }}">
                    @error('name')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="document_number" class="form-label">Document number</label>
                    <input type="text" class="form-control" id="document_number" name="document_number" value="{{ old('document_number', $document->document_number) }}">
                    @error('document_number')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="date_issued" class="form-label">Date issued</label>
                    <input type="text" class="form-control" id="date_issued" name="date_issued" value="{{ old('date_issued', $document->date_issued)}}">
                    @error('date_issued')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="date_expiry" class="form-label">Date expiry</label>
                    <input type="text" class="form-control" id="date_expiry" name="date_expiry" value="{{ old('date_expiry', $document->date_expiry) }}">
                    @error('date_expiry')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="remarks" class="form-label">Remarks</label>
                    <input type="text" class="form-control" id="remarks" name="remarks" value="{{ old('remarks', $document->remarks) }}">
                    @error('remarks')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{route('showCrew', $document->it_crew_id) }}" class="btn btn-danger">Cancel</a>

            </form>
        </div>
    </div>
    
</x-layout>

