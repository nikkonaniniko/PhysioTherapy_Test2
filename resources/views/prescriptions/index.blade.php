@include('partials.header')
@php
    $array = array('title' => 'Leonardo Physical Therapy Rehabilitation Clinic');
@endphp
<x-nav :data="$array"/>

<header class="max-w-lg mx-auto mt-5">
    <a href="#">
        <h1 class="text-4xl font-bold text-white text-center">Prescriptions List</h1>
    </a>
    <div class=""><a href="{{url('/admin/prescriptions/add')}}"> <button type="button" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded float-right">Create</button></a>
</header>
<section class="mt-10">
    <div class="overflow-x-auto relative">
        <table class=" mt-5 mx-auto text-sm text-left text-gray-500">
            <thead class="text-xs text gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="py-3 px-6">
                        Date & Time
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Last Name
                    </th>
                    <th scope="col" class="py-3 px-6">
                        
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Actions
                    </th>
                    <th scope="col" class="py-3 px-6">

                    </th>
                </tr>
            </thead>

            <tbody>
                @foreach ($prescriptions as $prescription)
                <tr class="bg-gray-800 border-b text-white">
                    <td class="py-4 px-6">
                        {{ $prescription->created_at }}
                    </td>
                    <td class="py-4 px-6">
                        {{ $prescription->last_name }}
                    </td>
                    <td class="py-4 px-6">
                        <a href="{{url('admin/prescriptions/view',$prescription->id)}}" class="bg-sky-600 text-white px-4 py-1 rounded">View</a>
                    </td>
                    <td class="py-4 px-6">
                        <a href="{{url('admin/prescriptions/download',$prescription->filename)}}" class="bg-sky-600 text-white px-4 py-1 rounded">Download</a>

                    </td>
                    <td class="py-4 px-6">
                        <form action="/admin/prescriptions/{{$prescription->id}}" method="POST">
                            @method('delete')
                            @csrf
                            <button class="bg-red-600 text-white px-4 py-1 rounded" type="submit">Delete</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mx-auto max-w-lg pt-6 p4">
        {{ $prescriptions->links() }} 
        </div>
    </div>
</section>
@include('partials.footer')


{{-- <form action="/admin/prescriptions/{{$prescription->filename}}" method="GET">
    @csrf
    <button class="bg-sky-600 text-white px-4 py-1 rounded" type="submit">Download</button> --}}