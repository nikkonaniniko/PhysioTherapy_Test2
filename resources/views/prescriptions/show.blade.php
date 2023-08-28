@include('partials.header', [$title])
<header class="max-w-lg mx-auto">
    <a href="#">
        <h1 class="text-4xl font-bold text-white text-center">View {{$prescription->patients_id}}'s Prescription</h1>
    </a>
</header>
<main class="bg-white max-w-lg mx-auto p-8 my-10 rounded-lg shadow-2xl">
    <div class=""><a href="{{url('/admin/prescriptions')}}"> <button type="button" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded float-left">Back</button></a>
    </div>
    <section class="mt-10 p-10">
        <iframe height="600" width="500" auto src="/storage/patients/{{$prescription->filename}}"></iframe>
            
    </section>
</main>

@include('partials.footer')