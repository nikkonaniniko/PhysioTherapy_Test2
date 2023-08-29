<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
</head>
<body>

  <div class=""><a href="{{url('/admin/patients')}}"> <button type="button" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded float-left">Patients</button></a>
  </div>

  <div class=""><a href="{{url('/admin/staff')}}"> <button type="button" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded float-left">Staff</button></a>
  </div>
  
  <div class=""><a href="{{url('/admin/prescriptions')}}"> <button type="button" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded float-left">Prescriptions</button></a>
  </div>

  <div class=""><a href="{{url('/admin/equipment')}}"> <button type="button" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded float-left">Equipment</button></a>
  </div>

  <div class=""><a href="{{url('/admin/supplies')}}"> <button type="button" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded float-left">Supplies</button></a>
  </div>

</body>
</html>