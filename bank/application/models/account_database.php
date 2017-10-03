<?php

Class Account_Database extends CI_Model {

    public function get_statement($data) {
        $query = "select * from account_transaction where date>'" . $data['start_date'] . "' and date<'" . $data['end_date'] . "'";
        $result = $this->db->query($query);

        if($result->num_rows() > 0) {
            return $result;
        }
        else {
            return FALSE;
        }
    }

    public function statement_sort() {
        //return sorted data set
    }

}