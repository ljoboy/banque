<?php
/**
 * Created by PhpStorm.
 * User: ITOT
 * Date: 06/09/2018
 * Time: 19:58 PM
 */

class ClientDAO extends Model2
{
    public $num_client, $nom_complet, $adresse, $nationalite, $genre, $phone, $email, $bday;
    private $motdepasse;


    /**
     * @param $num_client
     * @return Client
     */
    public function getClient($num_client)
    {
        $this->q = $this->db->prepare("SELECT * FROM clients WHERE num_client = :num_client");
        $this->q->execute([
            "num_client" => $num_client
        ]);
        return new Client($this->q->num_client, $this->q->nom_complet, $this->q->adresse, $this->q->nationalite,
            $this->q->genre, $this->q->phone, $this->q->email, $this->q->bday, $this->q->motdepasse);
    }

    /**
     * @param $num_client
     * @param $nom_complet
     * @param $adresse
     * @param $nationalite
     * @param $genre
     * @param $phone
     * @param $email
     * @param $bday
     * @param $motdepasse
     * @return bool|string
     */
    public function addClient($nom_complet, $adresse, $nationalite, $genre, $phone, $email, $bday, $motdepasse)
    {
        try{
            $this->q = $this->db->prepare("INSERT INTO 
              clients(nom_complet, adresse, nationalite, genre, phone, email, bday, motdepasse) 
              VALUES(:nom_complet, :adresse, :nationalite, :genre, :phone, :email, :bday, :motdepasse)");
            $this->q->execute([
                "nom_complet" => $nom_complet,
                "adresse" => $adresse,
                "nationalite" => $nationalite,
                "genre" => $genre,
                "phone" => $phone,
                "email" => $email,
                "bday" => $bday,
                "motdepasse" => $motdepasse
            ]);
            $this->d = true;
        }catch (PDOException $e){
            $this->d = $e->getMessage();
        }finally{
            return $this->d;
        }
    }

    /**
     * @return string|array
     */
    public function getAllClient()
    {
        try {
            $this->q = $this->db->prepare("SELECT * FROM clients");
            $this->q->execute();
            $this->d = $this->q->fetchAll();
        } catch (PDOException $e) {
            $this->d = $e->__toString();
        } finally {
            return $this->d;
        }
    }

    /**
     * @param string $name
     * @return string
     */
    public function getClientByName(string $name)
    {
        $name = htmlentities(addslashes($name));
        try {
            $this->q = $this->db->prepare("SELECT * FROM clients WHERE nom_complet LIKE %{$name}%");
            $this->q->execute();
            $this->d = $this->q->fetch();
        } catch (PDOException $e) {
            $this->d = $e->__toString();
        } finally {
            return $this->d;
        }
    }

    public function nbClients()
    {
        try {
            $this->q = $this->db->prepare("SELECT count(*) FROM clients");
            $this->q->execute();
            $this->d = $this->q->fetch(PDO::FETCH_BOTH)[0];
        } catch (PDOException $e) {
            $this->d = $e->__toString();
        } finally {
            return $this->d;
        }
    }

    public function nbDemande()
    {
        try {
            $this->q = $this->db->prepare("SELECT count(*) FROM demande");
            $this->q->execute();
            $this->d = $this->q->fetch(PDO::FETCH_BOTH)[0];
        } catch (PDOException $e) {
            $this->d = $e->__toString();
        } finally {
            return $this->d;
        }
    }

    public function addDemande($num_client, $libelle, $message)
    {
        try {
            $this->q = $this->db->prepare("INSERT INTO demande(num_client, libelle, date_demande, message) 
              VALUES(:num_client, :libelle, now(), :msg)");
            $this->q->execute(["num_client" => $num_client, "libelle" => $libelle, "msg" => $message]);
            $this->d = true;
        } catch (PDOException $e) {
            $this->d = $e->__toString();
        } finally {
            return $this->d;
        }
    }

    public function getClientAttrName($table)
    {
        try {
            $this->q = $this->db->prepare("DESCRIBE $table");
            $this->q->execute();
            $this->d = $this->q->fetchAll(PDO::FETCH_COLUMN);
        } catch (PDOException $e) {
            $this->d = $e->__toString();
        } finally {
            return $this->d;
        }
    }

    public function getAllCompte()
    {
        try {
            $this->q = $this->db->prepare("SELECT * FROM compte");
            $this->q->execute();
            $this->d = $this->q->fetchAll();
        } catch (PDOException $e) {
            $this->d = $e->__toString();
        } finally {
            return $this->d;
        }
    }

    public function nbCompte()
    {
        try {
            $this->q = $this->db->prepare("SELECT count(*) FROM compte");
            $this->q->execute();
            $this->d = $this->q->fetch(PDO::FETCH_BOTH)[0];
        } catch (PDOException $e) {
            $this->d = $e->__toString();
        } finally {
            return $this->d;
        }
    }

    public function nbCredit()
    {
        try {
            $this->q = $this->db->prepare("SELECT count(*) FROM credit");
            $this->q->execute();
            $this->d = $this->q->fetch(PDO::FETCH_BOTH)[0];
        } catch (PDOException $e) {
            $this->d = $e->__toString();
        } finally {
            return $this->d;
        }
    }

    public function getAllCredit()
    {
        try {
            $this->q = $this->db->prepare("SELECT * FROM credit");
            $this->q->execute();
            $this->d = $this->q->fetchAll();
        } catch (PDOException $e) {
            $this->d = $e->__toString();
        } finally {
            return $this->d;
        }
    }

    public function getAllDemande()
    {
        try {
            $this->q = $this->db->prepare("SELECT * FROM demande");
            $this->q->execute();
            $this->d = $this->q->fetchAll();
        } catch (PDOException $e) {
            $this->d = $e->__toString();
        } finally {
            return $this->d;
        }
    }

    public function identif_risq($id, $cap_perm, $val_imm, $cap_credit, $actif, $facteur, $id_client)
    {
        try {
            $ratio_solv = $actif / $cap_credit;
            $ratio_fin = $cap_perm / $val_imm;
            $this->q = $this->db->prepare("UPDATE demande SET 
          actif = :actif, ratio_financement = :ratio_fin, ratio_solvabilite = :ratio_solv, valeurs_immobilisees = :val_imm,
          capitaux_permanent = :cap_perm, capitaux_credit = :cap_credit, facteur = :facteur WHERE code_demande = :id");
            $this->q->execute(["actif" => $actif, "ratio_fin" => $ratio_fin, "ratio_solv" => $ratio_solv, "cap_credit" => $cap_credit, "cap_perm" => $cap_perm, "val_imm" => $val_imm, "facteur" => $facteur, "id" => $id]);
            $this->d = false;
            if ($ratio_fin >= 0.8) $this->d = $this->addCompte($id_client);
        } catch (PDOException $e) {
            $this->d = $e->__toString();
        } finally {
            return $this->d;
        }
    }

    public function getDemande(int $id)
    {
        $id = htmlentities(addslashes($id));
        try {
            $this->q = $this->db->prepare("SELECT * FROM demande WHERE code_demande = :id");
            $this->q->execute(["id" => $id]);
            $this->d = $this->q->fetch();
        } catch (PDOException $e) {
            $this->d = $e->__toString();
        } finally {
            return $this->d;
        }
    }

    private function addCompte($client)
    {
        try {
            $compte = helper::randomString();
            $this->q = $this->db->prepare("INSERT INTO compte(num_compte,num_client) VALUES (:compte, :client)");
            $this->q->execute(["compte" => $compte, "client" => $client]);
            $this->d = true;
        } catch (PDOException $e) {
            $this->d = $e->__toString();
        } finally {
            return $this->d;
        }
    }
}