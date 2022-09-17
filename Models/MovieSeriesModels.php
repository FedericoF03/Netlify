<?php 

class MovieSeriesModels extends Model {
    
    public function set($ms_data = array()){

        foreach($ms_data as $key => $value ) {
            $$key = $value;
        }    
        $plot = str_replace("'", "\'", $plot);
        var_dump($ms_data);
        $this->query = "REPLACE INTO movieseries (imdb_id, title, plot, author, actors, country, premiere, poster, trailer, rating, genres, status_mors, category)
        VALUES ('$imdb_id', '$title', '$plot', '$author', '$actors', '$country', '$premiere','$poster', '$trailer', $rating, '$genres', $status, '$category')";
        $this->set_query();
    }
    
    public function get( $ms = '' ){
        $this->query = ($ms != '') 
        ? "SELECT ms.imdb_id, ms.title, ms.plot, ms.author, ms.actors, ms.country,
        ms.premiere, ms.poster, ms.trailer, ms.rating, ms.genres, ms.category, s.status 
       FROM movieseries AS ms 
       INNER JOIN status AS s
       ON ms.status_mors = s.status_id  
       WHERE ms.imdb_id = '$ms'"
        : "SELECT ms.imdb_id, ms.title, ms.plot, ms.author, ms.actors, ms.country,
         ms.premiere, ms.poster, ms.trailer, ms.rating, ms.genres, ms.category, s.status 
        FROM movieseries AS ms 
        INNER JOIN status AS s
        ON ms.status_mors = s.status_id";

        $this->get_query();

        $num_rows = count($this->rows);
       
        $data = array();

        foreach($this->rows as $key => $value ) {
            
            array_push($data, $value);
        }
        return $data;
    }

    public function del($ms = ''){
        $this->query = "DELETE FROM movieseries WHERE imdb_id = '$ms'";
        $this->set_query();
    }

    public function validate_user($user, $pass) {
        $this->query = "SELECT * FROM users WHERE user_u = '$user' AND pass = MD5('$pass')";
        $this->get_query();

        $data = array();

        foreach ($this->rows as $key => $value) {
            array_push($data, $value);
        }
        return $data;
    }

    public function __destruct() {
       
    }
}

?>


 