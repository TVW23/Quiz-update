<x-app-layout>

</x-app-layout>
<!doctype html>
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

<style>
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
}
</style>