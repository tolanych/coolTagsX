<?php

class coolTagsX
{
    /** @var modX $modx */
    public $modx;


    /**
     * @param modX $modx
     * @param array $config
     */
    function __construct(modX &$modx, array $config = [])
    {
        $this->modx =& $modx;
        $corePath = MODX_CORE_PATH . 'components/cooltagsx/';
        $assetsUrl = MODX_ASSETS_URL . 'components/cooltagsx/';

        $this->config = array_merge([
            'corePath' => $corePath,
            'modelPath' => $corePath . 'model/',
            'processorsPath' => $corePath . 'processors/',

            'connectorUrl' => $assetsUrl . 'connector.php',
            'assetsUrl' => $assetsUrl,
            'cssUrl' => $assetsUrl . 'css/',
            'jsUrl' => $assetsUrl . 'js/',
        ], $config);

        $this->modx->addPackage('cooltagsx', $this->config['modelPath']);
        $this->modx->lexicon->load('cooltagsx:default');
    }

    public function handleEvent(modSystemEvent $event, array $scriptProperties)
    {
        extract($scriptProperties);
        switch ($event->name) {
            // prerender replace #placeholder
            case 'OnWebPagePrerender':
                $output = &$this->modx->resource->_output;
                $output = $this->parseContent($output);
                break;
            // add TagItem when publish
            case 'OnBeforeCommentSave':
                if (( $mode == 'new' && $object->get('published') ) ||
                    ( $mode == 'upd' && $object->get('published') && ($object->isDirty('published') || $object->isDirty('text')) ) ) {
                    $this->modx->setOption('cooltagx_isPub',true);
                }
                break;
            case 'OnCommentSave':
                $object->text = $this->parseContent($object->text);
                if ($this->modx->getOption('cooltagx_isPub') && $pid = $object->getPrimaryKey()) {
                    $this->clearTagItem('TicketComment', $pid);
                    $tags = $this->findMatch($object->text);
                    $this->arrTags($tags, 'TicketComment', $pid);
                }
                break;
            case 'OnCommentPublish':
                if ($pid = $object->getPrimaryKey()) {
                    $this->clearTagItem('TicketComment', $pid);
                    $tags = $this->findMatch($object->text);
                    $this->arrTags($tags, 'TicketComment', $pid);
                }
                break;
            case 'OnCommentUnpublish':
                if ($pid = $object->getPrimaryKey()) {
                    $this->clearTagItem('TicketComment', $pid);
                }
                break;
                /*'OnCommentPublish' => [],
                'OnCommentUnpublish' => [],
                'OnCommentDelete' => [],
                'OnCommentUndelete' => [],*/
        }
    }

    /**
     * Find and replace in HTML content @tags pattern
     */
    function parseContent($output)
    {
        //find in tag <body> if isset or in all html-chunk
        $is_body = false;
        preg_match('/<body.*\/body>/s',$output,$matches);

        if ($matches) {
            $is_body = true;
            $out = $matches[0];
        } else {
            $out = $output;
        }
        $tags = $this->findMatch($out);

        // replace
        if (count($tags)) {
            $tags = array_unique($tags);
            $cooltagsx_class = $this->modx->getOption('cooltagsx_class');
            $cooltagsx_link = $this->modx->getOption('cooltagsx_link');
            $uniqid = uniqid();
            $chunk = $this->modx->newObject('modChunk', array('name' => "tmp-$uniqid"));
            $chunk->setContent($cooltagsx_link);
            $chunk->setCacheable(false);

            $array_raw = array();
            $array_replace = array();

            foreach ($tags as $tag) {
                $tag_raw = mb_substr( $tag, 1);
                $params = array(
                    'class' => $cooltagsx_class,
                    'input' => $tag,
                    'tags' => $tag_raw
                );

                $array_raw[] = '/'.$tag.'(?=(?:[^"]*"[^"]*")*[^"]*$)/imu';
                $array_replace[] = $chunk->process($params);
            }

            if (count($array_raw)) {
                $out = preg_replace($array_raw,$array_replace,$out);
            }

            if ($is_body) {
                $output = preg_replace('/<body.*\/body>/s',$out,$output);
            } else {
                $output = $out;
            }
        }

        return $output;
    }

    /**
     * regExp parse HTML
     */
    function findMatch($content)
    {
        $re = '/#[\w]{1,}(?=(?:[^"]*"[^"]*")*[^"]*$)/imu';
        preg_match_all($re,$content,$match);
        $exclude = array_map('trim', explode(',', $this->modx->getOption('cooltagsx_exclude')));
        $tags = array_diff($match[0], $exclude);

        return $tags;
    }

    /**
     * clear records if resource issets
     */
    function clearTagItem($classKey, $internalKey)
    {
        $this->modx->removeCollection('coolTagsXTag',['class_key' => $classKey, 'internalKey' => $internalKey]);
    }

    /**
     * 
     */
    function arrTags($tags, $classKey, $internalKey)
    {
        if (count($tags)) {
            $tags = array_unique($tags);

            foreach($tags as $tag) {
                $this->addTagItem($tag, $classKey, $internalKey);
            }
        }

    }

    /**
     * add new tagItem
     */
    function addTagItem($text, $classKey, $internalKey)
    {
        $tag = $this->modx->newObject('coolTagsXTag');
        $tag->fromArray(array(
            'class_key' => $classKey,
            'text' => mb_substr( $text, 1),
            'internalKey' => $internalKey,
            'pub_date' => time()
        ));
        $tag->save();
    }

}