{{-- Leaderboard layout --}}

{{-- <!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
  </head>
  <body class="">
    <div class="h-100 w-full bg-gray-400"></div>
    <!-- <div class="test"></div> -->
    <!-- <div class="test3"></div> -->
    <!-- <div class="square mb-6">
      <div class="ellipse"></div>
    </div> -->

    <div class="relative overflow-hidden">
      <div class="absolute inset-0 square"></div>
      <div class="ellipse **:absolute left-1/2bg-blue-500"></div>
    </div>
    

    <div class="mx-auto mt-10 max-w-4xl p-20">
      <div class="flex items-center justify-between rounded-lg bg-red-500 px-5 py-5 font-bold text-white">
        <div class="flex items-center space-x-5">
          <p>4</p>
          <img class="rounded-full" width="50" height="50" src="https://static.vecteezy.com/system/resources/previews/004/511/281/original/default-avatar-photo-placeholder-profile-picture-vector.jpg" alt="" />
          <p>Anna</p>
        </div>
        <p class="text-lg">23</p>
      </div>
    </div>
  </body>
</html>

<div class="mx-auto mt-10 max-w-3xl">
  <div class="rounded-2xl bg-white p-6 shadow-lg">
    <h1 class="mb-6 text-center text-2xl font-bold">🏆 Leaderboard</h1>

    <div class="space-y-4">
      <div class="flex items-center justify-between rounded-xl border-l-4 border-yellow-400 bg-yellow-100 p-4">
        <div class="flex items-center space-x-4">
          <span class="w-6 text-center text-lg font-bold">1</span>
          <img src="https://i.pravatar.cc/40?u=alice" alt="avatar" class="h-10 w-10 rounded-full" />
          <span class="font-medium">Alice</span>
        </div>
        <span class="text-lg font-semibold">1200</span>
      </div>

      <div class="flex items-center justify-between rounded-xl border-l-4 border-gray-400 bg-gray-100 p-4">
        <div class="flex items-center space-x-4">
          <span class="w-6 text-center text-lg font-bold">2</span>
          <img src="https://i.pravatar.cc/40?u=bob" alt="avatar" class="h-10 w-10 rounded-full" />
          <span class="font-medium">Bob</span>
        </div>
        <span class="text-lg font-semibold">1100</span>
      </div>

      <div class="flex items-center justify-between rounded-xl border-l-4 border-orange-400 bg-orange-100 p-4">
        <div class="flex items-center space-x-4">
          <span class="w-6 text-center text-lg font-bold">3</span>
          <img src="https://i.pravatar.cc/40?u=charlie" alt="avatar" class="h-10 w-10 rounded-full" />
          <span class="font-medium">Charlie</span>
        </div>
        <span class="text-lg font-semibold">950</span>
      </div>

      <div class="flex items-center justify-between rounded-xl border bg-slate-50 p-4">
        <div class="flex items-center space-x-4">
          <span class="w-6 text-center text-lg font-bold">4</span>
          <img src="https://i.pravatar.cc/40?u=david" alt="avatar" class="h-10 w-10 rounded-full" />
          <span class="font-medium">David</span>
        </div>
        <span class="text-lg font-semibold">800</span>
      </div>
    </div>
  </div>
</div>


Leaderboard CSS

.test {
  color: white;
  padding: 60px;
  background: blue;
  clip-path: polygon(0 0, 100% 0, 100% 100%,  52% 75%, 0 100%);
}

.square {
  color: white;
  padding: 60px;
  background: blue;
  clip-path: polygon(
    0% 0%,
    /* top-left */ 100% 0%,
    /* top-right */ 100% 100%,
    /* bottom-right */ 0% 100% /* bottom-left */
  );
}

.top-3-pillar {
  padding: 60px;
  background: black;
  clip-path: polygon(14% 0, 50% 0, 50% 100%, 14% 100%);
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
} --}}


{{-- Tussenscherm --}}

{{-- <!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
  </head>
  <body>
    <div class="flex h-screen items-center justify-center">
      <div class="flex flex-col items-center">
        <p class="mb-5 rounded-full bg-gray-200 p-10 text-2xl font-bold">3204</p>
        <div>
          <button class="ts-button-layout bg-gray-300 hover:bg-gray-500">Stoppen</button>
          <button class="ts-button-layout bg-gray-300 hover:bg-gray-500">Doorgaan</button>
        </div>
      </div>
    </div>
  </body>
</html> --}}

{{-- Tussenscherm CSS --}}
{{-- .ts-button-layout {
  @apply rounded-md px-4 py-2 transition-colors duration-200;
} --}}

{{-- Quiz overzicht
<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
  </head>
  <body>
    <header class="bg-blue-600 p-4 text-white">
      <div class="mx-auto flex max-w-6xl items-center justify-between">
        <h1 class="text-lg font-bold">My Website</h1>
        <nav class="space-x-4">
          <a href="#" class="hover:underline">Home</a>
          <a href="#" class="hover:underline">About</a>
          <a href="#" class="hover:underline">Contact</a>
        </nav>
      </div>
    </header>
    <div class="mx-auto max-w-4xl p-10">
      <div class="grid grid-cols-1 gap-5 p-30 sm:grid-cols-2 md:grid-cols-3">
        <div class="c w-full rounded-md bg-gray-400">
          <img class="w-full rounded-md" src="https://tse2.mm.bing.net/th/id/OIP.uoX2AmMdsM3cON2eNjG05gHaEK?rs=1&pid=ImgDetMain&o=7&rm=3" alt="" />
          <div class="space-y-5 px-4 pt-5 pb-10">
            <h3 class="text-2xl font-bold text-white">Titel quiz</h3>
            <h4 class="text-md font-bold text-white">Sub-onderwerp</h4>
          </div>
        </div>
        <div class="c w-full rounded-md bg-gray-400">
          <img class="w-full rounded-md" src="https://tse2.mm.bing.net/th/id/OIP.uoX2AmMdsM3cON2eNjG05gHaEK?rs=1&pid=ImgDetMain&o=7&rm=3" alt="" />
          <div class="space-y-5 px-4 pt-5 pb-10">
            <h3 class="text-2xl font-bold text-white">Titel quiz</h3>
            <h4 class="text-md font-bold text-white">Sub-onderwerp</h4>
          </div>
        </div>
        <div class="c w-full rounded-md bg-gray-400">
          <img class="w-full rounded-md" src="https://tse2.mm.bing.net/th/id/OIP.uoX2AmMdsM3cON2eNjG05gHaEK?rs=1&pid=ImgDetMain&o=7&rm=3" alt="" />
          <div class="space-y-5 px-4 pt-5 pb-10">
            <h3 class="text-2xl font-bold text-white">Titel quiz</h3>
            <h4 class="text-md font-bold text-white">Sub-onderwerp</h4>
          </div>
        </div>
        <div class="c w-full rounded-md bg-gray-400">
          <img class="w-full rounded-md" src="https://tse2.mm.bing.net/th/id/OIP.uoX2AmMdsM3cON2eNjG05gHaEK?rs=1&pid=ImgDetMain&o=7&rm=3" alt="" />
          <div class="space-y-5 px-4 pt-5 pb-10">
            <h3 class="text-2xl font-bold text-white">Titel quiz</h3>
            <h4 class="text-md font-bold text-white">Sub-onderwerp</h4>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
--}}