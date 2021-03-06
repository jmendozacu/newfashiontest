<?php
    
    /**
     * Sales Analytics installation script
     *
     * @author Magento
     */
    /**
     * @var $installer Mage_Core_Model_Resource_Setup
     */
    $installer = $this;
    
    /**
     * Creating table terapeak_salesanalytics_user_cerdentials
     */
    $installer->startSetup();
    $installer->run("DROP TABLE IF EXISTS {$this->getTable('terapeak_salesanalytics/usercredentials')};");
    $installer->run("DROP TABLE IF EXISTS {$this->getTable('terapeak_salesanalytics/linkedchannel')};");
    $installer->run("DROP TABLE IF EXISTS {$this->getTable('terapeak_salesanalytics/historicaldata')};");
    $table = $installer->getConnection()
    ->newTable($installer->getTable('terapeak_salesanalytics/usercredentials'))
    ->addColumn('sr_no', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
                                                                        'unsigned' => true,
                                                                        'nullable' => false,
                                                                        'primary' => true,
                                                                        'auto-increment' => false
                                                                        ), 'Serial No')
    ->addColumn('username', Varien_Db_Ddl_Table::TYPE_TEXT, 255, array(
                                                                       'nullable' => true,
                                                                       'default' => null
                                                                       ), 'User Name')
    ->addColumn('password', Varien_Db_Ddl_Table::TYPE_TEXT, 63, array(
                                                                      'nullable' => true,
                                                                      'default' => null
                                                                      ), 'Password');
    
    $installer->getConnection()->createTable($table);
    
    /**
     * Creating table terapeak_salesanalytics_linked_channel
     */
    $table = $installer->getConnection()
    ->newTable($installer->getTable('terapeak_salesanalytics/linkedchannel'))
    ->addColumn('store_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
                                                                           'unsigned' => true,
                                                                           'nullable' => false,
                                                                           'primary' => true,
                                                                           'auto-increment' => 'false'
                                                                           ), 'Store Id')
    ->addColumn('store_name', Varien_Db_Ddl_Table::TYPE_TEXT, 255, array(
                                                                         'nullable' => true,
                                                                         'default' => null
                                                                         ), 'Store Name')
    ->addColumn('channel_id', Varien_Db_Ddl_Table::TYPE_INTEGER, 63, array(
                                                                           'nullable' => true,
                                                                           'default' => null
                                                                           ), 'Channel Id');
    
    $installer->getConnection()->createTable($table);
    
    /**
     * Creating table terapeak_salesanalytics_historical_data
     */
    $table = $installer->getConnection()
    ->newTable($installer->getTable('terapeak_salesanalytics/historicaldata'))
    ->addColumn('store_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
                                                                           'unsigned' => true,
                                                                           'nullable' => false,
                                                                           'primary' => true,
                                                                           'auto-increment' => 'false'
                                                                           ), 'Store Id')
    ->addColumn('prods_avail', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
                                                                              'nullable' => true,
                                                                              'default' => null
                                                                              ), 'Prods Avail')
    ->addColumn('prods_filled', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
                                                                               'nullable' => true,
                                                                               'default' => null
                                                                               ), 'Prods Filled')
    ->addColumn('orders_avail', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
                                                                               'nullable' => true,
                                                                               'default' => null
                                                                               ), 'Order Avail')
    ->addColumn('orders_filled', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
                                                                                'nullable' => true,
                                                                                'default' => null
                                                                                ), 'Order Filled');
    
    $installer->getConnection()->createTable($table);
    $installer->endSetup();
