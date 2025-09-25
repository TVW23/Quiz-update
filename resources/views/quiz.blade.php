{{-- Desktop --}}
<x-app-layout>
    {{-- <div class="max-w-2xl mx-auto mt-10">
        <div class="shadow-lg rounded-2xl p-6">
            <h1 class="text-2xl font-bold mb-6 text-center">📘 Static Quiz</h1>
            
            <p class="text-center font-bold font-4xl text-white">What is the capital of France?</p>

            <img src="" alt="">
            
            <div class="grid grid-cols-2 text-white font-bold">
                <div class="">
                    <p class="bg-red-500 py-2 px-10 rounded-lg">Berlin</p>     
                </div>
                <div class="bg-green-500 py-2 px-10 rounded-lg">
                    <p>Madrid</p>     
                </div>
                <div class="bg-blue-500 py-2 px-10 rounded-lg">
                    <p>Paris</p>     
                </div>
                <div class="bg-yellow-500 py-2 px-10 rounded-lg">
                    <p>Rome</p>     
                </div>
            </div>
            {{-- Submit button (static) --}}
            {{-- <div class="text-center">
                <button class="px-6 py-2 bg-blue-600 text-white rounded-xl shadow hover:bg-blue-700">
                    Submit
                </button>
            </div>
        </div>
    </div>

    <div class="w-4 h-4 bg-red-200">test</div> --}}
</x-app-layout>

{{-- Quiz layout --}}

<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
  </head>
  <body class="">
    <div class="flex items-center justify-between mx-auto max-w-4xl px-10 mt-6">
      <p>Quiz naam</p>
      <p class="bg-gray-300 border-2 border-gray-500 rounded-md py-2 px-3 text-center text-white font-bold">3204</p>
    </div>
    <div class="mx-auto mt-10 max-w-4xl px-10 mb-5">
      <img class="mb-10 rounded-lg" src="https://operaparallele.org/wp-content/uploads/2023/09/Placeholder_Image.png" alt="" />
      <p class="mb-5 text-center text-2xl font-bold">What is the capital of France?</p>
      <div class="grid grid-cols-1 gap-4 text-center font-bold text-white sm:grid-cols-2">
        <div>
          <button onclick="getQuizAnswer(this)" class="button-layout bg-red-500 hover:bg-red-700">Berlin</button>
        </div>
        <div>
          <button onclick="getQuizAnswer(this)" class="button-layout bg-green-500 hover:bg-green-700">Madrid</button>
        </div>
        <div>
          <button onclick="getQuizAnswer(this)" class="button-layout bg-blue-500 hover:bg-blue-700">Paris</button>
        </div>
        <div>
          <button onclick="getQuizAnswer(this)" class="button-layout bg-yellow-500 hover:bg-yellow-700">Rome</button>
        </div>
      </div>
      <div class="mx-auto w-full">
        <button onclick="submitAnswer()"class="float-right  mt-5 rounded-2xl bg-blue-400 transition-colors duration-200 hover:bg-blue-600 px-4 py-2 font-bold text-white">Nakijken</button>
      </div>
    </div>
  </body>
</html>


{{-- Quiz layout CSS --}}

<style>
  .button-layout {
    @apply w-full py-3 rounded-lg transition-colors duration-200;
  }
</style>



</html>
