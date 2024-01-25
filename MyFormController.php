// Controller
class MyFormController extends CI_Controller {
    public function index() {
        $this->load->helper('form');
        $this->load->library('form_validation');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('my_form');
        } else {
            // Form validation passed, process the data
            $data['message'] = 'Form submitted successfully!';
            $this->load->view('form_success', $data);
        }
    }
}

// View (my_form.php)
echo form_open('my_form_controller');
echo form_input('username', set_value('username'));
echo form_password('password');
echo form_submit('submit', 'Submit');
echo form_close();
