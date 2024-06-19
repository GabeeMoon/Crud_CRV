<?php
include 'config.php';

$sql = "SELECT * FROM contatos";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Agenda</title>
    <link rel="stylesheet" type="text/css" href="assets/style.css">
    <script src="assets/validate.js"></script>
</head>

<body>
    <div class="container">
        <header>
            <img src="assets/logo.jpg" alt="Logo" class="logo">
            <h1>Agenda</h1>
        </header>
        <nav>
            <button class="tablink" onclick="openTab(event, 'formTab')">Adicionar Novo Contato</button>
            <button class="tablink" onclick="openTab(event, 'recordsTab')">Registros</button>
        </nav>

        <div id="formTab" class="tabcontent">
            <h2>Adicionar Contato</h2>
            <form action="process.php" method="post" class="form" onsubmit="return validateForm();">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" required><br>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required><br>
                <label for="telefone">Telefone:</label>
                <input type="text" id="telefone" name="telefone" required><br>
                <input type="submit" value="Adicionar">
            </form>
        </div>

        <div id="recordsTab" class="tabcontent">
            <table>
                <tr>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Telefone</th>
                    <th>Ações</th>
                </tr>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>" . $row['nome'] . "</td>
                                <td>" . $row['email'] . "</td>
                                <td>" . $row['telefone'] . "</td>
                                <td>
                                    <a href='edit.php?id=" . $row['id'] . "'>Editar</a> |
                                    <a href='delete.php?id=" . $row['id'] . "' onclick='return confirm(\"Tem certeza?\");'>Deletar</a>
                                </td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>Nenhum contato encontrado</td></tr>";
                }
                ?>
            </table>
        </div>
    </div>

    <script>
        function openTab(evt, tabName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablink");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(tabName).style.display = "block";
            evt.currentTarget.className += " active";
        }

        // Abre a aba de registros por padrão
        document.getElementById("recordsTab").style.display = "block";
    </script>
</body>

</html>
