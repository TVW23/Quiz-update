<x-app-layout>
    <script>
      function closeAlert() {
        const alertBox = document.querySelector('.alert-box');
        if (alertBox) {
          alertBox.classList.add('opacity-0');
          setTimeout(() => alertBox.remove(), 1000);
        }
      }
      setTimeout(closeAlert, 4000);
    </script>

    @if(session('success'))
      <div class="mt-6 inset-0 flex items-center justify-center px-10">
        <div class="alert-box w-full max-w-[400px] relative bg-green-100 border border-green-600 text-green-800 rounded-[10px] p-6 shadow-lg animate-fade-in transition-opacity duration-1000">
          <h1 class="w-full text-center">Welkom {{ Auth::user()->name }}, je bent ingelogd!</h1>
          <!-- Sluitknop direct -->
          <button class="absolute top-2 right-2 text-green-800 hover:text-green-600" onclick="this.parentElement.parentElement.remove()">×</button>
        </div>
      </div>
    @endif

    <div class="mx-auto max-w-4xl p-10">
      <div class="grid grid-cols-1 gap-5 p-30 sm:grid-cols-2 md:grid-cols-3">
        @php
          $colors = ['bg-[#CCD626]', 'bg-[#39B9EC]', 'bg-[#F2B300]', 'bg-[#E72B76]'];
        @endphp
      
        @foreach ($quizzes as $quiz)
          @php
            $randomColor = $colors[$loop->index % count($colors)];
          @endphp
          <div class="c w-full rounded-md {{ $randomColor }} hover:brightness-90 transition duration-300">
            <a href="/quiz/{{$quiz->id}}">
              <img class="w-full rounded-br-[20%]" src="https://tse2.mm.bing.net/th/id/OIP.uoX2AmMdsM3cON2eNjG05gHaEK?rs=1&pid=ImgDetMain&o=7&rm=3" alt="" />
              <div class="space-y-5 px-4 pt-5 pb-10">
                <h3 class="text-2xl font-bold text-white">{{$quiz->name}}</h3>
                <h4 class="text-md font-bold text-white">{{$quiz->subcategory}}</h4>
              </div>
            </a>
          </div>
        @endforeach

      </div>
    </div>
</x-app-layout>