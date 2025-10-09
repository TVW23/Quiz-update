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

<div class="mx-auto h-auto w-full bg-gray-100 pt-15">
  <div class="flex items-end justify-center space-x-4">
    <!-- 2nd Place -->
    <div class="flex flex-col items-center">
      <img
        class="mb-2 rounded-full border-4 border-gray-300"
        width="60"
        height="60"
        src="https://static.vecteezy.com/system/resources/previews/004/511/281/original/default-avatar-photo-placeholder-profile-picture-vector.jpg"
        alt="2nd place"
      />
      <div class="flex h-auto w-full items-start justify-center bg-gray-700 p-5">
        <div class="mb-10 space-y-2 bg-white px-5 py-2 text-center text-gray-700">
          <p class="text-xl font-bold">Anna</p>
          <p>3204 pts</p>
        </div>
      </div>
    </div>

    <!-- 1st Place -->
    <div class="flex flex-col items-center">
      <img
        class="mb-2 rounded-full border-4 border-yellow-400"
        width="70"
        height="70"
        src="https://static.vecteezy.com/system/resources/previews/004/511/281/original/default-avatar-photo-placeholder-profile-picture-vector.jpg"
        alt="1st place"
      />
      <div class="flex h-auto w-full items-start justify-center bg-yellow-500 p-5">
        <div class="mb-20 space-y-2 bg-white px-5 py-2 text-center text-gray-700">
          <p class="text-xl font-bold">John</p>
          <p>4200 pts</p>
        </div>
      </div>
    </div>

    <!-- 3rd Place -->
    <div class="flex flex-col items-center">
      <img
        class="mb-2 rounded-full border-4 border-amber-700"
        width="55"
        height="55"
        src="https://static.vecteezy.com/system/resources/previews/004/511/281/original/default-avatar-photo-placeholder-profile-picture-vector.jpg"
        alt="3rd place"
      />
      <div class="flex h-auto w-full items-start justify-center bg-amber-700 p-5">
        <div class="mb-5 space-y-2 bg-white px-5 py-2 text-center text-gray-700">
          <p class="text-xl font-bold">Liam</p>
          <p>2800 pts</p>
        </div>
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