<?php
namespace App\Controller;
 
use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;
class PostsController extends AppController
{
	public $helpers = array('Html','Form','Paginator' => [
		//'templates' => 'paginator-templates',
		'className' => 'Bootstrap.BootstrapPaginator'
		]);
	public $paginate = [
        'limit' => 3,
        'order' => [
            'Posts.created' => 'desc'
        ]
    ];
	public function initialize()
    {
        parent::initialize();
        $this->viewBuilder()->layout('sample');
        $this->loadComponent('Paginator');
    }
    public function index()
    {
        $categorys = [];
        $connection = ConnectionManager::get('default');
        $query = 'select distinct category from posts';
        $categorys = $connection->query($query)->fetchAll();
        $this->set('posts', $this->paginate());
        $this->set('categorys', $categorys);
    }
    public function catelist($category)
    {
        $categorys = $this->Posts->find()->where(["category" => $category]);
        $this->set('categorys',$this->paginate($categorys));

        $category_names = [];
        $connection = ConnectionManager::get('default');
        $query = 'select distinct category from posts';
        $category_names = $connection->query($query)->fetchAll();
        
        $this->set('category_names', $category_names);
        
    }
    public function preadd(){
    	
    }
    public function display()
    {
        if ($this->request->is('post')) {
            $this->set('datas', $this->request->data);
        }
       
    }
    public function add()
    {
        if ($this->request->is(['post'])) {
            $posts = $this->Posts->newEntity();
            $posts = $this->Posts->patchEntity($posts, $this->request->data);
            if ($this->Posts->save($posts)) {
                return $this->redirect(['action' => 'index']);
            }
        }
    }
    public function delete($id = null)
	{
	    $post = $this->Posts->get($id);
	    if ($this->request->is(['post', 'put'])) {
	        if ($this->Posts->delete($post)) {
	            return $this->redirect(['action' => 'index']);
	        }
	    } else {
	        $this->set('post', $post);
	    }
	}
    public function preedit($id = null)
    {   
        $post = $this->Posts->get($id);
        
        
        $this->set('post', $post);
        
    }
    public function editDisplay($id = null)
    {   
        if ($this->request->is(['post', 'put'])){
            $this->set('datas', $this->request->data);
        }
        
       
    }
    public function edit($id = null)
    {
        $post = $this->Posts->get($this->request->data['id']);
        if ($this->request->is(['post'])) {
            $post = $this->Posts->patchEntity($post, $this->request->data);
            if ($this->Posts->save($post)) {
                return $this->redirect(['action' => 'index']);
            }
        } 
    }
    
}