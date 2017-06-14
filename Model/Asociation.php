<?php

class Asociation extends AppModel {

    public $name = "Asociation";
    public $belongsTo = array('Proyect');
    public $hasMany = array('Beneficiary', 'Payment');
    public $actsAs = array('Logable' => array(
            'userModel' => 'User',
            'userKey' => 'user_id',
            'change' => 'full', // options are 'list' or 'full'
            'description_ids' => TRUE // options are TRUE or FALSE
    ));

}

?>