@include('partials.header', [$title])
<header class="max-w-lg mx-auto">
    <a href="#">
        <h1 class="text-4xl font-bold text-white text-center">Add New Supply</h1>
    </a>
</header>
<main class="bg-white max-w-lg mx-auto p-8 my-10 rounded-lg shadow-2xl">
    <div class=""><a href="{{url('/admin/supplies')}}"> <button type="button" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded float-left">Back</button></a>
    </div>
    <section class="mt-10">
        <form action="/admin/supplies/add" method="POST" class="flex flex-col" enctype="multipart/form-data"> 
        @csrf
                <div class="mt-5 mb-6 pt-3 rounded bg-gray-200"> 
                    <label for="name" class="block text-gray-700 text-sm font-bold 
                        mb-2 ml-3">Name</label>
                        <input type="text" name="name" class="bg-gray-200 rounded w-full text-gray-700
                        focus:outline-none border-b-4 border-gray-400 px-3" autocomplete="off" value={{old('name')}}>
                    @error('name')
                    <p class="text-red-500 text-xs p-1">
                        {{$message}}
                    </p>
                    @enderror
                </div>
                <div class="mb-6 pt-3 rounded bg-gray-200"> 
                    <label for="category" class="block text-gray-700 text-sm font-bold 
                        mb-2 ml-3">Category</label>
                        <select class="form-control" name="category">
                            <option disabled selected>---Choose Category---</option>
                            <option value="therapy">Therapy</option>
                            <option value="massage">Massage</option>
                        </select>
                    @error('category')
                    <p class="text-red-500 text-xs p-1">
                        {{$message}}
                    </p>
                    @enderror
                </div>
                <div class="mb-6 pt-3 rounded bg-gray-200"> 
                    <label for="quantity" class="block text-gray-700 text-sm font-bold 
                        mb-2 ml-3">Quantity</label>
                        <input type="number" min="0" name="quantity" class="bg-gray-200 rounded w-full text-gray-700
                        focus:outline-none border-b-4 border-gray-400 px-3" autocomplete="off" value={{old('quantity')}}>
                    @error('quantity')
                    <p class="text-red-500 text-xs p-1">
                        {{$message}}
                    </p>
                    @enderror
                </div>
                <div class="mb-6 pt-3 rounded bg-gray-200"> 
                    <label for="expiration" class="block text-gray-700 text-sm font-bold 
                        mb-2 ml-3">Expiration Date</label>
                        <input type="date" name="expiration" class="bg-gray-200 rounded w-full text-gray-700
                        focus:outline-none border-b-4 border-gray-400 px-3" autocomplete="off" value={{old('expiration')}}>
                    @error('expiration')
                    <p class="text-red-500 text-xs p-1">
                        {{$message}}
                    </p>
                    @enderror
                </div>
                <div class="mt-5 mb-6 pt-3 rounded bg-gray-200"> 
                    <label for="description" class="block text-gray-700 text-sm font-bold 
                        mb-2 ml-3">Description</label>
                        <input type="text" name="description" class="bg-gray-200 rounded w-full text-gray-700
                        focus:outline-none border-b-4 border-gray-400 px-3" autocomplete="off" value={{old('description')}}>
                    @error('description')
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