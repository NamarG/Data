<?php 
    // class to connect 
    class crud{
        // private class object of database
        private $db;


        function __construct($conn)
        {
            // connection params to connect class object to db
            $this->db = $conn;
        }


        public function register($firstname, $lastname, $dob, $email, $phone, $speciality){
            try {
                //code...
                $sql = "INSERT INTO attendees (firstname,lastname,dateofbirth,email,phone,speciality_id) VALUES (:firstname,:lastname,:dob,:email,:phone,:speciality)";
                $statement = $this->db->prepare($sql);
                
                
                $statement->bindparam(':firstname', $firstname);
                $statement->bindparam(':lastname', $lastname);
                $statement->bindparam(':dob', $dob);
                $statement->bindparam(':email', $email);
                $statement->bindparam(':phone', $phone);
                $statement->bindparam(':speciality', $speciality);

                $statement->execute();
                return true;



            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;


            }
        }


        public function getattendees(){
            try{
                $sql = "SELECT * FROM attendees a inner join specialities b on a.speciality_id = b.speciality_id";
                $result = $this->db->query($sql);
                return $result;

            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;


            }
        }


        public function getattendeesdetails($id){
            try{
                $sql = "SELECT * FROM attendees a inner join specialities b on a.speciality_id = b.speciality_id WHERE attendee_id=:id ";
                $statement = $this->db->prepare($sql);

                $statement->bindparam(':id',$id);
                $statement->execute();

                $result=$statement->fetch();
                return $result;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }


        public function getspecialities(){
            try{
                $sql = "SELECT * FROM specialities";
                $result = $this->db->query($sql);
                return $result;

            }catch (PDOException $e) {
                echo $e->getMessage();
                return false;


            }
        }


        public function getSpecialityByID($id){
            try{
            $sql = "SELECT * FROM specialities WHERE speciality_id = :ID";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(":ID",$id);
            $stmt->execute();
            $result = $stmt->fetch();
            return $result;
            
            }catch(PDOException $e){
                echo $e->getMessage();
                return false;
            }

        }


        public function update($id,$firstname, $lastname, $dob, $email, $phone, $speciality){
            
            try{
                $sql = "UPDATE attendees SET firstname =:fn, lastname =:ln, dateofbirth =:dob, email =:email, phone =:phone, speciality_id =:speciality_id WHERE attendee_id = :id";
                $statement = $this->db->prepare($sql);
                $statement->bindparam(':id',$id);
                $statement->bindparam(':fn',$firstname);
                $statement->bindparam(':ln',$lastname);
                $statement->bindparam(':dob',$dob);
                $statement->bindparam(':email',$email);
                $statement->bindparam(':phone',$phone);
                $statement->bindparam(':speciality_id',$speciality);

                $statement->execute();
                return true;

            }catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function deleteattendee($id){
            try{
            $sql = "DELETE from attendees WHERE attendee_id = :id";
            $statement = $this->db->prepare($sql);
            
            $statement->bindparam(':id',$id);

            $statement->execute();

            return true;
        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
        }
        
    }
