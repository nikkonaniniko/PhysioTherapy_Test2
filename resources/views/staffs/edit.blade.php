@include('partials.header', [$title])
<header class="max-w-lg mx-auto">
    <a href="#">
        <h1 class="text-4xl font-bold text-white text-center">Edit {{$staff->first_name}} {{$staff->last_name}}</h1>
    </a>
</header>
<main class="bg-white max-w-lg mx-auto p-8 my-10 rounded-lg shadow-2xl">
    <div class=""><a href="{{url('/admin/staff')}}"> <button type="button" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded float-left">Back</button></a>
    </div>
    <section class="mt-10">
        <form action="/admin/staff/{{$staff->id}}" method="POST" class="flex flex-col" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="flex justify-center items-center my-4">
                @php
                    $default_profile = "https://avatars.dicebear.com/api/initials/".$staff->first_name."-".$staff->last_name.".svg"
                @endphp
                    <img class="w-[200px] h-[200px]" src="{{ $staff->staff_photo ? asset("storage/staff/".$staff->staff_photo) : $default_profile }}" >  <!-- to make circle image, lagay sa class yung rounded-full -->     
            </div>
            <div class="mb-6 pt-3 rounded bg-gray-200"> <!-- FIRST NAME -->
            <label for="first_name" class="block text-gray-700 text-sm font-bold 
                mb-2 ml-3">First Name</label>
                <input type="text" name="first_name" class="bg-gray-200 rounded w-full text-gray-700
                focus:outline-none border-b-4 border-gray-400 px-3" autocomplete="off" value={{$staff->first_name}}>
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
                    focus:outline-none border-b-4 border-gray-400 px-3" autocomplete="off" value={{$staff->last_name}}>
                @error('last_name')
                <p class="text-red-500 text-xs p-1">
                    {{$message}}
                </p>
                @enderror
            </div>
            <div class="mb-6 pt-3 rounded bg-gray-200"> <!-- LAST NAME -->
                <label for="designation" class="block text-gray-700 text-sm font-bold 
                    mb-2 ml-3">Designation</label>
                    <input type="text" name="designation" class="bg-gray-200 rounded w-full text-gray-700
                    focus:outline-none border-b-4 border-gray-400 px-3" autocomplete="off" value={{$staff->designation}}>
                @error('designation')
                <p class="text-red-500 text-xs p-1">
                    {{$message}}
                </p>
                @enderror
            </div>
            <div class="mb-6 pt-3 rounded bg-gray-200"> <!-- LAST NAME -->
                <label for="expertise" class="block text-gray-700 text-sm font-bold 
                    mb-2 ml-3">Expertise</label>
                    <input type="text" name="expertise" class="bg-gray-200 rounded w-full text-gray-700
                    focus:outline-none border-b-4 border-gray-400 px-3" autocomplete="off" value={{$staff->expertise}}>
                @error('expertise')
                <p class="text-red-500 text-xs p-1">
                    {{$message}}
                </p>
                @enderror
            </div>
            <div class="mb-6 pt-3 rounded bg-gray-200"> <!-- LAST NAME -->
                <label for="contact_num" class="block text-gray-700 text-sm font-bold 
                    mb-2 ml-3">Contact Number</label>
                    <input type="text" name="contact_num" class="bg-gray-200 rounded w-full text-gray-700
                    focus:outline-none border-b-4 border-gray-400 px-3" autocomplete="off" value={{$staff->contact_num}}>
                @error('contact_num')
                <p class="text-red-500 text-xs p-1">
                    {{$message}}
                </p>
                @enderror
            </div>
            <div class="mb-6 pt-3 rounded bg-gray-200"> <!-- LAST NAME -->
                <label for="emer_contact_num" class="block text-gray-700 text-sm font-bold 
                    mb-2 ml-3">Emergency Contact Number</label>
                    <input type="text" name="emer_contact_num" class="bg-gray-200 rounded w-full text-gray-700
                    focus:outline-none border-b-4 border-gray-400 px-3" autocomplete="off" value={{$staff->emer_contact_num}}>
                @error('emer_contact_num')
                <p class="text-red-500 text-xs p-1">
                    {{$message}}
                </p>
                @enderror
            </div>
            <div class="mb-6 pt-3 rounded bg-gray-200"> <!-- staff IMAGE -->
                <label for="staff_photo" class="block text-gray-700 text-sm font-bold 
                    mb-2 ml-3">Staff Photo</label>
                    <input type="file" name="staff_photo" class="bg-gray-200 rounded w-full text-gray-700
                    focus:outline-none border-b-4 border-gray-400 px-3" autocomplete="off" value={{$staff->staff_photo}}>
                @error('staff_photo')
                <p class="text-red-500 text-xs p-1">
                    {{$message}}
                </p>
                @enderror
            </div>
            <button class="bg-purple-600 hover:bg-purple-700 text-white font-bold
            py-2 rounded shadow-lg hover:shadow-xl transition
            duration-200" type="submit">Edit</button>  
        </form>
        <form action="/admin/staff/{{$staff->id}}" method="POST">
        @method('delete')
        @csrf
        <button class="w-full mt-2 bg-red-600 hover:bg-red-700 text-white font-bold
            py-2 rounded shadow-lg hover:shadow-xl transition
            duration-200" type="submit">Delete</button>
        </form>
    </section>
</main>


@include('partials.footer')