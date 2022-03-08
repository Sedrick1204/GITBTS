<?php

class miseajour
{
    private $id_vol;
    private $date_depart;
    private $heure_depart;
    private $heure_arrivee;
    private $ref_pilote;
    private $ref_avion;

    /**
     * @return mixed
     */
    public function getIdVol()
    {
        return $this->id_vol;
    }

    /**
     * @return mixed
     */
    public function getDateDepart()
    {
        return $this->date_depart;
    }

    /**
     * @param mixed $date_depart
     */
    public function setDateDepart($date_depart)
    {
        $this->date_depart = $date_depart;
    }

    /**
     * @return mixed
     */
    public function getHeureDepart()
    {
        return $this->heure_depart;
    }

    /**
     * @param mixed $heure_depart
     */
    public function setHeureDepart($heure_depart)
    {
        $this->heure_depart = $heure_depart;
    }

    /**
     * @return mixed
     */
    public function getHeureArrivee()
    {
        return $this->heure_arrivee;
    }

    /**
     * @param mixed $heure_arrivee
     */
    public function setHeureArrivee($heure_arrivee)
    {
        $this->heure_arrivee = $heure_arrivee;
    }

    /**
     * @return mixed
     */
    public function getRefPilote()
    {
        return $this->ref_pilote;
    }

    /**
     * @param mixed $ref_pilote
     */
    public function setRefPilote($ref_pilote)
    {
        $this->ref_pilote = $ref_pilote;
    }

    /**
     * @return mixed
     */
    public function getRefAvion()
    {
        return $this->ref_avion;
    }

    /**
     * @param mixed $ref_avion
     */
    public function setRefAvion($ref_avion)
    {
        $this->ref_avion = $ref_avion;
    }



    public function __Construct(array $donnees)
    {
        $this->hydrate($donnees);
    }

    public function hydrate(array $donnees)
    {
        foreach ($donnees as $key => $value) {
            $method = 'set' . ucfirst($key);
            if (method_exists($this, $method)) {
                // On appelle le setter.
                $this->$method($value);
            }
        }
    }
     
        public function misajourvol(){
            $bdd = new PDO('mysql:host=localhost;dbname=site_vol_sfo;charset=utf8', 'root', '');
            $req = $bdd->prepare('UPDATE vol SET 
date_depart=:date_depart,heure_depart=:heure_depart,heure_arrivee=:heure_arrivee,ref_pilote=:ref_pilote,ref_avion=:ref_avion where id_vol=:id_vol' );
            $req->execute(array(
                'date_depart' => $this->getDateDepart(),
                'heure_depart' => $this->getHeureDepart(),
                'heure_arrivee' => $this-> getHeureArrivee(),
                'ref_pilote' => $this->getRefPilote(),
                'ref_avion' => $this->getRefAvion()));
        
    }
}