// Controller
class FileUploadController extends CI_Controller {
    public function upload() {
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 100;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('userfile')) {
            $error = array('error' => $this->upload->display_errors());
            $this->load->view('upload_form', $error);
        } else {
            // File uploaded successfully, process the data
            $data = array('upload_data' => $this->upload->data());
            $this->load->view('upload_success', $data);
        }
    }
}

// View (upload_form.php)
echo form_open_multipart('file_upload_controller/upload');
echo form_upload('userfile');
echo form_submit('submit', 'Upload');
echo form_close();
