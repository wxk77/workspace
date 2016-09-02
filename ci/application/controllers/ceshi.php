<?php
/**
 * Created by PhpStorm.
 * User: wangxiaokang
 * Date: 2016/6/17
 * Time: 16:28
 */

class Ceshi extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('array');
        $this->load->helper('captcha');
        $this->load->helper('date');
        $this->load->helper('form');
        $this->load->helper('html');
        $this->load->helper('inflector');
    }
    public function index()
    {
        $array = array(
            'color' => 'red',
            'shape' => 'round',
            'size'  => ''
        );

       echo element('color', $array);
        echo element('size', $array, 'foobar');
        $array = array(
            'color' => 'red',
            'shape' => 'round',
            'radius' => '10',
            'diameter' => '20'
        );

        $my_shape= elements(array('color', 'shape', 'height'), $array);
       print_r ($my_shape);
       echo '</br>';
        $quotes = array(
            "I find that the harder I work, the more luck I seem to have. - Thomas Jefferson",
            "Don't stay in bed, unless you can make money in bed. - George Burns",
            "We didn't lose the game; we just ran out of time. - Vince Lombardi",
            "If everything seems under control, you're not going fast enough. - Mario Andretti",
            "Reality is merely an illusion, albeit a very persistent one. - Albert Einstein",
            "Chance favors the prepared mind - Louis Pasteur"
        );

        echo random_element($quotes);
        echo '</br>';
        $vals = array(
//            'word'      => 'Random word',
            'img_path'  => './captcha/',
            'img_url'   => 'http://www.77.com/captcha/',
            'font_path' => './path/to/fonts/texb.ttf',
            'img_width' => '150',
            'img_height'    => 30,
            'expiration'    => 7200,
            'word_length'   => 8,
            'font_size' => 16,
            'img_id'    => 'Imageid',
            'pool'      => '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',

            // White background and border, black text and red grid
            'colors'    => array(
                'background' => array(255, 255, 255),
                'border' => array(255, 255, 255),
                'text' => array(0, 0, 0),
                'grid' => array(255, 40, 40)
            )
        );

        echo '</br>';
        $cap = create_captcha($vals);
        $this->load->view('ceshi',$cap);
        echo '</br>';
        $datestring = 'Year: %Y Month: %m Day: %d - %h:%i %a';
        $time = time();


        echo mdate($datestring, $time);
        echo '</br>';
        echo heading('Welcome!', 3);
        echo heading('Welcome!', 3, 'style="color:pink"');
        echo heading('How are you?', 4, array('id' => 'question', 'style' => 'color:green'));
        echo '</br>';
        $list = array(
            'red',
            'blue',
            'green',
            'yellow'
        );

        $attributes = array(
            'class' => 'boldlist',
            'id'    => 'mylist'
        );

        echo ul($list, $attributes);
        echo '</br>';
        $attributes = array(
            'class' => 'boldlist',
            'id'    => 'mylist'
        );

        $list = array(
            'colors'  => array(
                'red',
                'blue',
                'green'
            ),
            'shapes'  => array(
                'round',
                'square',
                'circles' => array(
                    'ellipse',
                    'oval',
                    'sphere'
                )
            ),
            'moods'  => array(
                'happy',
                'upset' => array(
                    'defeated' => array(
                        'dejected',
                        'disheartened',
                        'depressed'
                    ),
                    'annoyed',
                    'cross',
                    'angry'
                )
            )
        );

        echo ul($list, $attributes);
        echo '</br>';
        echo singular('dogs');
        echo '</br>';
        echo plural('dog');
        echo '</br>';
        echo camelize('my_dog_spot');
        echo '</br>';


   
    $data = array(
    'name'      => 'username',
    'id'        => 'username',
    'value'     => 'hello world',
    'maxlength' => '30',
    'size'      => '20',
    'style'     => 'width:10%'
);

echo form_input($data);
echo '</br>';
echo '</br>';
echo '</br>';
$js = 'onClick="some_function()"';
echo form_input('username', 'johndoe', $js);

}
 }