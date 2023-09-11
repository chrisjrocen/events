<?php 

namespace Events\Tech;

class Form_Submissions{

    public function save_form_data(array $form_data){
        global $wpdb;
        $table_name = 'rsvp_list';
        $table = $wpdb->prefix . $table_name;
        $data = [
            'name' => $form_data['name'],
            'email' => $form_data['email'],
            'id' => $form_data['id']
        ];

        $wpdb->insert($table,$data);
    }

    public function retrieve_form_data(){

        global $wpdb;
        $table_name= 'rsvp_list';
        $wpdb_table = $wpdb->prefix . $table_name;
        $user_query = "SELECT * FROM $wpdb_table";

        return $wpdb->get_results($user_query);
    }
}