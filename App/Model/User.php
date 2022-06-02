<?php

namespace App\Model;

use MF\Model;
use PDOException;

class User extends Model
{
    private $id;
    private $username;
    private $email;
    private $pass;

    public function __set($atr, $value)
    {
        $this->$atr = $value;
        return $this;
    }

    public function __get($atr)
    {
        return $this->$atr;
    }

    public function delete()
    {
        if ($this->auth()) {
            $query = 'delete from tb_user where id = ?';
            try {
                $stmt = $this->db->prepare($query);
                $stmt->bindValue(1, $this->__get('id'));

                $stmt->execute();

                return True;
            } catch (PDOException $e) {
                echo $e->getMessage();

                return false;
            }
        }else {
            return false;
        }
    }

    public function getUserByEmail(){
        $query = 'select email from tb_user where email=?';

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(1, $this->__get('email'));

        $stmt->execute();

        return $stmt->fetch(\PDO::FETCH_OBJ);
    }

    public function getUserId($email){
        $query = 'select id from tb_user where email=?';

        $stmt = $this->db->prepare($query);

        $stmt->bindValue(1, $this->__get('email'));

        $stmt->execute();

        return $stmt->fetch(\PDO::FETCH_OBJ)->id;
    }

    public function save(){

        if ($this->getUserByEmail()) return false;

        $query = 'insert into tb_user 
        (username, email, password)
        values
        (?, ?, ?)';

        try {

            $stmt = $this->db->prepare($query);
            $stmt->bindValue(1, $this->__get('username'));
            $stmt->bindValue(2, $this->__get('email'));
            $stmt->bindValue(3, $this->__get('pass'));

            $stmt->execute();

            $query = 'insert into tb_wallet (money, fk_user) 
            values
            (?, ?);';

            $id = $this->getUserId($this->__get('email'));

            $stmt = $this->db->prepare($query);
            $stmt->bindValue(1, 0.00);
            $stmt->bindValue(2, $id);

            $stmt->execute();

            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function update(){

        $query = 'update tb_user set username = ?, email = ? where id = ? ';

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(1,$this->__get('username'));
        $stmt->bindValue(2,$this->__get('email'));
        $stmt->bindValue(3,$this->__get('id'));

        $stmt->execute();

        return $stmt->rowCount();
        
    }

    public function auth()
    {
        $query = 'select u.id, email, username, w.money from tb_user as u inner join tb_wallet as w on (u.id = w.fk_user) where email=? and password=?';

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(1, $this->__get('email'));
        $stmt->bindValue(2, $this->__get('pass'));

        $stmt->execute();

        $user = $stmt->fetch(\PDO::FETCH_OBJ);

        return $user;
    }
}
