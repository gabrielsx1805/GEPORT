<?php
session_start();

if (isset($_SESSION['matricula_usuario'])) {
    require_once '../conexao/conexao.php';

    $matricula_usuario = $_SESSION['matricula_usuario'];

    // Consulta para obter os dados do usuário
    $query = "SELECT * FROM usuario WHERE matricula_usuario = :matricula_usuario";
    $pdoResult = $conexao->prepare($query);
    $pdoResult->execute(array(":matricula_usuario" => $matricula_usuario));
    $dadosDoUsuario = $pdoResult->fetch(PDO::FETCH_ASSOC);

    if ($dadosDoUsuario) {
        // Preencha as variáveis com os dados do usuário
        $nome_usuario = $dadosDoUsuario['nome_usuario'];
        $cpf = intval($dadosDoUsuario['cpf']);
        $sexo = $dadosDoUsuario['sexo'];
        $telefone = $dadosDoUsuario['telefone'];
        $endereco = $dadosDoUsuario['endereco'];
        $uf = $dadosDoUsuario['uf'];
        $cidade = $dadosDoUsuario['cidade'];
        $data_nascimento = $dadosDoUsuario['data_nascimento'];
        $email = $dadosDoUsuario['email'];
        $senha = $dadosDoUsuario['senha'];
    } else {
        echo 'Erro ao recuperar os dados do usuário.';
        exit;
    }
} else {
    echo 'Você não está logado ou não tem permissão para acessar esta página.';
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="atualizar.css">
    <title>Atualização de Cadastro
    </title>
</head>
<body>
    <div class="conteudo-1">
        <div class="cadastro">
            <div class="itens-form">
                <form action="atualizar_dados.php" method="post">
                    <h1>ATUALIZAR CADASTRO</h1>
                    <div class="input-2">
                        <input type="text"
                        class="inputS" required name="nome_usuario" value="<?php echo $nome_usuario;?>">
                        <i class='bx bx-user'></i>
                        <label for="nome">Nome</label>
                    </div>
                    <div class="input-2">
                        <input type="number"
                        class="inputS" id="cpf" required name="cpf" value="<?php echo $cpf; ?>">
                        <i class='bx bx-user'></i>
                        <label for="cpf">CPF</label>
                    </div>
                    <div class="input-2"  class="selecao">
                        <label for="sexo" >Selecione o Sexo</label>
                        <select id="sexo" name="sexo" required class="input-4">
                            <option value="<?php echo $sexo;?>"><?php echo $sexo;?></option>
                            <option value="Masculino" class="op">Masculino</option>
                            <option value="Feminino" class="op">Feminino</option>
                            <option value="Outro" class="op">Outro</option>
                        </select>
                    </div>
                    <div class="input-2" class="selecao">
                        <label for="Cursos">Selecione o Curso</label>
                        <select id="Cursos" name="Cursos" required class="input-4">
                            <option value="" class="op"></option>
                            <option value="Administração" class="op">Administração</option>
                            <option value="Direito" class="op">Direito</option>
                            <option value="Enfermagem" class="op">Enfermagem</option>
                            <option value="Estética e Coméstica" class="op">Estética e Coméstica</option>
                            <option value="Fisioterapia" class="op">Fisioterapia</option>
                            <option value="Gastronomia" class="op">Gastronomia</option>
                            <option value="Gestão de RH" class="op">Gestão de RH</option>
                            <option value="Logística" class="op">Logística</option>
                            <option value="Nutrição" class="op">Nutrição</option>
                            <option value="Sistemas de Informação" class="op">Sistemas de Informação</option>
                        </select>
                    </div>
                    <div class="input-2">
                        <input type="tel"
                        class="inputS" required name="telefone" value="<?php echo $telefone;?>">
                        <i class='bx bx-user'></i>
                        <label for="telefone">Telefone</label>
                    </div>
                    <div class="input-2">
                        <input type="text"
                        class="inputS" required name="endereco" value="<?php echo $endereco;?>">
                        <i class='bx bx-user'></i>
                        <label for="endereco">Endereço</label>
                    </div>
                    <div class="input-2">
                        <input type="text"
                        class="inputS" required name="uf" value="<?php echo $uf;?>">
                        <i class='bx bx-user'></i>
                        <label for="uf">UF</label>
                    </div>
                    <div class="input-2">
                        <input type="text"
                        class="inputS" required name="cidade" value="<?php echo $cidade;?>">
                        <i class='bx bx-user'></i>
                        <label for="cidade">Cidade</label>
                    </div>
                    <div class="input-2">
                        <input type="date"
                        class="inputS" required name="data_nascimento" value="<?php echo $data_nascimento;?>">
                        <i class='bx bx-user'></i>
                        <label for="data_nascimento"></label>
                    </div>
                    <div class="input-2">
                        <input type="email"
                        class="inputS" required name="email" value="<?php echo $email;?>">
                        <i class='bx bx-user'></i>
                        <label for="email">E-mail</label>
                    </div>
                    <div class="input-2">
                        <input type="password"
                        class="inputS" required name="senha" value="<?php echo $senha;?>">
                        <i class='bx bx-user'></i>
                        <label for="senha">Senha</label>
                    </div>
                    <div class="input-2">
                        <input type="submit"
                        name="update" required placeholder="Update Data">
                        <i class='bx bx-user'></i>
                    </div>
                </form>
            </div>
        </div>
</body>
</html>
