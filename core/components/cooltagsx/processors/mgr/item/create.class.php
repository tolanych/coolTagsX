<?php

class coolTagsXTagCreateProcessor extends modObjectCreateProcessor
{
    public $objectType = 'coolTagsXTag';
    public $classKey = 'coolTagsXTag';
    public $languageTopics = ['cooltagsx'];
    //public $permission = 'create';


    /**
     * @return bool
     */
    public function beforeSet()
    {
        $name = trim($this->getProperty('name'));
        if (empty($name)) {
            $this->modx->error->addField('name', $this->modx->lexicon('cooltagsx_item_err_name'));
        } elseif ($this->modx->getCount($this->classKey, ['name' => $name])) {
            $this->modx->error->addField('name', $this->modx->lexicon('cooltagsx_item_err_ae'));
        }

        return parent::beforeSet();
    }

}

return 'coolTagsXTagCreateProcessor';