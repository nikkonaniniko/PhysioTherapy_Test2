@include('partials.header', [$title])
<header class="max-w-lg mx-auto">
    <a href="#">
        <h1 class="text-4xl font-bold text-white text-center">Edit {{$patient->first_name}} {{$patient->last_name}}</h1>
    </a>
</header>
<main class="bg-white max-w-lg mx-auto p-8 my-10 rounded-lg shadow-2xl">
    <div class=""><a href="{{url('/admin/patients')}}"> <button type="button" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded float-left">Back</button></a>
    </div>
    <section class="mt-10">
        <form id="mainForm" action="/admin/patients/{{$patient->id}}" method="POST" class="flex flex-col" enctype="multipart/form-data">  @csrf @method('PUT') </form>
        
        <form id="presForm" action="/admin/prescriptions/add" method="POST" enctype="multipart/form-data" > @csrf </form>
           
            <div class="flex justify-center items-center my-4">
                @php
                    $default_profile = "https://avatars.dicebear.com/api/initials/".$patient->first_name."-".$patient->last_name.".svg"
                @endphp
                    <img class="w-[200px] h-[200px]" src="{{ $default_profile }}" >
            </div>
            <div class="mt-6 mb-6 pt-3 rounded bg-gray-200"> <!-- FIRST NAME -->
                <label for="first_name" class="block text-gray-700 text-sm font-bold 
                    mb-2 ml-3">First Name</label>
                    <input type="text" name="first_name" class="bg-gray-200 rounded w-full text-gray-700
                    focus:outline-none border-b-4 border-gray-400 px-3" autocomplete="off" form="mainForm" value={{$patient->first_name}}>
                    @error('first_name')
                    <p class="text-red-500 text-xs p-1">
                        {{$message}}
                    </p>
                    @enderror
                </div>
                <div class="mb-6 pt-3 rounded bg-gray-200"> <!-- LAST NAME -->
                    <label for="last_name" class="block text-gray-700 text-sm font-bold 
                        mb-2 ml-3">Last Name</label>
                        <input type="text" name="last_name" class="bg-gray-200 rounded w-full text-gray-700
                        focus:outline-none border-b-4 border-gray-400 px-3" autocomplete="off" form="mainForm" value={{$patient->last_name}}>
                    @error('last_name')
                    <p class="text-red-500 text-xs p-1">
                        {{$message}}
                    </p>
                    @enderror
                </div>
                <div class="mb-6 pt-3 rounded bg-gray-200"> <!-- contact num -->
                    <label for="contact_num" class="block text-gray-700 text-sm font-bold 
                        mb-2 ml-3">Contact Number</label>
                        <input type="text" name="contact_num" class="bg-gray-200 rounded w-full text-gray-700
                        focus:outline-none border-b-4 border-gray-400 px-3" autocomplete="off" form="mainForm" value={{$patient->contact_num}}>
                    @error('contact_num')
                    <p class="text-red-500 text-xs p-1">
                        {{$message}}
                    </p>
                    @enderror
                </div>
                @forelse ($patient->prescriptions as $prescription)
                <div class="mb-6 pt-3 rounded bg-gray-200"> <!-- Prescriptions -->
                    <label for="prescriptions" class="block text-gray-700 text-sm font-bold 
                        mb-2 ml-3">Prescriptions</label>
                        <ul>
                            <li>
                                {{ $prescription['filename']}}
                            </li>
                        </ul>
                        <input type="file" name="filename" class="bg-gray-200 rounded w-full text-gray-700
                        focus:outline-none border-b-4 border-gray-400 px-3" form="presForm" autocomplete="off">
                    @error('prescriptions')
                    <p class="text-red-500 text-xs p-1">
                        {{$message}}
                    </p>
                    @enderror
                </div>
                @empty
                    <p>No Prescriptions</p>
                @endforelse

                <button class="px-5 bg-blue-600 hover:bg-blue-700 text-white font-bold
            py-2 rounded shadow-lg hover:shadow-xl transition
            duration-200" form="presForm" type="submit">Add Prescription</button>
                
                <div class="mb-6 pt-3 rounded bg-gray-200"> <!-- Diagnosis -->
                    <label for="diagnosis" class="block text-gray-700 text-sm font-bold 
                        mb-2 ml-3">Diagnosis</label>
                        <input type="text" name="diagnosis" class="bg-gray-200 rounded w-full text-gray-700
                        focus:outline-none border-b-4 border-gray-400 px-3" autocomplete="off" form="mainForm" value={{$patient->diagnosis}}>
                    @error('diagnosis')
                    <p class="text-red-500 text-xs p-1">
                        {{$message}}
                    </p>
                    @enderror
                </div>
            <button class="w-full bg-purple-600 hover:bg-purple-700 text-white font-bold
            py-2 rounded shadow-lg hover:shadow-xl transition
            duration-200" form="mainForm" type="submit" >Edit</button>
        <form action="/admin/patients/{{$patient->id}}" method="POST">
            @method('delete')
            @csrf
            <button class="w-full mt-2 bg-red-600 hover:bg-red-700 text-white font-bold
                py-2 rounded shadow-lg hover:shadow-xl transition
                duration-200" type="submit">Delete</button>
            
    </section>
</main>

@include('partials.footer')