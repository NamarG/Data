<?php

    class user{
        private $db;
        function __construct($connection)
        {
            $this->db = $connection;
        }

        public function Insertuser($username, $password){
            // define statement for sql
            try{
                $newPassword = md5($password.$username);
                $result = $this->getUserByUsername($username);
                if($result["num"]< 0){
                    $sql = "INSERT INTO users (username, password) VALUES (:username,:password)";

                    // prepare statement on database
                    $stmt = $this->db->prepare($sql);

                    // bind params
                    $stmt->bindparam(":username",$username);
                    $stmt->bindparam(":password",$newPassword);

                    // ececute statement
                    $stmt->execute();

                    return true;
                }else{
                    return false;

                }

            } catch (PDOException $e){
                echo $e->getMessage();
                return false;
            }
        }
        public function Getuser($username, $password){
            try{
                $sql = "SELECT * FROM users WHERE username = :username AND password = :password";
                $stmt = $this->db->prepare($sql);

                $stmt->bindparam(":username",$username);
                $stmt->bindparam(":password",$password);

                $stmt->execute();
                $result = $stmt->fetch();
                return $result;
            }catch(PDOException $e){
                echo $e->getMessage();
                return false;
            }
        }

        public function getUserByUsername($username){
            try{
            $sql = "SELECT COUNT(*) as num FROM users WHERE username = :username";
            $stmt = $this->db->prepare($sql);

            $stmt->bindparam(":username", $username);
            $stmt->execute();
            $result = $stmt->fetch();
            return $result;

            } catch(PDOException $e){
                echo $e->getMessage();
                return false;
            }

        }

    }

?>