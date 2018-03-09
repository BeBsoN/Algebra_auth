<?php



class User
{
    //deklaracija metode, property
    private $db;
    //dodati svojstvo, lokalna varijabla, data će se uvijek vratiti kao objekt, pa ćemo riješti ca getCount
    private $data;
    
    //svojstvo, dobit ću sessiju
    
    private $sessionName = 'User';
    //provjera zbog dashboard-a
    
    private $isLoggedIn = false;

    //sa constructorom instacirati db u objekt
    
    public function __construct() {
        $this->db = DB::getInstance();
        //da li uopće imamo ključ user u sesiju
        if(Session::exists($this->sessionName))
        {
            //sada ćemo pronaći taj ključ, a pomoću metode find pronaći id
            $user_id = Session::get($this->sessionName);
            
            if($this->find($user_id))
            {
                //kontruktor nakon kaj provjeri sve, prebacit će isLoggedIn svostvo u true, falgovi
                $this->isLoggedIn = TRUE;
            }
            //ako slučajno ima ključ vrijednost i ne pronađem session u bazi, prebacim ga u logout i izubija mu sve sesije
            else {
                
            }
        }
    }
    
    //metoda za kreiranje usera, prov provjera da li vraća false, tj true ako uspije 
    
    public function create($fields = array()) {
        //ako insert metoda u db vrati false
        if(!$this->db->insert('users', $fields))
            throw new Exception ('There was a problem creating an account!');
    }
    
    public function find($user = null) {
        if($user){
            //pretraga USERA u bazi po id ili username-u, id je INT a USERNAME VARCHAR
            $field = is_numeric($user) ? 'id' : 'username';
            //public function get($fields, $table, $where = array())
            $data = $this->db->get('*','users', array($field,'=',$user));
            
                if($data->getCount()){
                    $this->data = $data->first();
                    return TRUE;
                }
        }
        return FALSE;
    }
    //pomoć sa metodom find, prvo tražim po username-u, pa sa pass.. ona pušta ispravan login dalje
    public function login($username = null, $password = null) {
        $user = $this->find($username);
        if($user){
            //provjera da li radi samo po username-u, tj da li je ispravan user, da li postoji u bazi
            //provjera po passu, pass je hashiran, potrebno je izvući salt i pass iz get data kao svostvo, $password je već upisan/poslan
            if($this->getData()->password === Hash::make($password, $this->getData()->salt)){
                // da se ne hardcodira
                Session::put($this->sessionName, $this->getData()->id);
                return TRUE;
            }
            
            return TRUE;
            
        }
        
        return FALSE;
    }
    //geter jer je ova gore pizdarija private
    public function getData() {
        return $this->data;
    }
    public function check()
    {
       return $this->isLoggedIn;
    }
    
    public function logout()
    {
        Session::delete($this->sessionName);
        session_destroy();
    }
}
