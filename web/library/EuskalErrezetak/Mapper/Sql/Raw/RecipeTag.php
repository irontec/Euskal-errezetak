<?php

/**
 * Application Model Mapper
 *
 * @package EuskalErrezetak\Mapper\Sql
 * @subpackage Raw
 * @author Mikel Eizagirre
 * @copyright ZF model generator
 * @license http://framework.zend.com/license/new-bsd     New BSD License
 */

/**
 * Data Mapper implementation for EuskalErrezetak\Model\RecipeTag
 *
 * @package EuskalErrezetak\Mapper\Sql
 * @subpackage Raw
 * @author Mikel Eizagirre
 */

namespace EuskalErrezetak\Mapper\Sql\Raw;
class RecipeTag extends MapperAbstract
{
    protected $_modelName = 'EuskalErrezetak\\Model\\RecipeTag';


    protected $_urlIdentifiers = array();

    /**
     * Returns an array, keys are the field names.
     *
     * @param EuskalErrezetak\Model\Raw\RecipeTag $model
     * @return array
     */
    public function toArray($model)
    {
        if (!$model instanceof \EuskalErrezetak\Model\Raw\RecipeTag) {
            if (is_object($model)) {
                $message = get_class($model) . " is not a \EuskalErrezetak\Model\Raw\RecipeTag object in toArray for " . get_class($this);
            } else {
                $message = "$model is not a \\EuskalErrezetak\Model\\RecipeTag object in toArray for " . get_class($this);
            }

            $this->_logger->log($message, \Zend_Log::ERR);
            throw new \Exception('Unable to create array: invalid model passed to mapper', 2000);
        }

        $result = array(
            'id' => $model->getId(),
            'recipeId' => $model->getRecipeId(),
            'tagId' => $model->getTagId(),
        );

        return $result;
    }

    /**
     * Returns the DbTable class associated with this mapper
     *
     * @return EuskalErrezetak\\Mapper\\Sql\\DbTable\\RecipeTag
     */
    public function getDbTable()
    {
        if (is_null($this->_dbTable)) {
            $this->setDbTable('EuskalErrezetak\\Mapper\\Sql\\DbTable\\RecipeTag');
        }

        return $this->_dbTable;
    }

    /**
     * Deletes the current model
     *
     * @param EuskalErrezetak\Model\Raw\RecipeTag $model The model to delete
     * @see EuskalErrezetak\Mapper\DbTable\TableAbstract::delete()
     * @return int
     */
    public function delete(\EuskalErrezetak\Model\Raw\ModelAbstract $model)
    {
        if (!$model instanceof \EuskalErrezetak\Model\Raw\RecipeTag) {
            if (is_object($model)) {
                $message = get_class($model) . " is not a \\EuskalErrezetak\\Model\\RecipeTag object in delete for " . get_class($this);
            } else {
                $message = "$model is not a \\EuskalErrezetak\\Model\\RecipeTag object in delete for " . get_class($this);
            }

            $this->_logger->log($message, \Zend_Log::ERR);
            throw new \Exception('Unable to delete: invalid model passed to mapper', 2000);
        }

        $useTransaction = true;

        $dbTable = $this->getDbTable();
        $dbAdapter = $dbTable->getAdapter();

        try {

            $dbAdapter->beginTransaction();

        } catch (\Exception $e) {

            //Transaction already started
            $useTransaction = false;
        }

        try {

            //onDeleteCascades emulation
            if ($this->_simulateReferencialActions && count($deleteCascade = $model->getOnDeleteCascadeRelationships()) > 0) {

                $depList = $model->getDependentList();

                foreach ($deleteCascade as $fk) {

                    $capitalizedFk = '';
                    foreach (explode("_", $fk) as $part) {

                        $capitalizedFk .= ucfirst($part);
                    }

                    if (!isset($depList[$capitalizedFk])) {

                        continue;

                    } else {

                        $relDbAdapName = 'EuskalErrezetak\\Mapper\\Sql\\DbTable\\' . $depList[$capitalizedFk]["table_name"];
                        $depMapperName = 'EuskalErrezetak\\Mapper\\Sql\\' . $depList[$capitalizedFk]["table_name"];
                        $depModelName = 'EuskalErrezetak\\Model\\' . $depList[$capitalizedFk]["table_name"];

                        if ( class_exists($relDbAdapName) && class_exists($depModelName) ) {

                            $relDbAdapter = new $relDbAdapName;
                            $references = $relDbAdapter->getReference('EuskalErrezetak\\Mapper\\Sql\\DbTable\\RecipeTag', $capitalizedFk);

                            $targetColumn = array_shift($references["columns"]);
                            $where = $relDbAdapter->getAdapter()->quoteInto($targetColumn . ' = ?', $model->getPrimaryKey());

                            $depMapper = new $depMapperName;
                            $depObjects = $depMapper->fetchList($where);

                            if (count($depObjects) === 0) {

                                continue;
                            }

                            foreach ($depObjects as $item) {

                                $item->delete();
                            }
                        }
                    }
                }
            }

            //onDeleteSetNull emulation
            if ($this->_simulateReferencialActions && count($deleteSetNull = $model->getOnDeleteSetNullRelationships()) > 0) {

                $depList = $model->getDependentList();

                foreach ($deleteSetNull as $fk) {

                    $capitalizedFk = '';
                    foreach (explode("_", $fk) as $part) {

                        $capitalizedFk .= ucfirst($part);
                    }

                    if (!isset($depList[$capitalizedFk])) {

                        continue;

                    } else {

                        $relDbAdapName = 'EuskalErrezetak\\Mapper\\Sql\\DbTable\\' . $depList[$capitalizedFk]["table_name"];
                        $depMapperName = 'EuskalErrezetak\\Mapper\\Sql\\' . $depList[$capitalizedFk]["table_name"];
                        $depModelName = 'EuskalErrezetak\\Model\\' . $depList[$capitalizedFk]["table_name"];

                        if ( class_exists($relDbAdapName) && class_exists($depModelName) ) {

                            $relDbAdapter = new $relDbAdapName;
                            $references = $relDbAdapter->getReference('EuskalErrezetak\\Mapper\\Sql\\DbTable\\RecipeTag', $capitalizedFk);

                            $targetColumn = array_shift($references["columns"]);
                            $where = $relDbAdapter->getAdapter()->quoteInto($targetColumn . ' = ?', $model->getPrimaryKey());

                            $depMapper = new $depMapperName;
                            $depObjects = $depMapper->fetchList($where);

                            if (count($depObjects) === 0) {

                                continue;
                            }

                            foreach ($depObjects as $item) {

                                $setterName = 'set' . ucfirst($targetColumn);
                                $item->$setterName(null);
                                $item->save();
                            } //end foreach

                        } //end if
                    } //end else

                }//end foreach ($deleteSetNull as $fk)
            } //end if

            $where = $dbAdapter->quoteInto($dbAdapter->quoteIdentifier('id') . ' = ?', $model->getId());
            $result = $dbTable->delete($where);

            if ($this->_cache) {

                $this->_cache->remove(get_class($model) . "_" . $model->getPrimarykey());
            }

            $fileObjects = array();
            $availableObjects = $model->getFileObjects();

            foreach ($availableObjects as $fso) {

                $removeMethod = 'remove' . $fso;
                $model->$removeMethod();
            }


            if ($useTransaction) {
                $dbAdapter->commit();
            }
        } catch (\Exception $exception) {

            $message = 'Exception encountered while attempting to delete ' . get_class($this);
            if (!empty($where)) {
                $message .= ' Where: ';
                $message .= $where;
            } else {
                $message .= ' with an empty where';
            }

            $message .= ' Exception: ' . $exception->getMessage();
            $this->_logger->log($message, \Zend_Log::ERR);
            $this->_logger->log($exception->getTraceAsString(), \Zend_Log::DEBUG);

            if ($useTransaction) {

                $dbAdapter->rollback();
            }

            throw $exception;
        }

        return $result;
    }

