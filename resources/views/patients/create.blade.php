@include('partials.header', [$title])
<header class="max-w-lg mx-auto">
    <a href="#">
        <h1 class="text-4xl font-bold text-white text-center">Add New Patient</h1>
    </a>
</header>
<main class="bg-white max-w-lg mx-auto p-8 my-10 rounded-lg shadow-2xl">
    <div class=""><a href="{{url('/admin/patients')}}"> <button type="button" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded float-left">Back</button></a>
    </div>
    <section class="mt-10">
        <form id="mainForm" action="/admin/patients/add" method="POST" class="flex flex-col" enctype="multipart/form-data"> @csrf </form>
        <form id="presForm" action="/admin/patients/prescriptions/add" method="POST" enctype="multipart/form-data" > @csrf </form>
            <div class="mt-6 mb-6 pt-3 rounded bg-gray-200"> <!-- FIRST NAME -->
                <label for="first_name" class="block text-gray-700 text-sm font-bold 
                    mb-2 ml-3">First Name</label>
                    <input type="text" name="first_name" class="bg-gray-200 rounded w-full text-gray-700
                    focus:outline-none border-b-4 border-gray-400 px-3" autocomplete="off" form="mainForm" value={{old('first_name')}}>
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
                        focus:outline-none border-b-4 border-gray-400 px-3" autocomplete="off" form="mainForm" value={{old('last_name')}}>
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
                        focus:outline-none border-b-4 border-gray-400 px-3" autocomplete="off" form="mainForm" value={{old('contact_num')}}>
                    @error('contact_num')
                    <p class="text-red-500 text-xs p-1">
                        {{$message}}
                    </p>
                    @enderror
                </div>
                <div class="mb-6 pt-3 rounded bg-gray-200"> <!-- Prescriptions -->
                    <label for="prescriptions" class="block text-gray-700 text-sm font-bold 
                        mb-2 ml-3">Prescriptions</label>
                        <input type="file" name="prescriptions" class="bg-gray-200 rounded w-full text-gray-700
                        focus:outline-none border-b-4 border-gray-400 px-3" autocomplete="off" value={{old('prescriptions')}}>
                        <button class="bg-purple-600 hover:bg-purple-700 text-white font-bold px-3
                        py-2 rounded shadow-lg hover:shadow-xl transition
                        duration-200" type="submit" form="presForm">Submit</button>
                    @error('prescriptions')
                    <p class="text-red-500 text-xs p-1">
                        {{$message}}
                    </p>
                    @enderror
                </div>
                
                <div class="mb-6 pt-3 rounded bg-gray-200"> <!-- Diagnosis -->
                    <label for="diagnosis" class="block text-gray-700 text-sm font-bold 
                        mb-2 ml-3">Diagnosis</label>
                        <input type="text" name="diagnosis" class="bg-gray-200 rounded w-full text-gray-700
                        focus:outline-none border-b-4 border-gray-400 px-3" autocomplete="off" form="mainForm" value={{old('diagnosis')}}>
                    @error('diagnosis')
                    <p class="text-red-500 text-xs p-1">
                        {{$message}}
                    </p>
                    @enderror
                </div>
            <button class="bg-purple-600 hover:bg-purple-700 text-white font-bold px-3
            py-2 rounded shadow-lg hover:shadow-xl transition
            duration-200" type="submit" form="mainForm">Add New</button>
        
    </section>
</main>


@include('partials.footer')