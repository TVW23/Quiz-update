<x-app-layout>
  {{-- <div class="h-100 w-full bg-gray-400"></div> --}}
  <!-- <div class="test"></div> -->
  <!-- <div class="test3"></div> -->
  <!-- <div class="square mb-6">
    <div class="ellipse"></div>
  </div> -->

  {{-- <div class="relative overflow-hidden">
    <div class="absolute inset-0 square"></div>
    <div class="ellipse **:absolute left-1/2bg-blue-500"></div>
  </div> --}}

  <div class="w-full h-auto mx-auto bg-gray-100 pt-15">
    <div class="flex justify-center items-end space-x-4">
      <!-- 2nd Place -->
      <div class="flex flex-col items-center">
        <img class="rounded-full mb-2 border-4 border-gray-300" width="60" height="60" src="https://static.vecteezy.com/system/resources/previews/004/511/281/original/default-avatar-photo-placeholder-profile-picture-vector.jpg" alt="2nd place" />
        <div class="bg-gray-700 w-20 h-32 flex items-center justify-center text-white text-xl font-bold">
          <p class="mt-2 font-semibold">3204 pts</p>
        </div>
        {{-- <p class="mt-2 font-semibold">3204 pts</p> --}}
      </div>

      <!-- 1st Place -->
      <div class="flex flex-col items-center">
        <img class="rounded-full mb-2 border-4 border-yellow-400" width="70" height="70" src="https://static.vecteezy.com/system/resources/previews/004/511/281/original/default-avatar-photo-placeholder-profile-picture-vector.jpg" alt="1st place" />
        <div class="bg-yellow-500 w-20 h-44 flex items-center justify-center text-white text-2xl font-bold">
          <p class="mt-2 font-semibold">4200 pts</p>
        </div>
        {{-- <p class="mt-2 font-semibold">4200 pts</p> --}}
      </div>

      <!-- 3rd Place -->
      <div class="flex flex-col items-center">
        <img class="rounded-full mb-2 border-4 border-amber-700" width="55" height="55" src="https://static.vecteezy.com/system/resources/previews/004/511/281/original/default-avatar-photo-placeholder-profile-picture-vector.jpg" alt="3rd place" />
        <div class="bg-amber-700 w-20 h-24 flex items-center justify-center text-white text-xl font-bold">
          <p class="mt-2 font-semibold">2800 pts</p>
        </div>
      </div>
    </div>
  </div>

  <div class="mx-auto mt-5 max-w-4xl p-20">
    @foreach($userQuizPoints as $index => $quizPoint)
    <div class="flex items-center justify-between rounded-lg bg-red-500 px-5 py-5 font-bold text-white mb-6">
      <div class="flex items-center space-x-5">
        <p>{{ $index+1 }}</p>
        <img class="rounded-full" width="50" height="50" src="https://static.vecteezy.com/system/resources/previews/004/511/281/original/default-avatar-photo-placeholder-profile-picture-vector.jpg" alt="" />
        <p>{{ $quizPoint->user->name }}</p>
      </div>
      <p class="text-lg">{{ $quizPoint->points }}</p>
    </div>
    @endforeach
  </div>
</x-app-layout>

<style>
    /* .test {
  color: white;
  padding: 60px;
  background: blue;
  clip-path: polygon(0 0, 100% 0, 100% 100%,  52% 75%, 0 100%);
}

.ellipse {
  color: white;
  padding: 60px;
  background: white;
  clip-path: ellipse(50% 30% at 50% 49%);
}

.test2 {
  color: white;
  padding: 60px;
  background: blue;
  clip-path: polygon(75% 0%, 100% 50%, 75% 100%, 0% 100%, 25% 50%, 0% 0%);
}

.test3 {
  color: white;
  padding: 60px;
  background: blue;
  clip-path: polygon(0% 0%, 100% 0%, 100% 100%, 50% 75%, 0% 100%);
} */

 .pt-15 {
  padding-top: 4rem;
 }
</style>