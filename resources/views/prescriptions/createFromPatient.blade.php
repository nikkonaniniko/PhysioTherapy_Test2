@include('partials.header', [$title])
<header class="max-w-lg mx-auto">
    <a href="#">
        <h1 class="text-4xl font-bold text-white text-center">Add New Prescription</h1>
    </a>
</header>
<main class="bg-white max-w-lg mx-auto p-8 my-10 rounded-lg shadow-2xl">
    <div class=""><a href="{{URL::previous() }}"> <button type="button" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded float-left">Back</button></a>
    </div>
    <section class="mt-10">
        <form action="/admin/prescriptions/add" method="POST" class="flex flex-col" enctype="multipart/form-data"> 
        @csrf
                <div class="mb-6 pt-3 rounded bg-gray-200"> <!-- LAST NAME -->
                    <label for="patients_id" class="block text-gray-700 text-sm font-bold 
                        mb-2 ml-3">Patient ID</label>
                        <input type="number" name="patients_id" class="bg-gray-200 rounded w-full text-gray-700
                        focus:outline-none border-b-4 border-gray-400 px-3" autocomplete="off" value={{old('patients_id')}}>
                    @error('patients_id')
                    <p class="text-red-500 text-xs p-1">
                        {{$message}}
                    </p>
                    @enderror
                </div>
                <div class="mb-6 pt-3 rounded bg-gray-200"> <!-- Prescriptions -->
                    <label for="filename" class="block text-gray-700 text-sm font-bold 
                        mb-2 ml-3">File</label>
                        <input type="file" name="filename" class="bg-gray-200 rounded w-full text-gray-700
                        focus:outline-none border-b-4 border-gray-400 px-3" autocomplete="off" value={{old('filename')}}>
                    @error('filename')
                    <p class="text-red-500 text-xs p-1">
                        {{$message}}
                    </p>
                    @enderror
                </div>
            <button class="bg-purple-600 hover:bg-purple-700 text-white font-bold px-3
            py-2 rounded shadow-lg hover:shadow-xl transition
            duration-200" type="submit">Add New</button>
        </form>
    </section>
</main>


@include('partials.footer')