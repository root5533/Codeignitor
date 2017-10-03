<?php

Class User_Transaction extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('account_database');
    }

    public function get_transactions() {
        $this->form_validation->set_rules('start_date',"Start Date",'required');
        $this->form_validation->set_rules('end_date',"End Date",'required');

        if($this->form_validation->run() == FALSE) {
            $this->load->view('past_transaction');
        }
        else {
            $data = array(
                'start_date' => $this->input->post('start_date'),
                'end_date' => $this->input->post('end_date')
            );
            $result = $this->account_database->get_statement($data);
            if($result != FALSE) {
                $data['result'] = $result;
                $this->load->view('statement',$data);
            }
            else {
                $data['message_display'] = 'No transactions found during this period';
                $this->load->view('past_transaction',$data);
            }
        }
}

}