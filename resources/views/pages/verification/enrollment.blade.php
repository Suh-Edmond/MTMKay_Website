<x-guest-nav-layout>
     <h3 class="flex justify-center my-3 font-weight-bold">{{$message}}</h3>

    @if(!$has_expire)
        <div class="flex justify-start my-3">
            <label><span class="fw-bold">Student Name:</span> <span class="mx-2">{{$student->name}}</span></label>
        </div>

        <div class="flex justify-start my-3">
            <label><span class="fw-bold">Student Email:</span> <span class="mx-2 my-2">{{$student->email}}</span></label>
        </div>

        <div class="flex justify-start my-3">
            <label><span class="fw-bold">Student Telephone:</span> <span class="mx-2 my-2">{{$student->telephone}}</span></label>
        </div>
        <div class="flex justify-start my-3">
            <label><span class="fw-bolder">Program Title:</span> <span class="mx-2 my-2">{{$program->title}}</span></label>
        </div>
        <div class="flex justify-start my-3">
            <label><span class="fw-bold">Program Duration:</span> <span class="mx-2 my-2">{{$program->duration}}</span></label>
        </div>
    @endif
</x-guest-nav-layout>

