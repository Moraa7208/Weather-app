<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Weather App</title>
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <style>
    @media (min-width: 768px) {
      body {
        background-color: #498CEC;
      }
    }
    @media (max-width: 767px) {
      body {
        background-color: #7290B9;
      }
    }
  </style>
</head>
<body class="text-white flex flex-col min-h-screen">
  <header class="w-full relative  flex  p-4">
    <div class="absolute top-8 left-8 lg:top-20 lg:left-24  space-x-4">
      <div class="space-y-4 ">
        <h1 class="text-5xl">{{ $city  }}</h1>
        <div class="relative text-lg text-gray-300" x-data="{ showInput: false }">
          <button @click="showInput = !showInput" class="px-4 py-2 font-bold text-gray-300  rounded  focus:outline-none focus:shadow-outline">
            Enter City Name
        </button>

        <!-- Form -->
        <form action="{{ route('city.store', ['city' => $city ]) }}" method="POST" x-show="showInput" class="mt-4">
            @csrf
            <div x-show="showInput" @click.away="showInput = false" class="absolute bottom-full mb-2 w-full">
                <input type="text" name="city" placeholder="Enter city name" class="w-full px-4 py-2 mb-2 text-gray-700 bg-white border border-gray-300 rounded focus:outline-none focus:shadow-outline">
            </div>
            <div>
                <button type="submit" class="px-4 py-2 font-bold text-white bg-green-500 rounded hover:bg-green-700 focus:outline-none focus:shadow-outline">
                    Submit
                </button>
            </div>

        </form>
            <span>📱</span>
            <span>My location</span>
        </div>
      </div>
      {{-- <div class="flex items-center space-x-2">

      </div> --}}
    </div>
  </header>

  <main class="flex-grow flex justify-center items-center mt-12">
    <div class="text-center space-y-2">
      <div >
        <span>{{$weather->weather[0]->icon}}</span>
        <span class="text-9xl ">{{ $weather->main->temp }}°C</span>
      </div>
      <div>
        <span class="text-3xl">{{$weather->weather[0]->description}}</span>
      </div>
    </div>
  </main>

  <footer class="w-full p-6 grid grid-cols-2 lg:flex justify-center  items-start  lg:space-x-64">
    <div class="flex flex-col items-start space-y-2">
      <p class="text-gray-300 lg:text-lg font-semibold">wind</p>
      <p class="text-2xl">{{ $weather->wind->speed }} km/h</p>
    </div>
      <div class="flex flex-col items-start space-y-2">
        <p class="text-gray-300 lg:text-lg font-semibold">Pressure</p>
        <p class="text-2xl">: {{ $weather->main->pressure }} hPa</p>
      </div>
      <div class="flex flex-col items-start space-y-2">
        <p class="text-gray-300 lg:text-lg font-semibold">Humidity:</p>
        <p class="text-2xl">{{ $weather->main->humidity }}%</p>
      </div>
      <div class="flex flex-col items-start space-y-2">
        <p class="text-gray-300 lg:text-lg font-semibold">Rain:</p>
        <p class="text-2xl"> {{ $weather->main->feels_like }}%</p>
      </div>
  </footer>
  
</body>
</html>
