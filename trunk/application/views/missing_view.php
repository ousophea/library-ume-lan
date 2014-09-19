<div>
    <h4>You are missing view for content</h4>

    <pre>
class Accounts extends CI_Controller{
    //put your code here
    var $data = array('title'=>null, 'view'=>'missing_view');

    function index(){
        $this->data['title'] = 'User accounts';
        <b style="color:red;">$this->data['view'] = 'users/index';</b>// users is the folder name of your module, index is the file name in view of you module
        $this->load->view('layout',  $this->data);
    }
}
    </pre>
</div>