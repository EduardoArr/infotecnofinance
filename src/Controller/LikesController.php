<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Likes Controller
 *
 * @property \App\Model\Table\LikesTable $Likes
 * @method \App\Model\Entity\Like[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class LikesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $likes = $this->paginate($this->Likes);

        $this->set(compact('likes'));
    }

    /**
     * View method
     *
     * @param string|null $id Like id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $like = $this->Likes->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('like'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add($id_post = null, $id_user = null)
    {
        $like = $this->Likes->newEmptyEntity();
        $this->Authorization->authorize($like);
        
        if ($this->request->is('post')) {
            $like = $this->Likes->patchEntity($like, $this->request->getData());
            $like->idPost = $id_post;
            $like->idUser = $id_user;
            $like->contLikes += 1;

            if ($this->Likes->save($like)) {
                  
                  return $this->redirect($this->referer());
            }
            $this->Flash->error(__('El like no se ha guardado correctamente'));
        }
        $this->set(compact('like'));
    }


    /**
     * Delete method
     *
     * @param string|null $id Like id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        
        $like = $this->Likes->get($id);
        $this->Authorization->authorize($like);

        if ($this->Likes->delete($like)) {
        } else {
            $this->Flash->error(__('El like no se a borado correctamente.'));
        }

        return $this->redirect($this->referer());
    }
}
