<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <title>Registro</title>
</head>

<body class="bg-amber-50 text-black flex items-center justify-center min-h-screen">
  <div class="bg-amber-100 p-8 rounded-lg shadow-md w-full max-w-sm">
    <h2 class="text-2xl font-semibold text-center text-black mb-6">Registrar-se</h2>
    <form action="/register" method="POST">
      <div class="mb-4">
        <label for="name" class="block text-sm font-medium text-black">Nome</label>
        <input type="text" id="name" name="name" required
          class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
      </div>
      <div class="mb-4">
        <label for="email" class="block text-sm font-medium text-black">Email</label>
        <input type="text" id="email" name="email" required
          class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
      </div>
      <div class="mb-4">
        <label for="Username" class="block text-sm font-medium text-black">Nome de Usuário</label>
        <input type="text" id="username" name="username" required
          class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
      </div>
      <div class="mb-6">
        <label for="password" class="block text-sm font-medium text-black">Senha</label>
        <input type="password" id="password" name="password" required
          class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
      </div>
      <input type="submit" value="Entrar"
        class="w-full bg-black text-white font-semibold py-2 px-4 rounded-md hover:bg-black focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50">
    </form>
  </div>
</body>

</html>