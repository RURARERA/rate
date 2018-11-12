<?php

use yii\db\Schema;
use jamband\schemadump\Migration;

class m181017_085931_murakoze extends Migration
{
    public function safeUp()
    {
    	 // cell
        $this->createTable('{{%cell}}', [
            'id' => $this->primaryKey(),
            'province_id' => $this->integer(11)->notNull()->unique(),
            'district_id' => $this->integer(11)->notNull(),
            'sector_id' => $this->integer(11)->notNull(),
            'name' => $this->string(255)->notNull(),
            'code' => $this->string(6)->notNull()->unique(),
        ], $this->tableOptions);

        // contact
        $this->createTable('{{%contact}}', [
            'id' => $this->primaryKey(),
            'location_id' => $this->integer(11)->notNull(),
            'email_address' => $this->string(255)->notNull(),
            'phone_number' => $this->string(15)->notNull(),
            'created_at' => $this->datetime()->notNull(),
            'updated_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
            'status' => $this->boolean()->null()->comment('1: active, 0: inactive'),
        ], $this->tableOptions);

        // device
        $this->createTable('{{%device}}', [
            'id' => $this->primaryKey(),
            'uuid' => $this->varchar(255)->notNull()->unique(),
            'service_id' => $this->integer(11)->notNull(),
            'location_id' => $this->integer(11)->notNull,
            'mac_address'=>$this->varchar(255)->notNull,
            'status' => $this->integer(11)->null()->comment('1: active, 0: inactive'),
            'created_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
        ], $this->tableOptions);

        // district
        $this->createTable('{{%district}}', [
            'id' => $this->primaryKey(),
            'province_id' => $this->integer(11)->notNull(),
            'name' => $this->string(75)->notNull()->unique(),
            'code' => $this->string(3)->notNull(),
        ], $this->tableOptions);

        // location
        $this->createTable('{{%location}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
            'tin_number' => $this->integer(10)->null(),
            'address' => $this->string(255)->null(),
            'cell_id' => $this->integer(11)->notNull(),
            'sector_id' => $this->integer(11)->notNull(),
            'district_id' => $this->integer(11)->notNull(),
            'province_id' => $this->integer(11)->notNull(),
            'status' => $this->boolean()->null()->comment('1: active, 0: inactive'),
            'created_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
        ], $this->tableOptions);

        // location_has_service
        $this->createTable('{{%location_has_service}}', [
            'location_id' => $this->integer(11)->notNull(),
            'service_id' => $this->integer(11)->notNull(),
        ], $this->tableOptions);

        // province
        $this->createTable('{{%province}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(75)->notNull()->unique(),
        ], $this->tableOptions);

        // rating
        $this->createTable('{{%rating}}', [
            'id' => $this->bigPrimaryKey(),
            'state' => $this->smallInteger(6)->notNull()->comment('1: excellent, 2: good, 3: bad'),
            'time' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
            'service_id' => $this->integer(11)->notNull(),
            'device_id' => $this->integer(11)->notNull(),
        ], $this->tableOptions);

        // sector
        $this->createTable('{{%sector}}', [
            'id' => $this->primaryKey(),
            'province_id' => $this->integer(11)->notNull()->unique(),
            'district_id' => $this->integer(11)->notNull(),
            'name' => $this->string(75)->notNull(),
            'code' => $this->string(10)->notNull(),
        ], $this->tableOptions);

        // service
        $this->createTable('{{%service}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
            'status' => $this->integer(4)->null()->comment('1: active, 0: inactive'),
            'created_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
        ], $this->tableOptions);

        // fk: contact
        $this->addForeignKey('fk_contact_location_id', '{{%contact}}', 'location_id', '{{%location}}', 'id');

        // fk: device
        $this->addForeignKey('fk_device_service_id', '{{%device}}', 'service_id', '{{%service}}', 'id');

        // fk: location_has_service
        $this->addForeignKey('fk_location_has_service_location_id', '{{%location_has_service}}', 'location_id', '{{%location}}', 'id');
        $this->addForeignKey('fk_location_has_service_service_id', '{{%location_has_service}}', 'service_id', '{{%service}}', 'id');

        // fk: rating
        $this->addForeignKey('fk_rating_service_id', '{{%rating}}', 'service_id', '{{%service}}', 'id');
        $this->addForeignKey('fk_rating_device_id', '{{%rating}}', 'device_id', '{{%device}}', 'id');

    }

    public function safeDown()
    {
    }
}

