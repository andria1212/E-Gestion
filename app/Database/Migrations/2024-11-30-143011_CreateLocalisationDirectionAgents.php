<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateLocalisationDirectionAgents extends Migration
{
    public function up()
    {
        /*
        * Creation de la table Localisation
        */
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'ville' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
                'null' => false,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('localisation');

        /*
        * Creation de la table Direction
        */
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('direction');

        /*
        * Creation de la table Agents
        */
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'nom_agent' => [
                'type' => 'VARCHAR',
                'constraint' => '30',
                'null' => false,
            ],
            'prenom_agent' => [
                'type' => 'VARCHAR',
                'constraint' => '30',
                'null' => false,
            ],
            'date_naissance' => [
                'type' => 'DATETIME',
                'null' => false,
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
                'unique' => true,
                'null' => false,
            ],
            'id_loc' => [
                'type' => 'INT',
                'unsigned' => true,
            ],
            'id_corps' => [
                'type' => 'INT',
                'unsigned' => true,
            ],
            'id_direc' => [
                'type' => 'INT',
                'unsigned' => true,
            ],
            'situation_marital' => [
                'type' => 'VARCHAR',
                'constraint' => '30',
                'null' => false,
            ],
            'contact' => [
                'type' => 'VARCHAR',
                'constraint' => '30',
                'unique' => true,
                'null' => false,
            ],
            'grade' => [
                'type' => 'VARCHAR',
                'constraint' => '15',
                'null' => false,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('id_loc', 'localisation', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_direc', 'direction', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('agents');
    }

    public function down()
    {
        $this->forge->dropTable('agents', true);
        $this->forge->dropTable('direction', true);
        $this->forge->dropTable('localisation', true);
    }
}
