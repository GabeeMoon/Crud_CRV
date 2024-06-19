<?php
include 'config.php';

$id = $_GET['id'];
$sql = "SELECT * FROM contatos WHERE id=$id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Editar Contato</title>
    <link rel="stylesheet" type="text/css" href="assets/style.css">
    <script src="assets/validate.js"></script>
</head>
<body>
    <div class="container">
        <header>
            <img src="assets/logo.jpg" alt="Logo" class="logo">
            <h1>Editar Contato</h1>
        </header>
        <div class="form-container">
            <form action="process.php" method="post" onsubmit="return validateForm();" class="form">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" value="<?php echo $row['nome']; ?>" required><br>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="<?php echo $row['email']; ?>" required><br>
                <label for="telefone">Telefone:</label>
                <input type="text" id="telefone" name="telefone" value="<?php echo $row['telefone']; ?>" required><br>
                <input type="submit" value="Atualizar">
            </form>
        </div>
    </div>
</body>
</html>