    /**
     * Saves current row
     * @return integer primary key for autoincrement fields if the save action was successful
     */
    public function save(\EuskalErrezetak\Model\Raw\RecipeTag $model)
    {
        return $this->_save($model, false, false);
    }

    /**
     * Saves current and all dependent rows
     *
     * @param \EuskalErrezetak\Model\Raw\RecipeTag $model
     * @param boolean $useTransaction Flag to indicate if save should be done inside a database transaction
     * @return integer primary key for autoincrement fields if the save action was successful
     */
    public function saveRecursive(\EuskalErrezetak\Model\Raw\RecipeTag $model, $useTransaction = true, $transactionTag = null)
    {
        return $this->_save($model, true, $useTransaction, $transactionTag);
    }

    protected function _save(\EuskalErrezetak\Model\Raw\RecipeTag $model,
        $recursive = false, $useTransaction = true, $transactionTag = null
    )
    {
        $this->_setCleanUrlIdentifiers($model);

        $fileObjects = array();

        $availableObjects = $model->getFileObjects();
        $fileSpects = array();

        foreach ($availableObjects as $item) {

            $objectMethod = 'fetch' . $item;
            $fso = $model->$objectMethod(false);

            if (!is_null($fso) && $fso->mustFlush()) {

                $fileObjects[$item] = $fso;
                $specMethod = 'get' . $item . 'Specs';
                $fileSpects[$item] = $model->$specMethod();

                $fileSizeSetter = 'set' . $fileSpects[$item]['sizeName'];
                $baseNameSetter = 'set' . $fileSpects[$item]['baseNameName'];
                $mimeTypeSetter = 'set' . $fileSpects[$item]['mimeName'];

                $model->$fileSizeSetter($fso->getSize())
                      ->$baseNameSetter($fso->getBaseName())
                      ->$mimeTypeSetter($fso->getMimeType());
            }
        }

        $data = $model->sanitize()->toArray();

        $primaryKey = $model->getId();
        $success = true;

        if ($useTransaction) {

            try {

                if ($recursive && is_null($transactionTag)) {

                    //$this->getDbTable()->getAdapter()->query('SET transaction_allow_batching = 1');
                }

                $this->getDbTable()->getAdapter()->beginTransaction();

            } catch (\Exception $e) {

                //transaction already started
            }


            $transactionTag = 't_' . rand(1, 999) . str_replace(array('.', ' '), '', microtime());
        }

        unset($data['id']);

        try {
            if (is_null($primaryKey) || empty($primaryKey)) {

                $primaryKey = $this->getDbTable()->insert($data);

                if ($primaryKey) {
                    $model->setId($primaryKey);
                } else {
                    throw new \Exception("Insert sentence did not return a valid primary key", 9000);
                }

                if ($this->_cache) {

                    $parentList = $model->getParentList();

                    foreach ($parentList as $constraint => $values) {

                        $refTable = $this->getDbTable();

                        $ref = $refTable->getReference('EuskalErrezetak\\Mapper\\Sql\\DbTable\\' . $values["table_name"], $constraint);
                        $column = array_shift($ref["columns"]);

                        $cacheHash = 'EuskalErrezetak\\Model\\' . $values["table_name"] . '_' . $data[$column] .'_' . $constraint;

                        if ($this->_cache->test($cacheHash)) {

                            $cachedRelations = $this->_cache->load($cacheHash);
                            $cachedRelations->results[] = $primaryKey;

                            if ($useTransaction) {

                                $this->_cache->save($cachedRelations, $cacheHash, array($transactionTag));

                            } else {

                                $this->_cache->save($cachedRelations, $cacheHash);
                            }
                        }
                    }
                }
            } else {
                $this->getDbTable()
                     ->update(
                         $data,
                         array(
                             $this->getDbTable()->getAdapter()->quoteIdentifier('id') . ' = ?' => $primaryKey
                         )
                     );
            }

                        if (is_numeric($primaryKey) && !empty($fileObjects)) {
            
                foreach ($fileObjects as $key => $fso) {

                    $baseName = $fso->getBaseName();

                    if (!empty($baseName)) {

                        $fso->flush($primaryKey);
                    }
                }
            }


            if ($success === true) {

                foreach ($model->getOrphans() as $itemToDelete) {

                    $itemToDelete->delete();
                }

                $model->resetOrphans();
            }

            if ($useTransaction && $success) {

                $this->getDbTable()->getAdapter()->commit();

            } elseif ($useTransaction) {

                $this->getDbTable()->getAdapter()->rollback();

                if ($this->_cache) {

                    $this->_cache->clean(\Zend_Cache::CLEANING_MODE_MATCHING_TAG, array($transactionTag));
                }
            }

        } catch (\Exception $e) {
            $message = 'Exception encountered while attempting to save ' . get_class($this);
            if (!empty($primaryKey)) {
                $message .= ' id: ' . $primaryKey;
            } else {
                $message .= ' with an empty primary key ';
            }

            $message .= ' Exception: ' . $e->getMessage();
            $this->_logger->log($message, \Zend_Log::ERR);
            $this->_logger->log($e->getTraceAsString(), \Zend_Log::DEBUG);

            if ($useTransaction) {
                $this->getDbTable()->getAdapter()->rollback();

                if ($this->_cache) {

                    if ($transactionTag) {

                        $this->_cache->clean(\Zend_Cache::CLEANING_MODE_MATCHING_TAG, array($transactionTag));

                    } else {

                        $this->_cache->clean(\Zend_Cache::CLEANING_MODE_MATCHING_TAG);
                    }
                }
            }

            throw $e;
        }

        if ($success && $this->_cache) {

            if ($useTransaction) {

                $this->_cache->save($model->toArray(), get_class($model) . "_" . $model->getPrimaryKey(), array($transactionTag));

            } else {

                $this->_cache->save($model->toArray(), get_class($model) . "_" . $model->getPrimaryKey());
            }
        }

        if ($success === true) {

            return $primaryKey;
        }

        return $success;
    }

