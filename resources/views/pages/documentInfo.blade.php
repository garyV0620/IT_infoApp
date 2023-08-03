
{{-- base layout --}}
<x-layout>
    <div class="container  my-5 crewInfo">
        <h2>View Document Informations</h2>
        <p>Code: <span class="fw-bold"> {{$document->code}}</span> </p>
        <p>Name: <span class="fw-bold"> {{$document->name}}</span> </p>
        <p>Document number: <span class="fw-bold"> {{$document->document_number}}</span> </p>
        <p>Date issued: <span class="fw-bold"> {{$document->date_issued}}</span> </p>
        <p>Date expiry: <span class="fw-bold"> {{$document->date_expiry}}</span> </p>
        <p>Remarks: <span class="fw-bold"> {{$document->remarks}}</span> </p>

        <a href="{{route('showCrew', $document->it_crew_id) }}" class="btn btn-secondary">back</a>
    </div>
    
</x-layout>

