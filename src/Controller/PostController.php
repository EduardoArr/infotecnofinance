<?php
declare(strict_types=1);

namespace App\Controller;

use App\Model\Entity\Comment;
use Cake\ORM\TableRegistry;

/**
 * Post Controller
 *
 * @property \App\Model\Table\PostTable $Post
 * @method \App\Model\Entity\Post[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PostController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['user'],
        ];

        $post = $this->Post;
        $this->Authorization->authorize($post);

        $post = $this->paginate($this->Post);

        $this->set(compact('post'));
    }

    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        // Configure the login action to not require authentication, preventing
        // the infinite redirect loop issue
        $this->Authentication->addUnauthenticatedActions(['view']);
    }


    /**
     * View method
     *
     * @param string|null $id Post id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->Authorization->skipAuthorization();
        $user = TableRegistry::get('user');
        $comment = TableRegistry::get('comment');
    

        $users = $user->find();
        $comments = $comment->find()->where(['post_id' => $id])->order(['id' => 'DESC']);


        $post = $this->Post->get($id, [
            'contain' => ['user', 'Comment'],
        ]);

        $this->set(compact('post', 'users', 'comments'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $post = $this->Post->newEmptyEntity();
        $this->Authorization->authorize($post);

        $identity = $this->request->getAttribute('authentication')->getIdentity();
        $user_id = $identity['id'];

     
        if ($this->request->is('post')) {
            $post = $this->Post->patchEntity($post, $this->request->getData());
            if(!$post->getErrors){
                $image = $this->request->getData('image_file');
                $name = $image->getClientFilename();
                $targetPath = WWW_ROOT.'img'.DS.$name;
                if($name){
                    $image->moveTo($targetPath);
                }
                $post->image = $name;
            }
            $post->user_id = $user_id;

            if ($this->Post->save($post)) {
                return $this->redirect(['controller' => 'pages', 'action' => 'index']);
            }
            $this->Flash->error(__('El post no se ha guardado correctamente. Por favor, revisa tu contenido.'));
        }
        

        $this->set(compact('post', 'user_id'));
    }


     /**
     * Edit method
     *
     * @param string|null $id News id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $post = $this->Post->get($id, [
            'contain' => [],
        ]);
        


        $imagen = $post->image;
        $this->Authorization->authorize($post);

            if ($this->request->is(['patch', 'put'])) { //falta el post
                $post = $this->Post->patchEntity($post, $this->request->getData());
                if(!$post->getErrors){   
                    
                    $image = $this->request->getData('image_file');
                    $name = $image->getClientFilename();
                    
                    if($name == ''){
                      
                        $post->image = $imagen;

                    }else{
                        $targetPath = WWW_ROOT.'img'.DS.$name;
                        if($name){
                            $image->moveTo($targetPath);
                        }
                        $post->image = $name;
                    }
                    
                }
                if ($this->Post->save($post)) {
                    return $this->redirect(['controller' => 'pages', 'action' => 'index']);
                }
                $this->Flash->error(__('El post no se ha guardado correctamente. Por favor, revisa su contenido.'));
            }
        
        $this->set(compact('post'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Post id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
    
        $post = $this->Post->get($id);
        $this->Authorization->authorize($post);
        
        if ($this->Post->delete($post)) {
        } else {
            $this->Flash->error(__('El post no se ha borrado correctamente, vuelve a intentarlo'));
        }

        return $this->redirect(['controller' => 'pages', 'action' => 'index']);
    }

}