    /**
     * Loads the model specific data into the model object
     *
     * @param \Zend_Db_Table_Row_Abstract|array $data The data as returned from a \Zend_Db query
     * @param EuskalErrezetak\Model\Raw\RecipeTag|null $entry The object to load the data into, or null to have one created
     * @return EuskalErrezetak\Model\Raw\RecipeTag The model with the data provided
     */
    public function loadModel($data, $entry = null)
    {
        if (!$entry) {
            $entry = new \EuskalErrezetak\Model\RecipeTag();
        }

        // We don't need to log changes as we will reset them later...
        $entry->stopChangeLog();

        if (is_array($data)) {
            $entry->setId($data['id'])
                  ->setRecipeId($data['recipeId'])
                  ->setTagId($data['tagId']);
        } else if ($data instanceof \Zend_Db_Table_Row_Abstract || $data instanceof \stdClass) {
            $entry->setId($data->{'id'})
                  ->setRecipeId($data->{'recipeId'})
                  ->setTagId($data->{'tagId'});

        } else if ($data instanceof \EuskalErrezetak\Model\Raw\RecipeTag) {
            $entry->setId($data->getId())
                  ->setRecipeId($data->getRecipeId())
                  ->setTagId($data->getTagId());

        }

        $entry->resetChangeLog()->initChangeLog()->setMapper($this);

        return $entry;
    }
}
