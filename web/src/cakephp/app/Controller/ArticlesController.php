<?php

class ArticlesController extends AppController
{
    public $helpers = array('Html','Form');
    public $uses = array('Articles'); ### no documents
    public function index()
    {
        $this -> set ('articles',$this ->Articles->find('all'));
    }

    public function view($id)
    {
        $this->loadModel('Article'); ### no documents
        if(!$id)
        {
            throw new NotFoundException(__('Invalid article'));
        }
        $article = $this->Article->findById($id);
        if (!$article)
        {
            throw new NotFoundException(__('Invalid article'));
        }
        $this -> set('article',$article);
    }
    public function add()
    {
        $this->loadModel('Article'); ### no docs
        if ($this->request->is('post'))
        {
            $this->Article->create();
            if ($this->Article->save($this->request->data))
            {
                $this->Flash->success(__('Your post has been saved.'));
                return $this->redirect(array('action'=>'index'));
            }
            $this ->Flash->error(__('Unable to add your post.'));
        }
    }
    public function edit($id)
    {
        $this->loadModel('Article');
        if (!$id)
        {
            throw new NotFoundException(__('Invalid id'));
        }
        $post = $this->Article->findById($id);
        if (!$post)
        {
            throw new NotFoundException(__('Invalid post'));
        }
        if ($this->request->is(array('post','put')))
        {
            $this->Article->id=$id;
            if ($this->Article->save($this->request->data))
            {
                $this->Flash->success(__('Your post has been updated.')); ###sucessはバージョンが古い時のもの。setFlash,set
                return $this->redirect(array('action'=>'index'));
            }
        $this->Flash->error(__('Unable to update your post.'));
        }
        if (!$this->request->data)
        {
            $this->request->data = $post;
        }
    }
    public function delete($id)
    {
        $this->loadModel('Article');
        if ($this->request->is('get'))
        {
            throw new MethodNotAllowedException();
        }
        if ($this->Article->delete($id))
        {
            $this->Flash->success(__('The post with id: %s has been deleted', h($id))); ### hは htmlspecialchars
        }
        else
        {
            $this->Flash->erroe(__('The post with id: $id could not be deleted', h($id)));
        }
        return $this->redirect(array('action'=>'index'));
    }
}