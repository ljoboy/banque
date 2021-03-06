<?php
class Client
{
    public $num_client;
    public $nom_complet;
    public $adresse;
    public $nationalite;
    public $genre;
    public $phone;
    public $email;
    public $bday;
    private static $motdepasse;
    public $compte;

    /**
     * Client constructor.
     * @param $num_client
     * @param $nom_complet
     * @param $adresse
     * @param $nationalite
     * @param $genre
     * @param $phone
     * @param $email
     * @param $bday
     */
    public function __construct($num_client, $nom_complet, $adresse, $nationalite, $genre, $phone, $email, $bday, $motdepasse)
    {
        $this->num_client = $num_client;
        $this->nom_complet = $nom_complet;
        $this->adresse = $adresse;
        $this->nationalite = $nationalite;
        $this->genre = $genre;
        $this->phone = $phone;
        $this->email = $email;
        $this->bday = $bday;
        self::setMotdepasse($motdepasse);
    }


    /**
     * @return mixed
     */
    public static function getMotdepasse()
    {
        return self::$motdepasse;
    }

    /**
     * @param mixed $motdepasse
     */
    public static function setMotdepasse($motdepasse): void
    {
        self::$motdepasse = $motdepasse;
    }

    /**
     * @return mixed
     */
    public function getNumClient()
    {
        return $this->num_client;
    }

    /**
     * @param mixed $num_client
     */
    public function setNumClient($num_client): void
    {
        $this->num_client = $num_client;
    }

    /**
     * @return mixed
     */
    public function getNomComplet()
    {
        return $this->nom_complet;
    }

    /**
     * @param mixed $nom_complet
     */
    public function setNomComplet($nom_complet): void
    {
        $this->nom_complet = $nom_complet;
    }

    /**
     * @return mixed
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * @param mixed $adresse
     */
    public function setAdresse($adresse): void
    {
        $this->adresse = $adresse;
    }

    /**
     * @return mixed
     */
    public function getNationalite()
    {
        return $this->nationalite;
    }

    /**
     * @param mixed $nationalite
     */
    public function setNationalite($nationalite): void
    {
        $this->nationalite = $nationalite;
    }

    /**
     * @return mixed
     */
    public function getGenre()
    {
        return $this->genre;
    }

    /**
     * @param mixed $genre
     */
    public function setGenre($genre): void
    {
        $this->genre = $genre;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param mixed $phone
     */
    public function setPhone($phone): void
    {
        $this->phone = $phone;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email): void
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getBday()
    {
        return $this->bday;
    }

    /**
     * @param mixed $bday
     */
    public function setBday($bday): void
    {
        $this->bday = date("d-m-Y",$bday);
    }

    /**
     * @return mixed
     */
    public function getCompte()
    {
        return $this->compte;
    }

    /**
     * @param Compte $compte
     */
    public function setCompte(Compte $compte): void
    {
        $this->compte = $compte;
    }
}
