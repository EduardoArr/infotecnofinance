<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\ORM\TableRegistry;

/**
 * User Controller
 *
 * @property \App\Model\Table\UserTable $User
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UserController extends AppController
{
   

    public function register()
    {
        $this->Authorization->skipAuthorization();
        $contra = '/^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$/';
        $user = $this->User->newEmptyEntity();
        if ($this->request->is('post')) {
            $user = $this->User->patchEntity($user, $this->request->getData());
            
                if(preg_match($contra, $_POST['password'])){
                    if ($this->User->save($user)) {
                        return $this->redirect(['controller'=>'pages','action' => 'home']);
                    }else{
                        $this->Flash->error(__('El usuario no se ha guardado correctamente, prueba otra vez.'));
                    }
                }else{
                    $this->Flash->error(__('Contraseña no válida'));
                }
        }
        $this->set(compact('user'));
    }

    public function beforeFilter(\Cake\Event\EventInterface $event)
{
    parent::beforeFilter($event);
    // Configure the login action to not require authentication, preventing
    // the infinite redirect loop issue
    $this->Authentication->addUnauthenticatedActions(['login', 'register']);
}

    public function login()
    {
        $this->Authorization->skipAuthorization();
        $this->request->allowMethod(['get', 'post']);
        $result = $this->Authentication->getResult();

        // regardless of POST or GET, redirect if user is logged in
        if ($result->isValid()) {
            // redirect to /articles after login success
            $redirect = $this->request->getQuery('redirect', [
            'controller' => 'pages',
            'action' => 'home',
            ]);
            return $this->redirect($redirect);

        }
        // display error if user submitted and authentication failed
        if ($this->request->is('post') && !$result->isValid()) {
            $this->Flash->error(__('Invalid email or password'));
        }
    }

    
    public function logout()
    {
        $this->Authorization->skipAuthorization();
        $result = $this->Authentication->getResult();
        // regardless of POST or GET, redirect if user is logged in
        if ($result->isValid()) {
            $this->Authentication->logout();
            return $this->redirect(['controller' => 'user', 'action' => 'login']);
            
        }
    }

    public function view($id = null)
    {
        $user = $this->User->get($id, [
            'contain' => [],
        ]);
       
        $this->Authorization->authorize($user);

        $identity = $this->request->getAttribute('authentication')->getIdentity();
        $user_id = $identity['id'];

        $post = TableRegistry::get('post');
        $comment = TableRegistry::get('comment');
        
        $todosPost = $post->find();
        $todosComment =  $comment->find();

        $posts = $post->find('all')->where(['user_id' => $user_id])->limit('1')->order(['id' => 'DESC']);
        $comments = $comment->find('all')->where(['user_id' => $user_id])->limit('1')->order(['id' => 'DESC']);

        $user = $this->User->get($id, [
            'contain' => ['Post'],
        ]);


        $this->set(compact('user', 'posts', 'comments', 'todosPost', 'todosComment'));
    }

   
}
