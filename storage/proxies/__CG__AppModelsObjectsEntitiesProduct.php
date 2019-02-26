<?php

namespace DoctrineProxies\__CG__\App\Models\Objects\Entities;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class Product extends \App\Models\Objects\Entities\Product implements \Doctrine\ORM\Proxy\Proxy
{
    /**
     * @var \Closure the callback responsible for loading properties in the proxy object. This callback is called with
     *      three parameters, being respectively the proxy object to be initialized, the method that triggered the
     *      initialization process and an array of ordered parameters that were passed to that method.
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setInitializer
     */
    public $__initializer__;

    /**
     * @var \Closure the callback responsible of loading properties that need to be copied in the cloned object
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setCloner
     */
    public $__cloner__;

    /**
     * @var boolean flag indicating if this object was already initialized
     *
     * @see \Doctrine\Common\Persistence\Proxy::__isInitialized
     */
    public $__isInitialized__ = false;

    /**
     * @var array properties to be lazy loaded, with keys being the property
     *            names and values being their default values
     *
     * @see \Doctrine\Common\Persistence\Proxy::__getLazyProperties
     */
    public static $lazyPropertiesDefaults = [];



    /**
     * @param \Closure $initializer
     * @param \Closure $cloner
     */
    public function __construct($initializer = null, $cloner = null)
    {

        $this->__initializer__ = $initializer;
        $this->__cloner__      = $cloner;
    }







    /**
     * 
     * @return array
     */
    public function __sleep()
    {
        if ($this->__isInitialized__) {
            return ['__isInitialized__', 'id', 'sku', 'name', 'description', 'price', '' . "\0" . 'App\\Models\\Objects\\Entities\\Product' . "\0" . 'createdAt', '' . "\0" . 'App\\Models\\Objects\\Entities\\Product' . "\0" . 'updatedAt', '' . "\0" . 'App\\Models\\Objects\\Entities\\Product' . "\0" . 'deletedAt'];
        }

        return ['__isInitialized__', 'id', 'sku', 'name', 'description', 'price', '' . "\0" . 'App\\Models\\Objects\\Entities\\Product' . "\0" . 'createdAt', '' . "\0" . 'App\\Models\\Objects\\Entities\\Product' . "\0" . 'updatedAt', '' . "\0" . 'App\\Models\\Objects\\Entities\\Product' . "\0" . 'deletedAt'];
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (Product $proxy) {
                $proxy->__setInitializer(null);
                $proxy->__setCloner(null);

                $existingProperties = get_object_vars($proxy);

                foreach ($proxy->__getLazyProperties() as $property => $defaultValue) {
                    if ( ! array_key_exists($property, $existingProperties)) {
                        $proxy->$property = $defaultValue;
                    }
                }
            };

        }
    }

    /**
     * 
     */
    public function __clone()
    {
        $this->__cloner__ && $this->__cloner__->__invoke($this, '__clone', []);
    }

    /**
     * Forces initialization of the proxy
     */
    public function __load()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, '__load', []);
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __isInitialized()
    {
        return $this->__isInitialized__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitialized($initialized)
    {
        $this->__isInitialized__ = $initialized;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitializer(\Closure $initializer = null)
    {
        $this->__initializer__ = $initializer;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __getInitializer()
    {
        return $this->__initializer__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setCloner(\Closure $cloner = null)
    {
        $this->__cloner__ = $cloner;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific cloning logic
     */
    public function __getCloner()
    {
        return $this->__cloner__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     * @static
     */
    public function __getLazyProperties()
    {
        return self::$lazyPropertiesDefaults;
    }

    
    /**
     * {@inheritDoc}
     */
    public function SetId($id)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'SetId', [$id]);

        return parent::SetId($id);
    }

    /**
     * {@inheritDoc}
     */
    public function GetId()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'GetId', []);

        return parent::GetId();
    }

    /**
     * {@inheritDoc}
     */
    public function SetName($name)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'SetName', [$name]);

        return parent::SetName($name);
    }

    /**
     * {@inheritDoc}
     */
    public function GetName()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'GetName', []);

        return parent::GetName();
    }

    /**
     * {@inheritDoc}
     */
    public function SetSku($sku)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'SetSku', [$sku]);

        return parent::SetSku($sku);
    }

    /**
     * {@inheritDoc}
     */
    public function GetSku()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'GetSku', []);

        return parent::GetSku();
    }

    /**
     * {@inheritDoc}
     */
    public function SetDescription($sku)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'SetDescription', [$sku]);

        return parent::SetDescription($sku);
    }

    /**
     * {@inheritDoc}
     */
    public function GetDescription()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'GetDescription', []);

        return parent::GetDescription();
    }

    /**
     * {@inheritDoc}
     */
    public function SetPrice($price)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'SetPrice', [$price]);

        return parent::SetPrice($price);
    }

    /**
     * {@inheritDoc}
     */
    public function GetPrice()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'GetPrice', []);

        return parent::GetPrice();
    }

    /**
     * {@inheritDoc}
     */
    public function GetRules()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'GetRules', []);

        return parent::GetRules();
    }

    /**
     * {@inheritDoc}
     */
    public function SetRules($rules)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'SetRules', [$rules]);

        return parent::SetRules($rules);
    }

    /**
     * {@inheritDoc}
     */
    public function GetCustomMessages()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'GetCustomMessages', []);

        return parent::GetCustomMessages();
    }

    /**
     * {@inheritDoc}
     */
    public function SetCustomMessages($messages)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'SetCustomMessages', [$messages]);

        return parent::SetCustomMessages($messages);
    }

    /**
     * {@inheritDoc}
     */
    public function Replicate()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'Replicate', []);

        return parent::Replicate();
    }

    /**
     * {@inheritDoc}
     */
    public function prePersist()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'prePersist', []);

        return parent::prePersist();
    }

    /**
     * {@inheritDoc}
     */
    public function preUpdate()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'preUpdate', []);

        return parent::preUpdate();
    }

    /**
     * {@inheritDoc}
     */
    public function getCreatedAt()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCreatedAt', []);

        return parent::getCreatedAt();
    }

    /**
     * {@inheritDoc}
     */
    public function setCreatedAt(\DateTime $createdAt)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCreatedAt', [$createdAt]);

        return parent::setCreatedAt($createdAt);
    }

    /**
     * {@inheritDoc}
     */
    public function getUpdatedAt()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getUpdatedAt', []);

        return parent::getUpdatedAt();
    }

    /**
     * {@inheritDoc}
     */
    public function setUpdatedAt(\DateTime $updatedAt)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setUpdatedAt', [$updatedAt]);

        return parent::setUpdatedAt($updatedAt);
    }

    /**
     * {@inheritDoc}
     */
    public function getDeletedAt()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDeletedAt', []);

        return parent::getDeletedAt();
    }

    /**
     * {@inheritDoc}
     */
    public function setDeletedAt(\DateTime $deletedAt)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDeletedAt', [$deletedAt]);

        return parent::setDeletedAt($deletedAt);
    }

    /**
     * {@inheritDoc}
     */
    public function isDeleted()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'isDeleted', []);

        return parent::isDeleted();
    }

}