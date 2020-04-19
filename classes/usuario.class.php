<?php
class Usuarios {

    public function cadastrar($nome, $email, $senha, $telefone){
        global $pdo;
        $sql = $pdo->prepare("SELECT id FROM usuarios WHERE email = :email");
        $sql->bindValue(':email', $email);
        $sql->execute();

        if ($sql->rowCount() == 0){
            $sql = $pdo->prepare("INSERT INTO usuarios SET nome = :nome, email = :email, senha = :senha, telefone = :telefone");
            $sql->bindValue(":nome", $nome);
            $sql->bindValue(":email", $email);
            $sql->bindValue(":senha", md5($senha));
            $sql->bindValue(":telefone", $telefone);
            $sql->execute();

            return true;
        } else {
            return null;
        }

    }
    
    public function login($email, $senha){
        global $pdo;
        $sql = $pdo->prepare("SELECT id FROM usuarios WHERE (email = :email && senha = :senha)");
        $sql->bindValue(":email", $email);
        $sql->bindValue(":senha", md5($senha));
        $sql->execute();

        if ($sql->rowCount() > 0){
            $dado = $sql->fetch();
            $_SESSION['cLogin'] = $dado['id'];
            return true;
        }
        else {
            return false;
        }
    }

    public function getTotalUsuarios(){
        global $pdo;

        $sql = $pdo->query('SELECT COUNT(*) AS quantidade FROM usuarios');
        $row = $sql->fetch();

        return $row['quantidade'];
    }

}

?>