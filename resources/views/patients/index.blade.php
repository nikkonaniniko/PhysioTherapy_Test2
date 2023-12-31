@include('partials.header')
@php
    $array = array('title' => 'Leonardo Physical Therapy Rehabilitation Clinic');
@endphp
<x-nav :data="$array"/>

<header class="max-w-lg mx-auto mt-5">
    <a href="#">
        <h1 class="text-4xl font-bold text-white text-center">Patient List</h1>
    </a>
    <div class=""><a href="{{url('/admin/patients/add')}}"> <button type="button" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded float-right">Add New</button></a>
</header>
<section class="mt-10">
    <div class="overflow-x-auto relative">
        <table class=" mt-5 mx-auto text-sm text-left text-gray-500">
            <thead class="text-xs text gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="py-3 px-6">
                        
                    </th>
                    <th scope="col" class="py-3 px-6">
                        First Name
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Last Name
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Contact Number
                    </th>
                    <th scope="col" class="py-3 px-6">

                    </th>
                </tr>
            </thead>

            <tbody>
                @foreach ($patients as $patient)
                <tr class="bg-gray-800 border-b text-white">
                    @php
                        $default_profile = "https://avatars.dicebear.com/api/initials/".$patient->first_name."-".$patient->last_name.".svg"
                    @endphp
                    <td>
                        <img src="{{ $default_profile }}" >
                    </td>
                    <td class="py-4 px-6">
                        {{ $patient->first_name }}
                    </td>
                    <td class="py-4 px-6">
                        {{ $patient->last_name }}
                    </td>
                    <td class="py-4 px-6">
                        {{ $patient->contact_num }}
                    </td>
                    <td class="py-4 px-6">
                        <a href="/admin/patients/{{$patient->id}}" class="bg-sky-600 text-white px-4 py-1 rounded">View</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mx-auto max-w-lg pt-6 p4">
        {{ $patients->links() }} 
        </div>
    </div>
</section>
@include('partials.footer')