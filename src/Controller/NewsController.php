<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * News Controller
 *
 * @property \App\Model\Table\NewsTable $News
 * @method \App\Model\Entity\News[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class NewsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {    
        $this->paginate = [
            'contain' => ['Category'],
        ];
        $new = $this->News;
        $this->Authorization->authorize($new);

        $news = $this->paginate($this->News);

        $category = $this->News->Category->find('list', ['limit' => 200])->all();
        $this->set(compact('news', 'category'));
    }

    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        // Configure the login action to not require authentication, preventing
        // the infinite redirect loop issue
        $this->Authentication->addUnauthenticatedActions(['index', 'view']);
    }
    /**
     * View method
     *
     * @param string|null $id News id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->Authorization->skipAuthorization();
        $news = $this->News->get($id, [
            'contain' => ['Category'],
        ]);

        $category = $this->News->Category->find('list', ['limit' => 200])->all();
        $this->set(compact('news', 'category'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $news = $this->News->newEmptyEntity();
        $this->Authorization->authorize($news);

        if ($this->request->is('post')) {
            $news = $this->News->patchEntity($news, $this->request->getData());
    
            if(!$news->getErrors){
                $image = $this->request->getData('image_file');
                $name = $image->getClientFilename();
                $targetPath = WWW_ROOT.'img'.DS.$name;
                if($name){
                    $image->moveTo($targetPath);
                }
                $news->image = $name;
            }
            if ($this->News->save($news)) {
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('La noticia no se ha guardado correctamente. Por favor revise su contenido'));
        }
        $category = $this->News->Category->find('list', ['limit' => 200])->all();
        $this->set(compact('news', 'category'));
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
        $news = $this->News->get($id, [
            'contain' => [],
        ]);
        $this->Authorization->authorize($news);
        
        if ($this->request->is(['patch', 'put'])) { //falta el post
            $news = $this->News->patchEntity($news, $this->request->getData());
            if(!$news->getErrors){
                $image = $this->request->getData('image_file');
                $name = $image->getClientFilename();
                $targetPath = WWW_ROOT.'img'.DS.$name;
                if($name){
                    $image->moveTo($targetPath);
                }
                $news->image = $name;
            }
            if ($this->News->save($news)) {
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('La noticia no se ha guardado correctamente. Por favor revise su contenido'));
        }
        $category = $this->News->Category->find('list', ['limit' => 200])->all();
        $this->set(compact('news', 'category'));
    }

    /**
     * Delete method
     *
     * @param string|null $id News id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
      
        $news = $this->News->get($id);
        $this->Authorization->authorize($news);

        if ($this->News->delete($news)) {
            
        } else {
            $this->Flash->error(__('La noticia no se ha borrado correctamente. Vuelva a intentarlo'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
