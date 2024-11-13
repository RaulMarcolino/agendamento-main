<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include('conexao.php');
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
        <div class="bg-white shadow-md rounded p-6">
            <h2 class="text-2xl font-bold mb-4">Bem-vindo, <?php echo $_SESSION['username']; ?>!</h2>
            <a href="logout.php" class="text-blue-500 hover:underline">Sair</a>
            
            <!-- Formulário de Novo Agendamento -->
            <h3 class="text-xl font-semibold mt-6">Novo Agendamento</h3>
            <form action="app/controllers/salvar_agendamento.php" method="POST" class="mt-4 bg-gray-50 p-4 rounded shadow">
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
            <h3 class="text-xl font-semibold mt-6">Seus Agendamentos</h3>
            <div class="mt-4">
                <?php
                $sql = "SELECT * FROM agendamentos WHERE username='{$_SESSION['username']}'";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    echo "<table class='min-w-full bg-white'>";
                    echo "<thead><tr><th class='py-2 px-4'>Data</th><th class='py-2 px-4'>Hora</th><th class='py-2 px-4'>Descrição</th></tr></thead>";
                    echo "<tbody>";
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr><td class='border px-4 py-2'>" . $row['data'] . "</td><td class='border px-4 py-2'>" . $row['hora'] . "</td><td class='border px-4 py-2'>" . $row['descricao'] . "</td></tr>";
                    }
                    echo "</tbody></table>";
                } else {
                    echo "<p>Você não tem agendamentos.</p>";
                }
                ?>
            </div>
        </div>
    </div>

</body>
</html>