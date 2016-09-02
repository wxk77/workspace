

 <?php
/**
 * Created by PhpStorm.
 * User: wangxiaokang
 * Date: 2016/6/20
 * Time: 10:17
 */
defined('BASEPATH') OR exit('No direct script access allowed');
class test extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('table');
       
    }
    public function index(){
       echo form_input('username', 'johndoe');
       echo '</br>';

       $options = array(
		    'small'     => 'Small Shirt',
		    'med'       => 'Medium Shirt',
		    'large'     => 'Large Shirt',
		    'xlarge'    => 'Extra Large Shirt',
      );

		$shirts_on_sale = array('small', 'large');
		echo form_dropdown('shirts', $options, 'large');
        echo '</br>';echo '</br>';echo '</br>';

        echo form_fieldset('Address Information');
		echo "<p>fieldset content here</p>\n";
		echo form_fieldset_close();
        echo '</br>';echo '</br>';echo '</br>';

         $data = array(
		    'name'      => 'newsletter',
		    'id'        => 'newsletter',
		    'value'     => 'accept',
		    'checked'   => TRUE,
		    'style'     => 'margin:10px'
		);

       echo form_checkbox($data);
       echo '</br>';echo '</br>';echo '</br>';


     $attributes = array(
		    'class' => 'mycustomclass',
		    'style' => 'color: red;'
		);

     echo form_label('What is your Name', 'username', $attributes);
     echo form_submit('mysubmit', 'Submit');

     echo '</br>';

     $data = array(
		    array('Name', 'Color', 'Size'),
		    array('Fred', 'Blue', 'Small'),
		    array('Mary', 'Red', 'Large'),
		    array('John', 'Green', 'Medium')
		);

    echo $this->table->generate($data);
    echo '</br>';
    $template = array(
	    'table_open'        => '<table border="0" cellpadding="4" cellspacing="0">',

	    'thead_open'        => '<thead>',
	    'thead_close'       => '</thead>',

	    'heading_row_start' => '<tr>',
	    'heading_row_end'   => '</tr>',
	    'heading_cell_start'    => '<th>',
	    'heading_cell_end'  => '</th>',

	    'tbody_open'        => '<tbody>',
	    'tbody_close'       => '</tbody>',

	    'row_start'     => '<tr>',
	    'row_end'       => '</tr>',
	    'cell_start'        => '<td>',
	    'cell_end'      => '</td>',

	    'row_alt_start'     => '<tr>',
	    'row_alt_end'       => '</tr>',
	    'cell_alt_start'    => '<td>',
	    'cell_alt_end'      => '</td>',

	    'table_close'       => '</table>'
	);

    $this->table->set_template($template);

     $this->load->view('test');

    }
   
}