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
  <body>
    <div class="flex h-screen items-center justify-center">
      <div class="flex flex-col items-center">
        <p class="mb-5 flex h-40 w-40 items-center justify-center rounded-full bg-gray-200 text-3xl font-bold">3204</p>
        <div>
          <button class="ts-button-layout bg-gray-300 hover:bg-gray-500">Stoppen</button>
          <button class="ts-button-layout bg-gray-300 hover:bg-gray-500">Doorgaan</button>
        </div>
      </div>
    </div>
  </body>
</html>

<style>
    .ts-button-layout {
    @apply rounded-md px-4 py-2 transition-colors duration-200;
    }

    .body {
    background-color: blue;
    }
</style>