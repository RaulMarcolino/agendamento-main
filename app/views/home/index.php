<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <title>Agendamento</title>
</head>
<body class="bg-amber-50 text-white w-full h-full">
<div class="flex flex-col items-center justify-center bg-amber-50 rounded mt-32 p-8">
    <div class="w-full max-w-4xl mx-auto p-8 grid grid-cols-1 md:grid-cols-2 gap-8">
      <div class="flex flex-col justify-center items-center md:items-start text-center md:text-left">
        <h1 class="text-4xl font-bold text-gray-800 mb-4">Agendamentos</h1>
        <p class="text-lg text-gray-600">Faça aqui o seu agendamento de equipamentos e ambientes!</p>
      </div>
      <div class="flex flex-col justify-center items-center">
        <a href="/login"
        class="bg-black text-white font-semibold text-lg py-2 px-4 rounded-full hover:bg-slate-600 w-48 text-center mb-4">
        Fazer Login
      </a>
      <span class="mb-4 text-black">ou</span>
      <a href="/register"
      class="bg-white border border-blue-500 text-blue-500 font-semibold text-lg py-2 px-4 rounded-full hover:bg-blue-50 w-48 text-center">
      Cadastrar-se
    </a>
    </div>
  </div>
</div>
</body>

</html>