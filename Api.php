// Controller
use Restserver\Libraries\REST_Controller;

class Api extends REST_Controller {
    public function users_get() {
        $users = $this->user_model->get_users();
        $this->response($users, 200);
    }

    public function user_post() {
        $data = $this->input->post();
        $this->user_model->create_user($data);
        $this->response(['message' => 'User created.'], 201);
    }
}
