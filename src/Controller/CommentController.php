<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\ORM\TableRegistry;

/**
 * Comment Controller
 *
 * @property \App\Model\Table\CommentTable $Comment
 * @method \App\Model\Entity\Comment[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CommentController extends AppController
{
    
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Post'],
        ];
        $comment = $this->paginate($this->Comment);

        $this->set(compact('comment'));
    }

    /**
     * View method
     *
     * @param string|null $id Comment id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $comment = $this->Comment->get($id, [
            'contain' => ['Post'],
        ]);

        $this->set(compact('comment'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add($id = null, $user_id = null, $email= null)
    {
        $comment = $this->Comment->newEmptyEntity();
        $this->Authorization->authorize($comment);

        
        if ($this->request->is('post') || $this->request->is('put')) {
            $comment = $this->Comment->patchEntity($comment, $this->request->getData());

            $comment->post_id = $id;
            $comment->comment = $_POST['comment'];
            $comment->email = $email;
            $comment->user_id = $user_id;

            if ($this->Comment->save($comment)) {
                return $this->redirect($this->referer());
            }
            $this->Flash->error(__('El comentario no se ha guardado correctamente'));
        }
        $post = $this->Comment->Post->find('list', ['limit' => 200])->all();
        $this->set(compact('comment', 'post'));
    }

   

    /**
     * Delete method
     *
     * @param string|null $id Comment id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {     
        $comment = $this->Comment->get($id);
        $this->Authorization->authorize($comment);
        
        if ($this->Comment->delete($comment)) {
        } else {
            $this->Flash->error(__('El comentario no se ha borrado correctamente'));
        }

        return $this->redirect($this->referer());
    }
}
