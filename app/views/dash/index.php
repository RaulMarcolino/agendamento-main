<?php
include('../../../config/config.php');

session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.1/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-amber-50">

    <div class="container mx-auto py-10">
        <div class="bg-amber-50 shadow-md rounded p-6">
            <h2 class="text-2xl font-bold mb-4">Bem-vindo, <?php echo $_SESSION['username']; ?>!</h2>
            <a href="logout.php" class="text-blue-500 hover:underline">Sair</a>
            
            <!-- Formulário de Novo Agendamento -->
            <h3 class="text-xl font-semibold mt-6">Novo Agendamento</h3>
            <form action="/dashboard/salvar" method="POST" class="mt-4 bg-amber-50 p-4 rounded shadow">
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="data">
                        Data
                    </label>
                    <input type="date" id="data" name="data" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="hora">
                        Hora
                    </label>
                    <input type="time" id="hora" name="hora" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="descricao">
                        Descrição
                    </label>
                    <textarea id="descricao" name="descricao" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
                </div>
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Salvar Agendamento
                </button>
            </form>

            <!-- Lista de Agendamentos Existentes -->
            <h3 class="text-xl font-semibold mt-6">Todos os Agendamentos</h3>
            <div class="container mx-auto p-4">
        <div class="bg-white shadow-md rounded p-4">
            <table class="table-auto w-full">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="px-4 py-2 text-left">ID</th>
                        <th class="px-4 py-2 text-left">Nome</th>
                        <th class="px-4 py-2 text-left">Data</th>
                        <th class="px-4 py-2 text-left">Hora</th>
                        <th class="px-4 py-2 text-left">Descrição</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM agendamentos";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "
                            <tr class='border-b'>
                                <td class='px-4 py-2'>{$row['id']}</td>
                                <td class='px-4 py-2'>{$row['nome']}</td>
                                <td class='px-4 py-2'>{$row['data_agendamento']}</td>
                                <td class='px-4 py-2'>{$row['hora_agendamento']}</td>
                                <td class='px-4 py-2'>{$row['descricao']}</td>
                            </tr>
                            ";
                        }
                    } else {
                        echo "<tr><td colspan='5' class='text-center py-4'>Nenhum agendamento encontrado</td></tr>";
                    }

                    $conn->close();
                    ?>
                </tbody>
            </table>
                </tbody>
            </table>
        </div>
    </div>
        </div>
    </div>

</body>
</html>